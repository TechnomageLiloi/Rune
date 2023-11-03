Rune.Trigger = {
    initialize: function ()
    {
        $('.stylo-block').hide();
        // Stylo.Trigger.List = [];
        Stylo.Trigger.add(function (data, a) {
            $('.stylo-block').hide();
            $('#' + data).show();
        });
        Stylo.Trigger.initialize();
        $('.stylo-block:eq(0)').show();
    }
};