var Opponent = {
    test: function (target)
    {
        const block = $('#' + target);

        const show = function (key_opponent)
        {
            API.request('Rune.Exams.Opponents.Show', {
                key_opponent: key_opponent
            }, function (data) {
                block.html(data.render);
            }, function () {

            });
        }

        show(target);
    }
};