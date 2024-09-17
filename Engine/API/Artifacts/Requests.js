Rune.Artifacts = {
    create: function ()
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        API.request('Rune.Artifacts.Create', {

        }, function (data) {
            Rune.Atoms.show();
        }, function () {

        });
    },

    edit: function (key_artifact)
    {
        API.request('Rune.Artifacts.Edit', {
            key_artifact: key_artifact
        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_artifact)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#engine-artifacts-edit');
        API.request('Rune.Artifacts.Save', {
            key_artifact: key_artifact,
            type: jq_block.find('[name=type]').val(),
            title: jq_block.find('[name=title]').val(),
            description: jq_block.find('[name=description]').val(),
            global: jq_block.find('[name=global]').val(),
            local: jq_block.find('[name=local]').val(),
            data: jq_block.find('[name=data]').val()
        }, function (data) {
            Rune.Atoms.show();
        }, function () {

        });
    }
}