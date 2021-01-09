import { AutenticateUserTicket } from "../communication/outgoing/user/AuthenticateUserTicket.js";

export class PhaserScene extends Phaser.Scene {
    constructor(Manager, Configuration) 
    {
        super(Configuration);
        this.Manager = Manager;
    }

    preload() 
    {
        var roomImagesMap = window.ASSETS + 'rooms/map/';
        var room = window.ASSETS + 'rooms/';

        this.load.spritesheet('room_tile', roomImagesMap + 'tile.png', { frameWidth: 64, frameHeight: 39 });
        this.load.image('room_stairs_0', roomImagesMap + 'stairs_0.png');
        this.load.image('room_stairs_2', roomImagesMap + 'stairs_2.png');
        this.load.image('room_stairs_4', roomImagesMap + 'stairs_4.png');
        this.load.image('room_stairs_6', roomImagesMap + 'stairs_6.png');
        this.load.image('room_stairs_in_1', roomImagesMap + 'angle_in_1.png');
        this.load.image('room_stairs_in_3', roomImagesMap + 'angle_in_3.png');
        this.load.image('room_stairs_in_5', roomImagesMap + 'angle_in_5.png');
        this.load.image('room_stairs_out_1', roomImagesMap + 'angle_out_1.png');
        this.load.image('room_stairs_out_3', roomImagesMap + 'angle_out_3.png');
        this.load.image('room_stairs_out_5', roomImagesMap + 'angle_out_5.png');
        this.load.image('room_wall_x', roomImagesMap + 'wall_x.png');
        this.load.image('room_wall_x_0', roomImagesMap + 'wall_x_0.png');
        this.load.image('room_wall_x_4', roomImagesMap + 'wall_x_4.png');
        this.load.image('room_wall_y', roomImagesMap + 'wall_y.png');
        this.load.image('room_wall_y_6', roomImagesMap + 'wall_y_6.png');
        this.load.image('room_wall_y_2',roomImagesMap +'wall_y_2.png');
        this.load.image('room_angle', roomImagesMap + 'wall_angle_in.png');
        this.load.image('room_door_x', roomImagesMap +'door_x.png');
        this.load.spritesheet('room_ghost', room + 'ghost.gif', { frameWidth: 64, frameHeight: 110 });
        this.load.image('room_item_loading', room + 'loading_item.png');
        this.load.json('furnidata', window.FURNIDATA_PATH);
    }

    create() 
    {
        window.CTRL_DOWN = false;

        window.FURNIDATA = this.cache.json.get('furnidata');
        window.PHASER.load.on('filecomplete', window.fileLoaded, this);
        
        window.INTERFACES.loading.percentage(90);
        window.GENERICS.connection.sendPacket(new AutenticateUserTicket())

        this.input.keyboard.on('keydown', function (event) {
            if(event.key == 'Control')
            {
                window.CTRL_DOWN = true;
            }
    
            if(event.key == 'Escape')
            {
                if(window.POSING_ITEM != null)
                {
                    window.POSING_ITEM.destroy();
                    window.POSING_ITEM = null;
                    window.INTERFACES.interface.showInventory(true);
                }
            }
        });

        this.input.keyboard.on('keyup', function (event) {
            if(event.key == 'Control')
            {
                window.CTRL_DOWN = false;
            }
    
        });
    }

    update() 
    {
        // loop principale

        if(window.ROOM != null)
            window.ROOM.tick();

        if(window.POSING_ITEM != null)
            window.POSING_ITEM.fixPosition();
        //if(window.ROOM != null)
            //window.ROOM.animateItems();
    }
}