Rune.Admin = {
    ping: function ()
    {
        API.request('Rune.Admin.Ping', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}