Rune.Atoms = {
    show: function ()
    {
        API.request('Rune.Atoms.Show', {

        }, function (data) {
            $('body').html(data.render);
        }, function () {

        });
    }
}