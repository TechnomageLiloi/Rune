Rune.Cards = {
    getCollection: function ()
    {
        API.request('Rune.Cards.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Rune.Cards.Show', {
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

        API.request('Rune.Cards.Create', {
            'debug': true
        }, function (data) {
            Rune.Cards.getCollection();
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Cards.Remove', {
            'key': key
        }, function (data) {
            Rune.Cards.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Rune.Cards.Edit', {
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
        API.request('Rune.Cards.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Rune.Cards.getCollection();
        }, function () {

        });
    }
}