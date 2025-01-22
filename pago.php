<?php
session_start();
include("php/conexion.php"); 

if (isset($_GET['id'])) {
    $id_curso = $_GET['id'];
    
    $sqlCurso = "SELECT nombre, precio FROM curso WHERE ID_curso = $id_curso";
    $resultCurso = mysqli_query($conn, $sqlCurso);
    $curso = mysqli_fetch_assoc($resultCurso);
}

if (isset($_SESSION['ID_usuario'])) {
    $id_usuario = $_SESSION['ID_usuario'];

    $sqlEstudiante = "SELECT nombre, correo FROM usuario WHERE ID_usuario = $id_usuario";
    $resultEstudiante = mysqli_query($conn, $sqlEstudiante);
    $estudiante = mysqli_fetch_assoc($resultEstudiante);
}

$sqlSuscripcion = "SELECT nombre, precio FROM suscripción";
$resultSuscripcion = mysqli_query($conn, $sqlSuscripcion);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar'])) {
    $id_curso = $_POST['id_curso'];
    $id_estudiante = $_SESSION['ID_usuario']; 
    $fecha_inscripcion = date('Y-m-d'); 

    $sqlInscripcion = "INSERT INTO inscripción_curso (ID_estudiante, ID_curso, fecha_inscripción) VALUES (?, ?, ?)";
    $stmtInscripcion = $conn->prepare($sqlInscripcion);
    $stmtInscripcion->bind_param("iis", $id_estudiante, $id_curso, $fecha_inscripcion);
    $stmtInscripcion->execute();

   
    $porcentaje_completado = 0;
    $fecha_actualizacion = date('Y-m-d');

    $sqlProgreso = "INSERT INTO progreso (ID_estudiante, ID_curso, porcentaje_completado, fecha_actualizacion) VALUES (?, ?, ?, ?)";
    $stmtProgreso = $conn->prepare($sqlProgreso);
    $stmtProgreso->bind_param("iiis", $id_estudiante, $id_curso, $porcentaje_completado, $fecha_actualizacion);
    $stmtProgreso->execute();
   
    header("Location: cursos_usuario.php?pago_exitoso=true");
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ventana de pago</title>
        <link rel="shortcut icon" href="img/flor_azul.png">
        <link rel="stylesheet" href="css/estilos_pago.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
        <body>
        <header> 
            <img src="img/azul_logo_loto.png" class="logo">
        </header>
        <section class="container">
            <main>
                <section class="plan">
                    <article class="">
                        <p class="pref">Preferencias de pago</p>
                        <p class="planp">Elige tu plan</p>
                    </article>
                    <form class="plan-options">
                    <?php while ($plan = mysqli_fetch_assoc($resultSuscripcion)) : ?>
                    <label class="plan-item">
                    <input type="radio" name="plan" value="<?php echo htmlspecialchars($plan['nombre']); ?>" data-precio="<?php echo htmlspecialchars($plan['precio']); ?>" onclick="actualizarPago(<?php echo htmlspecialchars($plan['precio']); ?>)">
                        <article>
                    <p>Suscripción:</p>
                    <h3><?php echo htmlspecialchars($plan['nombre']); ?></h3>
                    <p>COP <?php echo htmlspecialchars($plan['precio']); ?></p>
                    </article>  
                    </label>
                    <?php endwhile; ?>
                    
                </form>
                <label class="plan-item">
                <input type="radio" name="plan" value="none" onclick="actualizarPago(0)">
                    <article><p>Sin suscripción</p></article>
                    </label>
                </section><br>
                <section class="pago">
                <p class="pref">Elige tu método de pago</p>
                <article class="pago-options">
                    <label>
                        <input type="radio" name="metodo-pago" value="credito" checked> Tarjeta de crédito
                    </label>
                    <label>
                        <input type="radio" name="metodo-pago" value="debito"> Tarjeta de débito
                    </label>
                </article>
                <article class="datos-tarjeta">
                    <label for="numero-tarjeta">Número de tarjeta</label>
                    <input type="text" id="numero-tarjeta" placeholder="1234 1234 1234 1234" required>

                    <article class="vencimiento-cvv">
                        <article>
                            <label for="vencimiento">Vencimiento</label>
                            <input type="text" id="vencimiento" placeholder="MM / AA" required>
                        </article>
                        <article>
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" placeholder="123" required>
                        </article>
                    </article>

                    <label for="identificacion">Identificación</label>
                    <select id="identificacion" required>
                        <option value="cc">CC</option>
                        <option value="ce">CE</option>
                    </select>

                    <input type="text" id="numero-identificacion" placeholder="Número de identificación" required>
                </article>
                </section>
            </main>

            <aside class="resumen-pago">
                <h3>Datos de pago</h3>
                <p>Titular: <br> <?php echo htmlspecialchars($estudiante['nombre']); ?></p><br>
                <p>Correo electrónico: <br> <?php echo htmlspecialchars($estudiante['correo']); ?></p><br>

                <h4>Plan de pago</h4>
                <p>Suscripción: <span id="suscripcion-precio">COP 0</span></p><br><br>

                <h3>Total:</h3>
                <h3><span id="precio-total"><?php echo ($curso['precio']); ?></span></h3><br>
                <form method="post" action="pago.php">
                    <input type="hidden" name="id_curso" value="<?php echo $id_curso; ?>">
                    <button type="submit" name="confirmar" onclick="confirmarPago()">Confirmar</button>
                </form>

            </aside>
        </section>

        <?php if (isset($_SESSION['pago_exitoso'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pago exitoso',
                text: 'Tu inscripción al curso ha sido confirmada.',
                confirmButtonText: 'Aceptar'
            });
        </script>
        <?php unset($_SESSION['pago_exitoso']); ?>
        <?php endif; ?>

        <script>
        const precioCurso = <?php echo $curso['precio']; ?>;

        function actualizarPago(precioSuscripcion = 0) {
            const suscripcionPrecio = document.getElementById("suscripcion-precio");
            
            suscripcionPrecio.textContent = precioSuscripcion > 0 ? `COP ${precioSuscripcion.toLocaleString()}` : `COP ${precioCurso.toLocaleString()}`;

            const precioTotal = precioSuscripcion > 0 ? precioSuscripcion : precioCurso;
            document.getElementById("precio-total").textContent = `COP ${precioTotal.toLocaleString()}`;
        }
        actualizarPago();

        function confirmarPago() {
        const formData = new FormData(document.getElementById('form-confirmar'));

        fetch('pago.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'Pago exitoso',
                    text: 'Tu inscripción al curso ha sido confirmada.',
                    confirmButtonText: 'Aceptar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'cursos_usuario.php';
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema con tu pago. Por favor, inténtalo de nuevo.',
                    confirmButtonText: 'Aceptar'
                });
            }
        })
        .catch(error => console.error('Error:', error));
    }

        </script>
        </body>
</html>