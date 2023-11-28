Rune.Atoms = {
    RID: {
        edit: function ()
        {
            API.request('Rune.Atoms.RID.Edit', {

            }, function (data) {
                const wrap = $('#page');
                wrap.html(data.render);
                wrap.show();
            }, function () {

            });
        },

        save: function (ridOld)
        {
            if(!confirm('Are you sure?'))
            {
                return;
            }

            const jq_block = $('#game-maps-edit');
            const rid_new = jq_block.find('[name=rid_new]').val();

            API.request('Rune.Atoms.RID.Save', {
                rid_old: ridOld,
                rid_new: rid_new
            }, function (data) {
                window.location.href = rid_new.replace('rune:', '/').replaceAll(':', '/');
            }, function () {

            });
        }
    },

    show: function ()
    {
        API.request('Rune.Atoms.Show', {

        }, function (data) {
            $('#page').html(data.render);
            Rune.Trigger.initialize();
        }, function () {

        });
    },

    dump: function ()
    {
        API.request('Rune.Atoms.Dump', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    edit: function (last)
    {
        if(typeof(last) == "undefined")
        {
            last = false;
        }

        API.request('Rune.Atoms.Edit', {
            last: last
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
            article: jq_block.find('[name=article]').val(),
            data: jq_block.find('[name=data]').val(),
            tags: jq_block.find('[name=tags]').val(),
            ts: jq_block.find('[name=ts]').val()
        }, function (data) {
            Rune.Atoms.show();
        }, function () {

        });
    }
}