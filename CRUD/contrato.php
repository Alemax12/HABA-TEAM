<?php
header('Content-Type: text/html; charset=ISO-8859-1');

require './database.php';

$sql = "SELECT * FROM contrato AS c  
        INNER JOIN empleado AS e ON (c.id_empleado = e.id_empleado)
        INNER JOIN sede AS s ON (c.id_sede = s.id_sede)
        INNER JOIN rol AS r ON (c.id_rol = r.id_rol)
        ORDER BY id_contrato";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}

//empleados
$sql = "SELECT * FROM empleado
     ORDER BY id_empleado";
$result_empleados = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$empleados = array();
while ($fila = $result_empleados->fetch_assoc()) {
    $empleados[] = $fila;
}

//sede
$sql = "SELECT * FROM sede
     ORDER BY id_sede";
$result_sedes= $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$sedes = array();
while ($fila = $result_sedes->fetch_assoc()) {
    $sedes[] = $fila;
}

//rol
$sql = "SELECT * FROM rol
     ORDER BY id_rol";
$result_roles = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$roles = array();
while ($fila = $result_roles->fetch_assoc()) {
    $roles[] = $fila;
}

$conexion->close();
?>




<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Healthy Citizen</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">



        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../index.html">Healthy Citizen</a>
            <!--<a class="navbar-brand ps-3" href="miembros.html">miembros</a>-->
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!--Botones Login y SingUp-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="px-xxl-0 d-inline-block bg-info p-3 mb-2 bg-transparent text-dark">
                    <a href="../login.html" class="btn btn-dark">Log in</a>
                    <a href="../register.html" class="btn btn-dark">Sign up</a>
                </div>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main</div>
                            <a class="nav-link" href="../index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Information</div>

                            <!--Sobre nosotros nav collapsed button-->
                            <a class="nav-link" href="../aboutus.html">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-heart">
                                    </i>
                                </div>
                                About us
                            </a>
                            <!--Pages btn 2 en la lista-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-code"></i></div>
                                Developement
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <!--Herramientas-->
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                        Used Tools
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="https://trello.com/b/7dudAdSS/team-haba">Trello</a>
                                            <a class="nav-link" href="https://github.com/Alemax12/HABBA-TEAM">GitHub</a>
                                        </nav>
                                    </div>

                                    <!--Integrantes-->
                                    <a class="nav-link" href="../members.html">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-user-friends">
                                            </i>
                                        </div>
                                        Members
                                    </a>

                                    <!--Clientes-->
                                    <a class="nav-link" href="./cliente.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Client
                                    </a>

                                    <!--Empleados-->
                                    <a class="nav-link" href="./empleado.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Employee
                                    </a>

                                    <!--Contrato-->
                                    <a class="nav-link" href="./contrato.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Contract
                                    </a>

                                    <!--Roles-->
                                    <a class="nav-link" href="./rol.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Role
                                    </a>

                                    <!--País-->
                                    <a class="nav-link" href="./pais.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Country
                                    </a>

                                    <!--Ciudad-->
                                    <a class="nav-link" href="./ciudad.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        City
                                    </a>

                                    <!--Sede-->
                                    <a class="nav-link" href="./sede.php">
                                        <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">    
                                        </i>
                                        </div>
                                        Headquarters
                                    </a>

                                    <!--Inventario-->
                                    <a class="nav-link" href="./inventario.php">
                                        <div class="sb-nav-link-icon">
                                        <i class="fas fa-bars">    
                                        </i>
                                        </div>
                                        Headquarters Inventory
                                    </a>

                                    <!--Insumos-->
                                    <a class="nav-link" href="./insumos.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Supplies
                                    </a>

                                    <!--Materia Prima-->
                                    <a class="nav-link" href="./materia.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Raw Material
                                    </a>

                                    <!--Procedimiento-->
                                    <a class="nav-link" href="./procedimiento.php">
                                        <div class="sb-nav-link-icon">
                                            <i class="fas fa-bars">
                                            </i>
                                        </div>
                                        Procedures
                                    </a>

                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div id="layoutSidenav_content">

                <!--Carousel-->

                <style>
                    .carousel-item {
                        height: 10rem;
                        background: rgb(206, 203, 203);
                        position: relative;
                    }

                    .contenedor {
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        padding-bottom: 10px;
                        padding-left: 50px;
                    }

                    .btnOpt2 {
                        padding-left: 50px;
                    }
                </style>

                <div class="--Carousel--">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-8"><h1>Contract</h1>
                                </div>
                                <div class="col-6 col-md-4"><img src="../imgC/logo.png" class="rounded" width="200"></div>
                            </div>
                        </div>


                        <br>
                        <div class="card">
                            <div class="card-header text-white bg-dark">
                                Information
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-secondary" id="nuevo">New</button>
                                <div id="formulario">
                                    <form class="row g-3" role="form" id="form1">

                                        <div class="form-group col-3 div_id">
                                            <label>Contract ID:</label>
                                            <input autocomplete="off" type="number" class="form-control" name="id" id="inputID" placeholder="Enter Number" value="">
                                        </div>

                                        <div class="form-group col-3">
                                            <label>Employees:</label>
                                            <select class="form-control" name="emp" id="inputEmp">
                                                <option value="0">Select:</option>
                                                <?php foreach ($empleados as $fila) { ?>
                                                    <option value="<?php echo $fila['id_empleado'] ?>"> <?php echo $fila['nom_empleado'] ?> </option>;
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-3">
                                            <label>Contract Salary:</label>
                                            <input autocomplete="off" type="number" class="form-control" name="sal" id="inputSal" placeholder="Enter salary" value="">
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Contract start date:</label>
                                            <input autocomplete="off" type="date" class="form-control" name="fec_ini" id="inputFecIni" placeholder="Enter Contract start date:" value="">
                                        </div>
                                        <div class="form-group col-3">
                                            <label>Contract end date:</label>
                                            <input autocomplete="off" type="date" class="form-control" name="fec_fin" id="inputFecFin" placeholder="Enter Contract end date:" value="">
                                        </div>

                                        <div class="form-group col-3">
                                            <label>Headquarters:</label>
                                            <select class="form-control" name="sede" id="inputSede">
                                                <option value="0">Select:</option>
                                                <?php foreach ($sedes as $fila) { ?>
                                                    <option value="<?php echo $fila['id_sede'] ?>"> <?php echo $fila['nom_sede'] ?> </option>;
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-3">
                                            <label>Roles:</label>
                                            <select class="form-control" name="rol" id="inputRol">
                                                <option value="0">Select:</option>
                                                <?php foreach ($roles as $fila) { ?>
                                                    <option value="<?php echo $fila['id_rol'] ?>"> <?php echo $fila['nom_rol'] ?> </option>;
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </form>
                                    <div>
                                        <br>
                                        <button type="button" id="save" class="btn btn-secondary" data-tag="">Update</button>
                                        <button type="button" id="cancel" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>

                                <br><br>

                                <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee</th>
                                            <th>Salary</th>
                                            <th>Contract start date</th>
                                            <th>Contract end date</th>
                                            <th>Headquarters</th>
                                            <th>Roles</th>

                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php foreach ($listado as $fila) { ?>
                                                <td><?php echo $fila['id_contrato'] ?> </td>
                                                <td><?php echo utf8_decode($fila['nom_empleado']) ?> </td>
                                                <td><?php echo utf8_decode($fila['salario']) ?> </td>
                                                <td><?php echo utf8_decode($fila['fecha_inicio']) ?> </td>
                                                <td><?php echo utf8_decode($fila['fecha_fin']) ?> </td>
                                                <td><?php echo utf8_decode($fila['nom_sede']) ?> </td>
                                                <td><?php echo utf8_decode($fila['nom_rol']) ?> </td>

                                                <td>
                                                    <button class="btn btn-success btn-sm edit" data-id="<?php echo $fila['id_contrato'] ?>">
                                                        <i class="fas fa-pen" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm delete" data-id="<?php echo $fila['id_contrato'] ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </td>
                                        </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Healthy Citizen 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>

                    </div>
                    <!--INICIO-->


                </div>
                <!--FIN-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $("#tabla").DataTable();
            });
        </script>
        <script type="text/javascript" src="../js/funcionesContrato.js"></script>
        <script type="text/javascript">
            $(document).ready(operaciones)
        </script>
    </body>

</html>