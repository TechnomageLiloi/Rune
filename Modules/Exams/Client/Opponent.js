var Opponent = {
    card: function (target)
    {
        let block = $('#' + target);
        block.css('border', 'red 2px solid')
        block.html('Template card.');
    }
};