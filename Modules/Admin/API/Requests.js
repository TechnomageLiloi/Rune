Rune.Admin = {
    Config: {
        save: function (key, value, f)
        {
            API.request('Rune.Admin.Config.Save', {
                key: key,
                value: value
            }, function (data) {
                if(_.isFunction(f))
                {
                    f();
                }
            }, function () {

            });
        },

        saveAlert: function (key, value)
        {
            Rune.Admin.Config.save(key, value, function () {
                alert('Complete.');
            });
        }
    }
}