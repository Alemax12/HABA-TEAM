
function operaciones() {

    $("#formulario").hide();
    $("#formins").hide();


    $("#nuevo").click(function () {
        $("#formulario").show();
        $("#inputID").prop("disabled", false);
        $(this).hide();
        $("#editar").hide();
        $("#inputEP").hide();
        $("#save").text("Save");
        $(".div_id").hide();
        
    });
    $("#cancel").click(function () {
        $("#formulario").hide();
        $("#formins").hide();
        $("#nuevo").show();
        $("#editar").show();
        $("#inputEP").show();
        $("#form1").trigger("reset");
    });

    $("#save").click(function (e) {
        e.preventDefault();
        $("#inputID").prop("disabled", false);
        var datos = $("#form1").serialize();
        var ruta = "";
        if ($(this).text() == "Save") {
            ruta = "../CRUD/procedimiento/GuardarProcedimiento.php";
        } else {
            ruta = "../CRUD/procedimiento/EditarProcedimiento.php";
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
            title: 'Delete Procedur',
            text: "Are you sure you want to delete this procedur?",
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
                    url: "../CRUD/procedimiento/EliminarProcedimiento.php",
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
            url: "../CRUD/procedimiento/ConsultarProcedimiento.php",
            method: "POST",
            data: { id: id }, 
            dataType: "json"
        })

            .done(function (data) {
                $("#save").text("Update");
                $("#inputID").prop("disabled", true);
                $("#inputID").val(data.id_procedimiento);
                $("#inputEmp").val(data.id_empleado);
                $("#inputCli").val(data.id_cliente);
                $("#inputTip").val(data.tipo);
                $("#inputDes").val(data.descripcion);
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



//--------------------Insumos


    $(".editar").click(function () {
        
        const od = $(this).data("od");
        console.log(od);
        $.ajax({
            url: "../CRUD/insumos/ConsultarInsumosD.php",
            method: "POST",
            data: { od: od }, 
            dataType: "json"
        })

        $("#formins").show();
        $("#formulario1").hide();
        $("#nuevo").hide();

        $("#nuevo1").click(function () {
            $("#formulario1").show();
            $("#inputID1").prop("disabled", false);
            $(this).hide();
            $("#save1").text("Save");
            $(".div_id").hide();
            
        });
        $("#cancel1").click(function () {
            $("#formulario1").hide();
            $("#nuevo1").show();
            $("#form2").trigger("reset");
        });
    
        $("#save1").click(function (e) {
            e.preventDefault();
            $("#inputID1").prop("disabled", false);
            var datos = $("#form2").serialize();
            var ruta = "";
            if ($(this).text() == "Save") {
                ruta = "../CRUD/insumos/GuardarInsumos.php";
            } else {
                ruta = "../CRUD/insumos/EditarInsumos.php";
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
    
        $(".delete1").click(function () {
    
            Swal.fire({
                title: 'Delete Contract',
                text: "Are you sure you want to delete this supplies?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: 'lightgray',
                cancelButtonText: "Cancel",
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    const od = $(this).data("od");
                    $.ajax({
                        url: "../CRUD/insumos/EliminarInsumos.php",
                        method: "POST",
                        data: { od: od }, 
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
    
        $(".edit1").click(function () {
    
            const od = $(this).data("od");
            console.log(od);
            $.ajax({
                url: "../CRUD/insumos/ConsultarInsumos.php",
                method: "POST",
                data: { od: od }, 
                dataType: "json"
            })
    
                .done(function (data) {
                    $("#save1").text("Update");
                    $("#inputID1").val(data.id_insumo);
                    $("#inputID1").prop("disabled", true);
                    $("#inputPos").val(data.id_procedimiento);
                    $("#inputPos").prop("disabled", true);
                    $("#inputMat").val(data.id_materiaprima);
                    $("#inputCan").val(data.cantidad_insumos);              
                    $("#formulario1").show();
                    $("#nuevo1").hide();
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
        
    });

    

}