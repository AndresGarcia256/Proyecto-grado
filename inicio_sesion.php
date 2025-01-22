<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Bienvenido</title>
        <link rel="shortcut icon" href="img/flor_azul.png">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       </head>
       <body>
       <?php
        $form = isset($_GET['form']) ? $_GET['form'] : 'login';
        ?>
        <div class="container-form register <?php echo ($form === 'register') ? '' : 'hide';?>" id="registro">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido a Loto :)</h2>
                    <p>Conéctate con tu futuro: Inicia sesión en Loto y empieza a aprender hoy</p>
                    <input type="button" value="Iniciar sesión" id="sign-in">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Crear una cuenta</h2>
                    <div class="icons">
                        <i class='bx bxl-google'></i>
                        <i class='bx bxl-microsoft'></i>
                        <i class='bx bxl-apple'></i>
                        <i class='bx bxl-facebook'></i>
                    </div>
                    <p>o usa tu email para registrarte</p>
                    <form action="php/registroUsuarios.php" method="POST" class="form form-register" novalidate>
                        <div>
                            <label>
                                <i class='bx bx-user' ></i>
                                <input type="text" placeholder="Nombre usuario" name="userName" required>
                            </label>
                        </div>
                        <div>
                            <label >
                                <i class='bx bx-envelope' ></i>
                                <input type="email" placeholder="Correo electrónico" name="userEmail" required>
                            </label>
                        </div>
                       <div>
                            <label>
                                <i class='bx bx-lock-alt' ></i>
                                <input type="password" placeholder="Contraseña" name="userPassword" required>
                            </label>
                       </div>
                       
                        <input type="submit" value="Registrarse" onclick="" >
                        <div class="alerta-error">Todos los campos son obligatorios</div>
                        <div class="alerta-exito">Te registraste correctamente</div>
                    </form>
                </div>
            </div>
        </div>
    
    
        <div class="container-form login <?php echo ($form === 'login') ? '' : 'hide';?>" id="inicioSesion">
            <div class="information">
                <div class="info-childs">
                    <h2>Bienvenido nuevamente :)</h2>
                    <p>Conéctate con tu futuro: Regístrate en Loto y empieza a aprender hoy</p>
                    <input type="button" value="Registrarse" id="sign-up">
                </div>
            </div>
            <div class="form-information">
                <div class="form-information-childs">
                    <h2>Iniciar sesión</h2>
                    <div class="icons">
                        <i class='bx bxl-google'></i>
                        <i class='bx bxl-microsoft'></i>
                        <i class='bx bxl-apple'></i>
                        <i class='bx bxl-facebook'></i>
                    </div>
                    <p>o inicia sesión con una cuenta</p>
                    <form action="php/validarUsuarios.php" method="POST" class="form form-login"novalidate>
                        <div>
                            <label >
                                <i class='bx bx-envelope' ></i>
                                <input type="email" placeholder="Correo electrónico" name="userEmail" required>
                            </label>
                        </div>
                        <div>
                            <label>
                                <i class='bx bx-lock-alt' ></i>
                                <input type="password" placeholder="Contraseña" name="userPassword" required>
                            </label>
                        </div>
                        <input type="submit" value="Iniciar sesión" onclick="">
                        <div class="alerta-error">Todos los campos son obligatorios</div>
                        <div class="alerta-exito">Te registraste correctamente</div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        document.getElementById('sign-in').addEventListener('click', function() {
            window.location.href = "inicio_sesion.php?form=login"; 
        });

        document.getElementById('sign-up').addEventListener('click', function() {
            window.location.href = "inicio_sesion.php?form=register"; 
        });
        </script>   
        

        <script src="js/script.js"></script>
        <script src="js/register.js"></script>
        <script src="js/login.js"></script>
        
    </body>
</html>