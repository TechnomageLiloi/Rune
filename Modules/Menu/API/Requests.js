Rune.Menu = {
    show: function ()
    {
        API.request('Rune.Menu.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}