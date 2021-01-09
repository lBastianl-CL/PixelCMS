import { User } from "../../../pixel/user/User.js";
import { ServerPacket } from "../../serverPacket.js";

export class SendRoomUSERS extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var USERS = this.readInt();
        for(var i = 0; i < USERS; i++)
        {
            var id = this.readInt();
            var username = this.readString();
            var look = this.readString();
            var x = this.readInt();
            var y = this.readInt();
            var z = this.readDouble();
            var isOnDoor = this.readBool();

            var user = new User(id, username, look, x, y, z, isOnDoor);
            window.ROOM.addUser(user);
        }
    }
}
