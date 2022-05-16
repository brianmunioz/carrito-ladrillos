
CREATE TABLE `prod_vendidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pago` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `prod_vendidos` VALUES (9,1248089568,1,'Ladrillo ecológico',10,120);

CREATE TABLE `productos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(6) NOT NULL,
  `img` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `productos` VALUES (1,'Ladrillo ecológico','Los ladrillos tipo lego son elaborados mediante una mezcla de suelo, materiales puzolánicos y otras materias primas que no son obtenidas por minería extractiva, que, después de ser mezclados, pasan por un proceso de moldeo a alta presión con lo que se obtiene un producto de alta resistencia a la compresión y absorción',139,120,'ladrillo.jpg'),(2,'pegamento para ladrillos','Pegamento Acrílico para Ladrillos Cerámicos y Bloques Cementicios\r\n\r\nEsta Manga rinde hasta 3Mt2, de Pared con Bloques del 18',17,200,'dundun.jpg'),(3,'ACERO CORRUGADO','3 metros de largo',100,450,'acerocorrugado.jpg');

CREATE TABLE `ventas` (
  `id_compra` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `nro` int(6) NOT NULL,
  `depto` varchar(20) DEFAULT NULL,
  `barrio` varchar(30) DEFAULT NULL,
  `ciudad` varchar(50) NOT NULL,
  `postal` int(10) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `telefono` int(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `tipo_pago` varchar(15) NOT NULL,
  `id_pago` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `ventas` VALUES (9,'adam','smith','17456484','street',100,'2','hood','street',8000,'state',1235468,'email@gmail.com','credit_card','1248089568','approved');

CREATE TABLE `ventas_pendientes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pago` varchar(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
