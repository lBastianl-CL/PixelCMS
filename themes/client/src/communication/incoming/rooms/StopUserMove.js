import { ServerPacket } from "../../serverPacket.js";

export class StopUserMove extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readInt();
        var x = this.readInt();
        var y = this.readInt();
        var z = this.readDouble();

        if(window.ROOM.USERS[id] != null)
            window.ROOM.USERS[id].breakWalking(x, y, z);
    }
}
