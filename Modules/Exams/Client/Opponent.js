var Opponent = {
    test: function (target)
    {
        const template = _.template(Rune.Services.loadFromServer('/Modules/Exams/Client/Template.tpl'));

        let block = $('#' + target);
        block.css('border', 'red 2px solid')
        block.html(template({
            key: target
        }));
    }
};