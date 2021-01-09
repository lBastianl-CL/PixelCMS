import { ServerPacket } from "../../serverPacket.js";

export class RemoveItem extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readInt();

        for(var i = 0; i < window.ROOM.ITEMS.length; i++)
        {
            if(window.ROOM.ITEMS[i] == null) 
                continue;

            if(window.ROOM.ITEMS[i].item.id == id)
            {
                window.ROOM.ITEMS[i].item.destroy();
                window.ROOM.ITEMS[i] = null;
            }
        }
    }
}
