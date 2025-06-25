<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="icon" sizes="57x57" href="./IMG/iconoHamster.png" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./CSS/estilo.css">
    
</head>
<body>


    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <div class="container-fluid">
        
                <div class="navbar-brand imgEscudoIPN">
                    <a target="_blank" href="https://www.ipn.mx/"><img src="./IMG/logotipo_ipn.webp"></a>
                </div>
            
                <!-- Botón del menú hamburguesa -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContenido" aria-controls="navbarContenido" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            
                <!-- Menú colapsable -->
                <div class="collapse navbar-collapse" id="navbarContenido">
    
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a target="_blank" class="nav-link active" href="./index.html">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" class="nav-link" href="./registro.html">Registro</a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" class="nav-link" href="./admin/login.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" class="nav-link" href="./alumno/login.php">Cuenta</a>
                        </li>
                    </ul>
    
                </div>
            </div>
        </nav>
    
    </header>
    
    <main>
    <div id="carouselExampleDark" class="carousel carousel-dark slide carousel-custom carouselContainer">
            <!-- Indicadores -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            
            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="./IMG/A1.JPG" class="d-block w-100" alt="Slide 1">
                <!--<div class="carousel-caption d-none d-md-block infoContainer">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>-->
                </div>
            
                <div class="carousel-item" data-bs-interval="2000">
                <img src="./IMG/A2.JPG" class="d-block w-100" alt="Slide 2">
                <!--<div class="carousel-caption d-none d-md-block infoContainer">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>-->
                </div>
            
                <div class="carousel-item">
                <img src="./IMG/A3.JPG" class="d-block w-100" alt="Slide 3">
                
                <!--<div class="carousel-caption d-none d-md-block infoContainer">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>-->
                </div>
            
                <div class="carousel-item">
                <img src="./IMG/A4.JPG" class="d-block w-100" alt="Slide 4">
                <!--
                    <div class="carousel-caption d-none d-md-block infoContainer">
                        <h5>Fourth slide label</h5>
                        <p>Some representative placeholder content for the fourth slide.</p>
                    </div>
                -->
                </div>
            </div>
            
            <!-- Controles -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>          
    
        <div class="imgEscudo">
            <a class="nav-link active etiquetaAEscudo" href="https://www.escom.ipn.mx/" target="_blank">
                <img src="./IMG/EscudoESCOM.png" alt="Escudo de ESCOM" title="Escudo de ESCOM">
            </a>
        </div>
    </main>


    <!-- Stats Section -->
    <section class="stats-section py-5" style="background-color: #ffdff2 !important;">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter" data-target="25">31</div>
                    <p class="fw-bold text-muted">Años de Experiencia</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter" data-target="1200">3000</div>
                    <p class="fw-bold text-muted">Estudiantes Activos</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter" data-target="85">100%</div>
                    <p class="fw-bold text-muted">Profesores Especializados</p>
                </div>
                <div class="col-md-3 col-6 mb-4">
                    <div class="counter" data-target="98">95</div>
                    <p class="fw-bold text-muted">% Satisfacción</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="nosotros" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <h2 class="section-title mb-4">Gestión educativa integral y comprometida</h2>
                    <p class="lead text-muted mb-4">
                        El compromiso es ofrecer servicios y productos educativos de calidad mediante programas académicos, científicos y tecnológicos pertinentes, con responsabilidad social, transparencia, seguridad de datos, gestión de propiedad intelectual y mejora continua del Sistema de Gestión para Organizaciones Educativas (SGOE).
                    </p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                                <span class="fw-bold">Metodología Innovadora</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                                <span class="fw-bold">Instalaciones Modernas</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                                <span class="fw-bold">Profesores Certificados</span>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                                <span class="fw-bold">Educación Integral</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="alumnosContainer text-center">
                        <img src="./IMG/alumnos.JPG">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programas" class="py-5 bg-light" >
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Nuestra Oferta Educativa</h2>
                <p class="lead text-muted">Ofrecemos educación de calidad en diferentes áreas</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-pc-display text-warning mb-3" style="font-size: 3rem;"></i>
                            <h4 class="card-title mb-3">Ing. en Sistemas Computacionales</h4>
                            <p class="card-text text-muted">
                                Formar ingenieros con sólida preparación científica y tecnológica, capaces de desarrollar y gestionar software y hardware con tecnologías de vanguardia.
                            </p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="bi bi-check text-success me-2"></i>Profesores certificados</li>
                                <li><i class="bi bi-check text-success me-2"></i>Laboratorios de primer nivel</li>
                                <li><i class="bi bi-check text-success me-2"></i>Clubes extracurriculares</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-book text-primary mb-3" style="font-size: 3rem;"></i>
                            <h4 class="card-title mb-3">Ing. en Inteligencia Artificial</h4>
                            <p class="card-text text-muted">
                                Bases sólidas en todas las materias con enfoque 
                                en pensamiento crítico y resolución de problemas.
                            </p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="bi bi-check text-success me-2"></i>Matemáticas avanzadas</li>
                                <li><i class="bi bi-check text-success me-2"></i>Profesores certificados</li>
                                <li><i class="bi bi-check text-success me-2"></i>Laboratorios de primer nivel</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-mortarboard-fill text-success mb-3" style="font-size: 3rem;"></i>
                            <h4 class="card-title mb-3">Lic. en Ciencia de Datos</h4>
                            <p class="card-text text-muted">
                                Preparación integral para el bachillerato con 
                                énfasis en liderazgo y responsabilidad social.
                            </p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="bi bi-check text-success me-2"></i>Laboratorios equipados</li>
                                <li><i class="bi bi-check text-success me-2"></i>Profesores certificados</li>
                                <li><i class="bi bi-check text-success me-2"></i>Actividades extracurriculares</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Lo que dicen nuestras alumnos</h2>
                <p class="lead text-muted">Testimonios reales de estudiantes</p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "El nivel académico es excelente. He desarrollado 
                            habilidades que no esperaba a mi edad. Los maestros son 
                            muy dedicados."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">María González</h6>
                                <small class="text-muted">Estudiante de ISC</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "Las instalaciones son increíbles y el ambiente escolar 
                            es muy positivo. Estoy muy motivado por aprender 
                            cada día."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Carlos Mendoza</h6>
                                <small class="text-muted">Estudiante IIA</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="testimonial-card p-4">
                        <div class="d-flex mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <p class="mb-3">
                            "La formación en valores es excepcional. No solo 
                            preparan académicamente, sino también como personas 
                            íntegras."
                        </p>
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                <i class="bi bi-person-fill text-dark"></i>
                            </div>
                            <div>
                                <h6 class="mb-0">Ana Rodríguez</h6>
                                <small class="text-muted">Estudiante de LCD</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="noticias" class="py-5 bg-light" style="background-color: #ffdff2 !important;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Últimas Noticias</h2>
                <p class="lead text-muted">Mantente al día con nuestras actividades</p>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card news-card h-100">
                        <div class="card-header bg-primary text-white">
                            <i class="bi bi-calendar-event me-2"></i>
                            <small>19 de Junio, 2025</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Expo Escom 2025</h5>
                            <p class="card-text">
                                Nuestros estudiantes presentarán sus proyectos de software. Únete al evento.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card news-card h-100">
                        <div class="card-header bg-success text-white">
                            <i class="bi bi-trophy me-2"></i>
                            <small>20 de Junio, 2025</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Primer en ICPC</h5>
                            <p class="card-text">
                                Dos de nuestor equipos obtienen el primero y segundo lugar en ICPC.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card news-card h-100">
                        <div class="card-header bg-warning text-dark">
                            <i class="bi bi-megaphone me-2"></i>
                            <small>5 de Junio, 2025</small>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nuevas cafetería</h5>
                            <p class="card-text">
                                Ven y conoce la nueva cafetería de la ESCOM.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 text-white" style="background-color: #7b0048 !important;">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="mb-4">¿Listo para formar parte de nuestra comunidad?</h2>
                    <p class="lead mb-4">
                        Regístrate en nuestro formulario y da el siguiente paso en camino a un gran futuro.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="./registro.html" class="btn btn-custom btn-lg">
                            <i class="bi bi-box-arrow-in-left me-2"></i>
                            Regístrate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-4 pb-2 mt-5">
        <div class="container">
        <div class="row">
            <!-- Logo y descripción -->
            <div class="col-md-4 mb-3">
            <div class="navbar-brand imgEscudoIPN escudoFooter">
                <a href="https://www.ipn.mx/"><img src="./IMG/logotipo_ipn.webp"></a>
            </div>
            <p class="mt-2 nombreEscuela">
                Instituto Politécnico Nacional<br>
                “La Técnica al Servicio de la Patria”
            </p>
            </div>
    
    
            <!-- Contacto -->
            <div class="col-md-4 mb-3 datosContacto">
            <h5>Contacto</h5>
            <p class="mb-1">Av. Juan de Dios Bátiz, CDMX</p>
            <p class="mb-1">Tel: +52 (55) 5729 6000</p>
            <p>Email: contacto@ipn.mx</p>
            </div>
        </div>
    
        <div class="text-center mt-3 border-top pt-3">
            <small>&copy; 2025 Instituto Politécnico Nacional. Todos los derechos reservados.</small>
        </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</html>

