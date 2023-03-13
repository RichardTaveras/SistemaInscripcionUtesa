SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `inscripcion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inscripcion`;

CREATE TABLE `datos_inscripcion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `acta_nacimiento` varchar(255) NOT NULL,
  `certificacion_bachiller` varchar(255) NOT NULL,
  `record_calificaciones` varchar(255) NOT NULL,
  `certificado_salud` varchar(255) NOT NULL,
  `cedula_identidad` varchar(255) NOT NULL,
  `estado` varchar(10) DEFAULT 'pendiente',
  `accion` enum('aprobar','rechazar') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `datos_inscripcion` (`id`, `nombre`, `apellido`, `email`, `telefono`, `direccion`, `foto`, `acta_nacimiento`, `certificacion_bachiller`, `record_calificaciones`, `certificado_salud`, `cedula_identidad`, `estado`, `accion`) VALUES
(3, 'Marco', 'Sosa', 'pachecomarte.sap@gmail.com', '829-494-6176', '27 de la plaza de la tablita', 'f1.png', 'f2.png', 'f3.png', 'f4.png', 'f5.png', 'f6.png', 'aprobado', NULL),
(5, 'Richard ', 'Taveras', 'richardtaveras@gmail.com', '829456765', 'Licey', 'f6.png', 'f6.png', 'f6.png', 'f6.png', 'f6.png', 'f6.png', 'aprobado', NULL);

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre_documento` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `requerido` tinyint(1) NOT NULL DEFAULT 0,
  `tipo_archivo_permitido` varchar(255) NOT NULL,
  `tamano_maximo_permitido` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `informacion_academica` (
  `id_estudiante` int(11) NOT NULL,
  `nivel_educativo` enum('Primaria','Secundaria','Técnico','Superior') NOT NULL,
  `institucion` varchar(100) NOT NULL,
  `fecha_graduacion` date NOT NULL,
  `promedio` float NOT NULL,
  `carrera_interes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `informacion_contacto` (
  `id_estudiante` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `informacion_personal` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(50) NOT NULL,
  `genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `estado_civil` enum('Soltero/a','Casado/a','Viudo/a','Divorciado/a') NOT NULL,
  `ocupacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `solicitud_inscripcion` (
  `id` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `estado` enum('Pendiente','Aprobada','Rechazada') NOT NULL DEFAULT 'Pendiente',
  `comentarios` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` enum('estudiante','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuarios` (`id`, `usuario`, `correo`, `password`, `rol`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin'),
(2, 'Marc', 'bryanmarcgames@gmail.com', '123', 'estudiante'),
(3, 'Richard', 'richard@gmail.com', '123', 'estudiante'),
(4, 'Ramon', 'ramon@gmail.com', '123', 'estudiante');


ALTER TABLE `datos_inscripcion`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `fk_solicitud_estudiante` (`id_solicitud`),
  ADD KEY `fk_estudiantes_usuarios` (`id_usuario`);

ALTER TABLE `informacion_academica`
  ADD PRIMARY KEY (`id_estudiante`);

ALTER TABLE `informacion_contacto`
  ADD PRIMARY KEY (`id_estudiante`);

ALTER TABLE `informacion_personal`
  ADD PRIMARY KEY (`id_estudiante`);

ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_estudiante` (`id_estudiante`);

ALTER TABLE `solicitud_inscripcion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `datos_inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `solicitud_inscripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;


ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id`) REFERENCES `estudiantes` (`id_estudiante`);

ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `informacion_personal` (`id_estudiante`),
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `informacion_contacto` (`id_estudiante`),
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`id_estudiante`) REFERENCES `informacion_academica` (`id_estudiante`),
  ADD CONSTRAINT `fk_estudiantes_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_solicitud_estudiante` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud_inscripcion` (`id`);

ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`);

ALTER TABLE `solicitud_inscripcion`
  ADD CONSTRAINT `solicitud_inscripcion_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
