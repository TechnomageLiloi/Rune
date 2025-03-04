Rune.Exams = {};

Rune.Exams.Quests = {
    show: function (key_quest, text)
    {
        if(_.isUndefined(text))
        {
            text = '';
        }

        API.request('Rune.Exams.Quests.Show', {
            'key_quest': key_quest,
            'text': text
        }, function (data) {
            $('#' + key_quest).html(data.render);
        }, function () {

        });
    },

    battle: function (key_quest)
    {
        API.request('Rune.Exams.Quests.Battle', {
            'key_quest': key_quest
        }, function (data) {
            $('#' + key_quest).html(data.render);
        }, function () {

        });
    },

    edit: function (key_quest)
    {
        API.request('Rune.Exams.Quests.Edit', {
            'key_quest': key_quest
        }, function (data) {
            $('#' + key_quest).html(data.render);
        }, function () {

        });
    },

    save: function (key_quest)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#' + key_quest);
        API.request('Rune.Exams.Quests.Save', {
            'key_quest': key_quest,
            'title': jq_block.find('[name="title"]').val(),
            'specie': jq_block.find('[name="specie"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'dialog': jq_block.find('[name="dialog"]').val()
        }, function (data) {
            Rune.Exams.Quests.show(key_quest);
        }, function () {

        });
    },

    search: function (key_quest)
    {
        API.request('Rune.Exams.Crystals.Search', {
            'key_quest': key_quest
        }, function (data) {
            $('#' + key_quest).html(data.render);
        }, function () {

        });
    },
}