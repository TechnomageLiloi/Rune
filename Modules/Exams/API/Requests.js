Rune.Exams = {};

Rune.Exams.Crystals = {
    show: function (key_crystal, text)
    {
        if(_.isUndefined(text))
        {
            text = '';
        }

        API.request('Rune.Exams.Crystals.Show', {
            'key_crystal': key_crystal,
            'text': text
        }, function (data) {
            $('#' + key_crystal).html(data.render);
        }, function () {

        });
    },

    battle: function (key_crystal)
    {
        API.request('Rune.Exams.Crystals.Battle', {
            'key_crystal': key_crystal
        }, function (data) {
            $('#' + key_crystal).html(data.render);
        }, function () {

        });
    },

    edit: function (key_crystal)
    {
        API.request('Rune.Exams.Crystals.Edit', {
            'key_crystal': key_crystal
        }, function (data) {
            $('#' + key_crystal).html(data.render);
        }, function () {

        });
    },

    save: function (key_crystal)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#' + key_crystal);
        API.request('Rune.Exams.Crystals.Save', {
            'key_crystal': key_crystal,
            'title': jq_block.find('[name="title"]').val(),
            'specie': jq_block.find('[name="specie"]').val(),
            'type': jq_block.find('[name="type"]').val(),
            'program': jq_block.find('[name="program"]').val(),
            'theory': jq_block.find('[name="theory"]').val()
        }, function (data) {
            Rune.Exams.Crystals.show(key_crystal);
        }, function () {

        });
    }
}