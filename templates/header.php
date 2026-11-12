<!-- header.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creador Horarios</title>

    <!-- BOOSTRAP CON CDN  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Ruta relativa al archivo style.css desde la raíz del proyecto -->
    <link rel="stylesheet" href="/CreadorHorarios/css/style.css">
</head>

<body  class="bg-orange-light">

    <!-- #########  BARRA DE NAVEGACION   ######### -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a id="LogoTitle" class="navbar-brand" href="#" 
        style=" background: linear-gradient(to right,#ff6060, #ff7d41, #ffee52de);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 20px;">
          Creador de Horarios Software 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">

            <li class="nav-item">
              <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'text-warning' : 'text-white'; ?>" href="./index.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                      <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
                    </svg> Inicio
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index_profesores.php' ? 'text-warning' : 'text-white'; ?>" href="./index_profesores.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg> Docentes
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index_asignaturas.php' ? 'text-warning' : 'text-white'; ?>" href="./index_asignaturas.php">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
                      <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                    </svg> Asignaturas
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index_aulas.php' ? 'text-warning' : 'text-white'; ?>" href="./index_aulas.php">  
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                  <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                </svg> Aulas/Periodos
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index_horarios.php' ? 'text-warning' : 'text-white'; ?>" href="./index_horarios.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                </svg> Horarios
              </a>
            </li>

          </ul>      
        </div> 
        
        <a class="navbar-brand" href="#">
          <img src="/CreadorHorarios/img/logoestl.png" alt="Bootstrap" width="100" height="40">
        </a>
      </div>
    </nav>
