Rune.Plan = {
    show: function ()
    {
        API.request('Rune.Plan.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}