-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2016 at 08:06 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `a_materno` varchar(40) NOT NULL,
  `a_paterno` varchar(40) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo_electronico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `a_materno`, `a_paterno`, `fecha_nacimiento`, `correo_electronico`) VALUES
(1, 'Roberto', 'Gonzalez', 'Vargas', '2014-09-09', 'roberto_glez@outlook.com'),
(2, 'Roberto ', 'Vargas', 'Gonzalez', '1995-07-06', 'roberto_glez@outlook.com'),
(3, 'Roberto ', 'Vargas', 'Gonzalez', '1995-07-06', 'roberto_glez@outlook.com'),
(4, 'ropeike', 'kjhjkhjkhjk', 'jhkjhj', '0000-00-00', 'roberto_glez@outlook.com');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `nombreanonimo` varchar(50) NOT NULL,
  `contenido` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `titulo`, `nombreanonimo`, `contenido`, `fecha`) VALUES
(16, 'efsefsf', 'fsefsef', 'sefsef', '2016-08-22 06:04:49'),
(17, 'ESTAOSREVISANDOAPAGINADEROBERTO', 'ANAAURORAGUERREROGONZAEZ', 'ESTAOSREVISANDOAPAGINADEROBERTO.BUENTRABAJO', '2016-08-22 13:37:42'),
(18, 'aeferaeferfeq', 'fwfwe', 'efwqfw', '2016-08-23 16:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `Id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` text NOT NULL,
  `cantidad` text NOT NULL,
  `subtotal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id_libros` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `sinopsis` varchar(250) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `ISBR` varchar(100) NOT NULL,
  `versiones` varchar(50) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id_libros`, `nombre`, `autor`, `categoria`, `sinopsis`, `editorial`, `precio`, `ISBR`, `versiones`, `peso`, `image`) VALUES
('08', 'El Alfabeto de Babel', 'Front Cover Francisco J. de Lys', 'Ciencia', 'La Barcelona más oculta esconde un insondable misterio y Gabriel Grieg sólo dispone de 24 horas para resolverlo. En una Barcelona sumida en la niebla, el arquitecto y restaurador Gabriel Grieg recibe la desconcertante visita de una misteriosa mujer q', 'Casa del Libro', 651, '8496940640', 'Digital', '2.2MB', 'catalogo/AlfabetoBabel_PortadaLibro.jpg'),
('24', 'Los Oscuros La Trampa del Amor', 'Lauren Kate', 'Romance', 'El amor comienza. Luce morirá por Daniel. Y lo hará. Una y otra vez. como en vidas pasadas, Luce y Daniel se han reencontrado, solo para ser dolorosamente separados, Luce muerta, Daniel solo y destrozado. Pero tal vez, no tiene que ser así. Luce tien', 'Ellas Montena1', 321, '978-84-844-1761-3', '', '3.1MB', 'catalogo/Oscuros-La-trampa-del-amor.jpg'),
('3452222', 'IBRODEFANTASIA', 'ASDJASDJAKJD', 'Fantasia', 'KSDJADJDASK', 'ASDASDNASKN', 5556, '79797879', 'Fisica', '3', 'catalogo/8.png'),
('6816846816', '181818418', '1861486418418', 'Fantasia', '184861484', '86418814814', 2147483647, '68148614861486', 'Fisica', '4861748614', 'catalogo/gran-gatsby-pdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `fecha`, `titulo`, `contenido`) VALUES
(24, '0000-00-00', 'El Alquimista', 'Cuando amamos, siempre nos esforzamos por ser mejores de lo que somos. Cuando nos esforzamos por ser mejor de lo que somos, todo a nuestro alrededor se vuelve mejor..'),
(27, '0000-00-00', 'Noticia9999', 'ro999i66'),
(31, '0000-00-00', 'REVISIONDEPROYECTO', 'ESTAOSENREVISIONDEPROYECTOSDEAATERIADEDESARRROODESITIOSWEB');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `imagen` text NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `imagen`, `precio`) VALUES
(1, 'Alquimista', 'alquimista.jpg', 250),
(2, 'Alfabeto de Babel', 'Alfabetodebabel.jpg', 360),
(3, 'Baldor', 'libro_baldor_optimizado.jpg', 300),
(4, 'Cartas desde la Isla', 'cartas+desde+la+isla.jpg', 240),
(5, 'Ana Karerina', 'creativos_online_portadas_libros_inspiracion.png', 200);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`) VALUES
(1, 'admin', '123456789'),
(3, 'ANAGUERRERO', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libros`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
