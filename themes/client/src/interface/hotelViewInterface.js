export class HotelViewManager
{
    constructor()
    {

    }

    draw()
    {
        $('body').append(`<div id="hotel-view">
                            <div id="hotel-view-top-right"></div>
                        </div>`);
    }

    show()
    {
        $('#hotel-view').css('display', 'block');
    }

    hide()
    {
        $('#hotel-view').css('display', 'none');
    }
}