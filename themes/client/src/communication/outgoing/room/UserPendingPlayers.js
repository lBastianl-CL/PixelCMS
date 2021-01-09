import { ClientPacket } from "../../clientPacket.js";

export class UserPendingPlayers extends ClientPacket
{
    constructor()
    {
        super(4);
        this.compose();
    }

    compose()
    {
        this.writeInt(0);
    }
}