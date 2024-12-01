Rune.News = {
    Topics: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Topics.Create', {}, function (data) {
                Rune.News.Topics.show();
            }, function () {

            });
        },

        show: function () {
            API.request('Rune.Topics.Show', {

            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (keyTopic) {
            API.request('Rune.Topics.Edit', {
                key_topic: keyTopic
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (keyTopic) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-diary-edit');

            API.request('Rune.Topics.Save', {
                key_topic: keyTopic,
                title: jq_block.find('[name=title]').val(),
                summary: jq_block.find('[name=summary]').val(),
                tags: jq_block.find('[name=tags]').val(),
                dt: jq_block.find('[name=dt]').val(),
                data: jq_block.find('[name=data]').val(),
                status: jq_block.find('[name=status]').val()
            }, function (data) {
                Rune.News.Topics.show();
            }, function () {

            });
        }
    }
}