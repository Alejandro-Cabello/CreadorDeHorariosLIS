-- Crear base de datos:
CREATE DATABASE horariossoftware;
USE horariossoftware;

-- Crear tabla de información de docentes:
CREATE TABLE `docente` (
  `numeroEmpleado` INT NOT NULL,
  `nombreCompleto` VARCHAR(60) NULL,
  `gradoAcademico` VARCHAR(80) NULL,
  `gradoAcademico2` VARCHAR(80) NULL,
  `sindicalizado` INT NULL,             -- si pertenece al sindicato de trabajadores 
  `estado` VARCHAR(10) NULL,            -- Esta columna se refiere a si el profesor esta activo para impartir asignaturas o no (despedido o Jubilado)
  PRIMARY KEY (`numeroEmpleado`)
);
  
-- Crear tabla relación docentes/días de la semana (Disponibilidad):
CREATE TABLE `docenteDisponibilidad` (
  `idDisponibilidad`INT NOT NULL AUTO_INCREMENT,
  `numeroEmpleado` INT NULL,
  `turno` VARCHAR(20) NULL,                 -- Completo, No Establecido
  `horaInicio` TIME NULL,
  `horaFin` TIME NULL,
  PRIMARY KEY (`idDisponibilidad`),
  FOREIGN KEY (`numeroEmpleado`) REFERENCES `docente`(`numeroEmpleado`)
);


-- Crear tabla con información general de asignaturas:
CREATE TABLE `asignaturas` (
  `codigoAsignatura` VARCHAR(10) NOT NULL,    
  `nombreAsignatura` VARCHAR(80) NULL,
  `semestre` INT NULL,                      -- semestre en el que se imparte la asignatura 
  `creditos` DECIMAL(10, 1) NULL,
  `academia` VARCHAR(80) NULL,
  `nucleoDeFormacion` VARCHAR(50) NULL,
  `optativa` INT NULL,                        
  PRIMARY KEY (`codigoAsignatura`)
);

-- Crear tabla con asignación de asignatura del docente:
CREATE TABLE `docenteImparte` (
  `numeroEmpleado` INT NOT NULL,
  `codigoAsignatura` VARCHAR(10) NOT NULL,
  `tipoAsignacion` VARCHAR(12) NULL,          -- Titular, Asignación
  PRIMARY KEY (`numeroEmpleado`, `codigoAsignatura`),
  FOREIGN KEY (`numeroEmpleado`) REFERENCES `docente`(`numeroEmpleado`),
  FOREIGN KEY (`codigoAsignatura`) REFERENCES `asignaturas`(`codigoAsignatura`)
);

-- Crear tabla de días de la semana (Disponibilidad):
CREATE TABLE `diasSemana` (
  `idDias` INT NOT NULL,
  `nombreDias` VARCHAR(50) NULL,        -- Lunes, martes, miércoles, jueves, viernes 
  PRIMARY KEY (`idDias`)
);

-- Crear tabla de semestres o periodos escolares:
CREATE TABLE `semestres` (
  `idSemestre` INT NOT NULL AUTO_INCREMENT,
  `nombreSemestre` VARCHAR(50) NULL,  -- Ejemplo: Julio-Diciembre 2024
  PRIMARY KEY (`idSemestre`)
);

-- Crear tabla de aulas
CREATE TABLE `aulas` (
  `idAula` INT NOT NULL AUTO_INCREMENT,
  `nombreAula` VARCHAR(50) NULL,
  PRIMARY KEY (`idAula`)
);



