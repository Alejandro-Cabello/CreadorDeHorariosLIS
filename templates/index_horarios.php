<?php
include '../utils/db_conexion.php'; // Conexión a la base de datos
?>

<!-- index.php -->
<?php include 'header.php'; // Inclusión del header ?>

<div class="accordion p-3" id="accordionHorarios">
    <!-- TARJETA 1  -->
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#informacionHorarios" aria-expanded="false" aria-controls="informacionHorarios">
                <strong>Horarios de Ingenieria de Software</strong>
            </button>
        </h2>
        <div id="informacionHorarios" class="accordion-collapse">
            <div class="accordion-body">
                
                <div class="row p-2">

                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#horariosModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-day" viewBox="0 0 16 16">
                                    <path d="M4.684 12.523v-2.3h2.261v-.61H4.684V7.801h2.464v-.61H4v5.332zm3.296 0h.676V9.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a2 2 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43m.094 5.093h.672V8.418h-.672z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
                                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z"/>
                                </svg> 
                                <strong>Crear Horario</strong>
                            </button>
                        </div>

                        <!-- Modal DE Horario-->
                        <div class="modal fade" id="horariosModal" tabindex="-1" aria-labelledby="horariosModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="horariosModalLabel">Crear horarios Escolares por Ciclo escolar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="../utils/mod_horarios.php" method="POST" id="formCrearHorarios">
                                        <div class="modal-body">

                                            <!-- Primer Componente: Selección del Periodo Escolar -->
                                            <div class="row">                                  
                                                <!-- COLUMNA 1: SEMESTRE-->
                                                <div class="col-md-6" style="width: 80%;">
                                                    <div class="mb-3">
                                                        <label for="selectSemestre" class="form-label">
                                                            <strong>Selecciona el Periodo Escolar</strong>                                                          
                                                        </label>
                                                        <select class="form-select" id="selectSemestre" name="selectSemestre" onchange="updateSemestreId()">
                                                            <option value="" selected disabled>Periodo escolar del horario</option>                                                       
                                                            <?php
                                                            $query = "SELECT idSemestre, nombreSemestre FROM semestres";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo "<option value='{$row['idSemestre']}'>{$row['nombreSemestre']}</option>";
                                                            }
                                                            ?>
                                                        </select>                                                   
                                                    </div>
                                                </div>
                                                <!-- COLUMNA 2: ID SEMESTRE-->
                                                <div class="col-md-6" style="width: 18%;">
                                                    <div class="mb-3">
                                                        <label for="idSemestre" class="form-label"><strong>ID Periodo</strong></label>
                                                        <input type="text" class="form-control" id="idSemestre" name="idSemestre" readonly>
                                                    </div>  
                                                </div>
                                            </div>

                                            <!-- Segundo Componente: Selección del Semestre del Grupo -->
                                            <div class="mb-3">
                                                <label for="selectPeriodo" class="form-label"><strong>Selecciona el semestre del grupo</strong></label>
                                                <select class="form-select" id="selectPeriodo" name="selectPeriodo" onchange="updateAsignaturas()">
                                                    <option value="" selected disabled>Semestre</option>
                                                    <?php
                                                    for ($i = 1; $i <= 9; $i++) {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Tercer Componente: Selección de Asignatura y Grupo -->
                                            <div class="row">

                                                <!-- COLUMNA 1: NOMBRE DE ASIGNATURA -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nombreAsignatura" class="form-label"><strong>Nombre de Asignatura</strong>
                                                            <span class="badge text-bg-warning">Asegúrese de que el campo se actualice correctamente</span>
                                                        </label>
                                                        <select class="form-select" id="nombreAsignatura" name="nombreAsignatura" onchange="updateAsignaturaCodigo()">
                                                            <!-- Opciones dinámicas -->
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- COLUMNA 2: ID ASIGNATURA -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="selectAsignatura" class="form-label"><strong>Selecciona el ID de la Asignatura</strong></label>
                                                        <input type="text" class="form-control" id="selectAsignatura" name="selectAsignatura" readonly>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="mb-3">
                                                <label for="selectGrupo" class="form-label"><strong>Selecciona el Grupo</strong></label>
                                                <select class="form-select" id="selectGrupo" name="selectGrupo">
                                                    <!-- Opciones dinámicas -->
                                                </select>
                                            </div><br>

                                            <!-- Cuarto Componente: Botón para buscar ID de Asignatura por Grupo -->
                                            <div class="row">
                                                <div class="col-6 col-sm-3">
                                                    <div class="mb-3">
                                                        <button type="button" class="btn btn-success" onclick="buscarIdAsignaturaPorGrupo()">Buscar ID Asignatura por Grupo</button>
                                                    </div>
                                                </div>
                                                <!-- ID ASIGNATURA POR GRUPO -->
                                                <div class="col-6 col-sm-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="idAsignaturaPorGrupo" name="idAsignaturaPorGrupo" placeholder="ID Asignatura por Grupo" readonly>
                                                    </div>
                                                </div>
                                            </div><br>

                                            <!-- Quinto Componente: Tabla con Información de Asignatura por Grupo -->
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <h5>Información la asignatura por grupo seleccionado</h5>
                                                    <span class="badge text-bg-warning">Si la información anterior NO es la correcta, cambia los campos y vuelve a presionar el botón Buscar ID</span>
                                                </label>
                                                
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Periodo</th>
                                                            <th>Asignatura</th>
                                                            <th>Horas semanales</th>
                                                            <th>Semestre</th>
                                                            <th>Grupo</th>
                                                            <th>Docente</th>                                                
                                                            <th>Entrada</th>
                                                            <th>Salida</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="infoAsignaturaPorGrupo">
                                                        <!-- Filas dinámicas -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>

                                            <!-- Sexto Componente: Disponibilidad de Aulas y Días -->
                                            <label class="form-label">
                                                <h5>Modifica la disponibilidad del horario</h5>                                       
                                                <span class="badge text-bg-warning">Seleccionda cuidadosamente el Aula, Dia, Duracion de clase y horas para evitar concurrencias. Haz caso a los alert y corrige la información correspondiente.</span>
                                            </label>
                                                                       
                                            <div class="row">
                                                <!-- NOMBRE DEL AULA-->
                                                <div class="col-md-6 mb-3"style="width: 80%;">
                                                    <label for="addNombreAula" class="form-label"><strong>Aula</strong></label>
                                                    <select class="form-select" id="addNombreAula" name="nombreAula">
                                                        <option value="" selected disabled>Selecciona el nombre del Aula</option>
                                                        <?php
                                                            $sql = "SELECT idAula, nombreAula FROM aulas";
                                                            $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='{$row['idAula']}' data-id='{$row['idAula']}'>{$row['nombreAula']}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- ID DEL AULA-->
                                                <div class="col-md-6 mb-3" style="width: 18%;">
                                                    <label for="addIdAula" class="form-label"><strong>ID Aula</strong></label>
                                                    <input type="text" class="form-control" id="addIdAula" name="idAula" readonly>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- DIA DE LA SEMANA-->
                                                <div class="col-md-9 mb-3" style="width: 80%;">
                                                    <label for="addNombreDias" class="form-label"><strong>Día</strong></label>
                                                    <select class="form-select" id="addNombreDias" name="nombreDias">
                                                        <option value="" selected disabled>Selecciona el día de la semana</option>
                                                        <?php
                                                            $sql = "SELECT idDias, nombreDias FROM diasSemana";
                                                            $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='{$row['idDias']}' data-id='{$row['idDias']}'>{$row['nombreDias']}</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <!-- ID DEL DIA-->
                                                <div class="col-md-3 mb-3" style="width: 18%;">
                                                    <label for="addIdDias" class="form-label"><strong>ID Día</strong></label>
                                                    <input type="text" class="form-control" id="addIdDias" name="idDias" readonly>
                                                </div>
                                            </div>

                                            <!-- Séptimo Componente: Duración de la Sesión -->
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Duración de la sesión</strong>
                                                    <span class="badge text-bg-warning">Numero de horas de duracion en el día seleccionado (maximo 3 horas)</span>
                                                </label>
                                                <select class="form-select" name="horasSesión" id="horasSesión">
                                                    <option value="" selected disabled>Número de horas. (Las sesiones tiene una duracion de 3 horas en un dia)</option>
                                                    <option value="1">1 hora</option>
                                                    <option value="2">2 horas</option>
                                                    <option value="3">3 horas</option>
                                                </select>
                                            </div>


                                            <!-- Alerta para horas semanales completas -->
                                            <div class="alert alert-primary" id="horasSemanalesCompletaAlerta" style="display: none;">Al guardar este horario, las horas semanales de esta asignatura para este grupo estarán completas.</div>
                                            <!-- Alerta para horas semanales sobrepasadas -->
                                            <div class="alert alert-danger" id="horasSemanalesSobrepasadaAlerta" style="display: none;">Las horas asignadas a esta sesión sobrepasan el número de horas semanales de esta asignatura para este grupo. (Modifica las horas de esta sesión o edita las horas semanales en la pestaña: Asignatura por grupo).</div>
                                            
                                            <br>

                                            <!-- Botón para verificar coincidencias y disponibilidad -->
                                            <div class="d-grid gap-2 col-6 mx-auto">
                                                <button type="button" class="btn btn-success" id="verificarDisponibilidad">Verificar coincidencias y disponibilidad</button>
                                            </div>

                                            <br>

                                            <!-- Alerta para rango de horas -->
                                            <div class="alert alert-primary" id="horaRangoAlerta" style="display: none;"></div>

                                            <!-- Inputs de tiempo ocultos -->
                                            <div class="row mt-3" id="timeInputs" style="display: none;">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="InicioDeClase" class="form-label">Inicio de Clase</label>
                                                        <input type="time" class="form-control" id="InicioDeClase" name="InicioDeClase">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="FinDeClase" class="form-label">Fin de Clase</label>
                                                        <input type="time" class="form-control" id="FinDeClase" name="FinDeClase" readonly>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Alerta para hora fuera de rango -->
                                            <div class="alert alert-danger" id="horaFueraRangoAlerta" style="display: none;">El rango de horas no es válido.</div>
                                            <!-- Alerta para concurrencias -->
                                            <div class="alert alert-danger" id="concurrenciaAlerta" style="display: none;">Ya existe una asignación de horario con la misma hora y/o Aula, por favor modifica los datos para evitar concurrencias.</div>
                                            <!-- Alerta para conflictos de horario del docente -->
                                            <div class="alert alert-danger" id="conflictoDocenteAlerta" style="display: none;"></div>

                                            <!-- Tabla para verificar asignaciones -->
                                            <div class="mt-3" id="tablaAsignaciones" style="display: none;">
                                                <h5>Verifica las asignaciones</h5>
                                                <span class="badge text-bg-warning">La siguiente tabla muestra las asignaciones de horario del Dia y Aula seleccionados. Asegúrate de no tener concurrencias en las horas con los registros de la tabla.</span>
                                                <br>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Horario</th>
                                                            <th>Nombre Aula</th>
                                                            <th>Nombre Día</th>
                                                            <th>Nombre Semestre</th>
                                                            <th>Hora Inicio</th>
                                                            <th>Hora Fin</th>
                                                            <th>Nombre Asignatura</th>
                                                            <th>Semestre</th>
                                                            <th>Grupo</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablaAsignacionesCuerpo">
                                                        <!-- Filas dinámicas -->
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>


                        <!-- Filtros antes de la tabla -->
                        <div class="container mt-5">
                            <div class="card border-secondary  mb-3">
                                <div class="card-header text-bg-secondary  mb-3"> Filtros de horarios </div>      
                                <div class="card-body text-secondary">
                                    <form id="formFiltros">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="filtroSemestre" class="form-label">Filtrar por Semestre</label>
                                                <select class="form-select" id="filtroSemestre" name="filtroSemestre">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT nombreSemestre FROM semestres";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['nombreSemestre']}'>{$row['nombreSemestre']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="filtroAula" class="form-label">Filtrar por Aula</label>
                                                <select class="form-select" id="filtroAula" name="filtroAula">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT nombreAula FROM aulas";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['nombreAula']}'>{$row['nombreAula']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="filtroDia" class="form-label">Filtrar por Día</label>
                                                <select class="form-select" id="filtroDia" name="filtroDia">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT nombreDias FROM diasSemana";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['nombreDias']}'>{$row['nombreDias']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="filtroGrupo" class="form-label">Filtrar por Grupo</label>
                                                <select class="form-select" id="filtroGrupo" name="filtroGrupo">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT DISTINCT grupo FROM asignaturaPorGrupo";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['grupo']}'>{$row['grupo']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="filtroSemestreAsignatura" class="form-label">Filtrar por Semestre (Asignatura)</label>
                                                <select class="form-select" id="filtroSemestreAsignatura" name="filtroSemestreAsignatura">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT DISTINCT semestre FROM asignaturas ORDER BY semestre  ASC";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['semestre']}'>{$row['semestre']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- Nueva columna para filtrar por nombre completo del docente -->
                                            <div class="col">
                                                <label for="filtroDocente" class="form-label">Filtrar por Docente</label>
                                                <select class="form-select" id="filtroDocente" name="filtroDocente">
                                                    <option value="">Sin Filtro</option>
                                                    <?php
                                                    $query = "SELECT DISTINCT nombreCompleto FROM docente";
                                                    $result = mysqli_query($conn, $query);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<option value='{$row['nombreCompleto']}'>{$row['nombreCompleto']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 d-md-block">
                                            <button type="button" class="btn btn-secondary" onclick="aplicarFiltros()">Aplicar filtros seleccionados</button>
                                        </div>
                                    
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Tabla después del formulario de filtros -->
                        <div class="container mt-5">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nombre Asignatura</th>
                                        <th>Semestre</th>
                                        <th>Grupo</th>
                                        <th>Turno</th>
                                        <th>Docente</th>
                                        <th>Nombre Aula</th>
                                        <th>Nombre Día</th>
                                        <th>Hora Inicio</th>
                                        <th>Hora Fin</th>
                                        <th>Periodo Escolar</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaHorariosCuerpo">
                                    <!-- Filas dinámicas -->
                                </tbody>
                            </table>
                        </div>
                                              

                        <!-- Botón de exportación -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                            <button type="button" class="btn btn-success btn-lg" onclick="exportarTablaXLSX()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-filetype-xls" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM6.472 15.29a1.2 1.2 0 0 1-.111-.449h.765a.58.58 0 0 0 .254.384q.106.073.25.114.143.041.319.041.246 0 .413-.07a.56.56 0 0 0 .255-.193.5.5 0 0 0 .085-.29.39.39 0 0 0-.153-.326q-.152-.12-.462-.193l-.619-.143a1.7 1.7 0 0 1-.539-.214 1 1 0 0 1-.351-.367 1.1 1.1 0 0 1-.123-.524q0-.366.19-.639.19-.272.527-.422.338-.15.777-.149.457 0 .78.152.324.153.5.41.18.255.2.566h-.75a.56.56 0 0 0-.12-.258.6.6 0 0 0-.247-.181.9.9 0 0 0-.369-.068q-.325 0-.513.152a.47.47 0 0 0-.184.384q0 .18.143.3a1 1 0 0 0 .405.175l.62.143q.326.075.566.211a1 1 0 0 1 .375.358q.135.222.135.56 0 .37-.188.656a1.2 1.2 0 0 1-.539.439q-.351.158-.858.158-.381 0-.665-.09a1.4 1.4 0 0 1-.478-.252 1.1 1.1 0 0 1-.29-.375m-2.945-3.358h-.893L1.81 13.37h-.036l-.832-1.438h-.93l1.227 1.983L0 15.931h.861l.853-1.415h.035l.85 1.415h.908L2.253 13.94zm2.727 3.325H4.557v-3.325h-.79v4h2.487z"/>
                            </svg>
                            Exportar tabla actual en XLSX</button>
                        </div>

                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CDN JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<!-- JavaScript para el manejo del formulario y verificación de datos -->
<script>
    // Actualiza el ID del semestre al seleccionar un periodo escolar
    function updateSemestreId() {
        const selectSemestre = document.getElementById('selectSemestre');
        const idSemestre = document.getElementById('idSemestre');
        idSemestre.value = selectSemestre.value;
    }


    // Actualiza las asignaturas al seleccionar un semestre
    function updateAsignaturas() {
        const periodo = document.getElementById('selectPeriodo').value;
        const nombreAsignatura = document.getElementById('nombreAsignatura');

        fetch(`../utils/mod_get_asignaturas.php?periodo=${periodo}`)
            .then(response => response.json())
            .then(data => {
                nombreAsignatura.innerHTML = '';
                data.forEach(asignatura => {
                    const option = document.createElement('option');
                    option.value = asignatura.codigoAsignatura;
                    option.text = asignatura.nombreAsignatura;
                    nombreAsignatura.appendChild(option);
                });
            });
    }

    // Actualiza el nombre de la asignatura al seleccionar una asignatura
    function updateAsignaturaNombre() {
        const codigoAsignatura = document.getElementById('nombreAsignatura').value;
        fetch(`../utils/mod_get_asignatura_nombre.php?codigo=${codigoAsignatura}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('nombreAsignatura').value = data.nombreAsignatura;
                updateGrupos(codigoAsignatura);
            });
    }

    // Actualiza el código de la asignatura al seleccionar un nombre de asignatura
    function updateAsignaturaCodigo() {
        const codigoAsignatura = document.getElementById('nombreAsignatura').value;
        document.getElementById('selectAsignatura').value = codigoAsignatura;
        updateGrupos(codigoAsignatura);
    }

    // Actualiza los grupos al seleccionar una asignatura
    function updateGrupos(codigoAsignatura) {
        const selectGrupo = document.getElementById('selectGrupo');
        fetch(`../utils/mod_get_grupos.php?codigo=${codigoAsignatura}`)
            .then(response => response.json())
            .then(data => {
                selectGrupo.innerHTML = '';
                data.forEach(grupo => {
                    const option = document.createElement('option');
                    option.value = grupo.grupo;
                    option.text = grupo.grupo;
                    selectGrupo.appendChild(option);
                });
            });
    }


    // Busca el ID de Asignatura por Grupo
    function buscarIdAsignaturaPorGrupo() {
        const codigoAsignatura = document.getElementById('selectAsignatura').value;
        const grupo = document.getElementById('selectGrupo').value;
        const idSemestre = document.getElementById('idSemestre').value;

        fetch(`../utils/mod_get_id_asignatura_por_grupo.php?codigo=${codigoAsignatura}&grupo=${grupo}&semestre=${idSemestre}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('idAsignaturaPorGrupo').value = data.idAsignaturaPorGrupo;
                mostrarInfoAsignaturaPorGrupo(data.idAsignaturaPorGrupo);
            });
    }

    // Muestra la información de la Asignatura por Grupo
    function mostrarInfoAsignaturaPorGrupo(idAsignaturaPorGrupo) {
        fetch(`../utils/mod_get_info_asignatura_por_grupo.php?id=${idAsignaturaPorGrupo}`)
            .then(response => response.json())
            .then(data => {
                const infoAsignaturaPorGrupo = document.getElementById('infoAsignaturaPorGrupo');
                infoAsignaturaPorGrupo.innerHTML = `
                    <tr>
                        <td>${data.nombreSemestre}</td>
                        <td>${data.nombreAsignatura}</td>
                        <td>${data.horasSemanales}</td>
                        <td>${data.semestre}</td>
                        <td>${data.grupo}</td>
                        <td>${data.nombreCompleto}</td>
                        <td>${data.horaInicio}</td>
                        <td>${data.horaFin}</td>
                    </tr>
                `;
            });
    }

    // Actualiza el ID del Aula al seleccionar un aula
    $('#addNombreAula').on('change', function() {
        var id = $(this).find(':selected').data('id');
        $('#addIdAula').val(id);
    });

    // Actualiza el ID del Día al seleccionar un día
    $('#addNombreDias').on('change', function() {
        var id = $(this).find(':selected').data('id');
        $('#addIdDias').val(id);
    });

    // Lógica para el botón "Verificar coincidencias y disponibilidad"
    document.getElementById('verificarDisponibilidad').addEventListener('click', function() {
        const selects = document.querySelectorAll('#formCrearHorarios select');
        let allFilled = true;

        // Verifica que todos los campos del formulario estén llenos
        selects.forEach(select => {
            if (!select.value) {
                allFilled = false;
            }
        });

        if (allFilled) {
            const idAsignaturaPorGrupo = document.getElementById('idAsignaturaPorGrupo').value;
            const horasSesion = document.getElementById('horasSesión').value;
            if (idAsignaturaPorGrupo && horasSesion) {
                verificarRangos(idAsignaturaPorGrupo, horasSesion);
                verificarHorasSemanales(idAsignaturaPorGrupo, horasSesion);
            } else {
                alert('Debes buscar la ID de Asignatura por Grupo y seleccionar la duración de la sesión.');
            }
        } else {
            alert('Todos los campos anteriores deben estar llenos.');
        }
    });

    // Verifica los rangos de horario permitidos
    function verificarRangos(idAsignaturaPorGrupo, horasSesion) {
        fetch(`../utils/mod_get_asignatura_info.php?id=${idAsignaturaPorGrupo}`)
            .then(response => response.json())
            .then(data => {
                const turno = data.turno;
                const numeroEmpleado = data.numeroEmpleado;

                fetch(`../utils/mod_get_docente_info.php?id=${numeroEmpleado}`)
                    .then(response => response.json())
                    .then(docenteData => {
                        const turnoDocente = docenteData.turno;

                        let minTime, maxTime;

                        // Determina el rango de horas basado en el turno y horas de sesión
                        if (turno === 'M') {
                            minTime = '07:00';
                            if (horasSesion === '1') maxTime = '14:01';
                            if (horasSesion === '2') maxTime = '13:01';
                            if (horasSesion === '3') maxTime = '12:01';
                        } else if (turno === 'V') {
                            minTime = '12:00';
                            if (horasSesion === '1') maxTime = '20:01';
                            if (horasSesion === '2') maxTime = '19:01';
                            if (horasSesion === '3') maxTime = '18:01';
                        }

                        if (turnoDocente === 'Completo') {
                            minTime = '08:00';
                            if (horasSesion === '1') maxTime = '16:01';
                            if (horasSesion === '2') maxTime = '15:01';
                            if (horasSesion === '3') maxTime = '14:01';
                        }

                        // Establece el rango mínimo y máximo permitido para el input de inicio de clase
                        document.getElementById('InicioDeClase').setAttribute('min', minTime);
                        document.getElementById('InicioDeClase').setAttribute('max', maxTime);
                        document.getElementById('horaRangoAlerta').innerHTML = `El inicio de clase es posible entre las siguientes horas: ${minTime} - ${maxTime}`;
                        document.getElementById('horaRangoAlerta').style.display = 'block';
                        document.getElementById('timeInputs').style.display = 'flex';
                    });
            });
    }

    // Formatear los inputs de tiempo para que solo permitan seleccionar horas completas
    const timeInputs = document.querySelectorAll('#InicioDeClase, #FinDeClase');
    timeInputs.forEach(input => {
        input.addEventListener('change', function() {
            const time = input.value;
            const hours = time.split(':')[0];
            if (input.id === 'InicioDeClase') {
                input.value = `${hours}:01`;
            } else {
                input.value = `${hours}:00`;
            }

            // Validar rango de horas
            const min = input.getAttribute('min');
            const max = input.getAttribute('max');
            if (input.value < min || input.value > max) {
                document.getElementById('horaFueraRangoAlerta').style.display = 'block';
            } else {
                document.getElementById('horaFueraRangoAlerta').style.display = 'none';

                // Calcular la hora de fin de clase
                if (input.id === 'InicioDeClase') {
                    const horasSesion = parseInt(document.getElementById('horasSesión').value);
                    const finDeClase = new Date();
                    finDeClase.setHours(parseInt(hours) + horasSesion);
                    finDeClase.setMinutes(0);
                    document.getElementById('FinDeClase').value = finDeClase.toTimeString().split(' ')[0].slice(0, 5);

                    // Verificar concurrencias y conflictos en la base de datos
                    verificarConcurrencias();
                    verificarConflictosDocente();
                }
            }
        });
    });

    // Verifica las concurrencias de horarios en la base de datos
    function verificarConcurrencias() {
        const idAula = document.getElementById('addIdAula').value;
        const idDias = document.getElementById('addIdDias').value;
        const idSemestre = document.getElementById('idSemestre').value;
        const horaInicioHorario = document.getElementById('InicioDeClase').value;
        const horaFinHorario = document.getElementById('FinDeClase').value;

        fetch(`../utils/mod_verificar_concurrencias.php?idAula=${idAula}&idDias=${idDias}&idSemestre=${idSemestre}&horaInicioHorario=${horaInicioHorario}&horaFinHorario=${horaFinHorario}`)
            .then(response => response.json())
            .then(data => {
                if (data.concurrencia) {
                    document.getElementById('concurrenciaAlerta').style.display = 'block';
                } else {
                    document.getElementById('concurrenciaAlerta').style.display = 'none';
                }

                // Actualizar tabla de asignaciones
                actualizarTablaAsignaciones(idAula, idDias, idSemestre);
            });
    }

    // Actualiza la tabla de asignaciones con los datos obtenidos de la base de datos
    function actualizarTablaAsignaciones(idAula, idDias, idSemestre) {
        fetch(`../utils/mod_get_asignaciones.php?idAula=${idAula}&idDias=${idDias}&idSemestre=${idSemestre}`)
            .then(response => response.json())
            .then(data => {
                const tablaAsignacionesCuerpo = document.getElementById('tablaAsignacionesCuerpo');
                tablaAsignacionesCuerpo.innerHTML = '';

                // Ordenar los datos por hora de inicio
                data.sort((a, b) => a.horaInicioHorario.localeCompare(b.horaInicioHorario));

                // Añadir las filas a la tabla
                data.forEach(asignacion => {
                    const fila = `
                        <tr>
                            <td>${asignacion.idHorario}</td>
                            <td>${asignacion.nombreAula}</td>
                            <td>${asignacion.nombreDias}</td>
                            <td>${asignacion.nombreSemestre}</td>
                            <td>${asignacion.horaInicioHorario}</td>
                            <td>${asignacion.horaFinHorario}</td>
                            <td>${asignacion.nombreAsignatura}</td>
                            <td>${asignacion.semestre}</td>
                            <td>${asignacion.grupo}</td>
                        </tr>
                    `;
                    tablaAsignacionesCuerpo.innerHTML += fila;
                });

                document.getElementById('tablaAsignaciones').style.display = 'block';
            });
    }


    function verificarHorasSemanales(idAsignaturaPorGrupo, horasSesionSeleccionada) {
    fetch(`../utils/mod_get_horas_semanales.php?id=${idAsignaturaPorGrupo}`)
        .then(response => response.json())
        .then(data => {
            const horasTotales = data.horasTotales;
            const horasSemanales = data.horasSemanales;
            const horasSesion = parseInt(horasSesionSeleccionada);
            const totalHoras = horasTotales + horasSesion;
            const count = data.count;

            // Si no existen registros previos en horarios para idAsignaturaPorGrupo, no mostrar alerta
            if (count === 0) {
                document.getElementById('horasSemanalesSobrepasadaAlerta').style.display = 'none';
                document.getElementById('horasSemanalesCompletaAlerta').style.display = 'none';
            } else {
                // Mostrar alertas basadas en las condiciones de horas totales
                if (totalHoras === horasSemanales) {
                    document.getElementById('horasSemanalesCompletaAlerta').style.display = 'block';
                    document.getElementById('horasSemanalesSobrepasadaAlerta').style.display = 'none';
                } else if (totalHoras > horasSemanales) {
                    document.getElementById('horasSemanalesCompletaAlerta').style.display = 'none';
                    document.getElementById('horasSemanalesSobrepasadaAlerta').style.display = 'block';
                } else {
                    document.getElementById('horasSemanalesCompletaAlerta').style.display = 'none';
                    document.getElementById('horasSemanalesSobrepasadaAlerta').style.display = 'none';
                }
            }
        });
}

    // Verifica conflictos de horario del docente
    function verificarConflictosDocente() {
        const idAsignaturaPorGrupo = document.getElementById('idAsignaturaPorGrupo').value;
        const idSemestre = document.getElementById('idSemestre').value;
        const idDias = document.getElementById('addIdDias').value;
        const horaInicioHorario = document.getElementById('InicioDeClase').value;
        const horaFinHorario = document.getElementById('FinDeClase').value;

        fetch(`../utils/mod_verificar_conflictos_docente.php?idAsignaturaPorGrupo=${idAsignaturaPorGrupo}&idSemestre=${idSemestre}&idDias=${idDias}&horaInicioHorario=${horaInicioHorario}&horaFinHorario=${horaFinHorario}`)
            .then(response => response.json())
            .then(data => {
                if (data.conflicto) {
                    document.getElementById('conflictoDocenteAlerta').innerHTML = `El docente ${data.numeroEmpleado} ya tiene una clase asignada para este día en la hora especificada previamente. (Modifica la asignación de horas o dirígete a la tabla asignatura por grupo para modificar la asignación de este profesor para este grupo).`;
                    document.getElementById('conflictoDocenteAlerta').style.display = 'block';
                } else {
                    document.getElementById('conflictoDocenteAlerta').style.display = 'none';
                }
            });
    }

</script>

<!-- Manejo de tabla -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    cargarTablaHorarios();
});

