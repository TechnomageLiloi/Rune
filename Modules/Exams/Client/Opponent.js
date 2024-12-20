var Opponent = {
    card: function (target)
    {
        const template = _.template(Rune.Services.loadFromServer('/Modules/Exams/Client/Card.tpl'));

        let block = $('#' + target);
        block.css('border', 'red 2px solid')
        block.html(template({

        }));
    }
};