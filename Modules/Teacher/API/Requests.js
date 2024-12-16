Rune.Teacher = {
    show: function ()
    {
        API.request('Rune.Teacher.Show', {

        }, function (data) {
            $('#page').html(data.render);
            Map.start();
        }, function () {

        });
    },

    save: function (teacher, dialog)
    {
        API.request('Rune.Teacher.Save', {
            teacher: teacher,
            dialog: dialog
        }, function (data) {
            Rune.Teacher.show();
        }, function () {

        });
    },
}