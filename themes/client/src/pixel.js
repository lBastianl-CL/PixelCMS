import { Connection } from './communication/connection.js'
import { RequestNavigatorRoom } from './communication/outgoing/interface/RequestNavigatorRoom.js';
import { InventoryPoseItem } from './communication/outgoing/inventory/InventoryPoseItem.js';
import { UserJoinRoom } from './communication/outgoing/room/UserJoinRoom.js';
import { HotelViewManager } from './interface/hotelViewInterface.js';
import { InterfaceManager } from './interface/interfaceManager.js';
import { LoadingInterface } from './interface/loadingInterface.js'

window.log2 = function log2(text)
{
    console.log('[Pixel] ' + text);
}

window.ASSETS = 'http://127.0.0.1/client/assets/images/';
window.AVATAR_IMAGE = 'http://127.0.0.1/avatar/avatar.php?figure=';
window.FURNIDATA_PATH = 'http://127.0.0.1/client/assets/gamedata/furnitures/furnidata.json';
window.FURNITURES = 'http://127.0.0.1/client/assets/gamedata/furnitures/';

window.ROOM = null;
window.PHASER = null;
window.PHASER_MANAGER = null;
window.LOADED_FURNI = [];
window.POSING_ITEM = null;
window.POSING_ITEM_LAST = null;

window.CONFIGURATIONS = {
    "server": "127.0.0.1:30000"
};

window.INTERFACES = {
    "loading": new LoadingInterface(),
    "hotelView": new HotelViewManager(),
    "interface": new InterfaceManager()
};

window.GENERICS = {
    "connection": new Connection()
}

window.USER = {
    id: -1,
    username: ''
};

// Functions
window.fileLoaded = function fileLoaded(key, type, obj) 
{
    if(key.startsWith("look_")) 
    {
        window.ROOM.updateUSERSLook(key.substring(5));
    }
    else if(key.startsWith("itjson_"))
    {
        var item = key.substring(7);
        window.ROOM.itemPartLoaded(item);
    }
    else if(key.startsWith("itatlas_"))
    {
        var item = key.substring(8);
        window.ROOM.itemPartLoaded(item);
    }
    
    else 
    {
        console.log('Unknown file loaded.');
        console.log(key);
        console.log(type);
    }
}

window.hide = function hide(type)
{
    switch(type)
    {
        case 'navigator':
            window.INTERFACES.interface.hideNavigator();
            break;
        case 'inventory':
            window.INTERFACES.interface.hideInventory();
            break;
    }
}

window.show = function show(type)
{
    switch(type)
    {
        case 'navigator':
            window.INTERFACES.interface.showNavigator();
            break;
        case 'inventory':
            if(this.ROOM == null)
                return;
            window.INTERFACES.interface.showInventory();
            break;
    }
}

window.joinRoom = function joinRoom(id)
{
    window.hide('navigator');
    window.GENERICS.connection.sendPacket(new UserJoinRoom(id));
}

window.updateNavigatorTab = function updateNavigatorTab(type)
{
    window.INTERFACES.interface.updateNavigatorTab(type);
}

window.poseFurni = function poseFurni(name)
{
    window.GENERICS.connection.sendPacket(new InventoryPoseItem(name)); 
}


// Start engine
window.INTERFACES.loading.draw();
window.INTERFACES.hotelView.draw();
window.INTERFACES.interface.draw();

// Start connection
window.GENERICS.connection.init();


