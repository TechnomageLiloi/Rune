Rune.Menu = {
    show: function ()
    {
        API.request('Rune.Menu.Show', {

        }, function (data) {
            $('#head').hide();
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function ()
    {
        API.request('Rune.Menu.Save', {
            x: Map.PCx,
            y: Map.PCy
        }, function (data) {
            document.location.href = '/';
        }, function () {

        });
    }
}