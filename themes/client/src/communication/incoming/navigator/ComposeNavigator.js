import { ServerPacket } from "../../serverPacket.js";

export class ComposeNavigator extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var activeRooms = [];
        var myRooms = [];

        var activeRoomsCount = this.readInt();
        for(var room = 0; room < activeRoomsCount; room++)
        {
            activeRooms[room] = {
                id: this.readInt(),
                title: this.readString(),
                USERS: this.readInt()
            };
        }

        var myRoomsCount = this.readInt();
        for(var room = 0; room < myRoomsCount; room++)
        {
            myRooms[room] = {
                id: this.readInt(),
                title: this.readString(),
                USERS: this.readInt()
            };
        }

        window.INTERFACES.interface.updateNavigator(activeRooms, myRooms);
    }
}
