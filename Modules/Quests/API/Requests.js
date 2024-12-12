Rune.Quests = {
    Quest: {
        create: function () {
            if (!confirm('Are you sure?')) {
                return;
            }

            API.request('Rune.Quests.Quest.Create', {}, function (data) {
                Rune.Quests.Quest.show(1);
            }, function () {

            });
        },

        show: function (status) {
            API.request('Rune.Quests.Quest.Show', {
                status: status
            }, function (data) {
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
            let status = jq_block.find('[name=status]').val();
            API.request('Rune.Quests.Quest.Save', {
                key_quest: key_quest,
                data: jq_block.find('[name=data]').val(),
                status: status,
                summary: jq_block.find('[name=summary]').val()
            }, function (data) {
                Rune.Quests.Quest.show(status);
            }, function () {

            });
        },

        update: function (key_quest, status) {
            var currentdate = new Date();
            var datetime = currentdate.getFullYear() + "-"
                + (currentdate.getMonth()+1)  + "-"
                + currentdate.getDate() + " "
                + currentdate.getHours() + ":"
                + currentdate.getMinutes() + ":"
                + currentdate.getSeconds();

            const jq_block = $('#application-Quests-edit');
            API.request('Rune.Quests.Quest.Save', {
                key_quest: key_quest,
                dt: datetime
            }, function (data) {
                Rune.Quests.Quest.show(status);
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