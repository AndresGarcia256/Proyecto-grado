<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link rel="shortcut icon" href="img/flor_azul.png">
    <link rel="stylesheet" href="css/estilos_prin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="encabezado" >

        <div class="logoAzul">
            <a href="index.php"><img src="img/azul_logo_loto.png" alt="Logo de loto"></a>
        </div>

        <nav class="recursosCursos">
            <a href="index.php">Inicio</a>
            <a href="cursos.php">Cursos</a>
            <a href="">Recursos</a>
            
        </nav>

        <div id="barraBusqueda">
            <input type="text" id="imputSearch" placeholder="¿Qué deseas buscar?">
        </div>

        <nav class="registroInicio">
            <a href="inicio_sesion.php" class="inic_boton">Iniciar sesión</a>
            <a href="inicio_sesion.php" class="regis_boton">Registrarse</a>
            
        </nav>

    </div>

    <header>
        <h2 class="tituloPagina">Cursos de Loto</h2>
        <p class="introPagina">En un mundo impulsado por la tecnología, adquirir conocimientos en programación y 
            áreas relacionadas es clave para destacar. Nuestra plataforma ofrece cursos para todos los niveles, 
            desde principiantes hasta avanzados, en temas como inteligencia artificial y ciberseguridad. 
            Con un enfoque práctico y colaborativo, te damos las herramientas para triunfar en el entorno digital. 
            ¡Comienza tu aprendizaje hoy!</p>
    </header>
    <main>
        <aside class="barraLateral"><br>
            <h3>Categorías</h3>
            <ul>
                <li><a href="#programacion">Programación</a></li>
                <li><a href="#ciberseguridad">Ciberseguridad</a></li>
                <li><a href="#desarrollo">Desarrollo web y móvil</a></li>
                <li><a href="#analisis">Análisis de datos</a></li>
                <li><a href="#bases">Bases de datos</a></li>
            </ul><br><br><br>
            <h2>Más buscados</h2>
            <h2>Nuevos lanzamientos</h2>
            <h2>Mejor calificados</h2>
        </aside>
        <div class="cursosProgramacion">
            <h2 class="tituloPrg" id="programacion">Programación</h2>
                <div class="curso">
                <h3>HTML, CSS y JavaScript desde cero</h3>
                    <p>COP 5000</p>
                    <img src="img/desde0.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Introducción a Node.js</h3>
                    <p>COP 5000</p>
                    <img src="img/node.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <h2 class="tituloPrg" id="ciberseguridad">Ciberseguridad</h2>

                <div class="curso">
                <h3>Fundamentos de seguridad informática</h3>
                    <p>COP 5000</p>
                    <img src="img/seguridad.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
                </div>

            <div class="curso">
                <h3>Protección de redes y sistemas con Firewall y VPN</h3>
                    <p>COP 5000</p>
                    <img src="img/proteccion.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>
            <div class="curso">
                <h3>Auditoría de seguridad y hacking ético </h3>
                    <p>COP 5000</p>
                    <img src="img/auditoria.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <h2 class="tituloPrg" id="sesarrollo">Desarrollo web y móvil</h2>

                <div class="curso">
                <h3>Fundamentos de HTML y CSS</h3>
                    <p>COP 5000</p>
                    <img src="img/fundamentos.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Desarrollo Web Full Stack con React y Node.js</h3>
                    <p>COP 5000</p>
                    <img src="img/fullstack.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Aplicaciones Android Nativas con Kotlin</h3>
                    <p>COP 5000</p>
                    <img src="img/appmovil.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <h2 class="tituloPrg" id="analisis">Análisis de datos</h2>

                <div class="curso">
                <h3>Análisis de datos con Excel y Google Sheets</h3>
                    <p>COP 5000</p>
                    <img src="img/excel.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Introducción a Python para ciencia de datos</h3>
                    <p>COP 5000</p>
                    <img src="img/ciencia_datos.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <h2 class="tituloPrg" id="bases">Bases de datos</h2>

                <div class="curso">
                <h3>Bases de datos relacionales con MySQL</h3>
                    <p>COP 5000</p>
                    <img src="img/relacionales.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Optimización de consultas SQL</h3>
                    <p>COP 5000</p>
                    <img src="img/optimizar.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>

            <div class="curso">
                <h3>Bases de datos NoSQL con MongoDB</h3>
                    <p>COP 5000</p>
                    <img src="img/nosql.jpg"><br>
                    <a href="inicio_sesion.php"><button>Comprar</button></a>
            </div>
            

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
</body>
</html>