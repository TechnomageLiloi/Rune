Rune.Admin = {
    Config: {
        save: function (key, value)
        {
            API.request('Rune.Admin.Config.Save', {
                key: key,
                value: value
            }, function (data) {

            }, function () {

            });
        }
    }
}