import { ClientPacket } from "../../clientPacket.js";

export class RequestNavigatorRoom extends ClientPacket
{
    constructor()
    {
        super(6);
        this.compose();
    }

    compose()
    {
        this.writeInt(0);
    }
}