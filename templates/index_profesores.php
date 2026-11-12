<?php
include '../utils/db_conexion.php';
?>

<!-- index.php -->
<?php include 'header.php'; ?>

<!-- #########   CUERPO DEL SISTEMA (ACORDEON)   ######### -->

<div class="accordion p-3" id="accordionProfesores">


    <!-- TARGETA 1  Información DE Docentes -->
    <div class="accordion-item" id="informacionDocentes">
        
        <h2 class="accordion-header">
            <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#informacionDocentesContenido" aria-expanded="false" aria-controls="informacionDocentesContenido">
                <strong>Información general del docente</strong>    
            </button>
        </h2>

        <div id="informacionDocentesContenido" class="accordion-collapse collapse">
            <!-- Contenido de la targeta -->
            <div class="accordion-body">
                <!-- Button trigger modal -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#informacionDocentesForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                        </svg> <strong>Agregar nuevo Docente</strong>
                    </button>
                </div>

                <!-- Modal AGREGAR Información De Docentes  -->
                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="informacionDocentesForm" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="informacionDocentesFormLabel">Agregar Docente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="../utils/db_profesor.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="numeroEmpleado" class="form-label"><strong>Número de Empleado</strong></label>
                                            <input type="text" class="form-control" name="numeroEmpleado"
                                                id="numeroEmpleado" placeholder="Identificador único">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nombreCompleto" class="form-label"><strong>Nombre completo del Docente</strong></label>
                                            <input type="text" class="form-control" name="nombreCompleto"
                                                id="nombreCompleto" placeholder="Nombre comenzando con apellidos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="gradoAcademico" class="form-label"><strong>Grado Académico</strong></label>
                                            <input type="text" class="form-control" name="gradoAcademico"
                                                id="gradoAcademico" placeholder="Grado Académico del Docente">
                                            <br>
                                            <input type="text" class="form-control" name="gradoAcademico2"
                                                id="gradoAcademico2"
                                                placeholder="Segundo grado académico del Docente (Opcional)">
                                            <br>
                                        </div>
                                        <label class="form-label"><strong>¿El Docente es miembro del Sindicalizado?</strong></label>
                                        <select class="form-select" name="sindicalizado" id="sindicalizado" aria-label="sindicalizado">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        <br>
                                        <div class="col-12">
                                            <fieldset class="mb-3">
                                                <label class="form-label"><strong>Estado de contratación</strong></label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="estado"
                                                            id="estadoActivo" value="Activo" checked>
                                                        <label class="form-check-label"
                                                            for="estadoActivo">Activo</label>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="guardarInformacionDocentesForm"
                                            class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal EDITAR Información De Docentes  -->
                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="editarDocenteModal" tabindex="-1"
                        aria-labelledby="editarDocenteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarDocenteModalLabel">Editar Docente</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="../utils/db_profesorGuardarEdicion.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="editarNumeroEmpleado" class="form-label"><strong>Número de
                                                    Empleado</strong></label>
                                            <input type="text" class="form-control" name="numeroEmpleado"
                                                id="editarNumeroEmpleado" placeholder="Identificador único" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarNombreCompleto" class="form-label"><strong>Nombre Completo del Docente</strong></label>
                                            <input type="text" class="form-control" name="nombreCompleto"
                                                id="editarNombreCompleto" placeholder="Nombre comenzando con apellidos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarGradoAcademico" class="form-label"><strong>Grado Académico</strong></label>
                                            <input type="text" class="form-control" name="gradoAcademico"
                                                id="editarGradoAcademico" placeholder="Grado Académico del Docente">
                                            <br>
                                            <input type="text" class="form-control" name="gradoAcademico2"
                                                id="editarGradoAcademico2"
                                                placeholder="Segundo grado académico del Docente (Opcional)">
                                            <br>
                                        </div>
                                        <label class="form-label"><strong>¿El Docente es miembro del Sindicalizado?</strong></label>
                                        <select class="form-select" name="sindicalizado" id="editarSindicalizado"
                                            aria-label="sindicalizado">
                                            <option value="0">No</option>
                                            <option value="1">Sí</option>
                                        </select>
                                        <br>
                                        <div class="col-12">
                                            <fieldset class="mb-3">
                                                <label class="form-label"><strong>Estado de contratación</strong></label>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="estado"
                                                            id="editarEstadoActivo" value="Activo">
                                                        <label class="form-check-label"
                                                            for="editarEstadoActivo">Activo</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="estado"
                                                            id="editarEstadoJubilado" value="Jubilado">
                                                        <label class="form-check-label"
                                                            for="editarEstadoJubilado">Jubilado</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="estado"
                                                            id="editarEstadoDespedido" value="Despedido">
                                                        <label class="form-check-label"
                                                            for="editarEstadoDespedido">Despedido</label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="estado" id="editarEstadoAusente" value="Ausente">
                                                        <label class="form-check-label" for="editarEstadoAusente">Ausente Temporal</label>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" id="guardarEdicionDocente"
                                            class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FILTRO: TABLA INFORMACION DOCENTES  -->
                <br><br>
                <div class="row mb-3">
                    <div class="col">
                        <select id="estadoSelect" class="form-select">
                            <?php
                            $query = "SELECT DISTINCT estado FROM docente";
                            $result = mysqli_query($conn, $query);
                            echo "<option value=''>Mostrar todos los Docentes</option>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['estado'] . "'>" . $row['estado'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <button class="btn btn-secondary" id="filterButton">Aplicar filtro por Estado de Contrato</button>
                    </div>
                </div>

                <!-- TABLA INFROMACION DOCENTES -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre Docenteo</th>
                            <th scope="col">Grado Académico</th>
                            <th scope="col">Grado Académico</th>
                            <th scope="col">¿Sindicalizado?</th>
                            <th scope="col">Estado de Contrato</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="docentesTableBody">
                        <?php
                        $query = "SELECT * FROM docente";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $row["numeroEmpleado"] . "</th>";;
                            echo "<td>" . $row['nombreCompleto'] . "</td>";
                            echo "<td>" . $row['gradoAcademico'] . "</td>";
                            echo "<td>" . $row['gradoAcademico2'] . "</td>";
                            echo "<td>" . ($row["sindicalizado"] ? "Sí" : "No") . "</td>";
                            echo "<td>" . $row["estado"] . "</td>";
                            echo "<td>
                                    <button class='btn btn-warning editarDocenteBtn' data-bs-toggle='modal' data-bs-target='#editarDocenteModal' data-id='" . $row["numeroEmpleado"] . "'>Editar</button>
                                </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                
           
            </div>
        </div>
    </div>


    <!-- TARGETA 2  Disponibilidad DE Docentes -->
    <div class="accordion-item" id="disponibilidadDeDocentes">

        <h2 class="accordion-header">
            <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#disponibilidadDeDocentesContenido" aria-expanded="false" aria-controls="disponibilidadDeDocentesContenido" >
                <strong>Horarios de disponibilidad del docente</strong>
            </button>
        </h2>

        <div id="disponibilidadDeDocentesContenido" class="accordion-collapse collapse">
            <div class="accordion-body">
                <!-- Boton de agregar Disponibilidad -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#disponibilidadDocentesForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg> <strong>Asignar disponibilidad a docente</strong>
                    </button>
                </div>

                <!-- Modal AGREGAR Disponibilidad  De Docentes  -->
                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="disponibilidadDocentesForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="disponibilidadDocentesFormLabel">Asignar Disponibilidad</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <!-- Formulario para agregar disponibilidad del docente -->
                                    <form action="../utils/dispr_profesorDisponibilidad.php" method="POST" id="disponibilidadForm">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="numeroEmpleadoDisp" class="form-label">
                                                    <strong>Introduce el "Número de Empleado" para buscar.</strong>
                                                <span class="badge text-bg-warning">Si el docente aún no tiene Número, registralo en la pestaña anterior</span>
                                                </label>
                                                
                                                <br>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="numeroEmpleadoDisp" name="numeroEmpleadoDisp">
                                                    <button type="button" class="btn btn-primary" id="buscarNumeroEmpleado">Buscar</button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombreCompletoDisp" class="form-label"><strong>Nombre Completo del Docente</strong></label>
                                                <input type="text" class="form-control" id="nombreCompletoDisp" name="nombreCompletoDisp" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="turnoAsig" class="form-label">
                                                    <strong>Turno</strong>
                                                    <span class="badge text-bg-warning"> Determina el rango de horas de disponibilidad</span>
                                                </label>
                                                <select class="form-select" id="turnoAsig" name="turno">
                                                    <option value="" selected disabled>Seleccione un turno</option>
                                                    <option value="No establecido">No establecido</option>
                                                    <option value="Completo">Completo</option>                                        
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="horaInicioAsig" class="form-label"><strong>Hora de Entrada</strong></label>
                                                    <input type="time" class="form-control" name="horaInicio" id="horaInicioAsig" readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="horaFinAsig" class="form-label"><strong>Hora de Salida</strong></label>
                                                    <input type="time" class="form-control" name="horaFin" id="horaFinAsig" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" id="guardarDisponibilidadForm" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TABLA de Disponibilidad de Docentes -->
                <br>
                <table class="table table-bordered">
                    <thead class="table">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre del Docente</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Hora de entrada</th>
                            <th scope="col">Hora de salida</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT dd.idDisponibilidad, d.nombreCompleto, dd.turno, dd.horaInicio, dd.horaFin
                                FROM docenteDisponibilidad dd
                                JOIN docente d ON dd.numeroEmpleado = d.numeroEmpleado
                                WHERE d.estado = 'Activo'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $row["idDisponibilidad"] . "</th>";
                                echo "<td>" . $row["nombreCompleto"] . "</td>";
                                echo "<td>" . $row["turno"] . "</td>";
                                echo "<td>" . $row["horaInicio"] . "</td>";
                                echo "<td>" . $row["horaFin"] . "</td>";
                                echo "<td>
                                        <button class='btn btn-warning editarDisponibilidadBtn' data-bs-toggle='modal' data-bs-target='#editarDisponibilidadModal' data-id='" . $row["idDisponibilidad"] . "'>Editar</button>
                                        <a href='../utils/dispr_profesorBorrarDisponibilidad.php?idDisponibilidad=" . $row["idDisponibilidad"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar este registro?\");'>Borrar</a>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No hay registros disponibles</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <!-- Modal EDITAR Disponibilidad De Docentes  -->
                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="editarDisponibilidadModal" tabindex="-1"
                        aria-labelledby="editarDisponibilidadModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarDisponibilidadModalLabel">Editar Disponibilidad</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../utils/dispr_profesorGuardarDisponibilidadEdicion.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="idDisponibilidad" id="editarIdDisponibilidad">
                                        <div class="mb-3">
                                            <label for="editarNumeroEmpleadoDisp" class="form-label"><strong>Número de Empleado</strong></label>
                                            <input type="text" class="form-control" name="numeroEmpleado" id="editarNumeroEmpleadoDisp" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarNombreCompletoDisp" class="form-label"><strong>Nombre Completo</strong></label>
                                            <input type="text" class="form-control" name="nombreCompleto" id="editarNombreCompletoDisp" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarTurno" class="form-label">
                                                <strong>Turno</strong>
                                                <span class="badge text-bg-warning"> Determina el rango de horas de disponibilidad</span></label>
                                            <select class="form-select" id="editarTurno" name="turno">
                                                <option value="No establecido">No establecido</option>
                                                <option value="Completo">Completo</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="editarHoraInicio" class="form-label"><strong>Hora de Entrada</strong></label>
                                                <input type="time" class="form-control" name="horaInicio" id="editarHoraInicio">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="editarHoraFin" class="form-label"><strong>Hora de Salida</strong></label>
                                                <input type="time" class="form-control" name="horaFin" id="editarHoraFin">
                                            </div>
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
                </div>

            </div>
        </div>
    
    </div>


    <!-- TARGETA 3  Asignacion/Titular de Docencia -->
    <div class="accordion-item" id="asignacionDocente">

        <h2 class="accordion-header">
            <button class="accordion-button collapsed bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#asignacionDocenteContenido" aria-expanded="false" aria-controls="asignacionDocenteContenido">
                <strong>Asignación de asignaturas por docente. (Asignación/Titular)</strong>
            </button>
        </h2>

        <div id="asignacionDocenteContenido" class="accordion-collapse collapse">

            <div class="accordion-body">
                                 
                <!-- Asignacion de docencia BOTON -->  
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"data-bs-target="#editarTitularAsignacionForm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/>
                        </svg> <strong>Establecer asignación a docente</strong>
                    </button>
                </div>

                <br>

                <!-- Asignacion de docencia MODAL -->
                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="editarTitularAsignacionForm" tabindex="-1" aria-labelledby="editarTitularAsignacionModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarTitularAsignacionModalLabel">Editar Asignación de Asignaturas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                    <form action="../utils/titas_guardar_asignaciones.php" method="POST" id="asignacionForm">

                                        <div class="modal-body">

                                                                <div class="mb-3">
                                                                    <label for="numeroEmpleadoDispA" class="form-label"><strong>Introduce el "Número de Empleado" para busquedar</strong></label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" id="numeroEmpleadoDispA" name="numeroEmpleadoDispA">
                                                                        <button type="button" class="btn btn-primary" id="buscarNumeroEmpleadoA">Buscar</button>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label for="nombreCompletoDispA" class="form-label"><strong>Nombre Completo del Doncente</strong></label>
                                                                    <input type="text" class="form-control" id="nombreCompletoDispA" name="nombreCompletoDispA" readonly>
                                                                </div><br>


                                                                <div class="mb-3">
                                                                    <label for="codigoAsignatura" class="form-label">
                                                                        <strong>Asignatura</strong>
                                                                        <span class="badge text-bg-warning">Si la Asignatura no esta listada, agregue sus datos en el menú 'Asignaturas'</span>
                                                                    </label>
                                                                    <select class="form-select" id="codigoAsignatura" name="codigoAsignatura" required>
                                                                        <option value="" selected disabled>Seleccione una asignatura</option>
                                                                        <?php

                                                                        // Obtener asignaturas
                                                                        $sqlAsignaturas = "SELECT codigoAsignatura, nombreAsignatura FROM asignaturas";
                                                                        $resultAsignaturas = $conn->query($sqlAsignaturas);

                                                                        if ($resultAsignaturas->num_rows > 0) {
                                                                            while ($rowAsignatura = $resultAsignaturas->fetch_assoc()) {
                                                                                echo "<option value='" . $rowAsignatura['codigoAsignatura'] . "'>" . $rowAsignatura['nombreAsignatura'] . "</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <!-- AQUI SE AGREGA EL form-select  -->

                                                                <div class="mb-3">
                                                                    <label for="tipoAsignacion" class="form-label"><strong>Tipo de Asignación</strong></label>
                                                                    <select class="form-select" id="tipoAsignacion" name="tipoAsignacion">
                                                                        <option value="" selected disabled>Seleccione un tipo de asignación</option>
                                                                        <option value="Titular">Titular</option>
                                                                        <option value="Asignación">Asignación</option>
                                                                    </select>
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
                </div>

                <!-- Asignacion de docencia TABLA -->  
                                        
                <table class="table table-bordered">
                    <thead class="table">
                        <tr>
                            <th scope="col">Número Docente</th>
                            <th scope="col">Código Asignatura</th>
                            <th scope="col">Asignatura</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Nombre del Docente</th>
                            <th scope="col">Tipo de Asignación</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT di.numeroEmpleado, di.codigoAsignatura, a.nombreAsignatura, a.semestre, d.nombreCompleto, di.tipoAsignacion
                            FROM docenteImparte di
                            JOIN asignaturas a ON di.codigoAsignatura = a.codigoAsignatura
                            JOIN docente d ON di.numeroEmpleado = d.numeroEmpleado
                            WHERE d.estado = 'Activo'
                            ORDER BY d.nombreCompleto ASC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['numeroEmpleado'] . "</td>";
                                    echo "<td>" . $row['codigoAsignatura'] . "</td>";
                                    echo "<td>" . $row['nombreAsignatura'] . "</td>";
                                    echo "<td>" . $row['semestre'] . "</td>";
                                    echo "<td>" . $row['nombreCompleto'] . "</td>";
                                    echo "<td>" . $row['tipoAsignacion'] . "</td>";
                                    
                                    echo "<td>                                                            
                                            <form action='../utils/titas_borrar_asignacion.php' method='POST' style='display:inline-block;'>
                                                <input type='hidden' name='numeroEmpleado' value='" . $row['numeroEmpleado'] . "'>
                                                <input type='hidden' name='codigoAsignatura' value='" . $row['codigoAsignatura'] . "'>
                                                <button type='submit' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar esta asignación?\");'>Borrar</button>
                                            </form>
                                        </td>";
                                    echo "</tr>";
                                }
                                } else {
                                    echo "<tr><td colspan='6'>No hay registros disponibles</td></tr>";
                                }
                        ?>
                    </tbody>
                </table>   

            </div>       
        </div>

    </div>

