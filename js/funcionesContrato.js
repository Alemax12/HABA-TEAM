
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
            ruta = "../CRUD/contrato/GuardarContrato.php";
        } else {
            ruta = "../CRUD/contrato/EditarContrato.php";
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
            title: 'Delete Contract',
            text: "Are you sure you want to delete this contract?",
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
                    url: "../CRUD/contrato/EliminarContrato.php",
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
        console.log(id);
        $.ajax({
            url: "../CRUD/contrato/ConsultarContrato.php",
            method: "POST",
            data: { id: id }, 
            dataType: "json"
        })

            .done(function (data) {
                $("#save").text("Update");
                $("#inputID").prop("disabled", true);
                $("#inputID").val(data.id_contrato);
                $("#inputEmp").val(data.id_empleado);
                $("#inputSal").val(data.salario);
                $("#inputFecIni").val(data.fecha_inicio);
                $("#inputFecFin").val(data.fecha_fin);
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