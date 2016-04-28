-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 24-11-2015 a las 00:05:12
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `escuelacruzroja`
--

create database `escuelacruzroja`;
use `escuelacruzroja`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL COMMENT 'id del admin',
  `d_contra` varchar(60) DEFAULT NULL COMMENT 'contraseña de administrador',
  `d_nombre` varchar(60) DEFAULT NULL COMMENT 'nombre del admin',
  `d_apellidopaterno` varchar(60) DEFAULT NULL COMMENT 'apellido paterno del admin',
  `d_apellidomaterno` varchar(60) DEFAULT NULL COMMENT 'apellido materno del admin',
  `d_fechanac` date DEFAULT NULL COMMENT 'fecha de nacimiento',
  `d_edad` int(11) DEFAULT NULL COMMENT 'edad',
  `d_lugarnac` varchar(60) DEFAULT NULL COMMENT 'lugar de nacimiento',
  `d_nacionalidad` varchar(60) DEFAULT NULL COMMENT 'nacionalidad',
  `d_sexo` varchar(1) DEFAULT NULL COMMENT 'sexo',
  `d_estadocivil` varchar(60) DEFAULT NULL COMMENT 'estado civil',
  `d_gposanguineo` varchar(16) DEFAULT NULL COMMENT 'grupo sanguíneo',
  `d_rh` varchar(16) DEFAULT NULL COMMENT 'rh',
  `d_curp` varchar(20) DEFAULT NULL COMMENT 'curp',
  `d_servmedico` varchar(60) DEFAULT NULL COMMENT 'servicio médico',
  `d_trabajo` varchar(254) DEFAULT NULL COMMENT 'trabajo',
  `d_enfermedades` varchar(254) DEFAULT NULL COMMENT 'enlistar enfermedades',
  `d_alergias` varchar(254) DEFAULT NULL COMMENT 'alergias',
  `d_debilidadmotriz` varchar(254) DEFAULT NULL COMMENT 'alguna debilidad motriz',
  `d_domicilio` varchar(254) DEFAULT NULL COMMENT 'domicilio',
  `d_numext` varchar(16) DEFAULT NULL COMMENT 'nùmero ext',
  `d_numint` varchar(16) DEFAULT NULL COMMENT 'núm int',
  `d_cp` varchar(16) DEFAULT NULL COMMENT 'código postal',
  `d_colonia` varchar(254) DEFAULT NULL COMMENT 'colonia',
  `d_municipio` varchar(254) DEFAULT NULL COMMENT 'municipio',
  `d_numlocal` int(11) DEFAULT NULL COMMENT 'numero telefonico local',
  `d_numcelular` int(11) DEFAULT NULL COMMENT 'numero telefonico celular',
  `d_escolaridad` varchar(254) DEFAULT NULL COMMENT 'escolaridad',
  `d_otrosestudios` varchar(254) DEFAULT NULL COMMENT 'otros estudios',
  `d_email` varchar(60) NOT NULL COMMENT 'correo electronico del administrador',
  `d_fecharegistro` date DEFAULT NULL COMMENT 'fecha en el que se registro'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL COMMENT 'id de alumno',
  `a_contra` varchar(60) NOT NULL COMMENT 'contraseña de alumno',
  `a_nombre` varchar(60) DEFAULT NULL COMMENT 'nombre',
  `a_apellidpaterno` varchar(60) DEFAULT NULL COMMENT 'apellido paterno',
  `a_apellidomaterno` varchar(60) DEFAULT NULL COMMENT 'apellido materno',
  `a_fechanac` date DEFAULT NULL COMMENT 'fecha de nacimiento',
  `a_lugarnac` varchar(60) DEFAULT NULL COMMENT 'lugar de nacimiento',
  `a_nacionalidad` varchar(60) DEFAULT NULL COMMENT 'nacionalidad',
  `a_sexo` varchar(1) DEFAULT NULL COMMENT 'sexo',
  `a_estadocivil` varchar(60) DEFAULT NULL COMMENT 'estado civil',
  `a_gposanguineo` varchar(16) DEFAULT NULL COMMENT 'grupo sanguineo',
  `a_rh` varchar(16) DEFAULT NULL COMMENT 'rh',
  `a_curp` varchar(20) DEFAULT NULL COMMENT 'curp',
  `a_servmedico` varchar(60) DEFAULT NULL COMMENT 'servicio médico',
  `a_trabajo` varchar(254) DEFAULT NULL COMMENT 'trabajo',
  `a_enfermedades` varchar(254) DEFAULT NULL COMMENT 'enfermedades',
  `a_alergias` varchar(254) DEFAULT NULL COMMENT 'alergias',
  `a_debilidadmotriz` varchar(254) DEFAULT NULL COMMENT 'indicar alguna debilidad motriz',
  `a_domicilio` varchar(254) DEFAULT NULL COMMENT 'domicilio',
  `a_cp` varchar(16) DEFAULT NULL COMMENT 'codigo postal',
  `a_colonia` varchar(254) DEFAULT NULL COMMENT 'colonia',
  `a_municipio` varchar(254) DEFAULT NULL COMMENT 'municipio',
  `a_numlocal` varchar(30) DEFAULT NULL COMMENT 'número local',
  `a_nompapa` varchar(60) DEFAULT NULL COMMENT 'nombre del papa',
  `a_ocupacionpapa` varchar(60) DEFAULT NULL COMMENT 'nombre de la mama',
  `a_empresapapa` varchar(60) DEFAULT NULL COMMENT 'empresa en donde labora el papa',
  `a_sueldopapa` float DEFAULT NULL COMMENT 'sueldo del papá',
  `a_nommama` varchar(60) DEFAULT NULL COMMENT 'sueldo de la mamá',
  `a_ocupacionmama` varchar(60) DEFAULT NULL COMMENT 'ocupación de la mama',
  `a_empresamama` varchar(60) DEFAULT NULL COMMENT 'empresa en donde labora la mamá',
  `a_sueldomama` float DEFAULT NULL COMMENT 'sueldo dae la mama',
  `a_otrosestudios` varchar(254) DEFAULT NULL COMMENT 'otros estudios',
  `a_suspencionestudios` varchar(254) DEFAULT NULL COMMENT 'suspenciones de estudios',
  `a_matreprobadas` varchar(254) DEFAULT NULL COMMENT 'de materias reprobadas',
  `a_aval` varchar(100) DEFAULT NULL COMMENT 'persona que apoya economicamente al alumno',
  `a_promocionesc` varchar(254) DEFAULT NULL COMMENT 'por donde se entero el alumno de la escuela',
  `a_objcruzroja` varchar(254) DEFAULT NULL COMMENT 'porque el alumno quiere estudiar en la cruz roja',
  `a_objenfermeria` varchar(254) DEFAULT NULL COMMENT 'porque quiere estudiar enfermería',
  `a_otracarrera` varchar(254) DEFAULT NULL COMMENT 'alguna otra carrera estudiada',
  `a_ceneval` float DEFAULT NULL COMMENT 'puntaje en ceneval',
  `a_regescuela` varchar(254) DEFAULT NULL COMMENT 'registro de la escuela',
  `a_psicometrico` varchar(254) DEFAULT NULL COMMENT 'resultado en examen psicometrico',
  `a_entrevista` varchar(254) DEFAULT NULL COMMENT 'entrevista realizada',
  `a_email` varchar(60) NOT NULL COMMENT 'correo electronico de alumno',
  `a_fecharegistro` date DEFAULT NULL COMMENT 'fecha en la que se registro el alumno',
  `a_estatus` varchar(50) NOT NULL DEFAULT 'Activo',
  `a_celPadre` varchar(50) NOT NULL,
  `a_celMadre` varchar(50) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL COMMENT 'grupo al que pertenece el alumno',
  `id_carrera` int(11) DEFAULT NULL COMMENT 'carrera a la que pertenece el alumno'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Registro administrativo del alumno' AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL COMMENT 'id del curso',
  `id_grupo` int(11) DEFAULT NULL COMMENT 'grupo al que pertenece el curso',
  `id_maestro` int(11) DEFAULT NULL COMMENT 'maestro que imparte el curso',
  `cu_nombre` varchar(60) DEFAULT NULL COMMENT 'nombre del curso',
  `cu_objetivo` varchar(254) DEFAULT NULL COMMENT 'objetivo del curso',
  `cu_numunidades` int(11) DEFAULT NULL COMMENT 'unidades correspondientes al curso',
  `cu_fecharegistro` date DEFAULT NULL COMMENT 'fecha de registro del curso',
  `cu_aula` varchar(50) NOT NULL,
  `cu_dias` varchar(60) NOT NULL,
  `cu_horaInicio` time NOT NULL,
  `cu_isPrioridadAlta` varchar(2) NOT NULL,
  `cu_horaFinal` time NOT NULL,
  `cu_ultimaFechaAsistencia` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `inscritos`
