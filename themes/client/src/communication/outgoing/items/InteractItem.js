import { ClientPacket } from "../../clientPacket.js";

export class InteractItem extends ClientPacket
{
    constructor(id)
    {
        super(5);
        this.id = id;
        this.compose();
    }

    compose()
    {
        this.writeInt(this.id);
    }
}