-- Crear tabla de asignatura por grupo:
CREATE TABLE `asignaturaPorGrupo` (
  `idAsignaturaPorGrupo` INT NOT NULL AUTO_INCREMENT,
  `codigoAsignatura` VARCHAR(10) NULL,  -- ID compuesto de tabla `docenteImparte`
  `numeroEmpleado` INT NULL,            -- ID compuesto de tabla `docenteImparte`
  `grupo` VARCHAR(2) NULL,              -- Grupo al que se imparte la asignatura
  `horasSemanales` INT NULL,            -- Horas a la semana destinadas a cada asignatura
  `turno` CHAR(1) NULL,                 -- Turno de la asignatura (M es matutino, V es vespertino)
  `idSemestre` INT NULL,                -- Referencia al semestre
  PRIMARY KEY (`idAsignaturaPorGrupo`),
    FOREIGN KEY (`codigoAsignatura`,`numeroEmpleado` ) REFERENCES `docenteImparte`(`codigoAsignatura`,`numeroEmpleado`),
    FOREIGN KEY (`idSemestre`) REFERENCES `semestres`(`idSemestre`)
);


-- Crear tabla de horarios:
CREATE TABLE `horarios` (
  `idHorario` INT NOT NULL AUTO_INCREMENT,
  `idAsignaturaPorGrupo` INT NULL,
  `idDisponibilidad`INT NULL,
  `idAula` INT NULL,
  `idDias` INT NULL,
  `horasSesión` INT NULL,
  `horaInicioHorario` TIME NULL,
  `horaFinHorario` TIME NULL,
  `idSemestre` INT NULL,              -- Periodo escolar del horario
  PRIMARY KEY (`idHorario`),
    FOREIGN KEY (`idAsignaturaPorGrupo`) REFERENCES `asignaturaPorGrupo` (`idAsignaturaPorGrupo`),    -- Llave foranea multivalor 
    FOREIGN KEY (`idDisponibilidad`) REFERENCES `docenteDisponibilidad` (`idDisponibilidad`),
    FOREIGN KEY (`idAula`) REFERENCES `aulas` (`idAula`),
    FOREIGN KEY (`idDias`) REFERENCES `diasSemana` (`idDias`),
    FOREIGN KEY (`idSemestre`) REFERENCES `semestres` (`idSemestre`)
);



USE horariossoftware;