</div>

<!-- Bootstrap CDN JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

<!-- JS PARA EDITAR INFORMACION DE DOCENTE-->
<script>
    $(document).ready(function () {
        $('.editarDocenteBtn').on('click', function () {
            var numeroEmpleado = $(this).data('id');

            $.ajax({
                url: '../utils/db_profesorEditar.php',
                type: 'GET',
                data: { numeroEmpleado: numeroEmpleado },
                success: function (response) {
                    var docente = JSON.parse(response);

                    if (docente.error) {
                        alert(docente.error);
                    } else {
                        $('#editarNumeroEmpleado').val(docente.numeroEmpleado);
                        $('#editarNombreCompleto').val(docente.nombreCompleto);
                        $('#editarGradoAcademico').val(docente.gradoAcademico);
                        $('#editarGradoAcademico2').val(docente.gradoAcademico2);
                        if (docente.estado == 'Activo') {
                            $('#editarEstadoActivo').prop('checked', true);
                        } else if (docente.estado == 'Jubilado') {
                            $('#editarEstadoJubilado').prop('checked', true);
                        } else if (docente.estado == 'Despedido'){
                            $('#editarEstadoDespedido').prop('checked', true);
                        }else {
                            $('#editarEstadoAusente').prop('checked', true);
                        }

                        $('#editarSindicalizado').val(docente.sindicalizado);
                    }
                }
            });
        });

        $('#buscarNumeroEmpleado').on('click', function () {
            var numeroEmpleado = $('#numeroEmpleadoDisp').val();

            $.ajax({
                url: '../utils/dispr_buscarDocente.php',
                type: 'GET',
                data: { numeroEmpleado: numeroEmpleado },
                success: function (response) {
                    var docente = JSON.parse(response);

                    if (docente.error) {
                        alert(docente.error);
                    } else {
                        $('#nombreCompletoDisp').val(docente.nombreCompleto);
                    }
                }
            });
        });    
    });
