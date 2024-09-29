Rune.Admin = {
    ping: function (ping)
    {
        API.request('Rune.Admin.Ping', {
            ping: ping
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    menu: function ()
    {
        API.request('Rune.Admin.Menu', {
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    lock: function (locked)
    {
        API.request('Rune.Admin.Lock', {
            locked: locked
        }, function (data) {
            location.reload();
        }, function () {

        });
    }
}