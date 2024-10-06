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

    report: function ()
    {
        API.request('Rune.Admin.Report', {
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    lock: function (locked)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Admin.Lock', {
            locked: locked
        }, function (data) {
            location.reload();
        }, function () {

        });
    }
}