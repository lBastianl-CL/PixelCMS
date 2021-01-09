import { ServerPacket } from "../../serverPacket.js";

export class UpdateItem extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readInt();
        var rot = this.readInt();
        var state = this.readInt();
        var x = this.readInt();
        var y = this.readInt();
        var z = this.readDouble();
        for(var i = 0; i < window.ROOM.ITEMS.length; i++)
        {
            if(window.ROOM.ITEMS[i] == null) 
                continue;

            if(window.ROOM.ITEMS[i].item.id == id)
                window.ROOM.ITEMS[i].item.updateInfo(x, y, z, rot, state);
        }
    }
}
