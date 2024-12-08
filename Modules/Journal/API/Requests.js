Rune.Journal = {
    show: function ()
    {
        API.request('Rune.Journal.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    Jobs: {
        create: function (key_hour, key_quarter, key_day)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            API.request('Rune.Journal.Jobs.Create', {
                key_hour: key_hour,
                key_quarter: key_quarter,
                key_day: key_day
            }, function (data) {
                Rune.Journal.show();
            }, function () {

            });
        },

        edit: function (key_hour, key_quarter)
        {
            API.request('Rune.Journal.Jobs.Edit', {
                key_hour: key_hour,
                key_quarter: key_quarter
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        }
    }
}