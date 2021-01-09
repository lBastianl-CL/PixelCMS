export class Item
{
    constructor(item)
    {
        this.id = item.id;
        this.name = item.name;
        this.x = item.x;
        this.y = item.y;
        this.z = item.z;
        this.rot = item.rot;
        this.json = null;
        this.state = item.state;
        this.canChangeState = false;
        this.imgs = [];
        this.animationData = null;
        this.animationFrame = 0;

        var toLoad = !this.areAssetsLoaded();
        if(toLoad)
            this.loadAssets();
        else
            this.loadItemJSON();
    }

    destroy()
    {
        for(var i = 0; i < this.imgs.length; i++)
            this.imgs[i].destroy();
    }
    
    loadItemJSON()
    {
        this.json = window.PHASER.cache.json.get('itjson_' + this.name);
        // spawno l'item
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

        window.PHASER.load.atlas('itatlas_' + this.name, window.FURNITURES + this.name + '/' + this.name + '.png', window.FURNITURES + this.name + '/' + this.name + '_spritesheet.json');
        window.PHASER.load.json('itjson_' + this.name, window.FURNITURES + this.name + '/' + this.name + '.json');

        window.PHASER.load.start();
    }
    
    getX(x, y) {
        return (32 * y) - (32 * x);
    }

    getY(x, y, deep = 0) {;
        return (16 * y) + (16 * x) - (32 * deep) - 4;
    }

    assetsLoaded()
    {
        this.loadItemJSON();
    }

    getFrameName(layer, rot, state)
    {
        return this.name + '_64_' + this.getLayerByNum(layer) + '_' + this.rot + '_' + this.state;
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
        // Clear old items
        for(var i = 0; i < this.imgs.length; i++)
            this.imgs[i].destroy();

        // Make imgs empty
        this.imgs = [];

        if(this.json == null)
            return;
            
        var directions = this.json.directions;
        var assets = this.json.assets;
        var visualization = this.json.visualization;

        // Visualizations info
        var layers = visualization.layerCount;

        for(var layer = 0; layer < layers; layer++)
        {
            var zoom = '64';
            var frameToDraw = this.name + '_' + zoom + '_' + this.getLayerByNum(layer) + '_' + this.rot + '_' + this.state;
            var assetInfo = assets[frameToDraw];

            var img = window.PHASER.add.image(this.getX(this.x, this.y) - assetInfo.x, this.getY(this.x, this.y, this.z) - assetInfo.y, 'itatlas_' + this.name, this.name + '_' + frameToDraw + '.png');
            img.setInteractive({ pixelPerfect: true });
            
            var extraDepth = 1;
            img.setDepth(this.getDepth(this.x, this.y, this.z, extraDepth));
            img.setOrigin(0, 0);
            img.setName('item');
            img.item = this;

            this.imgs[layer] = img;
        }
    }

    updateInfo(x,y,z,rot,state)
    {
        this.x = x;
        this.y = y;
        this.z = z;
        this.rot = rot;
        this.state = state;
        this.drawItem();
    }

    nextAnimationFrame()
    {
        
    }
}