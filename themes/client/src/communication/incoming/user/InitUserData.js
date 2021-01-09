import { UserJoinRoom } from "../../outgoing/room/UserJoinRoom.js";
import { ServerPacket } from "../../serverPacket.js";

export class InitUserData extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var error = this.readBool();
        if(error)
        {
            window.GENERICS.connection.close();
            return;
        }
 
        window.USER.id = this.readInt();
        window.USER.username = this.readString();
         
        var homeRoom = this.readInt();
        window.INTERFACES.loading.percentage(100);
        if(homeRoom != 0) window.GENERICS.connection.sendPacket(new UserJoinRoom(homeRoom));
    }
}