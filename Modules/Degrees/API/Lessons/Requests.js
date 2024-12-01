Rune.Degrees.Lessons = {
    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Lessons.Create', {
            'debug': true
        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    },

    edit: function (key)
    {
        API.request('Rune.Lessons.Edit', {
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
        API.request('Rune.Lessons.Save', {
            'key': key,
            'key_degree': jq_block.find('[name="key_degree"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'program': jq_block.find('[name="program"]').val()
        }, function (data) {
            Rune.Degrees.getCollection();
        }, function () {

        });
    }
}