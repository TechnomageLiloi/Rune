Rune.User = {
    search: function ()
    {
        API.request('Rune.User.Search', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}