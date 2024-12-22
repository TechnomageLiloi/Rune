Rune.Exams = {};

Rune.Exams.Opponents = {
    show: function (key_opponent, f)
    {
        API.request('Rune.Exams.Opponents.Show', {
            'key_opponent': key_opponent
        }, function (data) {
            f(data);
        }, function () {

        });
    },

    battle: function (key_opponent, RID)
    {
        API.request('Rune.Exams.Opponents.Battle', {
            'key_opponent': key_opponent,
            'rid': RID
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_opponent, RID)
    {
        API.request('Rune.Exams.Opponents.Edit', {
            'key_opponent': key_opponent,
            'rid': RID
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function (key_opponent, RID)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#blueprint-edit');
        API.request('Rune.Exams.Opponents.Save', {
            'key_opponent': key_opponent,
            'rid': RID,
            'title': jq_block.find('[name="title"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val()
        }, function (data) {

        }, function () {

        });
    }
}