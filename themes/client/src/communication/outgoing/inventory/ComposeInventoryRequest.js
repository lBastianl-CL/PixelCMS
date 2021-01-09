import { ClientPacket } from "../../clientPacket.js";

export class ComposeInventoryRequest extends ClientPacket
{
    constructor()
    {
        super(7);
        this.compose();
    }

    compose()
    {
        this.writeInt(0);
    }
}