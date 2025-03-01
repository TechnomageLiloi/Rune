Rune.Maps = {

    edit: function ()
    {
        API.request('Rune.Maps.Edit', {

        }, function (data) {
            const wrap = $('#page');
            wrap.html(data.render);
            wrap.show();
        }, function () {

        });
    },

    save: function (key_map)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#game-maps-edit');
        API.request('Rune.Maps.Save', {
            key_map: key_map,
            title: jq_block.find('[name=title]').val(),
            data: jq_block.find('[name=data]').val(),
            map: jq_block.find('[name=map]').val(),
            dt: jq_block.find('[name=dt]').val()
        }, function (data) {
            Rune.Wiki.show();
        }, function () {

        });
    }
}