function showHint(str) {
    var dataString = 'username=' + str;
    $.ajax({
        type: "POST",
        url: "first/login_test",
        data: dataString,
        async: true,
        success: function (data) {
            alert(data);
                }
            });

        }
    