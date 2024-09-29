Rune.Diary = {
    Road: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Diary.Road.Create', {}, function (data) {
                Rune.Diary.Road.search();
            }, function () {

            });
        },

        show: function () {
            API.request('Rune.Diary.Road.Show', {}, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_step) {
            API.request('Rune.Diary.Road.Edit', {
                key_step: key_step
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_step) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Rune.Diary.Road.Save', {
                key_step: key_step,
                data: jq_block.find('[name=data]').val(),
                summary: jq_block.find('[name=summary]').val()
            }, function (data) {
                Rune.Diary.Road.show();
            }, function () {

            });
        }
    },

    Jobs: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Diary.Jobs.Create', {}, function (data) {
                Rune.Diary.Road.show();
            }, function () {

            });
        },

        edit: function (key_job) {
            API.request('Rune.Diary.Jobs.Edit', {
                key_job: key_job
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_job) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Rune.Diary.Jobs.Save', {
                key_job: key_job,
                title: jq_block.find('[name=title]').val(),
                type: jq_block.find('[name=type]').val(),
                status: jq_block.find('[name=status]').val(),
                karma: jq_block.find('[name=karma]').val()
            }, function (data) {
                Rune.Diary.Road.show();
            }, function () {

            });
        }
    }
}