Rune.Levels.Quest = {
    create: function () {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Rune.Levels.Quest.Create', {}, function (data) {
            Rune.Levels.Quest.show(1);
        }, function () {

        });
    },

    show: function (status) {
        API.request('Rune.Levels.Quest.Show', {
            status: status
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (key_quest) {
        API.request('Rune.Levels.Quest.Edit', {
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
        API.request('Rune.Levels.Quest.Save', {
            key_quest: key_quest,
            data: jq_block.find('[name=data]').val(),
            key_level: jq_block.find('[name=key_level]').val(),
            xp: jq_block.find('[name=xp]').val(),
            status: status,
            summary: jq_block.find('[name=summary]').val()
        }, function (data) {
            Rune.Levels.Quest.show(status);
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
        API.request('Rune.Levels.Quest.Save', {
            key_quest: key_quest,
            dt: datetime
        }, function (data) {
            Rune.Levels.Quest.show(status);
        }, function () {

        });
    }
};

Rune.Levels.Goals = {
    create: function () {
        if (!confirm('Are you sure?')) {
            return;
        }

        API.request('Rune.Levels.Goals.Create', {}, function (data) {
            Rune.Levels.Quest.show(2);
        }, function () {

        });
    },

    edit: function (key_goal) {
        API.request('Rune.Levels.Goals.Edit', {
            key_goal: key_goal
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_goal) {
        if (!confirm('Are you sure?')) {
            return;
        }

        const jq_block = $('#application-Quests-edit');
        API.request('Rune.Levels.Goals.Save', {
            key_goal: key_goal,
            title: jq_block.find('[name=title]').val()
        }, function (data) {
            Rune.Levels.Quest.show();
        }, function () {

        });
    }
}