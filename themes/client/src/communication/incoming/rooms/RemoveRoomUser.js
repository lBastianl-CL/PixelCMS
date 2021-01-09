import { ServerPacket } from "../../serverPacket.js";

export class RemoveRoomUser extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readInt();
        window.ROOM.USERS[id].remove();
        
        if(window.USER.id == id)
        {
            window.ROOM.destroy();
            window.INTERFACES.hotelView.show();
            window.ROOM = null;
        }
    }
}
