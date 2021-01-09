import { ClientPacket } from "../../clientPacket.js";

export class UserJoinRoom extends ClientPacket
{
    constructor(roomId)
    {
        super(2);

        this.roomId = roomId;
        this.compose();
    }

    compose()
    {
        this.writeInt(this.roomId);
    }
}