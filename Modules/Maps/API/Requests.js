Rune.Maps = {
    show: function ()
    {
        API.request('Rune.Maps.Show', {

        }, function (data) {
            $('#page').html(data.render);
            Rune.Atoms.show($('#side-left'));
            Map.start();
        }, function () {

        });
    },

    save: function (type, key, value)
    {
        API.request('Rune.Maps.Save', {
            type: type,
            key: key,
            value: value
        }, function (data) {
            alert('Saving complete.');
        }, function () {

        });
    },

    saveMap: function ()
    {
        Rune.Maps.save('atom', 'map', Map.data.map);
    }
}