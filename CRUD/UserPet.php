<?php

session_start();
if (!isset($_SESSION['user_rol'])) {
    header('Location: ../404.html');
}

require '../php_operations/databaseli.php';

$sql = "SELECT * FROM mascota
    ORDER BY id_mascota";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
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
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0" id="UnloggedIcon">
            <div class="px-xxl-0 d-inline-block bg-info p-3 mb-2 bg-transparent text-dark">
                <a href="../ViewLogin.php" class="btn btn-dark">Log in</a>
                <a href="../register.html" class="btn btn-dark">Sign up</a>
            </div>
        </ul>
        <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0" id="LoggedIcon">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <p class="dropdown-item" id="MyUserName"></p>
                    </li>
                    <li>
                        <p class="dropdown-item" id="MyUserRol"></p>
                    </li>
                    <li><a class="dropdown-item" href="./my_user.php" id="UpdateMyUser">My User</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" id="LogoutButton" href="">Logout</a></li>
                </ul>
            </li>
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
                            Menu
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <!--Herramientas-->
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                                    Consult
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="./UserPet.php">Pets</a>
                                        <a class="nav-link" href="./UserCenter.php">Centers</a>
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
                                <!--users-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./usuario.php">
    <div class="sb-nav-link-icon">
        <i class="fas fa-bars">
        </i>
    </div>
    Users
</a>
';
                                } ?>

                                <!--pets-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./mascota.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Pets
</a>
';
                                } ?>

                                <!--adoptions-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./adopcion.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Adoptions
</a>';
                                } ?>

                                <!--roles-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./rol.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Roles
</a>
';
                                } ?>

                                <!--centers-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./centro.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Centers
</a>
';
                                } ?>

                                <!--transfers-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./transferencia.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Transfers
