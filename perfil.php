<?php
session_start();
include("php/conexion.php"); 

if (isset($_SESSION['ID_usuario'])) {
    $id_usuario = $_SESSION['ID_usuario'];

    $sql = "SELECT nombre, correo, contraseña FROM usuario WHERE ID_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
} else {
    header("Location: inicio_sesion.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis cursos</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="encabezado" >
        <div class="logoAzul"> <br>
            <a href="cursos_usuario.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
        </div>

        <nav class="recursosCursos"><br>
            <a href="cursos_usuario.php">Catálogo</a>
            <a href="mis_cursos_proceso.php">Mis cursos</a>
            <a href="recursos_usuario.php">Recursos</a>
        </nav>

        <div id="barraBusqueda"> <br>
            <input type="text" id="imputSearch" placeholder="¿Qué deseas buscar?">
        </div>

        <nav class="registroInicio"><br>
            <a href="perfil.php" class="regis_boton">Mi perfil</a>
            <a href="index.php" class="inic_boton">Salir</a>
            
        </nav>
    </div><br><br><br>
    
<div class="container light-style flex-grow-1 container-p-y">
    <h2 class="font-weight-bold py-3 mb-4" style="color: #007BFF;">Configuración de la cuenta</h4>
    <div class="card overflow-hidden">
        <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
                <div class="list-group list-group-flush account-settings-links">
                    <a class="list-group-item list-group-item-action active" data-toggle="list"
                        href="#account-general">General</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-change-password">Cambiar contraseña</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-info">Información</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-connections">Conexiones</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list"
                        href="#account-notifications">Notificaciones</a>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="account-general">
                        <div class="card-body media align-items-center">
                            <img src="img/icono.png" alt
                                class="d-block ui-w-80">
                            <div class="media-body ml-4">
                                <label class="btn btn-outline-primary">
                                    Subir nueva foto
                                    <input type="file" class="account-settings-fileinput">
                                </label> &nbsp;
                                <button type="button" class="btn btn-default md-btn-flat">Restaurar</button>
                                <div class="text-light small mt-1">Permite JPG, GIF o PNG.Tamaño máximo 800K</div>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                        <form method="post" action="perfil.php">
                            <div class="form-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>">
                                <div class="alert alert-warning mt-3">
                                    Tu correo electrónico no ha sido confirmado. Por favor revisa tu bandeja de entrada.<br>
                                    <a href="javascript:void(0)">Renviar confirmación</a>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-change-password">
                        <div class="card-body pb-2">
                        <form method="post" action="perfil.php">
                            <div class="form-group">
                                <label class="form-label">Contraseña actual</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contraseña nueva</label>
                                <input type="password" name="nueva_contraseña" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Repita la contraseña nueva</label>
                                <input type="password" class="form-control">
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-info">
                        <div class="card-body pb-2">
                            <div class="form-group">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control"
                                    rows="5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nunc arcu, dignissim sit amet sollicitudin iaculis, vehicula id urna. Sed luctus urna nunc. Donec fermentum, magna sit amet rutrum pretium, turpis dolor molestie diam, ut lacinia diam risus eleifend sapien. Curabitur ac nibh nulla. Maecenas nec augue placerat, viverra tellus non, pulvinar risus.</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Fecha de nacimiento</label>
                                <input type="text" class="form-control" value="Mayo 3, 1995">
                            </div>
                            <div class="form-group">
                                <label class="form-label">País</label>
                                <select class="custom-select">
                                    <option>Ecuador</option>
                                    <option selected>Colombia</option>
                                    <option>Perú</option>
                                    <option>Chile</option>
                                    <option>Brasil</option>
                                </select>
                            </div>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Contactos</h6>
                            <div class="form-group">
                                <label class="form-label">Teléfono</label>
                                <input type="text" class="form-control" value="+57 (000) 000 000">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Página web</label>
                                <input type="text" class="form-control" value>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-connections">
                        <div class="card-body">
                            <button type="button" class="btn btn-twitter">Conectado a
                                <strong>Microsoft</strong></button>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <h5 class="mb-2">
                                <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i
                                        class="ion ion-md-close"></i> Eliminar</a>
                                <i class="ion ion-logo-google text-google"></i>
                                Ahora estás conectado a Google:
                            </h5>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <button type="button" class="btn btn-facebook">Conectado a
                                <strong>Apple</strong></button>
                        </div>
                        <hr class="border-light m-0">
                        <div class="card-body">
                            <button type="button" class="btn btn-instagram">Conectado a
                                <strong>Facebook</strong></button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-notifications">
                        
                        <hr class="border-light m-0">
                        <div class="card-body pb-2">
                            <h6 class="mb-4">Aplicación</h6>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                        <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Noticias y anuncios</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input">
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                        <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Actualizaciones semanales de cursos</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="switcher">
                                    <input type="checkbox" class="switcher-input" checked>
                                    <span class="switcher-indicator">
                                        <span class="switcher-yes"></span>
                                        <span class="switcher-no"></span>
                                    </span>
                                    <span class="switcher-label">Resumen semanal de mis cursos</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="perfil.php">
    <div class="text-right mt-3">
        <button type="button" name="guardar" class="btn btn-primary">Guardar cambios</button>&nbsp;
        <button type="button" class="btn btn-default">Cancelar</button>
    </div>
    </form>
    </div><br>
    
    <?php
if (isset($_POST['guardar'])) {
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_correo = $_POST['correo'];
    $nueva_contraseña = $_POST['nueva_contraseña'];

    // Preparar la consulta SQL para actualizar los datos
    if (!empty($nueva_contraseña)) {
        $hashed_password = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
        $sql_update = "UPDATE usuario SET nombre = ?, correo = ?, contraseña = ? WHERE ID_usuario = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("sssi", $nuevo_nombre, $nuevo_correo, $hashed_password, $id_usuario);
    } else {
        $sql_update = "UPDATE usuario SET nombre = ?, correo = ? WHERE ID_usuario = ?";
        $stmt = $conn->prepare($sql_update);
        $stmt->bind_param("ssi", $nuevo_nombre, $nuevo_correo, $id_usuario);
    }

    if ($stmt->execute()) {
        echo "<p>Información actualizada correctamente.</p>";
    } else {
        echo "<p>Error al actualizar la información.</p>";
    }
}
?>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

</body>

</html>