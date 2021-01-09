import { ClientPacket } from "../../clientPacket.js";

export class AutenticateUserTicket extends ClientPacket
{
    constructor()
    {
        super(1);
        this.compose();
    }

    compose()
    {
        this.writeString(window.authTicket);
    }
}