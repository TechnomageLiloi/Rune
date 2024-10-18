Rune.Degrees = {
    getCollection: function ()
    {
        API.request('Rune.Degrees.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Rune.Degrees.Show', {
            'key': key
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

        API.request('Rune.Degrees.Create', {
            'debug': true
        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Degrees.Remove', {
            'key': key
        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Rune.Degrees.Edit', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Rune.Degrees.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'resource': jq_block.find('[name="resource"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    }
}