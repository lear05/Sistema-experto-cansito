-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2016 a las 23:26:25
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cansito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_acc` int(11) NOT NULL,
  `id_mod` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acc`, `id_mod`, `id_per`, `estado`) VALUES
(1, 1, 1, 'A'),
(2, 2, 1, 'A'),
(3, 9, 1, 'A'),
(4, 10, 1, 'A'),
(5, 11, 1, 'A'),
(10, 16, 1, 'A'),
(11, 17, 1, 'A'),
(12, 18, 1, 'A'),
(18, 25, 1, 'A'),
(19, 26, 1, 'A'),
(20, 24, 1, 'A'),
(21, 27, 1, 'A'),
(22, 28, 1, 'A'),
(23, 29, 1, 'A'),
(24, 30, 1, 'A'),
(25, 31, 1, 'A'),
(26, 33, 1, 'A'),
(27, 32, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animal`
--

CREATE TABLE `animal` (
  `id_ani` int(11) NOT NULL,
  `id_tani` int(11) NOT NULL,
  `id_cli` int(11) NOT NULL,
  `nom_ani` varchar(40) NOT NULL,
  `peso_ani` decimal(5,2) NOT NULL,
  `edad_ani` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animal`
--

INSERT INTO `animal` (`id_ani`, `id_tani`, `id_cli`, `nom_ani`, `peso_ani`, `edad_ani`, `estado`) VALUES
(6, 2, 5, 'boby', '5.00', 3, 'A'),
(7, 2, 8, 'Spyke', '2.00', 6, 'A'),
(8, 1, 7, 'misha', '6.00', 5, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cli` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `nom_cli` varchar(60) NOT NULL,
  `ape_cli` varchar(60) NOT NULL,
  `dni_cli` char(8) NOT NULL,
  `tel_cli` varchar(20) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cli`, `id_dis`, `nom_cli`, `ape_cli`, `dni_cli`, `tel_cli`, `estado`) VALUES
(5, 2, 'luis', 'amasifuen', '45454545', '45454545', 'A'),
(6, 2, 'luis', 'amasifuen', '45454545', '45454545', 'I'),
(7, 1, 'junior', 'tenazona', '96963254', '898575', 'A'),
(8, 3, 'wendy', 'cordova', '45457896', '898789', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocimientos`
--

CREATE TABLE `conocimientos` (
  `id_con` int(11) NOT NULL,
  `nombre_con` varchar(60) NOT NULL,
  `cau_con` text NOT NULL,
  `pre_con` text NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conocimientos`
--

INSERT INTO `conocimientos` (`id_con`, `nombre_con`, `cau_con`, `pre_con`, `estado`) VALUES
(1, 'conocimientos 2', '', '', 'I'),
(2, 'Corona virus', 'a', 'a', 'I'),
(3, 'Parvovirus', 'causa', 'prevención', 'I'),
(4, 'Distemper canino', '-', '-', 'I'),
(5, 'Parvovirus', 'La enfermedad es causada por un virus muy contagioso que es transmitido sobre todo por perros que oralmente se ponen en contacto con heces infectadas.', 'Seguir estrictamente la vacunación que te aconseje el veterinario, desparasitar a tu mascota con la regularidad estipulada, Higiene física del perro.\r\nHigienizar todo el entorno de la casa regularmente con lejía.\r\nMantener la comida en un sitio libre de roedores.\r\nLimpiar sus utensilios como comedero, juguetes...\r\nNo dejar que tu cachorro sin vacunar salga a la calle o esté en contacto con otros perros.\r\nEvitar el contacto con heces.\r\n', 'A'),
(6, 'Corona virus', 'El coronavirus canino se excreta a través de las heces, por lo que la vía de contagio mediante la cual esta carga vírica pasa de un perro a otro es a través del contacto fecal-oral, siendo un importante grupo de riesgo todos aquellos perros que presentan una alteración de la conducta llamada coprofagia, que consiste en ingerir heces.', 'Seguir con el programa de vacunación establecido.\r\nMantener unas condiciones de higiene suficiente en los accesorios de nuestro perro, tales como juguetes o mantas.\r\nTambién debemos recordar que una alimentación adecuada y el suficiente ejercicio físico ayudarán a que el sistema inmunitario de nuestro perro se mantenga en un estado óptimo.', 'A'),
(7, 'Distemper canino', 'El contagio ocurre cuando un animal sano entra en contacto con partículas virales que están en el aire en forma de aerosol. Por supuesto, un animal enfermo tiene que estar presente, o haber estado, en la zona de contagio.', 'La vacuna se recibe por primera vez entre las 6 y 8 semanas de edad, y se recibe un refuerzo de manera anual. Durante el embarazo de la perra, también es un momento en el que debemos prestar atención a la vacunación ya que de esta forma los anticuerpos se transmitirán a los cachorros durante la lactancia. Recuerda que no debes llevar a tu perro fuera del hogar sin las vacunas correspondientes, pondrás en riesgo su vida.', 'A'),
(8, 'Parasitosis', 'Los perros se infestan al ingerir huevos que se encuentran en el suelo, en la vegetación, al comer pequeños mamíferos o pájaros que poseen las larvas. Los huevos eclosionan en el intestino, quedando libres larvas que migran hasta el hígado a través del sistema circulatorio. Desde el hígado siguen sirviéndose del sistema circulatorio para llegar hasta los pulmones, para más tarde comenzar un viaje por el cuerpo de nuestro animal, permaneciendo vivas durante largos periodos de tiempo.', 'El tratamiento para todos estos tipos de parásitos intestinales requiere un antiparasitario intestinal. Debe haber una dosis inicial, seguida de otros 10 días más tarde. En algunos casos podría ser necesario volver a repetir el tratamiento. El tratamiento debe administrarse a todas las mascotas expuestas. Se deben tomar medidas sanitarias inmediatamente.', 'A'),
(9, 'Sarna', 'La sarna se ceba con los perros débiles y con los que tienen parásitos intestinales. Además, algunos tipos de sarnas son muy contagiosos: mantener al perro alejado de animales infectados por ácaros.', '.', 'A'),
(10, 'Leishmaniosis', 'La Leishmaniasis una enfermedad producida por un parásito llamado Leishmania.\r\n\r\nEste parásito viaja en un mosquito que actúa de vector, es decir, es el mosquito el que lo transmite al perro a través de una picadura. El mosquito responsable de la transmisión de esta enfermedad es el mosquito flebotomo y se encuentra en el ambiente en los meses de mayor calor, generalmente de mayo a septiembre.', 'Recuerda que la prevención es fundamental, a veces es tan sencillo como adquirir un collar impregnado de un determinado insecticida que se libera progresivamente y actúa durante 6 meses. ', 'A'),
(11, 'Hepatitis', 'La hepatitis canina se produce por una inflamación del hígado, que puede estar ocasionada por una mala alimentación o por una exposición reiterada a distintos tóxicos, lo que afecta progresivamente al hígado y puede llegar a causar un daño crónico.', 'Suero polivalente: Previene a corto plazo y se recomienda cuando aún no ha sido posible el inicio del programa de vacunación.\r\nVacuna con virus inactivado: Se requieren dos dosis y el periodo de protección oscila entre los 6 y 9 meses\r\nVacuna con virus atenuado: Únicamente se requiere una dosis y la protección es tan eficaz como duradera.', 'A'),
(12, 'Meningitis', 'Irritación química\r\nAlergias a medicamentos\r\nHongos\r\nParásitos \r\nTumores', 'La vacuna contra el Haemophilus (vacuna HiB) aplicada a los niños ayuda.\r\nLa vacuna antineumocócica conjugada se aplica a niños y adultos.\r\nLa vacuna meningocócica se aplica a niños y adultos; algunas comunidades llevan a cabo campañas de vacunación tras un brote de meningitis meningocócica.\r\n', 'A'),
(13, 'Dermatitis acral', 'A partir de una herida o síntomas de molestia en su dermis, el factor desencadenante, el perro empieza a lamerse de forma compulsiva e incansable, generalmente sobre un área concreta del cuerpo que suele ser una pata.', 'A partir de una herida o síntomas de molestia en su dermis, el factor desencadenante, el perro empieza a lamerse de forma compulsiva e incansable, generalmente sobre un área concreta del cuerpo que suele ser una pata.', 'A'),
(14, 'Leptospirosis', 'El contagio de la leptospirosis canina se produce cuando la bacteria penetra al animal a través de la mucosa nasal, bucal, conjuntiva o bien a través de la piel que presenta algún tipo de herida.', 'El contagio de la leptospirosis canina se produce cuando la bacteria penetra al animal a través de la mucosa nasal, bucal, conjuntiva o bien a través de la piel que presenta algún tipo de herida.', 'A'),
(15, 'Piómetra', 'Parece ser que las influencias hormonales de la progesterona (hormona segregada por el cuerpo lúteo del ovario) provocan quistes en el endometrio (capa más interna del útero) y una mayor secreción de moco en el endometrio, que, junto con la entrada de bacterias, aumentan de forma considerable el riesgo de infección.', '.', 'A'),
(16, 'Cistitis', 'Son varias las causas pueden desarrollar cistitis en nuestro can, aunque lo más común es que sea provocada por la intrusión de bacterias a través de los intestinos. Las bacterias empiezan habitando en la piel que recubre la zona del ano para pasar mediante la uretra hasta llegar a la vejiga y empezar a colonizarla, provocando la infección y consiguiente inflamación.', 'Para prevenir la cistitis canina es fundamental que llevemos al día el calendario de vacunas de nuestro perro y mantengamos una estricta higiene. En especial si nuestro compañero es una hembra, aconsejamos limpiar la zona del ano y la vagina después de defecar y orinar siempre.\r\nPor otro lado, una deshidratación puede favorecer la aparición de una infección urinaria, por lo que asegurar que nuestro perro bebe agua es una medida de prevención que no suele fallar.\r\n', 'A'),
(17, 'Cáncer de piel', 'Suelen comenzar por bultos o engrosamientos anormales en la piel y heridas de aspecto extraño o bien que no cicatrizan.', 'Aunque el cáncer es imposible de prevenir o erradicar al 100% podemos ofrecer a nuestro perro una alimentación de alta gama y unos cuidados excelentes para que se encuentre en el mejor estado de salud posible dentro de sus posibilidades.', 'A'),
(18, 'Torsión gástrica', 'Gran ingesta de comida o líquidos: el animal ingiere mucha comida o líquidos de forma rápida, y después de realizar ejercicio físico. Es típico de perros jóvenes de raza grande. En perros viejos se suele dar por una acumulación de aire que no puede ser evacuada de forma fisiológica.\r\nEstrés: puede darse en perros que fácilmente se estresen debido a cambios en su rutina, apareamientos, excitación excesiva, etc.\r\nPariente con historial de vólvulo gástrico.', 'Fraccionar el alimento: se trata de evitar que nuestra mascota ingiera grandes cantidades de comida. El objetivo es repartir el alimento a lo largo del día, en dos o tres raciones más pequeñas en lugar de una más grande.\r\nEvitar que beba mucha agua de forma seguida, sobre todo después de la comida.\r\nRestringir el ejercicio físico: se ha de evitar que el perro haga mucha actividad física antes y después de la comida, dejando 2 horas de margen.\r\nNo proporcionar alimentos a última hora de la noche.\r\nNo estresar al animal mientras come: se debe dejar al can que coma tranquilo y no se estrese.', 'A'),
(19, 'Diabetes', 'Se produce por falta o deficiencia de la hormona que controla la utilización de los hidratos de carbono, transformados en azúcar, por parte del organismo. Los perros son animales carnívoros, los dueños cada vez los alimentan más a base de cereales y golosinas con un alto índice glucémico, produciendo alteraciones en el metabolismo de la glucosa y obesidad, factores determinantes para que se desarrolle la diabetes mellitus en perros.', 'Proporcionar al animal una alimentación correcta, adaptada a su situación, donde la parte fundamental de su dieta no sean los hidratos de carbono sino los alimentos de origen animal. Esto se consigue proporcionando a nuestro compañero una dieta natural bien proporcionada y rica en productos animales, o bien, proporcionándole un pienso de calidad, que no se base en cereales de deshecho.', 'A'),
(20, 'Resfriado', 'Por lo general está provocado por virus como el Para influenza, muy común y contagioso; o por el Adenovirus de tipo 2, también llamado tos de las perreras. Ambos provocan tos, estornudos y los demás síntomas del resfriado. ', '.', 'A'),
(21, 'Toxoplasmosis', '.', '.', 'I'),
(22, 'Toxocara cati', '.', '.', 'A'),
(23, 'Otitis', '.', '.', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conocimiento_hecho`
--

CREATE TABLE `conocimiento_hecho` (
  `id_con` int(11) NOT NULL,
  `id_hec` int(11) NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conocimiento_hecho`
--

INSERT INTO `conocimiento_hecho` (`id_con`, `id_hec`, `peso`) VALUES
(3, 3, 4),
(3, 5, 4),
(3, 2, 2),
(3, 4, 2),
(3, 6, 5),
(3, 7, 5),
(3, 8, 2),
(3, 9, 2),
(3, 10, 3),
(3, 11, 3),
(3, 12, 4),
(3, 13, 4),
(3, 14, 3),
(3, 15, 3),
(3, 16, 1),
(3, 17, 1),
(3, 18, 4),
(3, 19, 4),
(2, 3, 5),
(2, 5, 5),
(2, 2, 4),
(2, 4, 4),
(2, 6, 5),
(2, 7, 5),
(2, 8, 5),
(2, 9, 5),
(2, 10, 5),
(2, 11, 5),
(2, 12, 5),
(2, 13, 5),
(2, 14, 3),
(2, 15, 3),
(2, 16, 2),
(2, 17, 2),
(2, 18, 3),
(2, 19, 3),
(4, 3, 3),
(4, 5, 3),
(4, 2, 2),
(4, 4, 2),
(4, 6, 3),
(4, 7, 3),
(4, 8, 4),
(4, 9, 4),
(4, 10, 3),
(4, 11, 3),
(4, 12, 5),
(4, 13, 5),
(4, 14, 5),
(4, 15, 5),
(4, 16, 5),
(4, 17, 5),
(4, 18, 2),
(4, 19, 2),
(4, 20, 2),
(4, 21, 2),
(6, 25, 4),
(6, 26, 4),
(6, 27, 4),
(5, 22, 4),
(5, 23, 4),
(5, 24, 4),
(7, 28, 4),
(7, 29, 4),
(7, 30, 4),
(7, 31, 4),
(11, 26, 3),
(11, 28, 3),
(11, 31, 3),
(11, 32, 4),
(11, 34, 4),
(11, 35, 4),
(11, 36, 4),
(11, 37, 4),
(11, 38, 4),
(21, 40, 4),
(21, 41, 4),
(21, 39, 4),
(21, 43, 4),
(21, 42, 4),
(23, 48, 4),
(23, 47, 4),
(22, 45, 4),
(22, 46, 4),
(22, 44, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id_dia` int(11) NOT NULL,
  `id_ani` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id_dia`, `id_ani`, `fecha`, `estado`) VALUES
(1, 6, '2016-12-12', 'A'),
(2, 8, '2016-12-12', 'A'),
(3, 7, '2016-12-12', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `id_dis` int(11) NOT NULL,
  `desc_dis` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`id_dis`, `desc_dis`, `estado`) VALUES
(1, 'Tarapoto', 'A'),
(2, 'Morales', 'A'),
(3, 'Banda de Shilcayo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hechos`
--

CREATE TABLE `hechos` (
  `id_hec` int(11) NOT NULL,
  `nombre_hec` varchar(60) NOT NULL,
  `id_tani` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hechos`
--

INSERT INTO `hechos` (`id_hec`, `nombre_hec`, `id_tani`, `estado`) VALUES
(2, 'Deshidratación', 1, 'I'),
(3, 'Diarrea sanguinolenta', 1, 'I'),
(4, 'Deshidratación', 2, 'I'),
(5, 'Diarrea sanguinolenta', 2, 'I'),
(6, 'Apatía', 1, 'I'),
(7, 'Apatía', 2, 'I'),
(8, 'Abundante diarrea', 1, 'I'),
(9, 'Abundante diarrea', 2, 'I'),
(10, 'Vómitos', 1, 'I'),
(11, 'Vómitos', 2, 'I'),
(12, 'Pérdida de peso', 1, 'I'),
(13, 'Pérdida de peso', 2, 'I'),
(14, 'Secreciones nasales', 1, 'I'),
(15, 'Secreciones nasales', 2, 'I'),
(16, 'Conjuntivitis', 1, 'I'),
(17, 'Conjuntivitis', 2, 'I'),
(18, 'Tos', 1, 'I'),
(19, 'Tos', 2, 'I'),
(20, 'Convulsiones', 1, 'I'),
(21, 'Convulsiones', 2, 'I'),
(22, 'Diarrea sanguinolenta', 2, 'A'),
(23, 'Deshidratación', 2, 'A'),
(24, 'Apatía', 2, 'A'),
(25, 'Abundante diarrea', 2, 'A'),
(26, 'Vómitos', 2, 'A'),
(27, 'Pérdida de peso', 2, 'A'),
(28, 'Secreciones nasales', 2, 'A'),
(29, 'Conjuntivitis', 2, 'A'),
(30, 'Tos', 2, 'A'),
(31, 'Convulsiones', 2, 'A'),
(32, 'Sed excesiva', 2, 'A'),
(33, 'coloración amarillenta de ojos y mucosas', 2, 'A'),
(34, 'Sangre en las mucosas', 2, 'A'),
(35, 'Dolor abdominal ', 2, 'A'),
(36, 'Fiebre', 2, 'A'),
(37, 'Pérdida del apetito', 2, 'A'),
(38, 'Edema subcutáneo', 2, 'A'),
(39, 'Fiebre', 1, 'A'),
(40, 'Anorexia', 1, 'A'),
(41, 'Diarrea', 1, 'A'),
(42, 'Vomito', 1, 'A'),
(43, 'Tos', 1, 'A'),
(44, 'Debilidad', 1, 'A'),
(45, 'Oclusiones intestinales.', 1, 'A'),
(46, 'obstrucción de las vías biliares.', 1, 'A'),
(47, 'Frecuentes sacudidas de la cabeza.', 1, 'A'),
(48, 'Zona de las orejas enrojecida ', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_mod` int(11) NOT NULL,
  `name_mod` varchar(60) NOT NULL,
  `alone` int(11) DEFAULT NULL,
  `id_padre` int(11) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `orden` int(11) NOT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_mod`, `name_mod`, `alone`, `id_padre`, `url`, `orden`, `icon`, `estado`) VALUES
(1, 'Accesos', 0, 0, 'javascript:void(0)', 9, 'fa fa-lock', 'A'),
(2, 'Opciones', 0, 1, 'modulo', 1, '', 'A'),
(9, 'Usuarios', 0, 1, 'persona', 2, '', 'A'),
(10, 'Perfiles', NULL, 1, 'perfil', 3, '', 'A'),
(11, 'Accesos', 0, 1, 'permiso', 4, '', 'A'),
(16, 'Parámetros', 0, 0, '', 2, 'fa fa-gears', 'A'),
(17, 'Sintomas', 0, 16, 'hechos', 2, '', 'A'),
(18, 'Enfermedades', 0, 16, 'conocimientos', 1, '', 'A'),
(24, 'Mantenimiento', 0, 0, '', 10, 'fa fa-gear', 'A'),
(25, 'Tipo Animal', 0, 16, 'tipo_animal', 3, '', 'A'),
(26, 'Consulta', 1, 0, 'consulta', 1, 'fa fa-question', 'A'),
(27, 'Clientes', 0, 24, 'cliente', 1, '', 'A'),
(28, 'Mascota', 0, 24, 'mascota', 2, '', 'A'),
(29, 'Distritos', 0, 24, 'distrito', 3, '', 'A'),
(30, 'Reportes', 0, 0, '', 3, 'fa fa-sliders', 'A'),
(31, 'Enfermedades comunes por tipo de animal', 0, 30, 'reporte/enfermedad_tipo', 1, '', 'A'),
(32, 'Clientes frecuentes', 0, 30, 'reporte/cliente', 2, '', 'A'),
(33, 'Enfermedades por distrito', 0, 30, 'reporte/enfermedad_distrito', 3, '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_per` int(11) NOT NULL,
  `name_per` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_per`, `name_per`, `estado`) VALUES
(1, 'Administrador', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_pers` int(11) NOT NULL,
  `id_per` int(11) NOT NULL,
  `nombre_pers` varchar(40) NOT NULL,
  `apaterno_pers` varchar(40) NOT NULL,
  `amaterno_pers` varchar(40) NOT NULL,
  `sexo_pers` char(1) NOT NULL,
  `direccion_pers` varchar(60) NOT NULL,
  `fnacimiento_pers` date NOT NULL,
  `telefono_pers` varchar(20) NOT NULL,
  `dni_pers` char(8) NOT NULL,
  `name_usu` varchar(20) NOT NULL,
  `pass_usu` varchar(80) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_pers`, `id_per`, `nombre_pers`, `apaterno_pers`, `amaterno_pers`, `sexo_pers`, `direccion_pers`, `fnacimiento_pers`, `telefono_pers`, `dni_pers`, `name_usu`, `pass_usu`, `estado`) VALUES
(1, 1, 'Admin', '.', '.', 'M', 'Jr. Manuel Arevalo Orbe 648', '1995-01-03', '998791816', '73473897', 'admin', '7363a0d0604902af7b70b271a0b96480', 'A'),
(3, 1, 'asas', 'asas', 'asas', 'M', 'asas', '2016-10-04', 'asasas', '12345678', 'andres', '7363a0d0604902af7b70b271a0b96480', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado`
--

CREATE TABLE `resultado` (
  `id_res` int(11) NOT NULL,
  `id_dia` int(11) NOT NULL,
  `id_con` int(11) NOT NULL,
  `por_res` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado`
--

INSERT INTO `resultado` (`id_res`, `id_dia`, `id_con`, `por_res`) VALUES
(1, 1, 11, '50.00'),
(2, 1, 7, '25.00'),
(3, 1, 6, '25.00'),
(4, 2, 22, '66.67'),
(5, 2, 23, '33.33'),
(6, 3, 11, '45.45'),
(7, 3, 7, '36.36'),
(8, 3, 6, '18.18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_animal`
--

CREATE TABLE `tipo_animal` (
  `id_tani` int(11) NOT NULL,
  `desc_tani` varchar(80) NOT NULL,
  `estado` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_animal`
--

INSERT INTO `tipo_animal` (`id_tani`, `desc_tani`, `estado`) VALUES
(1, 'Gato', 'A'),
(2, 'Perro', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acc`),
  ADD KEY `modulo_acceso_fk` (`id_mod`),
  ADD KEY `perfil_acceso_fk` (`id_per`);

--
-- Indices de la tabla `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id_ani`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `conocimientos`
--
ALTER TABLE `conocimientos`
  ADD PRIMARY KEY (`id_con`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`id_dis`);

--
-- Indices de la tabla `hechos`
--
ALTER TABLE `hechos`
  ADD PRIMARY KEY (`id_hec`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_mod`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_per`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_pers`),
  ADD KEY `fk_perfil_persona` (`id_per`);

--
-- Indices de la tabla `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id_res`);

--
-- Indices de la tabla `tipo_animal`
--
ALTER TABLE `tipo_animal`
  ADD PRIMARY KEY (`id_tani`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `animal`
--
ALTER TABLE `animal`
  MODIFY `id_ani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `conocimientos`
--
ALTER TABLE `conocimientos`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `id_dis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `hechos`
--
ALTER TABLE `hechos`
  MODIFY `id_hec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tipo_animal`
--
ALTER TABLE `tipo_animal`
  MODIFY `id_tani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `fk_modulo_acceso` FOREIGN KEY (`id_mod`) REFERENCES `modulo` (`id_mod`),
  ADD CONSTRAINT `fk_perfil_acceso` FOREIGN KEY (`id_per`) REFERENCES `perfil` (`id_per`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_perfil_persona` FOREIGN KEY (`id_per`) REFERENCES `perfil` (`id_per`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
