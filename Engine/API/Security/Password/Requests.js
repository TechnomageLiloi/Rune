Rune.Security = {};

Rune.Security.Password = {
    show: function ()
    {
        API.request('Rune.Security.Password.Show', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    logout: function ()
    {
        API.request('Rune.Security.Password.Logout', {

        }, function (data) {
            location.reload();
        }, function () {

        });
    },

    check: function ()
    {
        const jq_block = $('#game-security-password-show');
        jq_block.find('.error').hide();
        API.request('Rune.Security.Password.Check', {
            pass: jq_block.find('[name=pass]').val()
        }, function (data) {
            if(!data.pass)
            {
                jq_block.find('.error').show();
                return;
            }
            location.reload();
        }, function () {

        });
    }
}