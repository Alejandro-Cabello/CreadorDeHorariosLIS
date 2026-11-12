<?php
include '../utils/db_conexion.php';
?>

<!-- index.php -->
<?php include 'header.php'; ?>

    <!-- #########   CUERPO DEL SISTEMA   ######### -->
    <div class="accordion p-3" id="accordionAulas">


        <!-- TARJETA 1  -->
        <div class="accordion-item">

            <h2 class="accordion-header">
                <button class="accordion-button bg-dark text-white" type="button" data-bs-toggle="collapse" data-bs-target="#informacionAulasPeriodos" aria-expanded="false" aria-controls="informacionAulasPeriodos">
                <strong>Aulas y Periodos escolares</strong>
                </button>
            </h2>

            <div id="informacionAulasPeriodos" class="accordion-collapse">
                <div class="accordion-body">
                        <div class="row">

                             <!-- Columna 1: Agregar periodo escolar y su tabla -->

                            <div class="col-md-6">

                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#periodosModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5M8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
                                        </svg> <strong>Agregar Periodo Escolar</strong>
                                    </button>
                                </div><br>

                                <!-- Modal Agregar Periodos escolares -->
                                <div class="modal fade" id="periodosModal" tabindex="-1" aria-labelledby="periodosModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="periodosModalLabel">Agregar Periodo Escolar</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../utils/peau_periodos.php" method="POST" id="formPeriodos">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nombreSemestre" class="form-label"><strong>Nombre del Semestre o Periodo Escolar</strong></label>
                                                        <input type="text" class="form-control" id="nombreSemestre" name="nombreSemestre" required>
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

                                <!-- Tabla de Semestres -->
                                <table class="table table-bordered">
                                    <thead class="table">
                                        <tr>
                                            <th scope="col">ID Semestre</th>
                                            <th scope="col">Nombre Semestre</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM semestres";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["idSemestre"] . "</td>";
                                                echo "<td>" . $row["nombreSemestre"] . "</td>";
                                                echo "<td>
                                                        <a href='../utils/peau_eliminarPeriodo.php?idSemestre=" . $row["idSemestre"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar este registro?\");'>Borrar</a>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No hay registros disponibles</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                            <!-- Columna 2: Agregar Aula y su tabla -->
                            
                            <div class="col-md-6">

                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#aulasModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                                        </svg> <strong>Agregar Aula</strong>
                                    </button>
                                </div><br>

                                <!-- Modal Agregar Aulas escolares -->
                                <div class="modal fade" id="aulasModal" tabindex="-1" aria-labelledby="aulasModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="aulasModalLabel">Agregar Aula</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="../utils/peau_aulas.php" method="POST" id="formAulas">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="nombreAula" class="form-label"><strong>Nombre del Aula</strong></label>
                                                        <input type="text" class="form-control" id="nombreAula" name="nombreAula" required>
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

                                <!-- Tabla de Aulas -->
                                <table class="table table-bordered">
                                    <thead class="table">
                                        <tr>
                                            <th scope="col">ID Aula</th>
                                            <th scope="col">Nombre Aula</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM aulas";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["idAula"] . "</td>";
                                                echo "<td>" . $row["nombreAula"] . "</td>";
                                                echo "<td>
                                                        <a href='../utils/peau_eliminarAula.php?idAula=" . $row["idAula"] . "' class='btn btn-danger' onclick='return confirm(\"¿Estás seguro de que deseas borrar este registro?\");'>Borrar</a>
                                                    </td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No hay registros disponibles</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>

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
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>



</body>
</html>
