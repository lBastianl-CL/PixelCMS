import { ServerPacket } from "../../serverPacket.js";

export class SendUserMove extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readString();
        var pathCounts = this.readInt();
        
        var path = [];
        for(var i = 0; i < pathCounts; i++)
        {
            path[i] = {
                "x": this.readInt(),
                "y": this.readInt(),
                "z": this.readDouble()
            };
        }

        path.pop();
        window.ROOM.USERS[id].updatePath(path);
    }
}
