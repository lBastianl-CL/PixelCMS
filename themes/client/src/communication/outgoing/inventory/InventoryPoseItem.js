import { ClientPacket } from "../../clientPacket.js";

export class InventoryPoseItem extends ClientPacket
{
    constructor(name)
    {
        super(8);

        this.name = name;
        this.compose();
    }

    compose()
    {
        this.writeString(this.name);
    }
}