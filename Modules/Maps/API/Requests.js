Rune.Maps = {
    show: function ()
    {
        API.request('Rune.Maps.Show', {

        }, function (data) {
            $('#page').html(data.render);
            // Rune.Atoms.show($('#side-left'));
            Map.PCx = Map.data.x;
            Map.PCy = Map.data.y;
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
    },

    Inventory: {
        show: function ()
        {
            API.request('Rune.Maps.Inventory.Show', {

            }, function (data) {
                $('#side-left').html(data.render);
            }, function () {

            });
        },

        drop: function (keyItem)
        {
            API.request('Rune.Maps.Inventory.Drop', {
                key_item: keyItem,
                x: Map.PCx,
                y: Map.PCy
            }, function (data) {
                $('#side-left').html(data.render);
            }, function () {

            });
        },
    }
}