Rune.Databank = {

    show: function (wrap)
    {
        if(typeof wrap == 'undefined')
        {
            wrap = $('#page');
        }

        API.request('Rune.Databank.Show', {

        }, function (data) {
            wrap.html(data.render);
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

    edit: function ()
    {
        API.request('Rune.Databank.Edit', {

        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_atom)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Rune.Databank.Save', {
            key_atom: key_atom,
            status: jq_block.find('[name=status]').val(),
            title: jq_block.find('[name=title]').val(),
            data: jq_block.find('[name=data]').val(),
            program: jq_block.find('[name=program]').val(),
            wiki: jq_block.find('[name=wiki]').val()
        }, function (data) {
            Rune.Databank.show();
        }, function () {

        });
    }
}