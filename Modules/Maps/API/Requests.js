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

        create: function ()
        {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Maps.Inventory.Create', {

            }, function (data) {
                Rune.Maps.Inventory.show();
            }, function () {

            });
        },

        edit: function (keyItem)
        {
            API.request('Rune.Maps.Inventory.Edit', {
                key_item: keyItem
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        save: function (keyItem) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#maps-inventory-edit');
            API.request('Rune.Maps.Inventory.Save', {
                key_item: keyItem,
                type: jq_block.find('[name=type]').val(),
                title: jq_block.find('[name=title]').val(),
                description: jq_block.find('[name=description]').val(),
                data: jq_block.find('[name=data]').val(),
            }, function (data) {
                Rune.Maps.show();
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
                Rune.Maps.show();
            }, function () {

            });
        },


        put: function (keyItem)
        {
            API.request('Rune.Maps.Inventory.Put', {
                key_item: keyItem,
                x: Map.PCx,
                y: Map.PCy
            }, function (data) {
                Rune.Maps.show();
            }, function () {

            });
        },

        parseItem: function (entity)
        {
            let html = entity.title;

            if(entity.type == 2) // Note
            {
                $('#side-left').html(entity.description);
                return;
            }

            if(entity.type == 3) // Portal
            {
                $('#side-left').html('<a target="_blank" href="' + entity.description + '">' + entity.title + '</a>');
                return;
            }

            $('#side-left').html(html);
        }
    }
}