function cargarTablaHorarios(filtros = {}) {
    let url = '../utils/mod_get_horarios.php';
    const params = new URLSearchParams(filtros);

    if (params.toString()) {
        url += '?' + params.toString();
    }

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const tablaHorariosCuerpo = document.getElementById('tablaHorariosCuerpo');
            tablaHorariosCuerpo.innerHTML = '';

            // Ordenar los datos por semestre de forma descendente
            data.sort((a, b) => b.semestre - a.semestre);

            // Añadir las filas a la tabla
            data.forEach(horario => {
                const fila = `
                    <tr>
                        <td>${horario.nombreAsignatura}</td>
                        <td>${horario.semestre}</td>
                        <td>${horario.grupo}</td>
                        <td>${horario.turno}</td>
                        <td>${horario.nombreCompleto}</td>
                        <td>${horario.nombreAula}</td>
                        <td>${horario.nombreDias}</td>
                        <td>${horario.horaInicioHorario}</td>
                        <td>${horario.horaFinHorario}</td>
                        <td>${horario.nombreSemestre}</td>
                        <td><button class="btn btn-danger" onclick="borrarHorario(${horario.idHorario})">Borrar</button></td>
                    </tr>
                `;
                tablaHorariosCuerpo.innerHTML += fila;
            });
        });
}


