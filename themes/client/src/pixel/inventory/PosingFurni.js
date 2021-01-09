export class PosingFurni
{
    constructor(id, name)
    {
        this.id = id;
        this.name = name;
        this.oldX = -1;
        this.oldY = -1;
        this.imgs = [];
        this.json = null;

        var toLoad = !this.areAssetsLoaded();
        if(toLoad)
            this.loadAssets();
        else
            this.loadItemJSON();

        window.INTERFACES.interface.hideInventory();
    }

    destroy()
    {
        for(var i = 0; i < this.imgs.length; i++)
            this.imgs[i].destroy();
    }

    loadItemJSON()
    {
        this.json = window.PHASER.cache.json.get('itjson_' + this.name);
        this.drawItem();
    }

    areAssetsLoaded()
    {
        var result = false;
        if(window.LOADED_FURNI[this.name] != null)
        {
            if(window.LOADED_FURNI[this.name].waiting == 0)
                result = true;
            else result = false;
        }
        return result;
    }

    loadAssets()
    {
        window.LOADED_FURNI[this.name] = {
            "waiting": 2
        };

        window.PHASER.load.atlas('itatlas_' + this.name, window.FURNITURES + this.name + '/' + this.name + '_spritesheet.png', window.FURNITURES + this.name + '/' + this.name + '_atlas.json');
        window.PHASER.load.json('itjson_' + this.name, window.FURNITURES + this.name + '/' + this.name + '.json');

        window.PHASER.load.start();
    }

    assetsLoaded()
    {
        this.loadItemJSON();
    }

    getX(x, y) {
        return (32 * y) - (32 * x);
    }

    getY(x, y, deep = 0) {;
        return (16 * y) + (16 * x) - (32 * deep);
    }

    getLayerByNum(num)
    {
        switch(num){
            case 0: return 'a';
            case 1: return 'b';
            case 2: return 'c';
            case 3: return 'd';
            case 4: return 'e';
            case 5: return 'f';
            default: return '';
        }
    }

    getDepth(x, y, z, extra)
    {
        return (x * 1000) + (1000 * (y-1)) + z * 0.1 + extra;
    }

    drawItem()
    {
        for(var i = 0; i < this.imgs.length; i++)
            this.imgs[i].destroy();


        if(this.areAssetsLoaded())
        {
            var directions = this.json.directions;
            var assets = this.json.assets;
            var visualization = this.json.visualization;

            // Visualizations info
            var layers = visualization.layerCount;

            for(var layer = 0; layer < layers; layer++)
            {
                var rot = -1;
                if(directions[0] != null)
                    rot = 0;
                else  if(directions[90] != null)
                    rot = 2;
                else  if(directions[180] != null)
                    rot = 4;
                else  if(directions[270] != null)
                    rot = 6;

                var zoom = '64';
                var frameToDraw = this.name + '_' + zoom + '_' + this.getLayerByNum(layer) + '_' + rot + '_0';
                var assetInfo = assets[frameToDraw];

                if(assetInfo == undefined)
                    continue;
                    
                var img = window.PHASER.add.image(this.getX(this.oldX, this.oldY) - assetInfo.x, this.getY(this.oldX, this.oldY) - assetInfo.y, 'itatlas_' + this.name, this.name + '_' + frameToDraw + '.png');
                img.setInteractive({ pixelPerfect: true });
                
                var extraDepth = 1;
                img.setDepth(this.getDepth(this.oldX, this.oldY, 0, extraDepth));
                img.setOrigin(0, 0);
                img.setName('item');
                img.item = this;

                this.imgs[layer] = img;
            }
        }
        else
        {
            var obj = window.PHASER.add.image(this.getX(this.oldX, this.oldY), this.getY(this.oldX, this.oldY) - 22, 'room_item_loading');
            obj.setDepth(this.getDepth(this.oldX, this.oldY, 0, 1));
            
            this.imgs[0] = obj;
        }
    }

    fixPosition(x, y)
    {
        if(x == undefined || y == undefined)
            return;

        if(this.oldX != x || this.oldY != y)
        {
            this.oldX = x;
            this.oldY = y;
            this.drawItem();
        }
    }
}