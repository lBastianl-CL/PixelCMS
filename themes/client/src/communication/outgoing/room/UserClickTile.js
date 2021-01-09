import { ClientPacket } from "../../clientPacket.js";

export class UserClickTile extends ClientPacket
{
    constructor(x, y)
    {
        super(3);

        this.x = x;
        this.y = y;
        this.compose();
    }

    compose()
    {
        this.writeInt(this.x);
        this.writeInt(this.y);
    }
}