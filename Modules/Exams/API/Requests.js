Rune.Exams = {};

Rune.Exams.Opponents = {
    show: function (key_opponent)
    {
        API.request('Rune.Exams.Opponents.Show', {
            'key_opponent': key_opponent
        }, function (data) {
            $('#' + key_opponent).html(data.render);
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

    edit: function (key_opponent)
    {
        API.request('Rune.Exams.Opponents.Edit', {
            'key_opponent': key_opponent
        }, function (data) {
            $('#' + key_opponent).html(data.render);
        }, function () {

        });
    },

    save: function (key_opponent)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#' + key_opponent);
        API.request('Rune.Exams.Opponents.Save', {
            'key_opponent': key_opponent,
            'title': jq_block.find('[name="title"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val()
        }, function (data) {
            Rune.Exams.Opponents.show(key_opponent);
        }, function () {

        });
    }
}