--

CREATE TABLE `inscritos` (
  `id_alumno` int(11) NOT NULL COMMENT 'id del alumno',
  `id_curso` int(11) NOT NULL COMMENT 'id del curso',
  `inscr_asistencia` smallint(6) DEFAULT NULL COMMENT 'total de faltas',
  `inscr_calificacion` float DEFAULT NULL COMMENT 'calificación final del curso',
  `inscr_calificacion1` float NOT NULL COMMENT 'calificación primer parcial',
  `inscr_calificacion2` float NOT NULL COMMENT 'calificación segundo parcial',
  `inscr_calificacion3` float NOT NULL COMMENT 'calificación tercer parcial',
  `inscr_fecharegistro` date DEFAULT NULL COMMENT 'fecha de registro ',
  `inscr_fechasFaltas` text NOT NULL,
  `inscr_Cursado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `id_maestro` int(11) NOT NULL COMMENT 'id ',
  `m_contra` varchar(60) NOT NULL COMMENT 'contraseña del maestro',
  `m_nombre` varchar(60) DEFAULT NULL COMMENT 'nombre',
  `m_apellidopaterno` varchar(60) DEFAULT NULL COMMENT 'apellido paterno',
  `m_apellidomaterno` varchar(60) DEFAULT NULL COMMENT 'apellido materno',
  `m_fechanac` date DEFAULT NULL COMMENT 'fecha de nacimiento',
  `m_edad` int(11) DEFAULT NULL COMMENT 'edad',
  `m_lugarnac` varchar(60) DEFAULT NULL COMMENT 'lugar de nacimiento',
  `m_nacionalidad` varchar(60) DEFAULT NULL COMMENT 'nacionalidad',
  `m_sexo` varchar(1) DEFAULT NULL COMMENT 'sexo',
  `m_estadocivil` varchar(60) DEFAULT NULL COMMENT 'estado civil',
  `m_gposanguineo` varchar(16) DEFAULT NULL COMMENT 'grupo sanguíneo',
  `m_rh` varchar(16) DEFAULT NULL COMMENT 'rh',
  `m_curp` varchar(20) DEFAULT NULL COMMENT 'curp',
  `m_servmedico` varchar(60) DEFAULT NULL COMMENT 'servicio medico',
  `m_trabajo` varchar(60) DEFAULT NULL COMMENT 'trabajo',
  `m_enfermedades` varchar(60) DEFAULT NULL COMMENT 'enfermedades',
  `m_alergias` varchar(60) DEFAULT NULL COMMENT 'alergias',
  `m_debilidadmotriz` varchar(60) DEFAULT NULL COMMENT 'alguna debilidad motriz',
  `m_domicilio` varchar(60) DEFAULT NULL COMMENT 'domicilio',
  `m_numext` varchar(16) DEFAULT NULL COMMENT 'num ext',
  `m_numint` varchar(60) DEFAULT NULL COMMENT 'num int',
  `m_cp` varchar(16) DEFAULT NULL COMMENT 'codigo postal',
  `m_colonia` varchar(60) DEFAULT NULL COMMENT 'colonia',
  `m_municipio` varchar(60) DEFAULT NULL COMMENT 'municipio',
  `m_numlocal` int(11) DEFAULT NULL COMMENT 'numero local',
  `m_numcelular` int(11) DEFAULT NULL COMMENT 'numero celular',
  `m_escolaridad` varchar(60) DEFAULT NULL COMMENT 'escolaridad',
  `m_otrosestudios` varchar(60) DEFAULT NULL COMMENT 'otros estudios',
  `m_email` varchar(60) DEFAULT NULL COMMENT 'correo electronico del profesor',
  `m_fecharegistro` date DEFAULT NULL COMMENT 'fecha de registro',
  `m_estudios` text NOT NULL,
  `m_estatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Estructura de tabla para la tabla `nivel_Escolar`
--

CREATE TABLE `nivel_Escolar` (
  `id_nivelEscolar` int(11) NOT NULL COMMENT 'id del semestre',
  `ne_desc` varchar(60) DEFAULT NULL COMMENT 'descripción del semestre',
  `id_carrera` int(11) DEFAULT NULL COMMENT 'id de la carrera que pertence',
  `id_periodo` int(11) DEFAULT NULL COMMENT 'id del periodo al que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL COMMENT 'id del carrera',
  `c_nombre` varchar(60) DEFAULT NULL COMMENT 'nombre del semestre',
  `c_desc` text NOT NULL COMMENT 'descripción del semestre',
  `c_fechaCreacion` date DEFAULT NULL COMMENT 'fecha de registro',
  `c_estatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id_periodo` int(11) NOT NULL COMMENT 'id del periodo',
  `per_desc` varchar(60) DEFAULT NULL COMMENT 'descripcion del periodo',
  `per_fechaCreacion` date NOT NULL COMMENT 'fecha de inicio de periodo',
  `per_estatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL COMMENT 'id del grupo',
  `gru_nombre` varchar(60) DEFAULT NULL COMMENT 'Nombre del grupo',
  `id_nivelEscolar` int(11) DEFAULT NULL COMMENT 'nivel escolar del grupo',
  `id_periodo` int(11) DEFAULT NULL COMMENT 'periodo al que pertenece el grupo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del permiso',
  `id_administrador` int(11) DEFAULT NULL COMMENT 'administrador relicionado al permiso',
  `p_aAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para altas de administradores',
  `p_bAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para bajas de administradores',
  `p_cAdmin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para cambios de administradores',
  `p_aMaestro` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para altas de maestro',
  `p_bMaestro` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para bajas de maestro',
  `p_cMaestro` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para cambios de maestro',

  `p_aAlumno` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para altas de alumno',
  `p_bAlumno` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para bajas de alumno',
  `p_cAlumno` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para cambios de alumno',

  `p_aPeriodo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para altas de periodo',
  `p_bPeriodo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para bajas de periodo',
  `p_cPeriodo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para cambios de periodo',

  `p_aGruposCursos` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para altas de grupos y cursos',
  `p_bGruposCursos` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para bajas de grupos y cursos',
  `p_cGruposCursos` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso para cambios de grupos y cursos',

  `p_verReportes` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'permiso ver los reportes que genera el sistema',


  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Indices de la tabla `permisos`
--

ALTER TABLE `permisos`
 ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `semestre`
--

ALTER TABLE `grupo`
 ADD PRIMARY KEY (`id_grupo`);
 
--
-- Indices de la tabla `periodo`
--

ALTER TABLE `periodo`
 ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `carrera`
--

ALTER TABLE `carrera`
 ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `administrador`
--

ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `alumno`
--

ALTER TABLE `alumno`
 ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `curso`
--

ALTER TABLE `curso`
 ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `inscritos`
--

ALTER TABLE `inscritos`
 ADD PRIMARY KEY (`id_alumno`,`id_curso`);

--
-- Indices de la tabla `maestro`
--

ALTER TABLE `maestro`
 ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `semestre`
--

ALTER TABLE `nivel_Escolar`
 ADD PRIMARY KEY (`id_nivelEscolar`);

--
-- AUTO_INCREMENT de la tabla `administrador`
--

ALTER TABLE `administrador`
MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del admin',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `alumno`
--

ALTER TABLE `alumno`
MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de alumno',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `curso`
--

ALTER TABLE `curso`
MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del curso',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `semestre`
--

ALTER TABLE `nivel_Escolar`
MODIFY `id_nivelEscolar` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del semestre',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `periodo`
--

ALTER TABLE `periodo`
MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del periodo',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `permisos`
--

ALTER TABLE `permisos`
MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del permiso',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `carrera`
--

ALTER TABLE `carrera`
MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del carrera',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `grupo`
--

ALTER TABLE `grupo`
MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del grupo',AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `grupo`
--

ALTER TABLE `maestro`
MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del maestro',AUTO_INCREMENT=1;