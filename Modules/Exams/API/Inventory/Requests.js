Rune.Exams = {};

Rune.Exams.Inventory = {
    collection: function ()
    {
        API.request('Rune.Exams.Inventory.Collection', {
            
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_item)
    {
        API.request('Rune.Exams.Inventory.Show', {
            'key_item': key_item
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Exams.Inventory.Create', {

        }, function (data) {
            Rune.Exams.Inventory.collection();
        }, function () {

        });
    },

    remove: function (key_item)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Exams.Inventory.Remove', {
            'key_item': key_item
        }, function (data) {
            Rune.Exams.Inventory.collection();
        }, function () {

        });
    },

    edit: function (key_item)
    {
        API.request('Rune.Exams.Inventory.Edit', {
            'key_item': key_item
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    getInventory: function ()
    {
        API.request('Rune.Exams.Inventory.Inventory', {

        }, function (data) {
            $('#elements').html(data.render);
        }, function () {

        });
    },

    save: function (key_item)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Exams.Inventory.Save', {
            'key_item': key_item,
            'key_atom': jq_block.find('[name="key_atom"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'data': jq_block.find('[name="data"]').val(),
            'dt': jq_block.find('[name="dt"]').val()
        }, function (data) {
            Rune.Exams.Inventory.collection();
        }, function () {

        });
    }
}