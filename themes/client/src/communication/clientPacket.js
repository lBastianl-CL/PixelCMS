export class ClientPacket
{
    constructor(opcode)
    {
        this.opcode = opcode;
        this.result = '';
    }

    writeString(data)
    {
        this.result += '|' + data;
    }

    writeInt(data)
    {
        this.result += '|' + data;
    }

    send()
    {
        var data = this.opcode.toString() + this.result;
        window.GENERICS.connection.socket.send(data);
    }

}