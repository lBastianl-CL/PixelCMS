import { ServerPacket } from "../../serverPacket.js";

export class ComposeItem extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var item = {
            "id": this.readInt(),
            "name":  this.readString(),
            "x": this.readInt(),
            "y": this.readInt(),
            "z": this.readDouble(),
            "rot": this.readInt(),
            "state": this.readInt(),
            "item": null
        };
        
        if(window.POSING_ITEM_LAST != null && window.POSING_ITEM_LAST.name == item.name)
        {
            window.poseFurni(item.name);
            window.POSING_ITEM_LAST = null;
        }

        window.ROOM.addItem(item);
    }
}