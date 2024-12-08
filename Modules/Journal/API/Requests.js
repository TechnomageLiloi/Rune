Rune.Journal = {
    show: function ()
    {
        API.request('Rune.Journal.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}