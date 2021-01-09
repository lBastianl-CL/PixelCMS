import { PosingFurni } from "../../../pixel/inventory/PosingFurni.js";
import { ServerPacket } from "../../serverPacket.js";

export class ComposePoseItem extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var itemId = this.readInt();
        if(itemId == 0)
        {
            window.INTERFACES.interface.showInventory(true);
            return;
        }
        var itemName = this.readString();
        window.POSING_ITEM = new PosingFurni(itemId, itemName);
    }
}