export class User
{
    constructor(id, username, look, x, y, z, isOnDoor)
    {
        this.id = id;
        this.username = username;
        this.look = look;
        this.x = x;
        this.y = y;
        this.z = z;
        this.path = null;
        this.rot = 1;
        this.playerImage = null;
        this.isOnDoor = isOnDoor;
        this.lastX = 0;
        this.lastY = 0;
        this.currentTween = null;

        this.drawPlayer(window.PHASER.textures.get('look_' + look).key == '__MISSING' ? 'room_ghost' : ('look_' + look));
        window.ROOM.loadLook(look);
    }

    destroy()
    {  
        this.playerImage.destroy();
    }
    createAnimation() {
        for(var rot = 0; rot < 8; rot++)
        {
            var animConfig = {
                key: this.look + '_' + rot,
                frames: [
                    { key: 'look_' + this.look, frame: (rot * 5) + 1 },
                    { key: 'look_' + this.look, frame: (rot * 5) + 2 },
                    { key: 'look_' + this.look, frame: (rot * 5) + 3 },
                    { key: 'look_' + this.look, frame: (rot * 5) + 4 }
                  ],
                frameRate: 12,
                yoyo: false,
                repeat: -1
              };

            window.PHASER.anims.create(animConfig);
            this.playerImage.anims.load(this.look + '_' + rot);
        }
    }

    lookLoaded()
    {
        this.remove();
        this.drawPlayer('look_' + this.look);
        this.createAnimation();
    }

    getX(x, y) {
        return (32 * y) - (32 * x);
    }

    getY(x, y, deep = 0) {;
        deep = deep + 1;
        return (16 * y) + (16 * x) - (32 * deep) - 15;
    }

    updateFrame()
    {
        this.playerImage.setFrame(this.rot * 5);
    }

    getDepth(x, y, z)
    {
        return (x * 1000) + (1000 * (y-1)) + 10;
    }

    updateDepth()
    {
        if(this.isOnDoor)
        {
            this.playerImage.setDepth(99);
            return;
        }
        this.playerImage.setDepth(this.getDepth(this.x, this.y, this.z));
    }

    drawPlayer(img)
    {
        this.playerImage = window.PHASER.add.sprite(this.getX(this.x, this.y), this.getY(this.x, this.y, 0), img);
        this.updateFrame();
        this.updateDepth();
        
        if(window.USER.id == this.id)
        {
            window.PHASER.cameras.main.startFollow(this.playerImage, 1, 1);
            window.PHASER.cameras.main.setDeadzone(200, 200);
        }
    }

    breakWalking(x, y, z)
    {
        this.x = x;
        this.y = y;
        this.z = z;
        this.path = null;
        this.currentTween.stop();
        this.currentTween = null;
        this.playerImage.x = this.getX(x, y);
        this.playerImage.y = this.getY(x, y, z);
        this.playerImage.anims.stop();
        this.updateFrame();
        this.updateDepth();

    }

    startWalking()
    {
        var current = this.path.length - 1;
        var toPerformPath = this.path[current];

        this.lastX = this.x;
        this.lastY = this.y;
        this.x = toPerformPath.x;
        this.y = toPerformPath.y;
        this.z = toPerformPath.z;
        this.rot = this.calculateRotation(this.lastX, this.lastY, this.x, this.y);
        this.updateFrame();

        this.playerImage.anims.play(this.look + '_' + this.rot);

        this.currentTween = window.PHASER.tweens.add({
            targets: this.playerImage,
            x: this.getX(this.x, this.y),
            y: this.getY(this.x, this.y, toPerformPath.z),
            onStartScope: this,
            ease: 'Linear',
            duration: 510,
            completeDelay: 0
        });

        setTimeout(this.midWalk, 250, this);
        setTimeout(this.walkStepEnded, 500, this);
    }

    walkStepEnded(classe) 
    {
        try
        {
            classe.path.pop();
            if(classe.path.length == 0)
            {
                classe.path = null;
                classe.playerImage.anims.stop();
                classe.updateFrame();
            }
            else classe.startWalking();
        }
        catch
        {

        }
        
        
    }

    midWalk(user)
    {
        user.updateDepth();
    }

    calculateRotation(X1, Y1, X2, Y2)
    {
        var Rotation = 0;
        if (X2 < X1 && Y2 > Y1)
            Rotation = 0;
        else if (X1 == X2 && Y2 > Y1)
            Rotation = 1;
        else if (X2 > X1 && Y2 > Y1)
            Rotation = 2;
        else if (Y1 == Y2 && X2 > X1)
            Rotation = 3;
        else if (Y2 < Y1 && X2 > X1)
            Rotation = 4;
        else if (X1 == X2 && Y2 < Y1)
            Rotation = 5;
        else if (X1 > X2 && Y1 > Y2)
            Rotation = 6;
        else if (X1 > X2 && Y1 == Y2)
            Rotation = 7;
        return Rotation;
    }

    updatePath(path)
    {
        if(this.isOnDoor)
            this.isOnDoor = false;

        this.path = path;
        this.startWalking();
    }

    remove()
    {
        this.playerImage.destroy();
    }
}