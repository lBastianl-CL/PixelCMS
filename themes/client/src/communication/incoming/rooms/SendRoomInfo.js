import { Room } from "../../../pixel/room/room.js";
import { ServerPacket } from "../../serverPacket.js";

export class SendRoomInfo extends ServerPacket
{
    constructor()
    {
        super();
    }

    read()
    {
        var id = this.readInt();
        var title = this.readString();
        var map = this.readString();
        var itemsCount = this.readInt();

        var items = [];
        for(var item = 0; item < itemsCount; item++)
        {
            items[item] = {
                "id": this.readInt(),
                "name":  this.readString(),
                "x": this.readInt(),
                "y": this.readInt(),
                "z": this.readDouble(),
                "rot": this.readInt(),
                "state": this.readInt(),
                "item": null
            };
        }

        window.ROOM = new Room(id, title, map, items);
    }
}
