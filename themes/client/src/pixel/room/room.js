import { UserPendingPlayers } from "../../communication/outgoing/room/UserPendingPlayers.js";
import { Item } from "../item/Item.js";
import { InteractionManager } from "./interactionManager.js";

export class Room
{   
    constructor(id, title, map, items)
    {
        this.id = id;
        this.title = title;
        this.map = map;

        this.USERS = [];
        this.ITEMS = items;
        

        this.wallsAndTiles = [];
        this.drawMap();
        this.interactionManager = new InteractionManager();

        
        this.loadRoomItems();

        this.firstTick = true;

        window.INTERFACES.hotelView.hide();
    }

    destroy()
    {
        for(var i = 0; i < this.wallsAndTiles.length; i++)
        {
            this.wallsAndTiles[i].destroy();
        }
        this.wallsAndTiles = [];

        for(var i = 0; i < this.ITEMS.length; i++)
        {
            var item = this.ITEMS[i];
            if(item != null)
            {
                item.item.destroy();
            }
        }

        for(var i = 0; i < this.USERS.length; i++)
        {
            var user = this.USERS[i];
            if(user != null)
            {
                user.destroy();
            }
        }
    }

    addItem(item)
    {
        this.ITEMS[this.ITEMS.length] = item;
        this.ITEMS[this.ITEMS.length - 1].item = new Item(item);
    }

    tick()
    {
        if(this.firstTick)
        {
            this.firstTick = false;
            window.GENERICS.connection.sendPacket(new UserPendingPlayers());
        }
        this.animateItems();
    }   

    loadRoomItems(name)
    {
        for(var i = 0; i < this.ITEMS.length; i++)
        {
            this.ITEMS[i].item = new Item(this.ITEMS[i]);
        }
    }

    animateItems()
    {
        //for(var i = 0; i < window.ITEMS.length; i++)
            //window.ITEMS[i].nextAnimationFrame();
    }

    itemIsReady(name)
    {
        for(var i = 0; i < this.ITEMS.length; i++)
        {
            if(this.ITEMS[i].name == name)
            {
                this.ITEMS[i].item.assetsLoaded();
            }
        }

        if(window.POSING_ITEM != null && window.POSING_ITEM.name == name)
            window.POSING_ITEM.assetsLoaded();
    }
    
    itemPartLoaded(name)
    {
        window.LOADED_FURNI[name].waiting -= 1;
        if(window.LOADED_FURNI[name].waiting == 0)
            this.itemIsReady(name);
    }

    addUser(user)
    {
        this.USERS[user.id] = user;
    }

    tileX(x, y) {
        return (32 * y) - (32 * x);
    }

    tileY(x, y, deep = 0) {;
        return (16 * y) + (16 * x) - (32 * deep);
    }

    getDepth(x, y, z)
    {
        return (x * 100) + (100 * (y-1));
    }

    drawMap()
    {
        var x = 0, y = 0;
        for (var i = 0; i < this.map.length; i++) {
            var char = this.map.charAt(i);
            if(char.trim().length == 0)
                continue;

            var obj = null;

            if(char == 'C')
            {
                y++;
            }
            else if(char == 'y')
            {
                obj = window.PHASER.add.sprite(this.tileX(x, y) - 12, this.tileY(x, y) - 51, 'room_wall_y').setDepth(100).setOrigin(0.5, 0.5);
                y++;

                this.wallsAndTiles[this.wallsAndTiles.length] = obj;
            }
            else if(char == 'x')
            {
                obj = window.PHASER.add.sprite(this.tileX(x, y) + 12, this.tileY(x, y) - 51, 'room_wall_x').setDepth(100).setOrigin(0.5, 0.5);
                y++;

                this.wallsAndTiles[this.wallsAndTiles.length] = obj;
            }
            else if(char == 'D')
            {
                var obj2 = window.PHASER.add.sprite(this.tileX(x, y) + 12, this.tileY(x, y) - 100, 'room_door_x').setDepth(100).setOrigin(0.5, 0.5);
                obj = window.PHASER.add.sprite(this.tileX(x, y),  this.tileY(x, y, height - 1), 'room_tile').setName('tile').setDepth(98).setOrigin(0.5, 0.5);
                y++;

                this.wallsAndTiles[this.wallsAndTiles.length] = obj;
                this.wallsAndTiles[this.wallsAndTiles.length] = obj2;
            }
            else if(char == 'n')
            {
                y = 0;
                x++;
            }
            else
            {
                var height = parseInt(char);
                obj = window.PHASER.add.sprite(this.tileX(x, y), this.tileY(x, y, height - 1), 'room_tile').setName('tile').setOrigin(0.5, 0.5);
                obj.setDepth(this.getDepth(x, y, height));
                obj.coordsTile = { "x": x, "y": y };
                obj.setInteractive({ pixelPerfect: true });
                y++;

                this.wallsAndTiles[this.wallsAndTiles.length] = obj;
            }
        }
    }

    loadLook(look) 
    {
        window.PHASER.load.spritesheet('look_' + look, window.AVATAR_IMAGE + look, { frameWidth: 64, frameHeight: 110 });
        window.PHASER.load.start();
    }

    updateUSERSLook(look)
    {
        this.USERS.forEach(element => {
            if(element != null && element.look == look)
            {
                element.lookLoaded();
            }
        });
    }

    fileLoaded(key, type, obj) {
        if(key.startsWith("look_")) 
        {
            window.ROOM.updateUSERSLook(key.substring(5));
        }
        else 
        {
            console.log('Unknown file loaded.');
            console.log(key);
            console.log(type);
        }
    }
}