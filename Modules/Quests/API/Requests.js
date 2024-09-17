Rune.Quests = {
    Quest: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Quests.Quest.Create', {}, function (data) {
                Rune.Quests.Quest.show();
            }, function () {

            });
        },

        show: function () {
            API.request('Rune.Quests.Quest.Show', {}, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_quest) {
            API.request('Rune.Quests.Quest.Edit', {
                key_quest: key_quest
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_quest) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-Quests-edit');
            API.request('Rune.Quests.Quest.Save', {
                key_quest: key_quest,
                data: jq_block.find('[name=data]').val(),
                summary: jq_block.find('[name=summary]').val()
            }, function (data) {
                Rune.Quests.Quest.show();
            }, function () {

            });
        }
    },

    Tickets: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Quests.Tickets.Create', {}, function (data) {
                Rune.Quests.Quest.show();
            }, function () {

            });
        },

        edit: function (key_ticket) {
            API.request('Rune.Quests.Tickets.Edit', {
                key_ticket: key_ticket
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_ticket) {
            if (!confirm('Are you sure?')) {
                return;
            }

            const jq_block = $('#application-Quests-edit');
            API.request('Rune.Quests.Tickets.Save', {
                key_ticket: key_ticket,
                title: jq_block.find('[name=title]').val()
            }, function (data) {
                Rune.Quests.Quest.show();
            }, function () {

            });
        }
    }
}