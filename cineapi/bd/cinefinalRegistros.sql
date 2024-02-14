create database cinefinalregistros;
use cinefinalregistros;
CREATE TABLE `usuariosc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
    `nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
    `apellidos` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
    `NIF` varchar(9) COLLATE utf8mb4_spanish_ci NOT NULL,
    `activo` tinyint(1) DEFAULT 0,
    `avatar` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT 'default.jpg',
    `hash_pass` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
    `rol` enum('administrador', 'cliente') COLLATE utf8mb4_spanish_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `correo` (`correo`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `usuariosc`
VALUES (
        1,
        'venancioblanco2023@gmail.com',
        'Serafina',
        'Martín Marcos',
        '12345678a',
        1,
        'avatar1.jpg',
        '$2y$10$dERNtSx87UFoGPZSDtgysuKcsu0UvI5ogQ6rcXA9D0ITnupy.rsOu',
        'cliente'
    ),
    (
        2,
        'ejemplo2@example.com',
        'Antonio',
        'Rodríguez López',
        '98765432b',
        1,
        'avatar2.jpg',
        '$2y$10$MZGP/jqD/qrRirIw0bWG8OdUcXPTbcVbQa4vC7r8bFkE7NR6RrLWK',
        'cliente'
    ),
    (
        3,
        'admin@cine.com',
        'Laura',
        'Martínez García',
        '45678901c',
        1,
        'avatar3.jpg',
        '$2y$10$dVJvvi9YQq8ugT12sPYGROu37m19v8KKCs9PhDd9SY4Ulek38mZLC',
        'administrador'
    ),
    (
        4,
        'ejemplo4@example.com',
        'Carlos',
        'Fernández Sánchez',
        '34567890d',
        1,
        'avatar4.jpg',
        '$2y$10$.lZ/nIfDiHlE1WbBRA.CKesoysyRDNVQcrxDCPcrvLA4kavgt76cu',
        'cliente'
    ),
    (
        5,
        'ejemplo5@example.com',
        'Sofía',
        'López Hernández',
        '23456789e',
        1,
        'avatar5.jpg',
        '$2y$10$4GghD.iUpReq0W9TwzJb..t5nw9R4qDb9RJUAXh6SN1dWoS/yeFQy',
        'cliente'
    ),
    (
        6,
        'serafinam@gmail.com',
        'Elena',
        'Martín Marcos',
        '25896314b',
        1,
        'avatar6.jpg',
        '$2y$10$4GghD.iUpReq0W9TwzJb..t5nw9R4qDb9RJUAXh6SN1dWoS/yeFQy',
        'cliente'
    );
CREATE TABLE `salasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `num_butacas` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `salasc`
VALUES (1, 'Sala 3D', 120),
    (2, 'Sala VIP', 90);
CREATE TABLE `generoc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `generoc`
VALUES (1, 'Acción'),
    (2, 'Comedia'),
    (3, 'Drama'),
    (4, 'Ciencia Ficción'),
    (5, 'Romance'),
    (6, 'Suspense'),
    (7, 'Terror'),
    (8, 'Dibujos Animados');
CREATE TABLE `peliculasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `argumento` varchar(500) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `cartel` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `clasificacion_edad` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `genero_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `genero_id` (`genero_id`),
    CONSTRAINT `peliculasc_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `generoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `peliculasc`
VALUES (
        1,
        'Casablanca',
        'Un drama romántico situado en la Segunda Guerra Mundial, dirigido por Michael Curtiz.',
        'casablanca_poster.jpg',
        'Mayores 13',
        3
    ),
    (
        2,
        'El Padrino',
        'Un clásico del crimen dirigido por Francis Ford Coppola, basado en la novela de Mario Puzo.',
        'elpadrino_poster.jpg',
        'Mayores 18',
        1
    ),
    (
        3,
        'Lo que el viento se llevó',
        'Un épico drama romántico ambientado en la Guerra Civil estadounidense.',
        'viento_poster.jpg',
        'Mayores 13',
        3
    ),
    (
        4,
        '2001: Odisea del espacio',
        'Una obra maestra de ciencia ficción dirigida por Stanley Kubrick.',
        'odisea_poster.jpg',
        'Mayores 13',
        4
    ),
    (
        5,
        'Desayuno en Tiffanys',
        'Comedia romántica dirigida por Blake Edwards, protagonizada por Audrey Hepburn.',
        'tiffany_poster.jpg',
        'Mayores 13',
        5
    ),
    (
        6,
        'Psicosis',
        'Un thriller psicológico dirigido por Alfred Hitchcock, conocido por su famosa escena de la ducha.',
        'psicosis_poster.jpg',
        'Mayores 18',
        7
    ),
    (
        7,
        'El Exorcista',
        'Una película de terror dirigida por William Friedkin, basada en la novela de William Peter Blatty.',
        'exorcista_poster.jpg',
        'Mayores 18',
        7
    ),
    (
        8,
        'Blanca Nieves y los Siete Enanitos',
        'Un clásico de animación de Disney, basado en el cuento de los hermanos Grimm.',
        'blancanieves_poster.jpg',
        'Todos los públicos',
        8
    );
CREATE TABLE `personalc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `tipo` enum('Actor', 'Actriz', 'Director') COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `imagen` varchar(90) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 17 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `personalc`
VALUES (1, 'Humphrey Bogart', 'Actor', 'bogart.jpg'),
    (2, 'Michael Curtiz', 'Director', 'curtiz.jpg'),
    (3, 'Marlon Brando', 'Actor', 'brando.jpg'),
    (
        4,
        'Francis Ford Coppola',
        'Director',
        'coppola.jpg'
    ),
    (5, 'Vivien Leigh', 'Actriz', 'leigh.jpg'),
    (6, 'Victor Fleming', 'Director', 'fleming.jpg'),
    (7, 'Keir Dullea', 'Actor', 'dullea.jpg'),
    (8, 'Stanley Kubrick', 'Director', 'kubrick.jpg'),
    (9, 'Audrey Hepburn', 'Actriz', 'hepburn.jpg'),
    (10, 'Blake Edwards', 'Director', 'edwards.jpg'),
    (11, 'Janet Leigh', 'Actriz', 'jleigh.jpg'),
    (
        12,
        'Alfred Hitchcock',
        'Director',
        'hitchcock.jpg'
    ),
    (13, 'Linda Blair', 'Actriz', 'blair.jpg'),
    (
        14,
        'William Friedkin',
        'Director',
        'friedkin.jpg'
    ),
    (15, 'Walt Disney', 'Director', 'disney.jpg'),
    (16, 'Blacanieves', 'Actriz', 'blancanieves.jpg');
CREATE TABLE `horasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `hora` time NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `horasc`
VALUES (1, '17:00:00'),
    (2, '20:00:00'),
    (3, '23:00:00');
CREATE TABLE `peliculas_personalc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `pelicula_id` int(11) DEFAULT NULL,
    `personal_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pelicula_id` (`pelicula_id`),
    KEY `personal_id` (`personal_id`),
    CONSTRAINT `peliculas_personalc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `peliculas_personalc_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `personalc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 20 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `peliculas_personalc`
VALUES (1, 1, 1),
    (2, 1, 2),
    (3, 2, 3),
    (4, 2, 4),
    (5, 4, 8),
    (6, 4, 7),
    (7, 5, 10),
    (8, 5, 9),
    (9, 6, 12),
    (10, 6, 5),
    (11, 7, 13),
    (12, 7, 14),
    (13, 8, 15),
    (14, 8, 16),
    (18, 3, 5),
    (19, 3, 6);
CREATE TABLE `sesionesc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `fecha` date DEFAULT NULL,
    `hora` int(11) NOT NULL,
    `sala_id` int(11) DEFAULT NULL,
    `precio` decimal(10, 2) DEFAULT NULL,
    `pelicula_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pelicula_id` (`pelicula_id`),
    KEY `sala_id` (`sala_id`),
    KEY `hora` (`hora`),
    CONSTRAINT `sesionesc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `sesionesc_ibfk_2` FOREIGN KEY (`sala_id`) REFERENCES `salasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `sesionesc_ibfk_3` FOREIGN KEY (`hora`) REFERENCES `horasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 18 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `sesionesc`
VALUES (1, '2024-01-24', 1, 1, 10.25, 1),
    (2, '2024-01-25', 2, 2, 9.00, 5),
    (3, '2024-01-26', 2, 1, 20.00, 3),
    (4, '2024-01-25', 3, 2, 10.00, 7),
    (5, '2024-01-27', 3, 1, 11.00, 2),
    (6, '2024-01-24', 1, 1, 25.00, 8),
    (7, '2024-01-24', 1, 1, 10.15, 1),
    (8, '2024-01-25', 2, 2, 9.00, 5),
    (9, '2024-01-26', 2, 1, 20.50, 3),
    (10, '2024-01-25', 3, 2, 10.00, 7),
    (11, '2024-01-27', 3, 1, 11.00, 2);
CREATE TABLE `compra_butacasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `sesion_id` int(11) NOT NULL,
    `usuario_id` int(11) NOT NULL,
    `cant_butacas` int(11) NOT NULL,
    `fecha_compra` datetime DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    KEY `sesion_id` (`sesion_id`),
    KEY `usuario_id` (`usuario_id`),
    CONSTRAINT `compra_butacasc_ibfk_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesionesc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `compra_butacasc_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuariosc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `compra_butacasc`
VALUES (5, 1, 6, 2, '2024-01-23 10:02:30'),
    (6, 2, 1, 5, '2024-01-23 10:02:30');
CREATE TABLE `butacas_reservadasc` (
    `idcompra` int(11) NOT NULL,
    `asiento` int(11) NOT NULL,
    `idsesion` int(11) NOT NULL,
    PRIMARY KEY (`asiento`, `idsesion`),
    KEY `idcompra` (`idcompra`, `asiento`, `idsesion`),
    KEY `asiento` (`asiento`),
    KEY `idsesion` (`idsesion`),
    CONSTRAINT `butacas_reservadasc_ibfk_1` FOREIGN KEY (`idcompra`) REFERENCES `compra_butacasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `butacas_reservadasc_ibfk_2` FOREIGN KEY (`idsesion`) REFERENCES `sesionesc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `butacas_reservadasc`
VALUES (5, 23, 1),
    (5, 24, 1),
    (6, 12, 2),
    (6, 13, 2),
    (6, 14, 2),
    (6, 15, 2),
    (6, 16, 2);