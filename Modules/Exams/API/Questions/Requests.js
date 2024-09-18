Rune.Questions = {
    collection: function ()
    {
        API.request('Rune.Questions.Collection', {
            
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_question)
    {
        API.request('Rune.Questions.Show', {
            'key_question': key_question
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

        API.request('Rune.Questions.Create', {

        }, function (data) {
            Rune.Questions.collection();
        }, function () {

        });
    },

    remove: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Questions.Remove', {
            'key_question': key_question
        }, function (data) {
            Rune.Questions.collection();
        }, function () {

        });
    },

    edit: function (key_question)
    {
        API.request('Rune.Questions.Edit', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    test: function (key_question)
    {
        API.request('Rune.Questions.Test', {
            'key_question': key_question
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    suite: function ()
    {
        API.request('Rune.Questions.Suite', {
            'tags': $('#tags').val()
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_question)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Questions.Save', {
            'key_question': key_question,
            'rid': jq_block.find('[name="rid"]').val(),
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val(),
            'tags': jq_block.find('[name="tags"]').val(),
            'dt': jq_block.find('[name="dt"]').val()
        }, function (data) {
            Rune.Questions.collection();
        }, function () {

        });
    }
}