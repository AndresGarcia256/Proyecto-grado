<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="shortcut icon" href="img/flor_azul.png">
        <link rel="stylesheet" href="css/estilos_prin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
        </head>

    <body>
            <div class="encabezado" >

                <div class="logoAzul">
                    <a href="index.php"><img src="img/azul_logo_loto.png" alt="Logo de loto con una flor de loto"></a>
                </div>

                <nav class="recursosCursos">
                    <a href="index.php">Inicio</a>
                    <a href="cursos.php">Cursos</a>
                    <a href="recursos.php">Recursos</a>
                    
                </nav>

                <div id="barraBusqueda">
                    <input type="text" id="imputSearch" placeholder="¿Qué deseas buscar?">
                </div>

                <nav class="registroInicio">
                    <a href="inicio_sesion.php?form=login" class="inic_boton">Iniciar sesión</a>
                    <a href="inicio_sesion.php?form=register" class="regis_boton">Registrarse</a>
                </nav>

            </div>
        <section class="inicio">
            <div class="infoInicial">
                <h2>El poder de la tecnología en tus manos</h2>
                <p>
                    Somos una página creada por estudiantes, para estudiantes. Nuestra misión es brindar a los estudiantes herramientas, cursos y recursos educativos de vanguardia en tecnología y programación, creados por estudiantes, para estudiantes.
                </p>
                
                <div class="empiezaAhora">
                    <a href="inicio_sesion.php" class="btn">Empieza ahora</a>
                </div></div>
                <div class="imagenEstudio">
                    <img src="img/gif1.gif" alt="">
                    </div>
        </section>
            
        <main>    
            <div class="seccionCursos">
                <h2 class="tituloCursos">Descubre nuestros cursos</h2>

                <p class="introCursos">
                    En Loto, entendemos lo desafiante que puede ser adentrarse en el mundo de la tecnología y la programación, por eso hemos creado una plataforma diseñada por estudiantes para estudiantes. Nuestros cursos están pensados para ofrecerte una experiencia de aprendizaje accesible, práctica y colaborativa. Cada curso abarca desde los conceptos básicos hasta los temas más avanzados, con un enfoque en la aplicación real y el desarrollo de habilidades que podrás utilizar en proyectos y en tu futura carrera.
                </p>
                <div class="cursos">
                <div class="curso1">
                    <img src="img/fundamentos.jpg" alt="Fundamentos de HTML y CSS" class="imgP0">
                    <div>
                    <p class="tituloSeccion">Fundamentos de HTML y CSS</p><br>
                    <p class="contenidoCurso">Aprende a crear sitios web básicos desde cero utilizando HTML y CSS. 
                        Ideal para principiantes que quieren dar sus primeros pasos en el desarrollo web.</p>
                
                    </div>
                </div>

                <div class="curso2">
                    <img src="img/desde0.jpg" alt="HTML, CSS y JavaScript desde cero" class="imgDW">
                    <div>
                    <p class="tituloSeccion">HTML, CSS y JavaScript desde cero</p><br>
                    <p class="contenidoCurso">Domina las tecnologías básicas del desarrollo front end y empieza a crear páginas web interactivas de manera fácil y rápida.</p>
                    </div>
                </div>
            </div>
                <div class="cursos">
                <div class="curso1">
                    <img src="img/seguridad.jpg" alt="Fundamentos de seguridad informática">
                    <div>
                    <p class="tituloSeccion">Fundamentos de seguridad informática</p><br>
                    <p class="contenidoCurso">Protege tus sistemas y datos aprendiendo los conceptos esenciales de ciberseguridad. 
                        Curso ideal para quienes desean empezar en este campo.</p>
                    </div>
                </div>

                <div class="curso2">
                    <img src="img/excel.jpg" alt="Análisis de datos con Excel y Google Sheets">
                    <div>
                    <p class="tituloSeccion">Análisis de datos con Excel y Google Sheets</p><br>
                    <p class="contenidoCurso">Aprende a analizar y visualizar datos de forma eficiente utilizando las herramientas más accesibles: Excel y Google Sheets.</p>
                    </div>
                </div>
            </div>
               <a href="cursos.php"><button class="verMasCurs">Ver más</button></a> 
            </div>
            
            <div class="explorar">
                <h2 class="seccionExp">Explorar nuestros recursos</h2>
                <p>En Loto, te ofrecemos una amplia variedad de recursos creados por nuestros propios expertos para complementar tu aprendizaje. 
                    Desde proyectos de código abierto hasta guías prácticas, plantillas y documentos técnicos, aquí encontrarás todo lo que 
                    necesitas para aplicar tus conocimientos en el mundo real. Estos materiales te ayudarán a profundizar en los temas que 
                    estás aprendiendo y a desarrollar habilidades que te prepararán para enfrentar los desafíos tecnológicos actuales.</p>
                <div class="recursos1">
                    <p><img src="img/codigo_abierto.jpg"><br>Proyectos de código abierto</p>
                    <p><img src="img/guias.jpg"><br>Guías prácticas</p>
                    <p><img src="img/base_datos.jpg"><br>Bases de datos</p>
                </div>
                    <button class="verMasExp">Ver más</button>
            </div>

            <div class="elegirLoto">

                <h2>¿Por qué elegir Loto?</h2>
                <p><img src="img/chulito.png" class="chulito"><br> En Loto, creemos que el conocimiento debe ser accesible para todos. 
                    Por eso, como estudiantes universitarios apasionados por la tecnología, 
                    hemos creado una plataforma donde puedes aprender desde los fundamentos 
                    hasta las habilidades más avanzadas en áreas como desarrollo web, 
                    programación, ciberseguridad y más.</p>
                <p><img src="img/chulito.png" class="chulito"><br> Además, nuestros cursos están diseñados para adaptarse a tu nivel, 
                    sin importar si estás comenzando desde cero o si ya tienes experiencia previa. 
                    Con una metodología clara y recursos actualizados, te brindamos las herramientas 
                    necesarias para impulsar tu carrera en el mundo tecnológico.</p>

                <h4>Elige Loto y construye tu futuro hoy</h4>
                <img src="img/flor_azul.png" alt="Flor de loto en azul" class="flor_azul">
            </div>

            <div class="planes">
            <h2>Adquiere tu plan</h2> 
                <div class="planes2">
                <div class="planLite">
                    <p class="tituloPlan">Plan Lite</p>
                    <p class="precio">COP 15000</p>
                    <a href="inicio_sesion.php?form=login"><button>Comprar</button></a>
                    <ul>
                        <li>Acceso limitado a un número específico de cursos por mes o a cursos básicos.</li>
                        <li>Contenido esencial disponible para avanzar en tus conocimientos.</li>
                        <li>Acceso a recursos limitados tras finalizar los cursos. </li>
                        <li>Los cursos no incluyen certificados.</li>
                    </ul>
                </div>
                <div class="planPro">
                    <p class="tituloPlan">Plan Pro</p>
                    <p class="precio">COP 30000</p>
                    <a href="inicio_sesion.php?form=login"><button>Comprar</button></a>
                    <ul>
                        <li>Acceso ilimitado a todos los cursos, incluyendo los niveles avanzados.</li>
                        <li>Lecciones exclusivas y contenido en profundidad en todos los temas. </li>
                        <li>Descarga completa de materiales, apuntes en PDF y acceso a registros.</li>
                        <li>Certificados verificables por cada curso completado.</li>
                        <li>Descuentos especiales en futuros cursos y materiales adicionales.</li>
                    </ul>
                </div>
                </div>
            </div>

            <div class="texto">
                <h4>Únete a nuestra comunidad y comienza tu viaje hacia el conocimiento tecnológico hoy mismo.<br><br>
                    Impulsa tu futuro con Loto.</h4>
            </div>

        </main>
        
        <footer>
            <img src="img/blanco_logo_loto.png" class="logo_blanco">
            <div class="agrup">
                <div class="lotof">
                    <strong><p>Loto</p></strong><br>
                    <p>Nosotros</p>
                    <p>Contáctanos</p>
                </div>
                <div class="recursosf">
                    <strong><p></a>Recursos</p></strong><br>
                    <p>Artículos y publicaciones</p>
                    <p>Proyectos destacados</p>
                    <p>Bases de datos</p>
                    <p>Descargables</p>
                </div>
                <div class="avisosf">
                    <strong><p>Avisos legales</p></strong><br>
                    <p>Política de privacidad</p>
                    <p>Política de cookies</p>
                    <p>Términos y condiciones</p>
                </div>
                <div class="imagen_flor">
                    <img src="img/flor_blanco.png" class="flor_blanca">
                </div>
            </div>
            <strong><p class="cond">© 2024 Loto - Todos los derechos reservados.</p></strong><br>
        </footer>
        <script>
            function toggleMenu() {
                var nav = document.querySelector('.recursosCursos');
                nav.classList.toggle('active');
            }
        </script>

    </body>

</html>