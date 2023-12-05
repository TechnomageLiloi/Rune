Rune.Application = {
    Diary: {
        create: function ()
        {
            if(!confirm('Are you sure you want to jump?'))
            {
                return;
            }

            if(!confirm('This day is complete?'))
            {
                return;
            }

            API.request('Rune.Application.Diary.Create', {

            }, function (data) {
                Rune.Application.Diary.show();
            }, function () {

            });
        },

        show: function (dt)
        {
            API.request('Rune.Application.Diary.Show', {
                dt: dt
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function ()
        {
            API.request('Rune.Application.Diary.Edit', {

            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function ()
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Rune.Application.Diary.Save', {
                data: jq_block.find('[name=data]').val(),
                program: jq_block.find('[name=program]').val(),
                status: jq_block.find('[name=status]').val(),
                title: jq_block.find('[name=title]').val(),
                type: jq_block.find('[name=type]').val()
            }, function (data) {
                Rune.Application.Diary.show();
            }, function () {

            });
        }
    },

    Plans: {
        create: function ()
        {
            if(!confirm('Are you sure you want to jump?'))
            {
                return;
            }

            if(!confirm('This day is complete?'))
            {
                return;
            }

            API.request('Rune.Application.Plans.Create', {

            }, function (data) {
                Rune.Application.Plans.getCollection();
            }, function () {

            });
        },

        show: function (key_phan)
        {
            API.request('Rune.Application.Plans.Show', {
                key_plan: key_phan
            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },

        edit: function (key_phan)
        {
            API.request('Rune.Application.Plans.Edit', {
                key_plan: key_phan
            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (key_phan)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#application-diary-edit');
            API.request('Rune.Application.Plans.Save', {
                key_plan: key_phan,
                title: jq_block.find('[name=title]').val(),
                program: jq_block.find('[name=program]').val(),
                status: jq_block.find('[name=status]').val()
            }, function (data) {
                Rune.Application.Plans.getCollection();
            }, function () {

            });
        },

        getCollection: function ()
        {
            API.request('Rune.Application.Plans.Collection', {

            }, function (data) {
                $('#page').html(data.render);
            }, function () {

            });
        },
    }
}