-- Insertar días de la semana en la tabla diasSemana:
INSERT INTO `diasSemana` (`idDias`, `nombreDias`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miércoles'),
(4, 'Jueves'),
(5, 'Viernes');

-- Insertar datos en tabla Aulas:
INSERT INTO `aulas` (`idAula`, `nombreAula`) VALUES
(1, 'A-6'),
(2, 'A-7'),
(3, 'E-1'),
(4, 'FSW'),
(5, 'LSIE'),
(6, 'LAW'),
(7, 'LAI');

-- Insertar datos en Semestre:
INSERT INTO `semestres` (`idSemestre`, `nombreSemestre`) VALUES
(1, '2024 julio-diciembre'),
(2, '2025 enero-Junio'),
(3, '2025 julio-diciembre'),
(4, '2026 enero-Junio'),
(5, '2026 julio-diciembre');


-- Insertar datos de los docentes a la tabla docente:
INSERT INTO `docente` (`numeroEmpleado`, `nombreCompleto`, `gradoAcademico`, `gradoAcademico2`, `sindicalizado`,`estado`) VALUES
(5946, 'Matilde Reyes Fuentes ', 'Maestría en Ciencias Computacionales', 'Licenciatura en Sistemas Compuacionales', 0, 'Activo'),
(6475, 'Silvia Patricia Ambrocio Cruz', 'Doctorado en Ciencias. Radiaciones y Plasmas', 'Lic. En Física', 0, 'Activo'),
(2440, 'Silvia Soledad Moreno Gutiérrez', 'Doctorado en Planeación Estratégica y Dirección de Tecnología', 'Maestría en Ciencias Computacionales', 0, 'Activo'),
(12890, 'Gabriel Sánchez Bautista', 'Doctorado en Ciencias Computacionales', 'Licenciatura en Sistemas Computacionales', 0, 'Activo'),
(5849, 'Ismael Domínguez Jiménez', 'Doctorado en Desarrollo Cientifico y Técnológico', 'Maestría en Ciencias Computacionales', 0, 'Activo'),
(13707, 'Julia Yazmín Arana Llanes', 'Doctorado en Ciencias Computacionales', 'Maestría en Ciencias Computacionales', 0, 'Activo'),
(3998, 'Mónica García Munguía', 'Maestría en Tecnologías de la Información', 'Lic. en Computación', 0, 'Activo'),
(3753, 'Nubia Belzabet Pérez Olguín', 'Maestría en Enseñanza de las Matemáticas', 'Licenciatura en Computación', 0, 'Activo'),
(3802, 'Alma Delia Zúñiga Mera', 'Ingeniería Industrial y de Sistemas', 'Especialidad En Tecnologia Educativa', 0, 'Activo'),
(5895, 'Areli López Mendoza', 'Licenciatura en Enseñanza de la Lengua Inglesa', 'Especialidad en Tecnologia Educativa', 0, 'Activo'),
(5670, 'Felipe Pérez Montufar', 'Ingeniería en Sistemas Computacionales en Programación', NULL, 0, 'Activo'),
(3678, 'Guillermo Castañeda Ortiz', 'Ingeniería en Electrónica', NULL, 0, 'Activo'),
(1143, 'Guillermo Mera Callejas', 'Maestría en Administración Educativa', 'Lic. En Ingeniería en Telemática', 0, 'Activo'),
(10862, 'Gustavo Vélez Díaz', 'Maestría en Ciencias de la Educación', 'Licenciatura en Psicología', 0, 'Activo'),
(3368, 'Juana Lara Díaz', 'Licenciatura en Ciencias Políticas y Administración Pública', NULL, 0,'Activo'),
(4798, 'Mónica Cornejo Velázquez', 'Maestría en Tecnología Educativa', 'Licenciatura en Computación', 0,'Activo'),
(11934, 'Noé Olmos Orellán', 'Licenciatura en Computación', NULL, 0,'Activo'),
(11272, 'Olivia Plascencia Ramírez', 'Licenciatura en Enseñanza de la Lengua Inglesa', NULL, 0, 'Activo'),
(7767, 'Tomás León Quintanar', 'Maestría en Administración de Negocios', 'Licenciatura en Computación', 1, 'Activo'),
(11724, 'Brenda Janeth Hernández Ramos', 'Licenciatura en Arte Drámatico', NULL, 0, 'Activo'),
(13161, 'Brenda Eloisa Vargas Domínguez', 'Licenciatura en Nutrición', NULL, 0, 'Activo'),
(12769, 'Ilse Mendoza Hernández', 'Licenciada en Sistemas Computacionales ', NULL, 0, 'Activo'),
(10297, 'Judith Ariana Pérez Olalde', 'Licenciada en Música ', NULL, 0, 'Activo'),
(14238, 'Malintzi Rivero Ramírez', 'Licenciada en Psicología', NULL, 0, 'Activo');



INSERT INTO `asignaturas` (`codigoAsignatura`, `nombreAsignatura`, `semestre`, `creditos`, `academia`, `nucleoDeFormacion`, `optativa`) VALUES
('IAAA208', 'Aprender a Aprender', 1, 2.0, 'Desarrollo Social y Profesional', 'Básico', 0),
('IPCL209', 'Precálculo', 1, 6.0, 'Matemáticas', 'Básico', 0),
('IDSM208', 'Desarrollo Sustentable y Medio Ambiente', 1, 2.0, 'Desarrollo Social y Profesional', 'Básico', 0),
('IFDP209', 'Fundamentos de Programación', 1, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('DISW008', 'Introducción a la Ingeniería de Software', 1, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('ICIL209', 'Conversaciones Introductorias. Lengua Extranjera', 1, 1.0, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('IALI209', 'Álgebra Lineal', 2, 6.0, 'Matemáticas', 'Básico', 0),
('ICDI209', 'Cálculo Diferencial e Integral', 2, 6.0, 'Matemáticas', 'Básico', 0),
('IFEC209', 'Fundamentos Electrónicos para la Computación', 2, 5.0, 'Arquitectura de Computadoras', 'Básico', 0),
('IMMC208', 'México Multicultural', 2, 2.0, 'Desarrollo Social y Profesional', 'Básico', 0),
('DISW004', 'Análisis y Diseño de Software', 2, 4.5, 'Ingeniería de Software', 'Profesional', 0),
('IPYF209', 'Eventos Pasados y Futuros. Lengua Extranjera', 2, 1.0, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('IEVS208-1', 'Sexualidad Responsable', 2, 2.0, 'PIAEVS -Prog Inst Act de Edu p/una Vida Saludable', 'Otro', 0),
('AAC208-1 ', 'Artes Escénicas', 2, 2.0, 'PIAAC -Prog Inst Act Artísticas y Culturales', 'Otro', 0),
('IAYC209', 'Autómatas y Compiladores', 3, 5.5, 'Arquitectura de Computadoras', 'Profesional', 0),
('DISW009', 'Lenguajes de Programación', 3, 6.5, 'Ingeniería de Software', 'Profesional', 0),
('IPOO209', 'Programación Orientada a Objetos', 3, 6.0, 'Ingeniería de Software', 'Profesional', 0),
('DISW006', 'Control Digital', 3, 4.5, 'Arquitectura de Computadoras', 'Profesional', 0),
('IEYP209', 'Estadística y Probabilidad', 3, 6.0, 'Matemáticas', 'Básico', 0),
('ILYE209', 'Logros y Experiencias. Lengua Extranjera', 3, 1.0, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('IEVS208-2', 'Salud y Prevención de Adicciones', 3, 2.0, 'PIAEVS -Prog Inst Act de Edu p/una Vida Saludable', 'Otro', 0),
('DISW005', 'Arquitectura de Computadoras', 4, 6.5, 'Arquitectura de Computadoras', 'Profesional', 0),
('DISW017', 'Programación Visual', 4, 7.0, 'Ingeniería de Software', 'Profesional', 0),
('IDBD209', 'Diseño de Base de Datos', 4, 5.0, 'Ingeniería de Software', 'Profesional', 0),
('IPMS209', 'Tópicos de Programación Matemática y Simulación', 4, 4.5, 'Ambientes de Inteacción Especializados', 'Básico', 0),
('IFMI208', 'Fundamentos de Metodología de la Investigación', 4, 3.0, 'Desarrollo Social y Profesional', 'Básico', 0),
('IDPL209', 'Decisiones Personales. Lengua Extranjera', 4, 1.0, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('IEVS208-3', 'Salud y Nutrición', 4, 2.0, 'PIAEVS -Prog Inst Act de Edu p/una Vida Saludable', 'Otro', 0),
('AAC208-2', 'Música', 4, 2.0, 'PIAAC -Prog Inst Act Artísticas y Culturales', 'Otro', 0),
('DISW003', 'Ambientes Multimedia e Hipermedia', 5, 6.0, 'Ambientes de Inteacción Especializados', 'Profesional', 0),
('IIAR209', 'Inteligencia Artificial', 5, 5.5, 'Ambientes de Inteacción Especializados', 'Profesional', 0),
('IGRF209', 'Graficación', 5, 5.5, 'Ambientes de Inteacción Especializados', 'Profesional', 0),
('IABD209', 'Administración de Bases de Datos', 5, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('DISW015', 'Principios y Diseño de Redes', 5, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('ICYE209', 'Causa y Efecto. Lengua Extranjera', 5, 5.5, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('AAC208-3', 'Artes Visuales', 5, 1.0, 'PIAAC -Prog Inst Act Artísticas y Culturales', 'Otro', 0),
('ISOP209', 'Sistemas Operativos', 6, 5.5, 'Ambientes de Inteacción Especializados', 'Profesional', 0),
('PWB209', 'Programación Web', 6, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('DISW002', 'Administración y Seguridad en Redes', 6, 6.0, 'Ingeniería de Software', 'Profesional', 0),
('IBDD209', 'Bases de Datos Distribuidas', 6, 5.5, 'Ingeniería de Software', 'Profesional', 0),
('IEOP209', 'En Otras Palabras…Lengua Extranjera', 6, 1.0, 'PILE -Prog Inst de Lenguas', 'Complementario', 0),
('DISW010-1', 'Op I. Sistemas de Información Geográfica', 6, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW010-2', 'Op I. Mundos Virtuales', 6, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW010-3', 'Op I. Ingeniería del Conocimiento', 6, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW018', 'Proyectos Profesionales de Software', 7, 5.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 0),
('DISW007', 'Desarrollo Profesional Empresarial', 7, 4.0, 'Desarrollo Social y Profesional', 'Terminal y de integración', 0),
('IAFI209', 'Administración de la Función Informática', 7, 5.0, 'Desarrollo Social y Profesional', 'Profesional', 0),
('DISW001', 'Administración de la Calidad del Software', 7, 4.5, 'Ambientes de Inteacción Especializados', 'Profesional', 0),
('DISW016', 'Programación Orientada a Agentes', 7, 4.5, 'Ingeniería de Software', 'Profesional', 0),
('DISW011-1', 'Op II. Base de Datos Modernas', 7, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW011-2', 'Op II. Desarrollo de Software p/Videojuegos', 7, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW011-3', 'Op II. Redes Neuronales I', 7, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW019', 'Servicio Social', 8, 10.0, 'nan', 'Complementario', 0),
('DISW012-1', 'Op III. Sistemas Inteligentes para Negocios', 8, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW012-2', 'Op III. Herram. p/Gestión de Procesos Organ.', 8, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW012-3', 'Op III. Programación Móvil', 8, 6.0, 'Ingeniería de Software', 'Terminal y de integración', 1),
('DISW013-1', 'Op IV. Ambientes Colaborativos', 8, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW013-2', 'Op IV. Agentes Inteligentes', 8, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW013-3', 'Op IV. Redes Neuronales II', 8, 6.0, 'Ambientes de Inteacción Especializados', 'Terminal y de integración', 1),
('DISW014-1', 'Prácticas Profesionales', 9, 10.0, 'nan', 'Profesional', 0);



INSERT INTO `docenteDisponibilidad`(`idDisponibilidad`, `numeroEmpleado`, `turno`, `horaInicio`, `horaFin`) VALUES
(1,5946, 'Completo','08:00:00','17:00:00'),
(2,6475, 'Completo','08:00:00','17:00:00'),
(3,2440, 'Completo','08:00:00','17:00:00'),
(4,12890, 'Completo','08:00:00','17:00:00'),
(5,5849, 'Completo','08:00:00','17:00:00'),
(6,13707, 'Completo','08:00:00','17:00:00'),
(7,3998, 'Completo','08:00:00','17:00:00'),
(8,3753, 'Completo','08:00:00','17:00:00'),
(9,3802, 'No establecido','07:00:00','20:00:00'),
(10,5895, 'No establecido','07:00:00','20:00:00'), 
(11,5670, 'No establecido','07:00:00','20:00:00'),
(12,3678, 'No establecido','07:00:00','20:00:00'),
(13,1143, 'No establecido','07:00:00','20:00:00'),
(14,10862, 'No establecido','07:00:00','20:00:00'),
(15,3368, 'No establecido','07:00:00','20:00:00'),
(16,4798, 'No establecido','07:00:00','20:00:00'),
(17,11934, 'No establecido','07:00:00','20:00:00'),
(18,11272, 'No establecido','07:00:00','20:00:00'),
(19,7767, 'No establecido','07:00:00','20:00:00'),
(20,11724, 'No establecido','07:00:00','20:00:00'),
(21,13161, 'No establecido','07:00:00','20:00:00'),
(22,12769, 'No establecido','07:00:00','20:00:00'),
(23,10297, 'No establecido','07:00:00','20:00:00'),
(24,14238, 'No establecido','07:00:00','20:00:00');




INSERT INTO `docenteImparte` (`numeroEmpleado`, `codigoAsignatura`, `tipoAsignacion`) VALUES
(5946, 'DISW004', 'Asignación'),
(5946, 'IFMI208', 'Asignación'),
(5946, 'DISW010-2', 'Asignación'),
(5946, 'IAFI209', 'Asignación'),
(5946, 'DISW014-1', 'Asignación'),
(6475, 'IPCL209', 'Titular'),
(6475, 'IALI209', 'Titular'),
(6475, 'IFMI208', 'Asignación'),
(6475, 'DISW019', 'Asignación'),
(2440, 'IAYC209', 'Asignación'),
(2440, 'IPMS209', 'Asignación'),
(2440, 'IIAR209', 'Asignación'),
(2440, 'DISW011-3', 'Asignación'),
(2440, 'DISW013-3', 'Asignación'),
(12890, 'IPOO209', 'Titular'),
(12890, 'DISW005', 'Asignación'),
(12890, 'IBDD209', 'Titular'),
(12890, 'DISW007', 'Asiganción'),
(12890, 'IAFI209', 'Asiganción'),
(12890, 'DISW014-1', 'Asiganción'),
(5849, 'IFDP209', 'Asignación'),
(5849, 'DISW005', 'Asignación'),
(5849, 'DISW010-2', 'Asignación'),
(5849, 'DISW001', 'Asignación'),
(5849, 'DISW019', 'Asignación'),
(5849, 'DISW014-1', 'Asignación'),
(13707, 'IGRF209', 'Asiganción'),   -- NUEVO REG.
(13707, 'ISOP209', 'Asiganción'),
(13707, 'DISW001', 'Asiganción'),
(13707, 'DISW013-1', 'Asiganción'),
(13707, 'DISW014-1', 'Asiganción'),
(3998, 'DISW002', 'Asignación'),
(3998, 'DISW015', 'Asignación'),    -- NUEVO REG.
(3998, 'DISW019', 'Asignación'),
(3998, 'DISW012-3', 'Asignación'),
(3753, 'ICDI209', 'Asignación'),
(3753, 'IEYP209', 'Asignación'),
(3753, 'IAFI209', 'Asignación'),
(3753, 'DISW001', 'Asignación'),
(3753, 'DISW012-2', 'Asignación'),
(3753, 'DISW012-3', 'Asignación'),
(3753, 'DISW013-1', 'Asignación'),
(3802, 'ICDI209', 'Titular'),
(5895, 'ICIL209', 'Titular'),
(5895, 'ILYE209', 'Titular'),
(5895, 'IDPL209', 'Titular'),
(5670, 'IDBD209', 'Titular'),
(5670, 'IEYP209', 'Asignación'),    -- NUEVO REG.
(5670, 'DISW011-2', 'Asignación'),   -- NUEVO REG.
(5670, 'DISW012-2', 'Asignación'),  
(3678, 'IFEC209', 'Asignación'),
(3678, 'DISW003', 'Titular'),
(3678, 'DISW006', 'Asignación'),    -- NUEVO REG.
(3678, 'DISW011-2', 'Titular'),
(1143, 'DISW008', 'Asignación'),
(5946, 'DISW008', 'Asignación'),    -- NUEVO REG.
(1143, 'IIAR209', 'Asignación'),
(1143, 'DISW016', 'Titular'),
(10862, 'IEVS208-1', 'Titular'),
(10862, 'IEVS208-2', 'Titular'),
(3368, 'IMMC208', 'Titular'),
(4798, 'DISW001', 'Asignación'),     -- NUEVO REG.
(4798, 'DISW009', 'Titular'),
(4798, 'PWB209', 'Titular'),
(4798, 'DISW010-1', 'Asignación'),
(11934, 'DISW011-1', 'Titular'),
(11934, 'DISW012-1', 'Asignación'),
(11934, 'DISW013-2', 'Asignación'),
(11272, 'IPYF209', 'Asignación '),
(11272, 'ICYE209', 'Titular'),
(11272, 'IEOP209', 'Titular'),
(11272, 'ILYE209', 'Asignación'),    -- NUEVO REG.
(7767, 'DISW004', 'Asignación'),
(7767, 'IAYC209', 'Asignación'),
(7767, 'DISW017', 'Titular'),
(7767, 'IABD209', 'Titular'),
(7767, 'DISW010-2', 'Asignación'),
(7767, 'DISW018', 'Titular'),
(11724, 'AAC208-1', 'Asiganción'),
(11724, 'AAC208-3', 'Asiganción'),  -- NUEVO REG.
(13161, 'IEVS208-3', 'Titular'),
(10297, 'AAC208-2', 'Asignación'),
(14238, 'IAAA208', 'Asignación'),
(12769, 'DISW007', 'Asignación');   -- NUEVO REG.



INSERT INTO `asignaturaporgrupo`(`idAsignaturaPorGrupo`, `codigoAsignatura`, `numeroEmpleado`, `grupo`, `horasSemanales`, `turno`, `idSemestre`) VALUES 
(1, 'IAAA208', 14238, 1, 3, 'M', 1),
(2, 'IPCL209', 6475, 1, 6, 'M', 1),
(3, 'IFDP209', 5849, 1, 6, 'M', 1),
(4, 'DISW008', 5946, 1, 6, 'M', 1),
(5, 'ICIL209', 5895, 1, 4, 'M', 1),
(6, 'IAAA208', 14238, 2, 3, 'V', 1),
(7, 'IPCL209', 6475, 2, 6, 'V', 1),
(8, 'IFDP209', 5849, 2, 6, 'V', 1),
(9, 'DISW008', 5946, 2, 6, 'V', 1),
(10, 'ICIL209', 5895, 2, 4, 'V', 1),
(11, 'IAYC209', 2440, 1, 6, 'M', 1),
(12, 'DISW009', 4798, 1, 7, 'M', 1),
(13, 'IPOO209', 12890, 1, 7, 'M', 1),
(14, 'DISW006', 3678, 1, 5, 'M', 1),
(15, 'IEYP209', 3753, 1, 6, 'M', 1),
(16, 'ILYE209', 5895, 1, 4, 'M', 1),
(17, 'IEVS208-2', 10862, 1, 2, 'M', 1),
(18, 'IAYC209', 7767, 2, 6, 'V', 1),
(19, 'DISW009', 4798, 2, 7, 'V', 1),
(20, 'IPOO209', 12890, 2, 7, 'V', 1),
(21, 'DISW006', 3678, 2, 5, 'V', 1),
(22, 'IEYP209', 5670, 2, 6, 'V', 1),
(23, 'ILYE209', 11272, 2, 4, 'V', 1),
(24, 'IEVS208-2', 10862, 2, 2, 'V', 1),
(25, 'DISW003', 3678, 1, 7, 'M', 1),
(26, 'IIAR209', 1143, 1, 6, 'M', 1),
(27, 'IGRF209', 13707, 1, 6, 'M', 1),
(28, 'IABD209', 7767, 1, 6, 'M', 1),
(29, 'DISW015', 3998, 1, 6, 'M', 1),
(30, 'ICYE209', 11272, 1, 4, 'M', 1),
(31, 'AAC208-3', 11724, 1, 2, 'M', 1),
(32, 'DISW003', 3678, 2, 7, 'V', 1),
(33, 'IIAR209', 1143, 2, 6, 'V', 1),
(34, 'IGRF209', 13707, 2, 6, 'V', 1),
(35, 'IABD209', 7767, 2, 6, 'V', 1),
(36, 'DISW015', 3998, 2, 6, 'V', 1),
(37, 'ICYE209', 11272, 2, 4, 'V', 1),
(38, 'AAC208-3', 11724, 2, 2, 'V', 1),
(39, 'DISW018', 7767, 1, 6, 'V', 1),
(40, 'DISW007', 12769, 1, 5, 'V', 1),
(41, 'IAFI209', 3753, 1, 6, 'V', 1),
(42, 'DISW001', 4798, 1, 5, 'V', 1),
(43, 'DISW016', 1143, 1, 5, 'V', 1),
(44, 'DISW011-1', 11934, 1, 7, 'X', 1),
(45, 'DISW011-2', 5670, 1, 7, 'X', 1),
(46, 'DISW011-3', 2440, 1, 7, 'X', 1),
(47, 'DISW014-1', 13707, 1, 9, 'X', 1),
(48, 'DISW014-1', 12890, 1, 9, 'X', 1);

