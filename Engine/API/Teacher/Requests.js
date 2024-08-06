Rune.Teacher = {
    show: function ()
    {
        API.request('Rune.Teacher.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    save: function ()
    {
        const jq_block = $('#teacher-show');
        API.request('Rune.Teacher.Save', {
            words: jq_block.find('textarea').val(),
        }, function (data) {
            alert('Saved!');
        }, function () {

        });
    }
}