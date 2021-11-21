
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
        $("#inputID").prop("disabled", false);
        var datos = $("#form1").serialize();
        var ruta = "";
        if ($(this).text() == "Save") {
            ruta = "../CRUD/rol/GuardarRol.php";
        } else {
            ruta = "../CRUD/rol/EditarRol.php";
        }
        console.log(datos);
        $.ajax({
            url: ruta,
            method: "POST",
            data: datos, 
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

    $(".delete").click(function () {

        Swal.fire({
            title: 'Delete Role',
            text: "Are you sure you want to delete this role?",
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
                    url: "../CRUD/rol/EliminarRol.php",
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

        const id = $(this).data("id");
        $.ajax({
            url: "../CRUD/rol/ConsultarRol.php",
            method: "POST",
            data: { id: id }, 
            dataType: "json"
        })

            .done(function (data) {
                $("#save").text("Update");
                $("#inputID").prop("disabled", true);
                $("#inputID").val(data.id_rol);
                $("#inputName").val(data.nom_rol);
                $("#formulario").show();
                $("#nuevo").hide();
                $(".div_id").show();
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