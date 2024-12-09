Rune.Journal = {
    show: function (key_day)
    {
        API.request('Rune.Journal.Show', {
            key_day: key_day
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
                Rune.Journal.show(key_day);
            }, function () {

            });
        },

        edit: function (key_hour, key_quarter, key_day)
        {
            API.request('Rune.Journal.Jobs.Edit', {
                key_hour: key_hour,
                key_quarter: key_quarter,
                key_day: key_day
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        save: function (key_hour, key_quarter, key_day)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#journal-jobs-edit');
            API.request('Rune.Journal.Jobs.Save', {
                key_hour: key_hour,
                key_quarter: key_quarter,
                key_day: key_day,
                goal: jq_block.find('[name="goal"]').val(),
                status: jq_block.find('[name="status"]').val(),
                xp: jq_block.find('[name="xp"]').val()
            }, function (data) {
                Rune.Journal.show(key_day);
            }, function () {

            });
        }
    },

    Road: {
        edit: function (key_day)
        {
            API.request('Rune.Journal.Road.Edit', {
                key_day: key_day
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        save: function (key_day)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#journal-road-edit');
            API.request('Rune.Journal.Road.Save', {
                key_day: key_day,
                goal: jq_block.find('[name="goal"]').val(),
                program: jq_block.find('[name="program"]').val()
            }, function (data) {
                Rune.Journal.show();
            }, function () {

            });
        }
    }
}