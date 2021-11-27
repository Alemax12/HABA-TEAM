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
                    $("#form-emp").hide();
                } else {
                    //$("#form-cliente").hide();
                    //const id=data.user;
                    $.ajax({
                        url: "../CRUD/empleado/ConsultarEmpleado.php",
                        method: "POST",
                        data: { id: data.user },
                        dataType: "json"
                    })

                        .done(function (data1) {
                            console.log(data1);
                            $("#save").text("Update");
                            $("#inputID_E").prop("disabled", true);
                            $("#inputID_E").val(data1.id_empleado);
                            $("#inputName_E").val(data1.nom_empleado);
                            $("#inputFecNac_E").val(data1.fecha_nac);
                            $("#inputCel_E").val(data1.celular);
                            $("#inputEmail_E").val(data1.email);
                            $("#inputPeso_E").val(data1.peso);
                            $("#inputEst_E").val(data1.estatura);
                            $("#inputDir_E").val(data1.direccion);
                            $("#inputContra_E").val(data1.contraseña);
                            $("#inputRol_E").val(data1.id_rol);
                            $("#inputSede_E").val(data1.id_sede);
                            $("#formulario_E").show();
                            $("#nuevo").hide();
                            $(".div_id").show();
                        })

                        .fail(function (jqXHR, textStatus) {
                            Swal.fire({
                                position: 'top-end',
                                type: 'error',
                                title: 'An error has occurred : ' + textStatus,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        });
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
