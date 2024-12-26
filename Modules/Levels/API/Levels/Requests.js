Rune.Levels = {
    plan: function ()
    {
        API.request('Rune.Levels.Plan', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    getCollection: function ()
    {
        API.request('Rune.Levels.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Rune.Levels.Show', {
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

        API.request('Rune.Levels.Create', {
            'debug': true
        }, function (data) {
            Rune.Levels.getCollection();
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Levels.Remove', {
            'key': key
        }, function (data) {
            Rune.Levels.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Rune.Levels.Edit', {
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
        API.request('Rune.Levels.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'goal': jq_block.find('[name="goal"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Rune.Levels.getCollection();
        }, function () {

        });
    }
}