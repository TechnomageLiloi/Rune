Rune.Databank = {

    show: function (rid)
    {
        API.request('Rune.Databank.Show', {
            rid: rid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    create: function (rid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Databank.Create', {
            rid: rid
        }, function (data) {
            Rune.Databank.show(rid);
        }, function () {

        });
    },


    search: function (rid)
    {
        API.request('Rune.Databank.Search', {
            rid: rid
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (rid)
    {
        API.request('Rune.Databank.Edit', {
            rid: rid
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (rid)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Rune.Databank.Save', {
            rid: rid,
            type: jq_block.find('[name=type]').val(),
            status: jq_block.find('[name=status]').val(),
            title: jq_block.find('[name=title]').val(),
            data: jq_block.find('[name=data]').val(),
            summary: jq_block.find('[name=summary]').val(),
            map: jq_block.find('[name=map]').val(),
            drive: jq_block.find('[name=drive]').val()
        }, function (data) {
            Rune.Databank.show(rid);
        }, function () {

        });
    }
}