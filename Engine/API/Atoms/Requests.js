Rune.Atoms = {

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

    save: function (key_atom)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Rune.Atoms.Save', {
            key_atom: key_atom,
            status: jq_block.find('[name=status]').val(),
            title: jq_block.find('[name=title]').val(),
            data: jq_block.find('[name=data]').val(),
            program: jq_block.find('[name=program]').val(),
            wiki: jq_block.find('[name=wiki]').val()
        }, function (data) {
            Rune.Wiki.show();
        }, function () {

        });
    }
}