var Opponent = {
    test: function (target)
    {
        const block = $('#' + target);
        Rune.Exams.Opponents.show(target, function (data) {block.html(data.render);});
    }
};