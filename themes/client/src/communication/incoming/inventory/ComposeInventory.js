import { ServerPacket } from "../../serverPacket.js";

export class ComposeInventory extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var items = [];
        var itemsCount = this.readInt();
        for(var item = 0; item < itemsCount; item++)
        {
            items[item] = {
                'name': this.readString(),
                'count': this.readInt()
            };
        }

        window.INTERFACES.interface.updateInventory(items);
    }
}