</script>

<!-- JS PARA EDITAR DISPONIBILIDAD DE DOCENTE-->
<script>
    $(document).ready(function () {
        $('.editarDisponibilidadBtn').on('click', function () {
            var idDisponibilidad = $(this).data('id');

            $.ajax({
                url: '../utils/dispr_profesorBuscarDisponibilidad.php',
                type: 'GET',
                data: { idDisponibilidad: idDisponibilidad },
                success: function (response) {
                    var disponibilidad = JSON.parse(response);

                    if (disponibilidad.error) {
                        alert(disponibilidad.error);
                    } else {
                        $('#editarIdDisponibilidad').val(disponibilidad.idDisponibilidad);
                        $('#editarNumeroEmpleadoDisp').val(disponibilidad.numeroEmpleado);
                        $('#editarNombreCompletoDisp').val(disponibilidad.nombreCompleto);
                        $('#editarTurno').val(disponibilidad.turno);
                        $('#editarHoraInicio').val(disponibilidad.horaInicio);
                        $('#editarHoraFin').val(disponibilidad.horaFin);
                    }
                }
            });
        });
    });
</script>

<!-- JS PARA EDITAR LAS ASIGNACIONES (ASIGNACION/TITUALAR) DE DOCENTE-->
<script>
    $(document).ready(function() {
        // Lógica para asignacionForm
        $('#numAsignaciones').on('change', function() {
            var numAsignaciones = $(this).val();
            $('.form-select-container').each(function(index) {
                if (index < numAsignaciones) {
                    $(this).removeClass('d-none');
                } else {
                    $(this).addClass('d-none');
                }
            });
        });

        // Búsqueda del nombre del docente para asignacionForm
        $('#buscarNumeroEmpleadoA').on('click', function() {
            var numeroEmpleado = $('#numeroEmpleadoDispA').val();

            $.ajax({
                url: '../utils/dispr_buscarDocente.php',
                type: 'GET',
                data: { numeroEmpleado: numeroEmpleado },
                success: function(response) {
                    var docente = JSON.parse(response);

                    if (docente.error) {
                        alert(docente.error);
                    } else {
                        $('#nombreCompletoDispA').val(docente.nombreCompleto);
                    }
                }
            });
        });
    });
</script>

<!-- JS PARA FORMATEAR HORA Y INICIO Y FIN DE DISPONIBILIDAD EN TURNO COMPLETO O NO ESTABLECIDO-->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const turnoAsig = document.getElementById('turnoAsig');
        const horaInicioAsig = document.getElementById('horaInicioAsig');
        const horaFinAsig = document.getElementById('horaFinAsig');

        turnoAsig.addEventListener('change', (event) => {
            if (event.target.value === 'No establecido') {
                horaInicioAsig.value = '07:00';
                horaFinAsig.value = '20:00';
            } else if (event.target.value === 'Completo') {
                horaInicioAsig.value = '08:00';
                horaFinAsig.value = '17:00';
            }
        });
    });
</script>

<!-- JS PARA APLICAR FILTROS -->
<script>
document.getElementById('filterButton').addEventListener('click', function() {
    var selectedEstado = document.getElementById('estadoSelect').value;
    var rows = document.querySelectorAll('#docentesTableBody tr');
    rows.forEach(function(row) {
        if (selectedEstado === "" || row.cells[5].innerText === selectedEstado) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>

</body>
</html>

