create database cineFinal;
use cineFinal;
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
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
        0,
        'avatar2.jpg',
        'hash_pass_2',
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
        'hash_pass_4',
        'cliente'
    ),
    (
        5,
        'ejemplo5@example.com',
        'Sofía',
        'López Hernández',
        '23456789e',
        0,
        'avatar5.jpg',
        'hash_pass_5',
        'cliente'
    );
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
CREATE TABLE `horasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `hora` time NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `horasc`
VALUES (1, '17:00:00'),
    (2, '20:00:00'),
    (3, '23:00:00');
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
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `peliculasc`
VALUES (
        9,
        'Casablanca',
        'Un drama romántico situado en la Segunda Guerra Mundial, dirigido por Michael Curtiz.',
        'casablanca_poster.jpg',
        'Mayores 13',
        3
    ),
    (
        10,
        'El Padrino',
        'Un clásico del crimen dirigido por Francis Ford Coppola, basado en la novela de Mario Puzo.',
        'elpadrino_poster.jpg',
        'Mayores 18',
        1
    ),
    (
        11,
        'Lo que el viento se llevó',
        'Un épico drama romántico ambientado en la Guerra Civil estadounidense.',
        'viento_poster.jpg',
        'Mayores 13',
        3
    ),
    (
        12,
        '2001: Odisea del espacio',
        'Una obra maestra de ciencia ficción dirigida por Stanley Kubrick.',
        'odisea_poster.jpg',
        'Mayores 13',
        4
    ),
    (
        13,
        'Desayuno en Tiffany''s',
        'Comedia romántica dirigida por Blake Edwards, protagonizada por Audrey Hepburn.',
        'tiffany_poster.jpg',
        'Mayores 13',
        5
    ),
    (
        14,
        'Psicosis',
        'Un thriller psicológico dirigido por Alfred Hitchcock, conocido por su famosa escena de la ducha.',
        'psicosis_poster.jpg',
        'Mayores 18',
        7
    ),
    (
        15,
        'El Exorcista',
        'Una película de terror dirigida por William Friedkin, basada en la novela de William Peter Blatty.',
        'exorcista_poster.jpg',
        'Mayores 18',
        7
    ),
    (
        16,
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `personalc`
VALUES (1, 'Humphrey Bogart', 'Actor', 'bogart.jpg');
INSERT INTO `personalc`
VALUES (2, 'Michael Curtiz', 'Director', 'curtiz.jpg');
INSERT INTO `personalc`
VALUES (3, 'Marlon Brando', 'Actor', 'brando.jpg');
INSERT INTO `personalc`
VALUES (
        4,
        'Francis Ford Coppola',
        'Director',
        'coppola.jpg'
    );
INSERT INTO `personalc`
VALUES (5, 'Vivien Leigh', 'Actriz', 'leigh.jpg');
INSERT INTO `personalc`
VALUES (6, 'Victor Fleming', 'Director', 'fleming.jpg');
INSERT INTO `personalc`
VALUES (7, 'Keir Dullea', 'Actor', 'dullea.jpg');
INSERT INTO `personalc`
VALUES (8, 'Stanley Kubrick', 'Director', 'kubrick.jpg');
INSERT INTO `personalc`
VALUES (9, 'Audrey Hepburn', 'Actriz', 'hepburn.jpg');
INSERT INTO `personalc`
VALUES (10, 'Blake Edwards', 'Director', 'edwards.jpg');
INSERT INTO `personalc`
VALUES (11, 'Janet Leigh', 'Actriz', 'leigh.jpg');
INSERT INTO `personalc`
VALUES (
        12,
        'Alfred Hitchcock',
        'Director',
        'hitchcock.jpg'
    );
INSERT INTO `personalc`
VALUES (13, 'Linda Blair', 'Actriz', 'blair.jpg');
INSERT INTO `personalc`
VALUES (
        14,
        'William Friedkin',
        'Director',
        'friedkin.jpg'
    );
INSERT INTO `personalc`
VALUES (15, 'Walt Disney', 'Director', 'disney.jpg');
INSERT INTO `personalc`
VALUES (16, 'Walt Disney', 'Actor', 'disney.jpg');
CREATE TABLE `peliculas_personalc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `pelicula_id` int(11) DEFAULT NULL,
    `personal_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pelicula_id` (`pelicula_id`),
    KEY `personal_id` (`personal_id`),
    CONSTRAINT `peliculas_personalc_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculasc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `peliculas_personalc_ibfk_2` FOREIGN KEY (`personal_id`) REFERENCES `personalc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `peliculas_personalc`
VALUES (1, 1, 1),
    (2, 1, 3),
    (3, 2, 2),
    (4, 3, 4);
CREATE TABLE `salasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
    `num_butacas` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `salasc`
VALUES (1, 'Sala 3D', 120),
    (2, 'Sala VIP', 90);
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `sesionesc`
VALUES (1, '2023-12-18', 1, 1, 16.80, 1),
    (2, '2023-12-18', 3, 1, 12.50, 2),
    (3, '2023-12-18', 2, 2, 11.90, 3),
    (4, '2023-12-18', 2, 2, 13.75, 4),
    (5, '2024-01-21', 2, 2, 20.00, 7);
CREATE TABLE `compra_butacasc` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `sesion_id` int(11) NOT NULL,
    `usuario_id` int(11) NOT NULL,
    `cant_butaca` int(11) NOT NULL,
    `fecha_compra` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `sesion_id` (`sesion_id`),
    KEY `usuario_id` (`usuario_id`),
    CONSTRAINT `compra_butacasc_ibfk_1` FOREIGN KEY (`sesion_id`) REFERENCES `sesionesc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `compra_butacasc_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuariosc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_spanish_ci;
INSERT INTO `compra_butacasc`
VALUES (1, 1, 1, 5, '2024-01-15 13:52:07'),
    (2, 2, 5, 6, '2024-01-10 13:52:07'),
    (3, 3, 2, 7, '2024-01-07 13:52:07'),
    (4, 4, 4, 8, '2024-01-09 13:52:07');
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
VALUES (2, 56, 2),
    (4, 58, 2);