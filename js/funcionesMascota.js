
function operaciones() {

    $("#formulario").hide();

    $("#nuevo").click(function () {
        $("#formulario").show();
        $("#inputID").prop("disabled", false);
        $(this).hide();
        $("#save").text("Save");
        $(".div_id").hide();

    });
    $("#cancel").click(function () {
        $("#formulario").hide();
        $("#nuevo").show();
        $("#form1").trigger("reset");
    });

    $("#save").click(function (e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $("#inputID").prop("disabled", false);
        //var datos = $("#form1").serialize();
        var form = $("#form1").closest("form");
        var datos = new FormData(form[0]);
        var ruta = "";
        if ($(this).text() == "Save") {
            ruta = "../CRUD/mascota/GuardarMascota.php";
        } else {
            ruta = "../CRUD/mascota/EditarMascota.php";
        }
        console.log(datos);
        $.ajax({
            url: ruta,
            type: "POST",
            data: datos,
            dataType: "json",
            processData: false,
            contentType: false
        })

            .done(function (data) {
                location.reload();

            })

            .fail(function (jqXHR, textStatus) {
                location.reload();

            });

    });

    $(".delete").click(function () {

        Swal.fire({
            title: 'Delete Role',
            text: "Are you sure you want to delete this pet?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: 'lightgray',
            cancelButtonText: "Cancel",
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                const id = $(this).data("id");
                $.ajax({
                    url: "../CRUD/mascota/EliminarMascota.php",
                    method: "POST",
                    data: { id: id },
                    dataType: "html"
                })

                    .done(function (data) {
                        location.reload();
                    })

                    .fail(function (jqXHR, textStatus) {
                        Swal.fire({
                            position: 'top-end',
                            type: 'Error',
                            title: 'An error has occurred : ' + textStatus,
                            showConfirmButton: false,
                            timer: 1500
                        })

                    });
            }
        })
    });

    $(".edit").click(function () {
        $("#div-image").hide();
        $("#div-center").hide();
        const id = $(this).data("id");
        $.ajax({
            url: "../CRUD/mascota/ConsultarMascota.php",
            method: "POST",
            data: { id: id },
            dataType: "json"
        })

            .done(function (data) {
                $("#save").text("Update");
                $("#inputID").prop("disabled", true);
                $("#inputID").val(data.id_mascota);
                $("#inputName").val(data.name);
                $("#inputWeight").val(data.weight);
                $("#inputStatus").val(data.status);
                $("#inputSpecie").val(data.specie);
                $("#inputRace").val(data.race);
                $("#formulario").show();
                $("#nuevo").hide();
                $(".div_id").show();
                $(".div_image").show();
                $(".div_center").show();
            })

            .fail(function (jqXHR, textStatus) {
                Swal.fire({
                    position: 'top-end',
                    type: 'Error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });
    });
    $(".like").click(function () {

        const pet = $(this).data("pet");
        const user = $(this).data("user");
        $.ajax({
            url: "../CRUD/interaccion/DarLike.php",
            method: "POST",
            data: { pet: pet, user: user },
            dataType: "json"
        })
            .done(function (data) {
                location.reload();
            })

            .fail(function (jqXHR, textStatus) {
                location.reload();
            });
    });

    $(".del-like").click(function () {

        const pet = $(this).data("pet");
        const user = $(this).data("user");
        $.ajax({
            url: "../CRUD/interaccion/EliminarLike.php",
            method: "POST",
            data: { pet: pet, user: user },
            dataType: "html"
        })
            .done(function (data) {
                location.reload();
            })

            .fail(function (jqXHR, textStatus) {
                Swal.fire({
                    position: 'top-end',
                    type: 'Error',
                    title: 'An error has occurred : ' + textStatus,
                    showConfirmButton: false,
                    timer: 1500
                })

            });
    });
}