var Opponent = {
    test: function (target, text)
    {
        Rune.Exams.Crystals.show(target, text);
    },

    lock: function (key_opponent)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#' + key_opponent);
        API.request('Rune.Exams.Crystals.Create', {
            'status': jq_block.find('[class="crystal-status"]').val(),
            'note': jq_block.find('[class="crystal-note"]').val()
        }, function (data) {
            alert('Locked.');
        }, function () {

        });
    }
};