import { RequestNavigatorRoom } from "../communication/outgoing/interface/RequestNavigatorRoom.js";
import { ComposeInventoryRequest } from "../communication/outgoing/inventory/ComposeInventoryRequest.js";
import { InteractItem } from "../communication/outgoing/items/InteractItem.js";
import { PickItem } from "../communication/outgoing/items/PickItem.js";

export class InterfaceManager
{
    constructor()
    {
        this.myRooms = [];
        this.activeRooms = [];
        this.publicRooms = [];
    }

    draw()
    {
        $('body').append(`
        <div id="interface-bar" class="unselectable overPixel">
            <div id="interface-icons">
                <div id="interface-icon" class="interface-icon-rooms" onclick="window.show('navigator');"></div>
                <div id="interface-icon" class="interface-icon-shop"></div>
                <div id="interface-icon" class="interface-icon-inventory" onclick="window.show('inventory');"></div>
                <div id="interface-icon" class="interface-icon-friends"></div>

                <div id="interface-coins">100</div>
                <div id="interface-coins-icon"></div>
                <div id="interface-help-button">Aiuto</div>
            </div>
        </div>`
        );

        $('body').append(`
        <div id="interface-navigator" class="unselectable overPixel">
            <div id="interface-navigator-title" class="pixel-header">Navigatore</div>
            <div class="pixel-header-close" onclick="window.hide('navigator');"></div>
            <div id="interface-navigator-options">
                <div id="navigator-public" class="interface-navigator-option" onclick="window.updateNavigatorTab(2)">Aree pubbliche</div>
                <div id="navigator-private" class="interface-navigator-option" onclick="window.updateNavigatorTab(1)">Stanze private</div>
                <div id="navigator-my" class="interface-navigator-option" onclick="window.updateNavigatorTab(0)">Le mie stanze</div>
            </div>
            <div id="interface-navigator-container" class="pixel-box">
                <div id="interface-navigator-rooms">
                </div>
                <div id="interface-navigator-room-create">Crea una stanza</div>
            </div>
        </div>`
        );
        
        $('body').append(`
        <div id="interface-inventory" class="unselectable overPixel">
            <div id="interface-inventory-title" class="pixel-header">Inventario</div>
            <div class="pixel-header-close" onclick="window.hide('inventory');"></div>
            <div id="interface-inventory-container" class="pixel-box">
                <div class="interface-inventory-item" style="background-image: url('');">
                    <div class="interface-inventory-item-count">100</div>
                </div>
            </div>
        </div>`
        );
        $('body').append(`
        <div id="interface-infostand-item" class="unselectable overPixel">
            <div id="interface-infostand-item-image"></div>
            <div id="interface-infostand-item-title">Erbetta</div>
            <div id="interface-infostand-item-description">L'erba dei vicini &egrave sempre pi&ugrave verde! :P</div>
            <div id="interface-infostand-item-pick" onclick="window.INTERFACES.interface.infostandItemPick()">Prendi</div>
            <div id="interface-infostand-item-rotate" onclick="window.INTERFACES.interface.infostandItemRotate()">Ruota</div>
            <div id="interface-infostand-item-use" onclick="window.INTERFACES.interface.infostandItemUse()">Usa</div>
        </div>`
        );
    }

    infostandItemPick()
    {
        if(this.infostandItem == null)
            return;

        window.GENERICS.connection.sendPacket(new PickItem(this.infostandItem.id));
    }

    infostandItemUse()
    {
        if(this.infostandItem == null)
            return;
        
        window.GENERICS.connection.sendPacket(new InteractItem(this.infostandItem.id));
    }

    infostandItemRotate()
    {
        if(this.infostandItem == null)
            return;
    }

    showItemInfostand(item)
    {
        this.infostandItem = item;

        var id = item.id;
        var name = item.name;
        
        var itemInfo = window.FURNIDATA[name];
        $('#interface-infostand-item-image').css('backgroundImage','url(\'' + window.FURNITURES + 'icons/' + name + '.png\')');
        $('#interface-infostand-item-title').empty();
        $('#interface-infostand-item-title').append(itemInfo.name);
        $('#interface-infostand-item-description').empty();
        $('#interface-infostand-item-description').append(itemInfo.desc);

        $('#interface-infostand-item').css('display', 'block'); 
    } 
    
    hideItemInfostand()
    {
        $('#interface-infostand-item').css('display', 'none'); 
    } 

    updateNavigator(activeRooms, myRooms)
    {
        this.activeRooms = activeRooms;
        this.myRooms = myRooms;

        this.composeNavigator(1);
    }

    updateNavigatorTab(type)
    {
        $('#navigator-public').removeClass('interface-navigator-option-selected');
        $('#navigator-private').removeClass('interface-navigator-option-selected');
        $('#navigator-my').removeClass('interface-navigator-option-selected');

        var toAddClassName = type == 0 ? '#navigator-my' : (type == 1 ? '#navigator-private' : '#navigator-public');
        $(toAddClassName).addClass('interface-navigator-option-selected');

        this.composeNavigator(type);
    }
    
    composeNavigator(type)
    {
        $('#interface-navigator-rooms').empty();
        var array = type == 0 ? this.myRooms : (type == 1 ? this.activeRooms : this.publicRooms );
        for(var room = 0; room < array.length; room++)
        {
            var roomData = array[room];
            $('#interface-navigator-rooms').append('<div id="interface-navigator-room" onclick="window.joinRoom(\'' + roomData.id + '\');"><div id="interface-navigator-room-user">' + roomData.USERS + '</div>' + roomData.title + '</div>');
        }
    }

    showInventory(packet = true)
    { 
        if($('#interface-inventory').css('display') == 'block')
            return;
        
        $('#interface-inventory-container').empty();
        $('#interface-inventory').css('display', 'block');

        if(packet)
            window.GENERICS.connection.sendPacket(new ComposeInventoryRequest());
    }

    updateInventory(items)
    {
        $('#interface-inventory-container').empty();
        for(var item = 0; item < items.length; item++)
        {
            var _item = items[item];
            $('#interface-inventory-container').append('<div class="interface-inventory-item" onclick="window.poseFurni(\'' + _item.name + '\');" style="background-image: url(\'' + window.FURNITURES + 'icons/' + _item.name + '.png\');"><div class="interface-inventory-item-count">' + _item.count + '</div></div>');
        }
    }

    hideInventory()
    {
        $('#interface-inventory').css('display', 'none');
    }

    showNavigator()
    { 
        if($('#interface-navigator').css('display') == 'block')
        {
            return;
        }
        
        $('#interface-navigator').css('display', 'block');

        $('#navigator-public').removeClass('interface-navigator-option-selected');
        $('#navigator-private').removeClass('interface-navigator-option-selected');
        $('#navigator-my').removeClass('interface-navigator-option-selected');
        $('#navigator-private').addClass('interface-navigator-option-selected');

        window.GENERICS.connection.sendPacket(new RequestNavigatorRoom());
    }

    hideNavigator()
    {
        $('#interface-navigator').css('display', 'none');
    }

    showBar()
    {
        $('#interface-bar').css('display', 'block');
    }

    hideBar()
    {
        $('#interface-bar').css('display', 'none');
    }
}