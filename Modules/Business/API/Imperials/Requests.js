Rune.Imperials = {
    getCollection: function ()
    {
        API.request('Rune.Imperials.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key)
    {
        API.request('Rune.Imperials.Show', {
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

        API.request('Rune.Imperials.Create', {
            'debug': true
        }, function (data) {
            Rune.Imperials.getCollection();
        }, function () {

        });
    },

    remove: function (key)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Imperials.Remove', {
            'key': key
        }, function (data) {
            Rune.Imperials.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Rune.Imperials.Edit', {
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
        API.request('Rune.Imperials.Save', {
            'key': key,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'credits': jq_block.find('[name="credits"]').val(),
            'mul': jq_block.find('[name="mul"]').val()
        }, function (data) {
            Rune.Imperials.getCollection();
        }, function () {

        });
    }
}