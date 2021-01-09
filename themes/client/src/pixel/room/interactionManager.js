import { InventoryPoseItemOnTile } from "../../communication/outgoing/inventory/InventoryPoseItemOnTile.js";
import { InteractItem } from "../../communication/outgoing/items/InteractItem.js";
import { PickItem } from "../../communication/outgoing/items/PickItem.js";
import { UserClickTile } from "../../communication/outgoing/room/UserClickTile.js";

export class InteractionManager
{
    constructor()
    {
        this.init();

        window.oldTile = null;

        window.clickTimeout = null;

        window.t0 = null;
        window.t1 = null;
    }

    init()
    {
        window.PHASER.input.on('pointerover', this.objectMouseIn);
        window.PHASER.input.on('pointerout', this.objectMouseOut);
        window.PHASER.input.on('gameobjectdown', this.objectMouseClick);
        window.PHASER.input.setTopOnly(false);
    }

    objectMouseIn(pointer, gameObject, event)
    {
        if(gameObject[0].name == 'tile')
        {
            if(window.oldTile == null)
            {
                window.oldTile = gameObject;
                gameObject[0].setFrame(1);

                if(window.POSING_ITEM != null)
                {
                    window.POSING_ITEM.fixPosition(gameObject[0].coordsTile.x, gameObject[0].coordsTile.y);
                }
            }
            else
            {
                if(window.oldTile != gameObject)
                {
                    window.oldTile[0].setFrame(0);
                    window.oldTile = gameObject;
                    gameObject[0].setFrame(1);
                    if(window.POSING_ITEM != null)
                    {
                        window.POSING_ITEM.fixPosition(gameObject[0].coordsTile.x, gameObject[0].coordsTile.y);
                    }
                }
            }
        }
    }

    objectMouseOut(pointer, gameObject,  event)
    {
        if(gameObject[0].name == 'tile')
        {
            gameObject[0].setFrame(0);
        }
    }

    objectMouseClick(pointer, gameObject, event)
    {
        if(gameObject.name == 'tile')
        {
            if(window.POSING_ITEM != null)
            {
                window.GENERICS.connection.sendPacket( new InventoryPoseItemOnTile(gameObject.coordsTile.x, gameObject.coordsTile.y));
            } 
            else window.GENERICS.connection.sendPacket(new UserClickTile(gameObject.coordsTile.x, gameObject.coordsTile.y));
        }
        else if(gameObject.name == 'item')
        {
            if(window.waitNextClick)
                return;

            var item =  gameObject.item;

            if(window.lastDoubleClick != null)
            {
                var now = performance.now();
                var ms = now - window.lastDoubleClick;
                if(ms < 1000)
                {
                    return;
                }
                else
                {
                    window.lastDoubleClick = 0;
                }
            }

            if(window.clickTimeout == null)
            {
                window.clickedItems = [];
                window.clickedItems[window.clickedItems.length] = item;
                window.clickTimeout = setTimeout(function() {

                    // Qui va fatta la ripartizione
                    var _item = null;
                    var lastX = 0, lastY = 0, lastZ = 0;
                    for(var i = 0; i < window.clickedItems.length; i++)
                    {
                        var item = window.clickedItems[i];
                        if(lastX == item.x && lastY == item.y && lastZ < item.z)
                        {
                            lastZ = item.z;
                            _item = item;
                        }
                        else if(lastX < item.x || lastY < item.y)
                        {
                            lastX = item.x;
                            lastY = item.y;
                            lastZ = item.z;
                            _item = item;
                        }
                    }

                    // qui mostro l'infostand
                    window.INTERFACES.interface.showItemInfostand(_item);

                    if(window.CTRL_DOWN)
                        window.GENERICS.connection.sendPacket(new PickItem(_item.id));
                        
                    // controllo doppio tocco
                    if(window.lastClickedItem == null)
                        window.lastClickedItem = _item;
                    else
                    {
                        if(window.lastClickedItem == _item)
                        {
                            window.lastClickedItem = null;
                            window.lastDoubleClick = performance.now();
                            if(_item.json.type == 'item_floor_animated')
                                window.GENERICS.connection.sendPacket(new InteractItem(_item.id));
                        }
                        else 
                            window.lastClickedItem = _item;
                    }
                    window.clickTimeout = null;
                }, 50);
            }
            else
            {
                window.clickedItems[window.clickedItems.length] = item;
            }
        }
    }
}