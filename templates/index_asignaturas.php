<?php
include '../utils/db_conexion.php';
?>


<!-- index.php -->
<?php include 'header.php'; ?>

    <!-- cuerpo del sistema  -->
    <div class="accordion p-3" id="accordionAsignaturas">

        <!-- TARJETA 1   -->
        <div class="accordion-item">

            <h2 class="accordion-header">
                <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#informacionGeneralAsignaturas" aria-expanded="true" aria-controls="informacionGeneralAsignaturas">
                <strong>Información general de la asignatura</strong>
                </button>
            </h2>

            <div id="informacionGeneralAsignaturas" class="accordion-collapse collapse">
                <div class="accordion-body">

                <!--Boton para agregar Asignatura -->

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#informacionAsignaturas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-journal-code" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.646 5.646a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L10.293 8 8.646 6.354a.5.5 0 0 1 0-.708m-1.292 0a.5.5 0 0 0-.708 0l-2 2a.5.5 0 0 0 0 .708l2 2a.5.5 0 0 0 .708-.708L5.707 8l1.647-1.646a.5.5 0 0 0 0-.708" />
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                    </svg> <strong>Agregar Asignatura</strong>
                    </button>
                </div>
                <br>


                <!-- Modal AGREGAR Información De Asignaturas  -->

                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="informacionAsignaturas" tabindex="-1"
                    aria-labelledby="informacionAsignaturasLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="informacionAsignaturasLabel">Agregar Asignatura</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="../utils/asig_guardarAsignatura.php" method="POST">
                            <div class="modal-body">
                            <div class="mb-3">
                                <label for="codigoAsignatura" class="form-label"><strong>Código de Asignatura</strong></label>
                                <input type="text" class="form-control" name="codigoAsignatura" id="codigoAsignatura"placeholder="Código único">
                            </div>
                            <div class="mb-3">
                                <label for="nombreAsignatura" class="form-label"><strong>Nombre de Asignatura</strong></label>
                                <input type="text" class="form-control" name="nombreAsignatura" id="nombreAsignatura"placeholder="Nombre de la Asignatura">
                            </div>
                            <div class="mb-3">
                                <label for="semestre" class="form-label"><strong>Semestre</strong></label>
                                <select class="form-select" name="semestre" id="semestre">
                                <option value="" selected disabled>Seleccione un semestre</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="creditos" class="form-label"><strong>Créditos</strong></label>
                                <input type="number" step="0.1" class="form-control" name="creditos" id="creditos"
                                placeholder="Número de créditos">
                            </div>
                            <div class="mb-3">
                                <label for="academia" class="form-label"><strong>Academia</strong></label>
                                <input type="text" class="form-control" name="academia" id="academia" placeholder="Academia">
                            </div>
                            <div class="mb-3">
                                <label for="nucleoDeFormacion" class="form-label"><strong>Núcleo de Formación</strong></label>
                                <select class="form-select" name="nucleoDeFormacion" id="nucleoDeFormacion">
                                <option value="" selected disabled>Seleccione un nucleo de formación</option>
                                <option value="Básico">Básico</option>
                                <option value="Profesional">Profesional</option>
                                <option value="Terminal y de integración">Terminal y de integración</option>
                                <option value="Complementario">Complementario</option>
                                <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="optativa" class="form-label"><strong>¿Optativa?</strong></label>
                                <select class="form-select" name="optativa" id="optativa">
                                <option value="0">No</option>
                                <option value="1">Si</option>
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


                <!-- TABLA de Asignaturas -->


                <div class="row mb-3">
                    <div class="col-md-6">
                        <select id="semestreSelect" class="form-select">
                            <?php
                            $query = "SELECT DISTINCT semestre FROM asignaturas ORDER BY semestre  ASC";
                            $result = mysqli_query($conn, $query);
                             echo "<option value=''>Mostrar todos los semestres</option>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['semestre'] . "'>" . $row['semestre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary" id="filterAsignaturasButton">Aplicar Filtro por Semestre</button>
                    </div>
                </div>



                <table class="table table-bordered">
                    <thead class="table">
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre de Asignatura</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Créditos</th>
                            <th scope="col">Academia</th>
                            <th scope="col">Núcleo de formación</th>
                            <th scope="col">¿Es optativa?</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody id="asignaturasTableBody">
                        <?php
                        $sql = "SELECT * FROM asignaturas";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["codigoAsignatura"] . "</td>";
                                echo "<td>" . $row["nombreAsignatura"] . "</td>";
                                echo "<td>" . $row["semestre"] . "</td>";
                                echo "<td>" . $row["creditos"] . "</td>";
                                echo "<td>" . $row["academia"] . "</td>";
                                echo "<td>" . $row["nucleoDeFormacion"] . "</td>";
                                echo "<td>" . ($row["optativa"] ? "Sí" : "No") . "</td>";
                                echo "<td>
                                        <button class='btn btn-warning editarAsignaturaBtn' data-bs-toggle='modal' data-bs-target='#editarAsignaturaModal' data-id='" . $row["codigoAsignatura"] . "'>Editar</button>
                                        </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No hay registros disponibles</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>


                <!-- Modal EDITAR Asignatura -->

                <div class="modal-dialog modal-xl">
                    <div class="modal fade" id="editarAsignaturaModal" tabindex="-1" aria-labelledby="editarAsignaturaModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editarAsignaturaModalLabel">Editar Asignatura</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../utils/asig_guardarEdicionAsignatura.php" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="editarCodigoAsignatura" class="form-label"><strong>Código de Asignatura</strong></label>
                                            <input type="text" class="form-control" name="codigoAsignatura" id="editarCodigoAsignatura" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarNombreAsignatura" class="form-label"><strong>Nombre de Asignatura</strong></label>
                                            <input type="text" class="form-control" name="nombreAsignatura" id="editarNombreAsignatura">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarSemestre" class="form-label">
                                                <strong>Semestre</strong>
                                                <span class="badge text-bg-warning">No editar si ya has asignado a un Docente o Grupo esta Asignatura</span>
                                            </label>
                                            <select class="form-select" name="semestre" id="editarSemestre">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarCreditos" class="form-label"><strong>Créditos</strong></label>
                                            <input type="number" step="0.1" class="form-control" name="creditos" id="editarCreditos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarAcademia" class="form-label"><strong>Academia</strong></label>
                                            <input type="text" class="form-control" name="academia" id="editarAcademia">
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarNucleoDeFormacion" class="form-label"><strong>Núcleo de Formación</strong></label>
                                            <select class="form-select" name="nucleoDeFormacion" id="editarNucleoDeFormacion">
                                                <option value="Básico">Básico</option>
                                                <option value="Profesional">Profesional</option>
                                                <option value="Terminal y de integración">Terminal y de integración</option>
                                                <option value="Complementario">Complementario</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editarOptativa" class="form-label"><strong>Optativa</strong></label>
                                            <select class="form-select" name="optativa" id="editarOptativa">
                                                <option value="1">Sí</option>
                                                <option value="0">No</option>
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

                </div>
            </div>

        </div>


        <!-- TARJETA 2   -->

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#informacionGrupoAsignaturas" aria-expanded="false" aria-controls="informacionGrupoAsignaturas">
                <strong>Asignaturas por grupo</strong>
                </button>
            </h2>
            <div id="informacionGrupoAsignaturas" class="accordion-collapse">
                <div class="accordion-body">

                    <!-- Modal/Boton AGREGAR Asignatura por grupo -->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#grupoAsignaturasModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg> <strong>Agregar Asignatura por Grupo</strong>
                        </button>
                    </div>
               
                    <div class="modal-dialog modal-xl">
                            <div class="modal fade" id="grupoAsignaturasModal" tabindex="-1" aria-labelledby="grupoAsignaturasModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="grupoAsignaturasModalLabel">Editar Asignatura</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <form action="../utils/grup_AsignaturasGrupo.php" method="POST" id="formAsignaturaGrupo">
                                            <div class="modal-body">
                                                <!-- Asignatura -->
                                                <div class="row">
                                                    <div class="col-md-6 mb-3" style="width: 70%;">
                                                        <label for="nombreAsignaturaG" class="form-label"><strong>Nombre de Asignatura</strong></label>
                                                        <select class="form-select" id="nombreAsignaturaG" name="nombreAsignatura">
                                                            <option value="" selected disabled>Seleccione el nombre de la asignatura</option>
                                                            <?php
                                                            $sql = "SELECT DISTINCT a.codigoAsignatura, a.nombreAsignatura 
                                                                    FROM asignaturas a
                                                                    JOIN docenteImparte di ON a.codigoAsignatura = di.codigoAsignatura
                                                                    JOIN docente d ON di.numeroEmpleado = d.numeroEmpleado
                                                                    WHERE d.estado = 'Activo'
                                                                    ORDER BY a.nombreAsignatura ASC";
                                                            $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='{$row['codigoAsignatura']}' data-id='{$row['codigoAsignatura']}'>{$row['nombreAsignatura']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6 mb-3" style="width: 28%;">
                                                        <label for="codigoAsignaturaG" class="form-label"><strong>Código</strong></label>
                                                        <input type="text" class="form-control" id="codigoAsignaturaG" name="codigoAsignatura" readonly>
                                                    </div>

                                                </div>

                                                <!-- Docente -->
                                                <div class="row">
                                                    <div class="col-md-6 mb-3" style="width: 70%;">
                                                        <label for="numeroEmpleadoG" class="form-label"><strong>Nombre del Docente</strong></label>
                                                        <select class="form-select" id="numeroEmpleadoG" name="nombreCompleto">
                                                            <option value="" selected disabled>Seleccione el nombre del docente</option>
                                                            <?php
                                                            $sql = "SELECT DISTINCT d.numeroEmpleado, d.nombreCompleto 
                                                                    FROM docente d
                                                                    JOIN docenteImparte di ON d.numeroEmpleado = di.numeroEmpleado
                                                                    WHERE d.estado = 'Activo'";
                                                            $result = $conn->query($sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                echo "<option value='{$row['numeroEmpleado']}' data-id='{$row['numeroEmpleado']}'>{$row['nombreCompleto']}</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>


                                                    <div class="col-md-6 mb-3" style="width: 28%;">
                                                        <label for="numeroEmpleadoTextG" class="form-label"><strong>Número</strong></label>
                                                        <input type="text" class="form-control" id="numeroEmpleadoTextG" name="numeroEmpleado" readonly>
                                                    </div>
                                                    
                                                </div>

                                                <!-- Tipo de Asignación -->
                                                <div class="mb-3">
                                                    <label for="tipoAsignacionG" class="form-label"><strong>Tipo de Asignación</strong></label>
                                                    <input type="text" class="form-control" id="tipoAsignacionG" name="tipoAsignacion" readonly>
                                                </div>

                                                <!-- Grupo -->
                                                <div class="mb-3">
                                                    <label for="grupo" class="form-label">
                                                        <strong>Grupo</strong>
                                                        <span class="badge text-bg-warning">Alumnos a los que se impartirá la asingnatura. ('X' es para Optativas)</span>   
                                                    </label>
                                                    <select class="form-select" id="grupo" name="grupo">
                                                        <option value="" selected disabled>Seleccione el grupo</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="X">X</option>
                                                    </select>
                                                </div>

                                                <!-- Horas Semanales -->
                                                <div class="mb-3">
                                                    <label for="horasSemanales" class="form-label">
                                                        <strong>Horas Semanales</strong>
                                                        <span class="badge text-bg-warning">Total de horas de esta asignatura (no sesiones)</span>                                  
                                                    </label>
                                                    <input type="number" class="form-control" id="horasSemanales" name="horasSemanales" min="1" max="14" step="1" required>
                                                </div>

                                                <!-- Turno -->
                                                <div class="mb-3">
                                                    <label for="turno" class="form-label">
                                                        <strong>Turno</strong>
                                                        <span class="badge text-bg-warning">7:00 a 3:00 es M y 12:00 a 8:00 es V</span> 
                                                    </label>
                                                    <select class="form-select" id="turno" name="turno">
                                                        <option value="" selected disabled>Seleccione el turno</option>
                                                        <option value="M">M</option>
                                                        <option value="V">V</option>
                                                    </select>
                                                </div>

                                                <!-- Semestre -->
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nombreSemestre" class="form-label"><strong>Periodo escolar</strong></label>
                                                        <select class="form-select" id="nombreSemestre" name="nombreSemestre">
                                                            <option value="" selected disabled>Seleccione el periodo</option>
                                                            <?php
                                                                $sql = "SELECT idSemestre, nombreSemestre FROM semestres";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='{$row['idSemestre']}' data-id='{$row['idSemestre']}'>{$row['nombreSemestre']}</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="idSemestre" class="form-label"><strong>ID del Semestre</strong></label>
                                                        <input type="text" class="form-control" id="idSemestre" name="idSemestre" readonly>
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

                    <!-- Tabla de Asignaturas por Grupo -->
                    <table class="table mt-4 table-bordered">
                        <thead class="table">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Horas Semanales</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT apg.idAsignaturaPorGrupo, a.nombreAsignatura, d.nombreCompleto, a.semestre, apg.grupo, apg.horasSemanales, apg.turno, s.nombreSemestre 
                                    FROM asignaturaPorGrupo apg
                                    JOIN asignaturas a ON apg.codigoAsignatura = a.codigoAsignatura
                                    JOIN docente d ON apg.numeroEmpleado = d.numeroEmpleado
                                    JOIN semestres s ON apg.idSemestre = s.idSemestre";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["idAsignaturaPorGrupo"] . "</td>";
                                    echo "<td>" . $row["nombreAsignatura"] . "</td>";
                                    echo "<td>" . $row["nombreCompleto"] . "</td>";
                                    echo "<td>" . $row["semestre"] . "</td>";
                                    echo "<td>" . $row["grupo"] . "</td>";
                                    echo "<td>" . $row["horasSemanales"] . "</td>";
                                    echo "<td>" . $row["turno"] . "</td>";
                                    echo "<td>" . $row["nombreSemestre"] . "</td>";
                                    echo "<td>
                                            <button class='btn btn-warning editarAsignaturaGrupoBtn' data-bs-toggle='modal' data-bs-target='#editarAsignaturaGrupoModal' data-id='" . $row["idAsignaturaPorGrupo"] . "'>Editar</button>
                                            <a href='../utils/grup_eliminarAsignaturaPorGrupo.php?idAsignaturaPorGrupo=" . $row["idAsignaturaPorGrupo"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar este registro?\");'>Borrar</a>
                                        </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No hay registros disponibles</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                    <!-- Modal EDITAR Asignatura por Grupo -->
                    <div class="modal-dialog modal-xl">
                        <div class="modal fade" id="editarAsignaturaGrupoModal" tabindex="-1" aria-labelledby="editarAsignaturaGrupoModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editarAsignaturaGrupoModalLabel">Editar Asignatura por Grupo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../utils/grup_editarAsignaturaGrupo.php" method="POST" id="formEditarAsignaturaGrupo">
                                        <div class="modal-body">
                                            <input type="hidden" name="idAsignaturaPorGrupo" id="editarIdAsignaturaPorGrupo">
                                            <div class="mb-3">
                                                <label for="editarCodigoAsignaturaG" class="form-label"><strong>Código de Asignatura</strong></label>
                                                <input type="text" class="form-control" id="editarCodigoAsignaturaG" name="codigoAsignatura" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editarNumeroEmpleadoTextG" class="form-label"><strong>Número de Docente</strong></label>
                                                <input type="text" class="form-control" id="editarNumeroEmpleadoTextG" name="numeroEmpleado" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editarGrupo" class="form-label">
                                                    <strong>Grupo</strong>
                                                    <span class="badge text-bg-warning">Se recomienda NO editar si ya tienes un Horario asignado con este registro</span>
                                                </label>
                                                <select class="form-select" id="editarGrupo" name="grupo">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="X">X</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editarHorasSemanales" class="form-label"><strong>Horas Semanales</strong></label>
                                                <input type="number" class="form-control" id="editarHorasSemanales" name="horasSemanales" min="1" max="14" step="1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editarTurno" class="form-label">
                                                    <strong>Turno</strong>
                                                    <span class="badge text-bg-warning">Se recomienda NO editar si ya tienes un Horario asignado con este registro</span>
                                                </label>
                                                <select class="form-select" id="editarTurno" name="turno">
                                                    <option value="M">M</option>
                                                    <option value="V">V</option>
                                                </select>
                                            </div>   
                                            
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="editarNombreSemestre" class="form-label"><strong>Periodo escolar</strong></label>
                                                        <select class="form-select" id="editarNombreSemestre" name="nombreSemestre">
                                                            <option value="" selected disabled>Seleccione el periodo</option>
                                                            <?php
                                                                $sql = "SELECT idSemestre, nombreSemestre FROM semestres";
                                                                $result = $conn->query($sql);
                                                                while ($row = $result->fetch_assoc()) {
                                                                    echo "<option value='{$row['idSemestre']}' data-id='{$row['idSemestre']}'>{$row['nombreSemestre']}</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <div class="mb-3">
                                                        <label for="editarIdSemestre" class="form-label"><strong>ID</strong></label>
                                                        <input type="text" class="form-control" id="editarIdSemestre" name="idSemestre" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                    <!-- Botón para cambiar el periodo general -->
                    <div class="d-grid mt-4 gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cambiarPeriodoModal">
                            Cambiar Periodo General
                        </button>
                    </div>

                    <!-- Modal Cambiar Periodo General -->
                    <div class="modal fade" id="cambiarPeriodoModal" tabindex="-1" aria-labelledby="cambiarPeriodoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="cambiarPeriodoModalLabel">Cambiar Periodo General</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="../utils/cambiarPeriodoGeneral.php" method="POST">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="idPeriodoGeneral" class="form-label"><strong>Periodo General</strong></label>
                                                    <select class="form-select" id="idPeriodoGeneral" name="idPeriodoGeneral" required>
                                                        <option value="" selected disabled>Seleccione el periodo</option>
                                                        <?php
                                                        $sql = "SELECT idSemestre, nombreSemestre FROM semestres";
                                                        $result = $conn->query($sql);
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='{$row['idSemestre']}' data-nombre='{$row['nombreSemestre']}'>{$row['idSemestre']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="nombrePeriodoGeneral" class="form-label"><strong>Nombre del Periodo</strong></label>
                                                    <input type="text" class="form-control" id="nombrePeriodoGeneral" name="nombrePeriodoGeneral" readonly>
                                                </div>
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


<?php
// Cerrar la conexión
$conn->close();
?>


<!-- Bootstrap CDN JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<script>
  $(document).ready(function() {
      $('.editarAsignaturaBtn').on('click', function() {
          var codigoAsignatura = $(this).data('id');

          $.ajax({
              url: '../utils/asig_buscarAsignatura.php',
              type: 'GET',
              data: { codigoAsignatura: codigoAsignatura },
              success: function(response) {
                  var asignatura = JSON.parse(response);

                  if (asignatura.error) {
                      alert(asignatura.error);
                  } else {
                      $('#editarCodigoAsignatura').val(asignatura.codigoAsignatura);
                      $('#editarNombreAsignatura').val(asignatura.nombreAsignatura);
                      $('#editarSemestre').val(asignatura.semestre);
                      $('#editarCreditos').val(asignatura.creditos);
                      $('#editarAcademia').val(asignatura.academia);
                      $('#editarNucleoDeFormacion').val(asignatura.nucleoDeFormacion);
                      $('#editarOptativa').val(asignatura.optativa);
                  }
              }
          });
      });
  });
</script>

<!--  JS para manejar resitros de fomulario agregar asignatura por grupo-->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function actualizarNumeroEmpleado(codigoAsignatura) {
            if (codigoAsignatura) {
                $.ajax({
                    url: '../utils/grup_get_docentes_por_asignatura.php',
                    type: 'GET',
                    data: {
                        codigoAsignatura: codigoAsignatura
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        var numeroEmpleadoG = document.getElementById('numeroEmpleadoG');
                        numeroEmpleadoG.innerHTML = ''; // Limpiar las opciones anteriores

                        if (data.length > 0) {
                            data.forEach(function(docente) {
                                var option = document.createElement('option');
                                option.value = docente.numeroEmpleado;
                                option.textContent = docente.nombreCompleto;
                                numeroEmpleadoG.appendChild(option);
                            });

                            // Actualizar el campo numeroEmpleadoTextG y tipoAsignacionG
                            var selectedNumeroEmpleado = numeroEmpleadoG.options[0].value;
                            document.getElementById('numeroEmpleadoTextG').value = selectedNumeroEmpleado;
                            actualizarTipoAsignacion(codigoAsignatura, selectedNumeroEmpleado);
                        } else {
                            document.getElementById('numeroEmpleadoTextG').value = '';
                            document.getElementById('tipoAsignacionG').value = 'No existe asignación';
                        }
                    }
                });
            } else {
                document.getElementById('numeroEmpleadoG').innerHTML = '';
                document.getElementById('numeroEmpleadoTextG').value = '';
                document.getElementById('tipoAsignacionG').value = '';
            }
        }

        function actualizarTipoAsignacion(codigoAsignatura, numeroEmpleado) {
            if (codigoAsignatura && numeroEmpleado) {
                $.ajax({
                    url: '../utils/grup_get_tipo_asignacion.php',
                    type: 'GET',
                    data: {
                        codigoAsignatura: codigoAsignatura,
                        numeroEmpleado: numeroEmpleado
                    },
                    success: function(response) {
                        var data = JSON.parse(response);
                        if (data.error) {
                            document.getElementById('tipoAsignacionG').value = 'No existe asignación';
                        } else {
                            document.getElementById('tipoAsignacionG').value = data.tipoAsignacion;
                        }
                    }
                });
            } else {
                document.getElementById('tipoAsignacionG').value = '';
            }
        }

        document.getElementById('nombreAsignaturaG').addEventListener('change', function() {
            var codigoAsignatura = this.options[this.selectedIndex].getAttribute('data-id');
            document.getElementById('codigoAsignaturaG').value = codigoAsignatura;
            actualizarNumeroEmpleado(codigoAsignatura);
        });

        document.getElementById('numeroEmpleadoG').addEventListener('change', function() {
            var numeroEmpleado = this.options[this.selectedIndex].value;
            document.getElementById('numeroEmpleadoTextG').value = numeroEmpleado;

            var codigoAsignaturaG = document.getElementById('codigoAsignaturaG').value;
            actualizarTipoAsignacion(codigoAsignaturaG, numeroEmpleado);
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#nombreSemestre').on('change', function() {
            var id = $(this).find(':selected').data('id');
            $('#idSemestre').val(id);
        });                                                                        
    });

    $(document).ready(function() {
        $('#editarNombreSemestre').on('change', function() {
            var id = $(this).find(':selected').data('id');
            $('#editarIdSemestre').val(id);
        });
    });
</script>
           
<!--  JS para manejar la edicion de Aignatura por Grupo-->

<script>
$(document).ready(function() {
    $('.editarAsignaturaGrupoBtn').on('click', function() {
        var idAsignaturaPorGrupo = $(this).data('id');

        $.ajax({
            url: '../utils/grup_buscarAsignaturaPorGrupo.php',
            type: 'GET',
            data: { idAsignaturaPorGrupo: idAsignaturaPorGrupo },
            success: function(response) {
                var asignaturaGrupo = JSON.parse(response);

                if (asignaturaGrupo.error) {
                    alert(asignaturaGrupo.error);
                } else {
                    $('#editarIdAsignaturaPorGrupo').val(asignaturaGrupo.idAsignaturaPorGrupo);
                    $('#editarCodigoAsignaturaG').val(asignaturaGrupo.codigoAsignatura);
                    $('#editarNumeroEmpleadoTextG').val(asignaturaGrupo.numeroEmpleado);
                    $('#editarGrupo').val(asignaturaGrupo.grupo);
                    $('#editarHorasSemanales').val(asignaturaGrupo.horasSemanales);
                    $('#editarTurno').val(asignaturaGrupo.turno);
                    $('#editarIdSemestre').val(asignaturaGrupo.idSemestre);
                }
            }
        });
    });
});
</script>

<!--  CAMBIAR PERIODO GENERAL A TABLA ASIGNATURAS POR GRUPO-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('idPeriodoGeneral').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];
            var nombreSemestre = selectedOption.getAttribute('data-nombre');
            document.getElementById('nombrePeriodoGeneral').value = nombreSemestre;
        });
    });
</script>


<!-- FILTRO DE TABLA DE ASIGNATURAS POR SEMESTRE-->
<script>
document.getElementById('filterAsignaturasButton').addEventListener('click', function() {
    var selectedSemestre = document.getElementById('semestreSelect').value;
    var rows = document.querySelectorAll('#asignaturasTableBody tr');
    rows.forEach(function(row) {
        if (selectedSemestre === "" || row.cells[2].innerText === selectedSemestre) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
</script>


</body>
</html>