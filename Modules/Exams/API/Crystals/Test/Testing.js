const Testing = {
    /**
     * Colorize block.
     * Trigger: on answer.
     *
     * @param jq_block Question block.
     * @param is_correct Is answer correct.
     */
    result: function (jq_block, is_correct)
    {
        if(is_correct)
        {
            jq_block.css('background-color', '#E5FFE3');
            return;
        }

        jq_block.css('background-color', '#FFE3E3');
    },

    turnAround: function (key_crystal)
    {
        const id = '#testing-' + key_crystal;
        $(id).find('.question').slideToggle();
        $(id).find('.answer').slideToggle();
    },

    checkRadio: function (key_crystal)
    {
        const id = '#testing-' + key_crystal;
        const jq_block = $(id);
        const jq_selected = jq_block.find('input:checked');

        if(!jq_selected.length)
        {
            alert('Choose some answer.');
            return;
        }

        const is_correct = jq_selected.data('correct');

        Testing.result(jq_block, is_correct);
    },

    checkCheck: function (key_crystal)
    {
        const id = '#testing-' + key_crystal;
        const jq_block = $(id);
        const jq_checks = jq_block.find('input');

        let is_final = true;

        jq_checks.each(function () {
            const jq_check = $(this);
            const is_correct = jq_check.data('correct');
            const is_checked = jq_check.is(':checked');

            if(
                (is_correct && !is_checked) ||
                (!is_correct && is_checked)
            )
            {
                is_final = false;
            }
        });

        Testing.result(jq_block, is_final);
    },

    checkSentence: function (key_crystal)
    {
        const id = '#testing-' + key_crystal;
        const jq_block = $(id);
        const jq_checks = jq_block.find('input');

        let is_final = true;

        jq_checks.each(function () {
            const jq_check = $(this);
            const correct = jq_check.data('correct');
            const actual = jq_check.val();

            if(correct != actual)
            {
                is_final = false;
            }
        });

        Testing.result(jq_block, is_final);
    },

    checkDone: function (block, key_crystal, result)
    {
        API.Report.create(key_crystal, result, block.find('.comment').val());
        API.Crystals.collection();
    }
};

const getAnagram = function (input)
{
    const array = input.split('');
    const shuffledArray = array.sort((a, b) => 0.5 - Math.random());
    return shuffledArray.join('');
};