function aplicarFiltros() {
    const filtros = {
        nombreSemestre: document.getElementById('filtroSemestre').value,
        nombreAula: document.getElementById('filtroAula').value,
        nombreDias: document.getElementById('filtroDia').value,
        grupo: document.getElementById('filtroGrupo').value,
        semestreAsignatura: document.getElementById('filtroSemestreAsignatura').value,
        nombreCompleto: document.getElementById('filtroDocente').value
    };

    // Remover filtros vacíos
    Object.keys(filtros).forEach(key => {
        if (!filtros[key]) {
            delete filtros[key];
        }
    });

    cargarTablaHorarios(filtros);
}



function borrarHorario(idHorario) {
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        fetch(`../utils/mod_delete_horario.php?id=${idHorario}`, {
            method: 'DELETE'
        })
        .then(response => response.text())
        .then(data => {
            alert("Registro eliminado");
            aplicarFiltros(); // Recargar la tabla con los filtros aplicados
        });
    } else {
        alert("Eliminación cancelada");
    }
}

function exportarTablaXLSX() {
    const tabla = document.getElementById('tablaHorariosCuerpo');
    const wb = XLSX.utils.book_new();
    const ws_data = [];

    // Obtener los encabezados de la tabla
    const headers = Array.from(tabla.closest('table').querySelectorAll('thead th')).map(th => th.innerText);
    ws_data.push(headers);

    // Obtener las filas de la tabla
    Array.from(tabla.querySelectorAll('tr')).forEach(row => {
        const rowData = Array.from(row.querySelectorAll('td')).map(td => td.innerText);
        ws_data.push(rowData);
    });

    // Crear la hoja de cálculo
    const ws = XLSX.utils.aoa_to_sheet(ws_data);
    XLSX.utils.book_append_sheet(wb, ws, "Horarios");

    // Generar el archivo XLSX y descargarlo
    XLSX.writeFile(wb, 'horario.xlsx');
}

</script>

</body>
</html>
