-- INSERTAR NUEVOS REGISTROS
INSERT INTO usuarios VALUES(null, 'Victor','Robles', 'victor@victor.com', '1234', '2019-05-01');
INSERT INTO usuarios VALUES(null, 'Antonio','Martinez', 'antonio@antonio.com', '1234', '2019-08-05');
INSERT INTO usuarios VALUES(null, 'Paco','Lopez', 'paco@paco.com', '1234', '2020-05-01');

-- INSERTS PARA CATEGORIAS
INSERT INTO categorias VALUES (null, 'Accion');
INSERT INTO categorias VALUES (null, 'Rol');
INSERT INTO categorias VALUES (null, 'Deportes');

-- INSERTS PARA ENTRADAS
INSERT INTO entradas VALUES(null, 1, 1, 'Novedades de GTA 5 Online', 'Review del GTA 5', CURDATE());
INSERT INTO entradas VALUES(null, 1, 2, 'REVIEW de LOL Online', 'Todo sobre el LOL', CURDATE());
INSERT INTO entradas VALUES(null, 1, 3, 'Nuevos jugadores de Fifa 19', 'Review del Fifa 19', CURDATE());

INSERT INTO entradas VALUES(null, 2, 1, 'Novedades de Assasins Online', 'Review del Assasins', CURDATE());
INSERT INTO entradas VALUES(null, 2, 2, 'REVIEW de WOW Online', 'Todo sobre el WOW', CURDATE());
INSERT INTO entradas VALUES(null, 2, 3, 'Nuevos jugadores de PES 19', 'Review del Pro 19', CURDATE());

INSERT INTO entradas VALUES(null, 3, 1, 'Novedades de Call of Duty Online', 'Review del COD', CURDATE());
INSERT INTO entradas VALUES(null, 3, 1, 'REVIEW de Fortnite Online', 'Todo sobre el Fortnite', CURDATE());
INSERT INTO entradas VALUES(null, 3, 3, 'Nuevos jugadores de Formula 1 2k20', 'Review del Formula 1', CURDATE());