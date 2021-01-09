import { ClientPacket } from "../../clientPacket.js";

export class PickItem extends ClientPacket
{
    constructor(id)
    {
        super(10);
        this.id = id;
        this.compose();
    }

    compose()
    {
        this.writeInt(this.id);
    }
}