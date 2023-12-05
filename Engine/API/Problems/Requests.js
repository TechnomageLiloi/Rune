Rune.Problems = {
    collection: function (uid)
    {
        API.request('Rune.Problems.Collection', {
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (key_problem)
    {
        API.request('Rune.Problems.Show', {
            'key_problem': key_problem
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (key_blueprint, id_type, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Problems.Create', {
            'key_blueprint': key_blueprint,
            'id_type': id_type
        }, function (data) {
            Rune.Problems.collection(uid);
        }, function () {

        });
    },

    remove: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Problems.Remove', {
            'key_problem': key_problem
        }, function (data) {
            Rune.Problems.collection(uid);
        }, function () {

        });
    },

    edit: function (key_problem, uid)
    {
        API.request('Rune.Problems.Edit', {
            'key_problem': key_problem,
            'uid': uid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_problem, uid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Problems.Save', {
            'key_problem': key_problem,
            'title': jq_block.find('[name="title"]').val(),
            'mark': jq_block.find('[name="mark"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'status': jq_block.find('[name="status"]').val()
        }, function (data) {
            Rune.Problems.collection(uid);
        }, function () {

        });
    }
}