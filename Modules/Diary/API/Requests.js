Rune.Diary = {
    Road: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('I60.Road.Create', {}, function (data) {
                I60.Road.search();
            }, function () {

            });
        },

        search: function () {
            API.request('I60.Road.Search', {}, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        show: function () {
            API.request('I60.Road.Show', {}, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_step) {
            API.request('I60.Road.Edit', {
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
            API.request('I60.Road.Save', {
                key_step: key_step,
                data: jq_block.find('[name=data]').val(),
                summary: jq_block.find('[name=summary]').val(),
                type: jq_block.find('[name=type]').val()
            }, function (data) {
                I60.Road.show();
            }, function () {

            });
        }
    }
}