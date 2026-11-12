<!-- index.php -->
<?php include 'header.php'; ?>

    <!-- #########   CUERPO DEL SISTEMA   ######### -->

    <div style="padding: 20px;">
        <div class="card mb-3 bg-dark p-2" >
            <img  src="/CreadorHorarios/img/slider1.jpg" class="card-img-top" alt="Ingenieria en Software">
        </div>
    </div>


    <div class="accordion p-3" id="mainAccordion">

        <!-- Primer accordion-item -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button bg-dark text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <strong>Instrucciones para Implementar un Sitio Web en PHP de manera Local con XAMPP</strong> 
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-parent="#mainAccordion">
                <div class="accordion-body p-5">
                    <div class="card text-bg-primary mb-2">
                        <div class="card-header">
                            1. Descarga e Instalación de XAMPP
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Descarga e instala el panel de control de XAMPP en tu ordenador desde la página oficial: <a href="https://www.apachefriends.org/es/index.html" target="_blank">Apache Friends - XAMPP</a>.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-secondary mb-2">
                        <div class="card-header">
                            2. Preparación del Proyecto
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Descomprime el archivo <code>CreadorDeHorarios_LIS_ESTL.rar</code>.</li>
                            <li class="list-group-item">Mueve la carpeta generada a la siguiente ruta en tu disco local: <code>C:\xampp\htdocs</code>.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-primary mb-2">
                        <div class="card-header">
                            3. Configuración de XAMPP
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Accede al panel de control de XAMPP y activa los servicios de <b>Apache</b> y <b>MySQL</b>.</li>
                            <li class="list-group-item">Asegúrate de que MySQL esté configurado en el puerto 3306.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-secondary mb-2">
                        <div class="card-header">
                            4. Acceso al Sitio Web
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Abre un navegador web (se recomienda usar navegadores basados en Chromium, como Google Chrome).</li>
                            <li class="list-group-item">Accede al creador de horarios mediante la siguiente URL: <a href="http://localhost/CreadorHorarios/templates/index.php" target="_blank">http://localhost/CreadorHorarios/templates/index.php</a>.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-primary mb-2">
                        <div class="card-header">
                            5. Acceso a la Base de Datos
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Si necesitas acceder a la base de datos, utiliza la siguiente URL: <a href="http://localhost/phpmyadmin/index.php" target="_blank">http://localhost/phpmyadmin/index.php</a>. <b>Nota:</b> No se recomienda modificar la base de datos a menos que sea absolutamente necesario.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-secondary mb-2">
                        <div class="card-header">
                            6. Implementación de la Base de Datos
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Accede a phpMyAdmin.</li>
                            <li class="list-group-item">Selecciona ‘Nueva’ para crear una nueva base de datos.</li>
                            <li class="list-group-item">En la pestaña SQL, pega el contenido del documento <code>DB.txt</code> ubicado en <code>CreadorDeHorarios_LIS_ESTL.rar</code>.</li>
                            <li class="list-group-item">Ten en cuenta que esta es una base de datos sin datos actualizados si ya has utilizado la herramienta previamente.</li>
                        </ul>
                    </div>
                    <br>
                    <div class="card text-bg-primary mb-2">
                        <div class="card-header">
                            7. Exportación de Datos para Uso en Otro Ordenador
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Si necesitas los datos actualizados para un segundo ordenador, selecciona la base de datos <code>horariossoftware</code> en el ordenador actual.</li>
                            <li class="list-group-item">Ve a la pestaña <b>Exportar</b> y sigue los pasos para exportar la base de datos. Es recomendable exportar en formato SQL.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Segundo accordion-item -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed bg-dark text-white" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <strong>Manual de Usuario: Aplicación Web Creador de Horarios</strong> 
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-parent="#mainAccordion">
                <div class="accordion-body p-5">

                    <div class="card border-success mb-2">
                        <div class="card-header text-bg-success mb-3">
                            Inicio
                        </div>
                        <div class="card-body">
                            <p>Al acceder a la pestaña "Inicio", el usuario encontrará una descripción general de la herramienta y el proceso de implementación para replicar la instalación en otro ordenador.</p>
                        </div>
                    </div><br>
                    <div class="card border-success mb-2">
                        <div class="card-header text-bg-success mb-3">
                            Profesores
                        </div>
                        <div class="card-body">
                            <p>Este menú está dividido en tres pestañas mediante un acordeón, cada una con una funcionalidad específica descrita a continuación:</p>
                            <ul>
                                <li><b>Información General del Docente:</b> Organiza la información personal de cada docente con cátedra en la Licenciatura en Ingeniería de Software.</li>
                                <ul>
                                    <li>Cada docente tiene un número identificador correspondiente a su número de cuenta.</li>
                                    <li>Con el botón 'Agregar nuevo docente', se puede añadir la información de un nuevo docente.</li>
                                    <li>Los datos se almacenan en una tabla. En la columna "Acción" es posible eliminar o modificar la información de un docente.</li>
                                    <li>Cambia el  "Estado de Contrato" a "Jubilado" o "Despedido", "Ausente" en caso de que un docente deje de impartir docencia según corresponda.</li>
                                </ul>
                                <li><b>Horarios de disponibilidad del docente:</b> Establece el rango de horas de disponibilidad del docente a lo largo del día.</li>
                                <ul>
                                    <li>Si el docente es un académico/investigador de turno completo, selecciona "Completo"; en caso contrario, selecciona "No establecido".</li>
                                    <li>Las horas predeterminadas para turno "Completo" son de 8:00 am a 5:00 pm.</li>
                                    <li>Las horas predeterminadas para turno "No establecido" son de 7:00 am a 9:00 pm.</li>
                                    <li><b>Nota:</b> Para establecer la disponibilidad, es necesario que la información general del docente esté registrada.</li>
                                </ul>
                                <li><b>Asignación de asignaturas por docente. (Asignación/Titular):</b> Establece la asignatura que el docente imparte y su tipo, de acuerdo a su perfil.</li>
                                <ul>
                                    <li>Con el botón 'Establecer Asignación a Docente', se puede asignar una asignatura al docente (las asignaciones se agregan una por una).</li>
                                    <li>El tipo de asignación determina la prioridad para impartir una asignatura al momento de asignar un grupo a un docente y crear un horario.</li>
                                    <li>Los docentes "Titulares" tienen mayor prioridad al establecer una asignación, generalmente debido a su amplio recorrido docente dentro de la institución.</li>
                                    <li>Los docentes con "Asignación" suelen tener menos recorrido con la asignatura seleccionada y se les asignan asignaturas en caso de no haber Titular o en casos excepcionales.</li>
                                    <li><b>Nota:</b> Para establecer una asignación, es necesario que la información general del docente esté registrada.</li>
                                    <li>Si la asignatura que va a impartir el docente no se encuentra en la lista, dirígete al menú "Asignaturas" y en la pestaña "Información general de la Asignatura" registra los datos de la misma.</li>
                                </ul>
                            </ul>
                        </div>
                    </div><br>
                    <div class="card border-success mb-2">
                        <div class="card-header text-bg-success mb-3">
                            Asignaturas
                        </div>
                        <div class="card-body">
                            <p>Este menú está dividido en dos pestañas mediante un acordeón, cada una con una funcionalidad específica descrita a continuación:</p>
                            <ul>
                                <li><b>Información General de la Asignatura:</b> Almacena la información general de cada una de las asignaturas que se imparten en la Licenciatura en Ingeniería de Software, incluyendo su código, nombre y semestre en el que se imparte.</li>
                                <ul>
                                    <li>Es posible modificar la información de la asignatura mediante la columna "Acción" dentro de la tabla. Sin embargo, solo se recomienda realizar modificaciones (editar/eliminar) si aún no se ha asignado a un docente.</li>
                                </ul>
                                <li><b>Asignaturas por Grupo:</b> Establece la asignación de un docente y asignatura a un grupo de acuerdo a un periodo escolar específico.</li>
                                <ul>
                                    <li><b>Nota:</b> Antes de agregar una nueva asignatura a un grupo, asegúrate de haber editado la asignación del docente con la asignatura en la pestaña "Asignación/Titular de Asignatura" del menú "Docentes".</li>
                                    <li>Solo se recomienda editar los registros de esta tabla si aún no se ha creado una asignación de horario con dicho registro.</li>
                                    <li>Cada nuevo semestre, es necesario actualizar (agregar o editar) esta tabla para desarrollar un nuevo horario.</li>
                                </ul>
                            </ul>
                        </div>
                    </div><br>
                    <div class="card border-success mb-2">
                        <div class="card-header text-bg-success mb-3">
                            Aulas/Periodos
                        </div>
                        <div class="card-body">
                            <p>Este menú contiene una única pestaña llamada "Aulas y Periodos Escolares", la cual incluye dos tablas que muestran la información correspondiente a los periodos escolares o semestres y las aulas donde se imparten las asignaturas.</p>
                            <ul>
                                <li>Es posible agregar nuevos periodos y aulas si es necesario.</li>
                                <li><b>Precaución:</b> No se recomienda eliminar las aulas si ya se ha creado la asignación de un horario con dicha aula. Solo utilízalo en caso de haber añadido un aula por error.</li>
                            </ul>
                        </div>
                    </div><br>
                    <div class="card border-success mb-2">
                        <div class="card-header text-bg-success mb-3">
                            Horarios
                        </div>
                        <div class="card-body">
                            <p>Este menú permite la creación, visualización y exportación de horarios escolares.</p>
                            <ul>
                                <li>Con el botón 'Crear horario', el usuario puede asignar un horario a cada grupo de estudiantes, especificando un día y hora.</li>
                                <li>Para crear un horario, es necesario que previamente se haya agregado la asignatura al grupo correspondiente mediante la pestaña "Asignaturas por Grupo" en el menú "Asignaturas".</li>
                                <li>Cada asignatura por grupo se configura manualmente, por lo que se recomienda prestar atención a las advertencias mostradas en el menú para evitar concurrencias de salones o docentes.</li>
                                <li>Una vez agregada la asignación del horario, esta se mostrará en la tabla del mismo menú, donde se puede visualizar toda la información del horario.</li>
                                <li>Se pueden aplicar filtros por periodo escolar, aula, día, grupo y semestre para personalizar la tabla según las necesidades específicas del usuario. No es necesario aplicar todos los filtros.</li>
                                <li>El botón "Exportar" ubicado en el interior de la tabla permite exportar la configuración de la tabla al ordenador.</li>
                            </ul>
                        </div>
                    </div>
                
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


</body>
</html>
