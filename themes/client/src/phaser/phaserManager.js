import { PhaserScene } from './phaserScene.js'

export class PhaserManager {
    constructor() {
        this.gameConfig = { 
            type: Phaser.CANVAS, 
            width: window.innerWidth, 
            height: window.innerHeight, 
            backgroundColor: 'black', 
            parent: 'phaser-example', 
            scene: null, 
            pixelArt: true,
            scale: 
            { 
                mode: Phaser.Scale.RESIZE 
            },
            render: {
                pixelArt: true,
                antialiasing: true
            },
            fps: {
                target: 24,
                forceSetTimeOut: true
            }
        };

        this.sceneConfig = { key: 'habbo', active: true };
        this.phaser = null;
    }

    initScene() 
    {
        this.gameConfig.scene = new PhaserScene(this, this.sceneConfig);
        this.phaser = new Phaser.Game(this.gameConfig);

        window.PHASER = this.gameConfig.scene;
    }
}