Stones.API.Tickets = {
    getCollection: function (key_project)
    {
        API.request('Stones.Tickets.Collection', {
            key_project: key_project
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Stones.Tickets.Show', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_project)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Stones.Tickets.Create', {
            key_project: key_project
        }, function (data) {
            Stones.API.Tickets.getCollection(key_project);
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Stones.Tickets.Remove', {
            'key': key
        }, function (data) {
            API.Cards.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Stones.Tickets.Edit', {
            'key': key
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key, key_project)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#ticket-edit');
        API.request('Stones.Tickets.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'dt': jq_block.find('[name="dt"]').val(),
            'data': jq_block.find('[name="data"]').val()
        }, function (data) {
            Stones.API.Tickets.getCollection(key_project);
        }, function () {

        });
    }
}