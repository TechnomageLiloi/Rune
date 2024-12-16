Rune.Exams.Crystals = {
    collection: function (key_item)
    {
        API.request('Rune.Crystals.Collection', {
            key_item: key_item
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_crystal)
    {
        API.request('Rune.Crystals.Show', {
            'key_crystal': key_crystal
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_item)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Crystals.Create', {
            key_item: key_item
        }, function (data) {
            Rune.Exams.Crystals.collection(key_item);
        }, function () {

        });
    },

    remove: function (key_crystal)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Crystals.Remove', {
            'key_crystal': key_crystal
        }, function (data) {
            Rune.Exams.Crystals.collection();
        }, function () {

        });
    },

    edit: function (key_crystal)
    {
        API.request('Rune.Crystals.Edit', {
            'key_crystal': key_crystal
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    test: function (key_crystal)
    {
        API.request('Rune.Crystals.Test', {
            'key_crystal': key_crystal
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    suite: function (key_item)
    {
        API.request('Rune.Crystals.Suite', {
            key_item: key_item
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_crystal, key_item)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Crystals.Save', {
            'key_crystal': key_crystal,
            'title': jq_block.find('[name="title"]').val(),
            'status': jq_block.find('[name="status"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val(),
            'tags': jq_block.find('[name="tags"]').val(),
            'dt': jq_block.find('[name="dt"]').val()
        }, function (data) {
            Rune.Exams.Crystals.collection(key_item);
        }, function () {

        });
    },

    done: function (keyQuestion, done)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Crystals.Done', {
            'key_crystal': keyQuestion,
            'done': done,
        }, function (data) {
            alert('Done.');
        }, function () {

        });
    }
}