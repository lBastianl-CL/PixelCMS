import { InitUserData } from "./incoming/user/InitUserData.js";
import { SendRoomInfo } from "./incoming/rooms/SendRoomInfo.js";
import { SendRoomUSERS } from "./incoming/rooms/SendRoomUSERS.js";
import { SendRoomUser } from "./incoming/rooms/SendRoomUser.js";
import { SendUserMove } from "./incoming/rooms/SendUserMove.js";
import { RemoveRoomUser } from "./incoming/rooms/RemoveRoomUser.js";
import { UpdateItem } from "./incoming/items/UpdateItem.js";
import { ComposeNavigator } from "./incoming/navigator/ComposeNavigator.js";
import { ComposeInventory } from "./incoming/inventory/ComposeInventory.js";
import { ComposePoseItem } from "./incoming/inventory/ComposePoseItem.js";
import { ComposeItem } from "./incoming/items/ComposeItem.js";
import { RemoveItem } from "./incoming/items/RemoveItem.js";
import { StopUserMove } from "./incoming/rooms/StopUserMove.js";

export class Connection
{
    constructor()
    {
        this.socket = null;
    }

    init()
    {
        window.INTERFACES.loading.percentage(5);

        this.socket = new WebSocket("ws://" + window.CONFIGURATIONS.server);

        this.socket.onopen = this.open;
        this.socket.onclose = this.close;
        this.socket.onerror = this.close;
        this.socket.onmessage = function(event) {
            window.GENERICS.connection.receive(event.data);
        };
    }

    open()
    {
        var loading = window.INTERFACES.loading;
        loading.percentage(50);
        loading.loadPhaser();
    }

    close()
    {
        this.socket = null;
        window.log('Connection disposed');
    }

    receive(message)
    {
        try 
        {
            var data = message.split('|');
            var opcode = parseInt(data[0]);

            var receivePacket = null;
            
            switch(opcode)
            {
                case 2: receivePacket = new InitUserData(); break;
                case 3: receivePacket = new SendRoomInfo(); break;
                case 4: receivePacket = new SendRoomUSERS(); break;
                case 5: receivePacket = new SendRoomUser(); break;
                case 6: receivePacket = new SendUserMove(); break;
                case 7: receivePacket = new RemoveRoomUser(); break;
                case 8: receivePacket = new UpdateItem(); break;
                case 9: receivePacket = new ComposeNavigator(); break;
                case 10: receivePacket = new ComposeInventory(); break;
                case 11: receivePacket = new ComposePoseItem(); break; 
                case 12: receivePacket = new ComposeItem(); break;
                case 13: receivePacket = new RemoveItem(); break;
                case 14: receivePacket = new StopUserMove(); break;
                default: window.log('Missing packet: ' + message);
            }

            if(receivePacket != null)
            {
                receivePacket.data = data;
                receivePacket.read();
                receivePacket = null;
            }
        } 
        catch (error) 
        {
            console.log(error);
        }   
    }

    sendPacket(packet)
    {
        packet.send();
        packet = null;
    }
}