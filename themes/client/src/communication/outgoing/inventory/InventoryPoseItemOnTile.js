import { ClientPacket } from "../../clientPacket.js";

export class InventoryPoseItemOnTile extends ClientPacket
{
    constructor(x, y)
    {
        super(9);

        this.x = x;
        this.y = y;
        this.compose();
    }

    compose()
    {
        var oldName = window.POSING_ITEM.name;

        this.writeInt(this.x);
        this.writeInt(this.y);
        this.writeInt(window.POSING_ITEM.id);

        window.POSING_ITEM.destroy();

        window.POSING_ITEM_LAST = window.POSING_ITEM;
        window.POSING_ITEM = null;
        //window.INTERFACES.interface.showInventory(false);
    }
}