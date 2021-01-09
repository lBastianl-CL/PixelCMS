export class ServerPacket
{
    constructor()
    {
        this.data = [];
        this.offset = 1;
    }

    
    readString()
    {
        try {
            return this.data[this.offset++];
        } catch (error) {
            window.log(error);
            return '';
        }
    }

    readInt()
    {
        try {
            return parseInt(this.data[this.offset++]);
        } catch (error) {
            window.log(error);
            return -1;
        }
    }

    readDouble()
    {
        try {
            return parseFloat(this.data[this.offset++]);
        } catch (error) {
            window.log(error);
            return -1;
        }
    }

    readBool()
    {
        try {
            return this.data[this.offset++] == '1';
        } catch (error) {
            window.log(error);
            return false;
        }
    }
}