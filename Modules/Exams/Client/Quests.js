var Quest = {
    ping: function (pong)
    {
        alert(pong);
    },

    test: function (target, text)
    {
        Rune.Exams.Quests.show(target, text);
    },

    lock: function (key_quest)
    {
        if(!confirm('Are you sure?'))
        {
            return;
        }

        const jq_block = $('#' + key_quest);
        API.request('Rune.Exams.Crystals.Create', {
            'key_quest': key_quest,
            'data': jq_block.find('[class="data"]').val()
        }, function (data) {
            alert('Locked.');
        }, function () {

        });
    }
};