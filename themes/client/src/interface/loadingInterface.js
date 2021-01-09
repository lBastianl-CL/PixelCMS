import { PhaserManager } from "../phaser/phaserManager.js";

export class LoadingInterface
{
    constructor()
    {

    }

    draw()
    {
        $('body').append(`<div id="loading" style="display: block;">
                <div id="loadingContainer" class="centered">
                    <div id="loadingLogo"></div>
                    <div id="loadingText">[Build: Dev 0.1 - Date: 14/06/2020]</div>
                    <div id="loaderBarBack">
                        <div id="loaderBarInside">
                            <div id="loaderBarInsidePart1"></div>
                            <div id="loaderBarInsidePart2"></div>
                        </div>
                    </div>
                </div>
            </div>`);

        this.percentage(0);
    }

    percentage(percentage)
    {
        $('#loaderBarInsidePart1').css('width', (percentage * 3) + 'px');
        $('#loaderBarInsidePart2').css('width', (percentage * 3) + 'px');

        if(percentage == 100)
        {
            this.fade();
            window.INTERFACES.hotelView.show();
            window.INTERFACES.interface.showBar();
        }
    }

    fade() 
    {
        var fadeTarget = document.getElementById('loading');
        var fadeEffect = setInterval(function () {
            if (!fadeTarget.style.opacity) {
                fadeTarget.style.opacity = 1;
            }
            if (fadeTarget.style.opacity > 0) {
                fadeTarget.style.opacity -= 0.025;
            } else {
                fadeTarget.style.display = 'none';
                clearInterval(fadeEffect);
            }
        }, 10);
    }

    loadPhaser()
    {
        window.PHASER_MANAGER = new PhaserManager();
        window.PHASER_MANAGER.initScene();
    }
}