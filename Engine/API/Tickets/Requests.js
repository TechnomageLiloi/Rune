Rune.Tickets = {
    collection: function ()
    {
        API.request('TARDIS.Tickets.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (keyTicket)
    {
        API.request('TARDIS.Tickets.Show', {
            'key_ticket': keyTicket
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

        API.request('TARDIS.Tickets.Create', {

        }, function (data) {
            Rune.Tickets.collection();
        }, function () {

        });
    },

    remove: function (keyTicket)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('TARDIS.Tickets.Remove', {
            'key_ticket': keyTicket
        }, function (data) {
            TARDIS.Tickets.collection();
        }, function () {

        });
    },

    edit: function (keyTicket)
    {
        API.request('TARDIS.Tickets.Edit', {
            'key_ticket': keyTicket
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (keyTicket)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('TARDIS.Tickets.Save', {
            'key_ticket': keyTicket,
            'status': jq_block.find('[name="status"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'start': jq_block.find('[name="start"]').val(),
            'finish': jq_block.find('[name="finish"]').val(),
            'power': jq_block.find('[name="power"]').val()
        }, function (data) {
            Rune.Tickets.collection();
        }, function () {

        });
    }
}