</a>
';
                                } ?>

                                <!--interactions-->
                                <?php if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 3) {
                                    echo '
<a class="nav-link" href="./interaccion.php">
<div class="sb-nav-link-icon">
<i class="fas fa-bars">
</i>
</div>
Interactions
</a>
';
                                } ?>

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
                            <div class="col-md-8">
                                <h1>Pets</h1>
                            </div>
                            <div class="col-6 col-md-4"><img src="../imgC/logo.png" class="rounded" width="200"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!--|TABLA|-->
            <br>
            <div class="card">
                <div class="card-header text-white bg-dark">
                    Information
                </div>
                <div class="card-body">
                    <div id="formulario">
                        <form class="row g-3" role="form" id="form1">

                            <div class="form-group col-5 div_id">
                                <label> Pet ID:</label>
                                <input autocomplete="off" type="number" class="form-control" name="id" id="inputID" placeholder="Enter ID" value="">
                            </div>
                            <div class="form-group col-5">
                                <label>Name:</label>
                                <input autocomplete="off" type="text" class="form-control" name="name" id="inputName" placeholder="Enter name" value="">
                            </div>
                            <div class="form-group col-5">
                                <label>Weight:</label>
                                <input autocomplete="off" type="text" class="form-control" name="peso" id="inputWeight" placeholder="Enter address" value="">
                            </div>
                            <div class="form-group col-5">
                                <label>Status:</label>
                                <select class="form-control" name="estado" id="inputStatus">
                                    <option value="Avaiable">Avaiable</option>
                                    <option value="Adopted">Adopted</option>
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label>Specie:</label>
                                <select class="form-control" name="especie" id="inputSpecie">
                                    <option value="Dog">Dog</option>
                                    <option value="Cat">Cat</option>
                                    <option value="Bird">Bird</option>
                                    <option value="Reptile">Reptile</option>
                                </select>
                            </div>
                            <div class="form-group col-5">
                                <label>Race:</label>
                                <input autocomplete="off" type="text" class="form-control" name="raza" id="inputRace" placeholder="Enter address" value="">
                            </div>
                            <div class="form-group col-5">
                                <label>Center:</label>
                                <select class="form-control" name="centro" id="inputCentro">
                                    <option value="0">Select:</option>
                                    <?php foreach ($centro as $fila) { ?>
                                        <option value="<?php echo $fila['id_centro'] ?>"> <?php echo $fila['nombre_centro'] ?> </option>;
                                    <?php } ?>
                                </select>
                            </div>


                        </form>
                        <div>
                            <br>
                            <button type="button" id="save" class="btn btn-secondary" data-tag="">Save</button>
                            <button type="button" id="cancel" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                    <br><br>
                    <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Information</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php foreach ($listado as $fila) { ?>
                                    <td style="width:10%;vertical-align: middle;"><img width="100%" src="data:image;base64,<?php echo base64_encode($fila['picture_pet']); ?>" /></td>
                                    <td>
                                        <strong>Name</strong>:
                                        <?php echo utf8_decode($fila['name']) ?><br>
                                        <strong>Weight</strong>:
                                        <?php echo utf8_decode($fila['weight']) ?><br>
                                        <strong>Status</strong>:
                                        <?php echo utf8_decode($fila['status']) ?><br>
                                        <strong>Specie</strong>:
                                        <?php echo utf8_decode($fila['specie']) ?><br>
                                        <strong>Race</strong>:
                                        <?php echo utf8_decode($fila['race']) ?><br>
                                        <strong>Center</strong>:
                                        <?php
                                        require '../php_operations/databaseli.php';
                                        $sql2 = "SELECT * FROM transferencia AS t INNER JOIN centro AS c ON (t.id_centro = c.id_centro) WHERE id_mascota=" . $fila['id_mascota'] . " ORDER BY fecha_transferencia DESC";
                                        $resultado2 = $conexion->query($sql2)
                                            or die(mysqli_errno($conexion) . " : "
                                                . mysqli_error($conexion) . " | Query=" . $sql2);

                                        $listado2 = array();
                                        while ($fila2 = $resultado2->fetch_assoc()) {
                                            $listado2[] = $fila2;
                                        }
                                        $conexion->close();
                                        $data = $listado2[0];
                                        echo $data['nombre_centro'];
                                        ?>
                                    </td>

                                    <td style="vertical-align: middle;width:10%;">
                                        <div>
                                            <strong>Comments</strong>:
                                            <?php
                                            require '../php_operations/databaseli.php';
                                            $sql3 = "SELECT * FROM interaccion WHERE id_mascota=" . $fila['id_mascota'] . " AND megusta=0";
                                            $resultado3 = $conexion->query($sql3)
                                                or die(mysqli_errno($conexion) . " : "
                                                    . mysqli_error($conexion) . " | Query=" . $sql3);
                                            $count3 = 0;
                                            while ($fila3 = $resultado3->fetch_assoc()) {
                                                $count3++;
                                            }
                                            echo $count3;
                                            $conexion->close();
                                            ?>
                                            <a href="./Comments.php?id=<?php echo $fila['id_mascota'] ?>" style="width:100%;" class="btn btn-success btn-sm comment" data-id="<?php echo $fila['id_mascota'] ?>">
                                                <i class="fas fa-comment-dots" aria-hidden="true"></i> Comments
                                            </a>
                                        </div>
                                        <div style="margin-top:5px;">
                                            <strong>Likes</strong>:
                                            <?php
                                            require '../php_operations/databaseli.php';
                                            $sql4 = "SELECT * FROM interaccion WHERE id_mascota=" . $fila['id_mascota'] . " AND megusta=1";
                                            $resultado4 = $conexion->query($sql4)
                                                or die(mysqli_errno($conexion) . " : "
                                                    . mysqli_error($conexion) . " | Query=" . $sql4);
                                            $count4 = 0;
                                            while ($fila4 = $resultado4->fetch_assoc()) {
                                                $count4++;
                                            }
                                            echo $count4;
                                            $conexion->close();
                                            require '../php_operations/databaseli.php';
                                            $sql_liked = "SELECT * FROM interaccion WHERE id_mascota=" . $fila['id_mascota'] . " AND id_usuario= " . $_SESSION['user_id'];
                                            $resultado_liked = $conexion->query($sql_liked)
                                                or die(mysqli_errno($conexion) . " : "
                                                    . mysqli_error($conexion) . " | Query=" . $sql);

                                            $count_like = 0;
                                            while ($fila_liked = $resultado_liked->fetch_assoc()) {
                                                $count_like++;
                                            }
                                            $liked = false;
                                            if ($count_like > 0) {
                                                $liked = true;
                                            }
                                            ?>
                                            <button style="width:100%;" class="btn btn-primary btn-sm <?php if ($liked) {
                                                                                                            echo 'del-like';
                                                                                                        } else {
                                                                                                            echo 'like';
                                                                                                        } ?>" data-pet="<?php echo $fila['id_mascota'] ?>" data-user="<?php echo $_SESSION['user_id'] ?>">
                                                <i class="fas fa-<?php if ($liked) {
                                                                        echo 'times';
                                                                    } else {
                                                                        echo 'check';
                                                                    } ?>" aria-hidden="true"></i> <?php if ($liked) {
                                                                                                        echo 'Remove like';
                                                                                                    } else {
                                                                                                        echo 'Like';
                                                                                                    } ?>
                                            </button>
                                        </div>
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
                        <div class="text-muted">Copyright &copy; AdoptionCenter 2022 </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
        </div>
        </footer>
    </div>
    </div>

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
    <script type="text/javascript" src="../js/funcionesMascota.js"></script>
    <script type="text/javascript">
        $(document).ready(operaciones)
    </script>

    <script type="text/javascript" src="../js/opps.js"></script>
    <script type="text/javascript">
        $(document).ready(Logged2)
    </script>

</body>

</html>