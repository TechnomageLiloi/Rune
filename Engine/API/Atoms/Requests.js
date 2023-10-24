Rune.Atoms = {
    show: function ()
    {
        API.request('Rune.Atoms.Show', {

        }, function (data) {
            $('body').html(data.render);
        }, function () {

        });
    },

    edit: function ()
    {
        API.request('Rune.Atoms.Edit', {

        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Atoms.Create', {

        }, function (data) {
            Rune.Atoms.show();
        }, function () {

        });
    },

    save: function (keyAtom)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Rune.Atoms.Save', {
            key_atom: keyAtom,
            title: jq_block.find('[name=title]').val(),
            status: jq_block.find('[name=status]').val(),
            type: jq_block.find('[name=type]').val(),
            summary: jq_block.find('[name=summary]').val(),
            program: jq_block.find('[name=program]').val(),
            data: jq_block.find('[name=data]').val(),
            tags: jq_block.find('[name=tags]').val(),
            ts: jq_block.find('[name=ts]').val()
        }, function (data) {
            Rune.Atoms.show();
        }, function () {

        });
    }
}