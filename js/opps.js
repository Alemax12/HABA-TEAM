function Logged() {

    $.ajax({
        url: "./php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

        .done(function (data) {
            console.log(data);
            if (data.respuesta == "no") {
                $("#LoggedIcon").hide();
                $("#TablesLeft").hide();
            } else {
                $("#MyUserRol").text(data.rol_t);
                $("#MyUserName").text(data.name);
                $("#UnloggedIcon").hide();
                if (data.rol == "1") {
                    $("#TablesLeft").hide();
                }
            }

        })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('./php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });


}

function Logged1() {

    $.ajax({
        url: "../php_operations/Logged.php",
        method: "POST",
        dataType: "json"
    })

    .done(function (data) {
        console.log(data);
        if (data.respuesta == "no") {
            $("#LoggedIcon").hide();
            $("#TablesLeft").hide();
        } else {
            $("#MyUserRol").text(data.rol_t);
            $("#MyUserName").text(data.name);
            $("#UnloggedIcon").hide();
            if (data.rol == "1") {
                $("#TablesLeft").hide();
            }
        }

    })

        .fail(function (jqXHR, textStatus) {

        });

    $('#LogoutButton').click(function () {
        $.get('../php_operations/logout.php', function (data) {
            location.reload();
        });
        return false;
    });


}
