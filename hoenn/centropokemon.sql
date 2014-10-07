-- Creamos la base de datos
CREATE DATABASE centrospokemon;
USE centrospokemon;

--Creamos la tabla regiones
CREATE TABLE regiones(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL
);

--Creamos la tabla centros_pokemon
CREATE TABLE centros_pokemon(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL,
	id_region INT NOT NULL,
	password TEXT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_region) REFERENCES regiones(id)
);

--Creamos la tabla catalogo_tipos
CREATE TABLE catalogo_tipos(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL
);

--Creamos la tabla catalogo_habilidades
CREATE TABLE catalogo_habilidades(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL
);

--Creamos la tabla catalogo_pokemon
CREATE TABLE catalogo_pokemon(
	id INT PRIMARY KEY AUTO_INCREMENT,
	especie TEXT NOT NULL,
	region INT NOT NULL,
	hit_points INT NOT NULL,
	ataque INT NOT NULL,
	defensa INT NOT NULL,
	velocidad INT NOT NULL,
	evasion INT NOT NULL,
	prezision INT NOT NULL,
	evol_trans BOOLEAN,
	FOREIGN KEY (region) REFERENCES regiones(id)	
);

--Creamos la tabla catalogo_estatus
CREATE TABLE catalogo_estatus(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL,
	tiempo INT NOT NULL,
	desaparece_a INT NOT NULL
);

--Creamos la tabla habilidades 
CREATE TABLE habilidades(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_pokemon INT NOT NULL,
	id_habilidad INT NOT NULL,
	FOREIGN KEY (id_pokemon) REFERENCES catalogo_pokemon(id),
	FOREIGN KEY (id_habilidad) REFERENCES catalogo_habilidades(id)
);

--Creamos la tabla tipos
CREATE TABLE tipos(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_pokemon INT NOT NULL,
	id_tipo INT NOT NULL,
	FOREIGN KEY (id_pokemon) REFERENCES catalogo_pokemon(id),
	FOREIGN KEY (id_tipo) REFERENCES catalogo_tipos(id)
);

--Creamos la tabla evoluciones
CREATE TABLE evoluciones(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_prevolucion INT NOT NULL,
	id_evolucion INT NOT NULL,
	FOREIGN KEY (id_prevolucion) REFERENCES catalogo_pokemon(id),
	FOREIGN KEY (id_evolucion) REFERENCES catalogo_pokemon(id)
); 

--Creamos la tabla enfermeras
CREATE TABLE enfermeras(
	id INT PRIMARY KEY AUTO_INCREMENT, 
	nombre TEXT NOT NULL,
	apellidos TEXT NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	fecha_graduacion DATE NOT NULL,
	cedula VARCHAR(6) NOT NULL,
	id_centro_pokemon INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_centro_pokemon) REFERENCES centros_pokemon(id)
);

--Creamos la tabla ayudantes
CREATE TABLE ayudantes(
	id INT PRIMARY KEY AUTO_INCREMENT,
	tipo INT NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	fecha_graduacion DATE NOT NULL,
	id_enfermera INT NOT NULL,
	id_centro_pokemon INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (tipo) REFERENCES catalogo_pokemon(id),
	FOREIGN KEY (id_enfermera) REFERENCES enfermeras(id),
	FOREIGN KEY (id_centro_pokemon) REFERENCES centros_pokemon(id)
);

--Creamos la tabla entrenadores
CREATE TABLE entrenadores(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nombre TEXT NOT NULL,
	apellidos TEXT NOT NULL,
	alias VARCHAR(15),
	password TEXT NOT NULL,
	fecha_nacimiento DATE NOT NULL,
	lugar_nacimiento INT NOT NULL,
	sexo ENUM('Hombre','Mujer') DEFAULT 'Hombre',
	es_lider BOOLEAN DEFAULT '0',
	localizacion_actual INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (lugar_nacimiento) REFERENCES regiones(id),
	FOREIGN KEY (localizacion_actual) REFERENCES regiones(id)
);

--Creamos la tabla pokemon
CREATE TABLE pokemon(
	id INT PRIMARY KEY AUTO_INCREMENT,
	especie INT NOT NULL,
	alias TEXT,
	sexo ENUM('Masculino','Femenino') DEFAULT 'Masculino',
	nivel INT NOT NULL,
	es_intercambiable BOOLEAN,
	hit_points INT NOT NULL,
	ataque INT NOT NULL,
	defensa INT NOT NULL,
	velocidad INT NOT NULL,
	evasion INT NOT NULL,
	prezision INT NOT NULL,
	estatus INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (especie) REFERENCES catalogo_pokemon(id),
	FOREIGN KEY (estatus) REFERENCES catalogo_estatus(id)
);

--Creamos la tabla pokebolas
CREATE TABLE pokebolas(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_entrenador INT NOT NULL,
	id_pokemon INT NOT NULL,
	archivada BOOLEAN,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id),
	FOREIGN KEY (id_pokemon) REFERENCES pokemon(id)
);

--Creamos la tabla regeneradores
CREATE TABLE regeneradores(
	id INT PRIMARY KEY AUTO_INCREMENT,
	slots ENUM('50','75','100','150') DEFAULT '50',
	slots_funcionales INT NOT NULL,
	esta_mantenimiento BOOLEAN,
	id_centro_pokemon INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_centro_pokemon) REFERENCES centros_pokemon(id)
);

--Creamos la tabla registros
CREATE TABLE registros(
	id INT PRIMARY KEY AUTO_INCREMENT,
	enfermera_entrada INT NOT NULL,
	enfermera_salida INT,
	fecha_entrada DATETIME NOT NULL,
	fecha_estimada DATETIME,
	fecha_salida DATETIME,
	id_regenerador INT NOT NULL,
	hit_points INT NOT NULL,
	estatus INT NOT NULL,
	id_pokebola INT NOT NULL,
	FOREIGN KEY (enfermera_entrada) REFERENCES enfermeras(id),
	FOREIGN KEY (enfermera_salida) REFERENCES enfermeras(id),
	FOREIGN KEY (id_regenerador) REFERENCES regeneradores(id),
	FOREIGN KEY (id_pokebola) REFERENCES pokebolas(id)
);

--Creamos la tabla habitaciones
CREATE TABLE habitaciones(
	id INT PRIMARY KEY AUTO_INCREMENT,
	capacidad INT NOT NULL,
	id_centro_pokemon INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_centro_pokemon) REFERENCES centros_pokemon(id) 
);

--Creamos la tabla camas
CREATE TABLE camas(
	id INT PRIMARY KEY AUTO_INCREMENT,
	en_uso BOOLEAN DEFAULT '0',
	id_habitacion INT NOT NULL,
	id_entrenador INT NOT NULL,
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_habitacion) REFERENCES habitaciones(id),
	FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id)  
);

--Creamos la tabla maquinasit
CREATE TABLE maquinasit(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_centro_pokemon INT NOT NULL,
	activa BOOLEAN DEFAULT '1',
	suspendido BOOLEAN DEFAULT '1',
	FOREIGN KEY (id_centro_pokemon) REFERENCES centros_pokemon(id) 
);

--Creamos la tabPokebolas

CREATE TABLE intercambios(
	id INT PRIMARY KEY AUTO_INCREMENT,
	entrenador_a INT NOT NULL,
	entrenador_b INT NOT NULL,
	pokemon_a INT NOT NULL,
	pokemon_b INT NOT NULL,
	id_maquina_ti INT NOT NULL,
	fecha DATETIME NOT NULL,
	FOREIGN KEY (entrenador_a) REFERENCES entrenadores(id),
	FOREIGN KEY (entrenador_b) REFERENCES entrenadores(id),
	FOREIGN KEY (pokemon_a) REFERENCES pokemon(id),
	FOREIGN KEY (pokemon_b) REFERENCES pokemon(id),
	FOREIGN KEY (id_maquina_ti) REFERENCES maquinasit(id)
);

CREATE TABLE imagenes_pokemon(
	id INT PRIMARY KEY AUTO_INCREMENT,
	imagen TEXT NOT NULL,
	id_catalogo_pokemon INT NOT NULL, 
	FOREIGN KEY (id_catalogo_pokemon) REFERENCES catalogo_pokemon(id)
);

CREATE TABLE imagenes_entrenador(
	id INT PRIMARY KEY AUTO_INCREMENT,
	imagen TEXT NOT NULL,
	id_entrenador INT NOT NULL, 
	FOREIGN KEY (id_entrenador) REFERENCES entrenadores(id)
);

CREATE VIEW vista_enfermeras AS 
SELECT 
enfermeras.id AS id, 
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
enfermeras.cedula AS cedula,
enfermeras.fecha_nacimiento AS fecha_nacimiento,
enfermeras.fecha_graduacion AS fecha_graduacion,
centros_pokemon.nombre AS centro,
enfermeras.suspendido AS suspendido
FROM
enfermeras, centros_pokemon
WHERE
enfermeras.id_centro_pokemon = centros_pokemon.id;

CREATE VIEW vista_enfermeras1 AS
SELECT 
enfermeras.id AS id, 
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
enfermeras.suspendido AS suspendido
FROM
enfermeras
WHERE
enfermeras.suspendido=1;

CREATE VIEW vista_enfedisponibles AS 
SELECT 
enfermeras.id AS id, 
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
ayudantes.id AS id_ayudante,
ayudantes.especie AS especie,
enfermeras.suspendido AS suspendido
FROM
enfermeras, ayudantes
WHERE
ayudantes.id_enfermera = ayudantes.id;


CREATE VIEW vista_catalogoayudantes AS
SELECT
catalogo_pokemon.id AS id,
catalogo_pokemon.especie AS especie
FROM
catalogo_pokemon
WHERE
id>0 AND id<6;

CREATE VIEW vista_pokemondispo AS
SELECT
catalogo_pokemon.id AS id,
catalogo_pokemon.especie AS especie
FROM
catalogo_pokemon
WHERE
id>5;


CREATE VIEW vista_enfeayu AS
SELECT
enfermeras.id AS id,
ayudantes.id AS id_ayudante,
catalogo_pokemon.id AS tipo,
catalogo_pokemon.especie AS especie,
imagenes_pokemon.imagen AS imagen,
ayudantes.suspendido AS suspendido
FROM
catalogo_pokemon, enfermeras, ayudantes, imagenes_pokemon
WHERE
ayudantes.tipo = catalogo_pokemon.id 
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id 
AND
ayudantes.id_enfermera = enfermeras.id
AND 
ayudantes.suspendido=1;

CREATE VIEW vista_ayuenfe AS
SELECT
ayudantes.id AS id,
enfermeras.id AS id_enfermera,
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
enfermeras.suspendido AS suspendido
FROM
enfermeras, ayudantes
WHERE
ayudantes.id_enfermera = enfermeras.id
AND 
enfermeras.suspendido=1;

CREATE VIEW vista_ayudantes AS 
SELECT 
ayudantes.id AS id, 
enfermeras.id AS id_ayudante,
catalogo_pokemon.especie AS especie,
ayudantes.fecha_nacimiento AS fecha_nacimiento,
ayudantes.fecha_graduacion AS fecha_graduacion,
enfermeras.id AS id_enfermera,
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
imagenes_pokemon.imagen AS imagen,
ayudantes.suspendido AS suspendido
FROM
ayudantes, catalogo_pokemon, enfermeras, imagenes_pokemon
WHERE
ayudantes.id_enfermera = enfermeras.id
AND
ayudantes.tipo = catalogo_pokemon.id
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id;


CREATE VIEW vista_catalogopokemon AS 
SELECT 
catalogo_pokemon.id AS id, 
catalogo_pokemon.especie AS especie,
catalogo_pokemon.hit_points AS hit_points,
catalogo_pokemon.ataque AS ataque, 
catalogo_pokemon.defensa AS defensa,
catalogo_pokemon.velocidad AS velocidad,
catalogo_pokemon.evasion AS evasion,
catalogo_pokemon.prezision AS prezision,
regiones.nombre AS nombre
FROM
catalogo_pokemon, regiones
WHERE
catalogo_pokemon.region = regiones.id;

CREATE VIEW vista_pokemon AS 
SELECT 
pokemon.id AS id,
catalogo_pokemon.especie AS especie,
pokemon.alias AS alias, 
pokemon.suspendido AS suspendido
FROM
catalogo_pokemon, pokemon
WHERE
pokemon.especie = catalogo_pokemon.id;

CREATE VIEW vista_pokebola AS 
SELECT 
pokebolas.id AS id,
entrenadores.id AS id_entrenador,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS aliasentrenador,
catalogo_pokemon.especie AS especie,
pokemon.id AS id_pokemon,
pokemon.alias AS aliaspokemon,
pokemon.es_intercambiable AS es_intercambiable,
pokemon.sexo AS sexo,
pokemon.nivel AS nivel,
pokemon.hit_points AS hit_points, 
pokemon.ataque AS ataque,
pokemon.defensa AS defensa,
pokemon.velocidad AS velocidad,
pokemon.evasion AS evasion,
pokemon.prezision AS prezision,
catalogo_estatus.nombre AS estatus,
imagenes_pokemon.imagen AS imagen,
pokebolas.archivada AS archivada,
pokebolas.suspendido AS suspendido,
pokemon.suspendido AS suspendidopokemon
FROM
pokebolas,catalogo_pokemon,pokemon,entrenadores, imagenes_pokemon, catalogo_estatus
WHERE
pokebolas.id_entrenador = entrenadores.id
AND
pokebolas.id_pokemon = pokemon.id
AND
pokemon.especie = catalogo_pokemon.id
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id
AND
pokemon.estatus = catalogo_estatus.id;

CREATE VIEW vista_pokebola3 AS 
SELECT 
pokebolas.id AS id,
entrenadores.id AS id_entrenador,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS aliasentrenador,
catalogo_pokemon.especie AS especie,
pokemon.id AS id_pokemon,
pokemon.alias AS aliaspokemon,
pokemon.es_intercambiable AS es_intercambiable,
pokemon.sexo AS sexo,
pokemon.nivel AS nivel,
pokemon.hit_points AS hit_points, 
pokemon.ataque AS ataque,
pokemon.defensa AS defensa,
pokemon.velocidad AS velocidad,
pokemon.evasion AS evasion,
pokemon.prezision AS prezision,
catalogo_estatus.nombre AS estatus,consultaregistros.php
imagenes_pokemon.imagen AS imagen,
pokebolas.archivada AS archivada,
pokebolas.suspendido AS suspendido,
pokemon.suspendido AS suspendidopokemon
FROM
pokebolas,catalogo_pokemon,pokemon,entrenadores, imagenes_pokemon, catalogo_estatus
WHERE
pokebolas.id_entrenador = entrenadores.id
AND
pokebolas.id_pokemon = pokemon.id
AND
pokemon.especie = catalogo_pokemon.id
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id
AND
pokemon.estatus = catalogo_estatus.id
AND
pokebolas.suspendido=1;

CREATE VIEW vista_pokebola2 AS 
SELECT 
pokebolas.id AS id,
entrenadores.id AS id_entrenador,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS aliasentrenador,
catalogo_pokemon.especie AS especie,
pokemon.id AS id_pokemon,
pokemon.alias AS aliaspokemon,
pokemon.es_intercambiable AS es_intercambiable,
pokemon.sexo AS sexo,
pokemon.nivel AS nivel,
pokemon.hit_points AS hit_points, 
pokemon.ataque AS ataque,
pokemon.defensa AS defensa,
pokemon.velocidad AS velocidad,
pokemon.evasion AS evasion,
pokemon.prezision AS prezision,
catalogo_estatus.nombre AS estatus,
imagenes_pokemon.imagen AS imagen,
pokebolas.archivada AS archivada,
pokebolas.suspendido AS suspendido,
pokemon.suspendido AS suspendidopokemon
FROM
pokebolas,catalogo_pokemon,pokemon,entrenadores, imagenes_pokemon, catalogo_estatus
WHERE
pokebolas.id_entrenador = entrenadores.id
AND
pokebolas.id_pokemon = pokemon.id
AND
pokemon.especie = catalogo_pokemon.id
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id
AND
pokemon.estatus = catalogo_estatus.id
AND
pokemon.suspendido=1;

CREATE VIEW vista_entrepokemon AS
SELECT
pokemon.id AS id,
entrenadores.id AS id_entrenador,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS alias,
imagenes_entrenador.imagen AS imagen,
entrenadores.suspendido AS suspendido,
pokebolas.id AS id_pokebola
FROM
pokemon, pokebolas, entrenadores, imagenes_entrenador
WHERE
pokebolas.id_pokemon = pokemon.id
AND
pokebolas.id_entrenador = entrenadores.id 
AND
imagenes_entrenador.id_entrenador = entrenadores.id
AND
entrenadores.suspendido=1;


CREATE VIEW vista_regeneradores AS
SELECT 
regeneradores.id AS id,
regeneradores.slots AS slots,
regeneradores.slots_funcionales AS slots_funcionales,
regeneradores.esta_mantenimiento AS esta_mantenimiento,
centros_pokemon.nombre AS nombre,
regeneradores.suspendido AS suspendido
FROM
regeneradores, centros_pokemon
WHERE
regeneradores.id_centro_pokemon = centros_pokemon.id;

CREATE VIEW vista_entrenadores AS
SELECT
entrenadores.id AS id,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS alias,
entrenadores.fecha_nacimiento AS fecha_nacimiento,
regiones.nombre AS lugar_nacimiento,
entrenadores.sexo AS sexo,
entrenadores.es_lider AS es_lider,
regiones.nombre AS localizacion_actual,
imagenes_entrenador.imagen AS imagen,
entrenadores.suspendido AS suspendido
FROM
entrenadores, regiones, imagenes_entrenador
WHERE
entrenadores.lugar_nacimiento = regiones.id
AND
imagenes_entrenador.id_entrenador = entrenadores.id;

CREATE VIEW vista_entrenadores1 AS
SELECT
entrenadores.id AS id,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS alias,
pokemon.id AS id_pokemon,
pokebolas.id AS id_pokebola,
imagenes_entrenador.imagen AS imagen,
entrenadores.suspendido AS suspendido
FROM
entrenadores, regiones, imagenes_entrenador, pokemon, pokebolas
WHERE
entrenadores.lugar_nacimiento = regiones.id
AND
imagenes_entrenador.id_entrenador = entrenadores.id
AND
pokebolas.id_entrenador = entrenadores.id
AND
entrenadores.suspendido=1;

CREATE VIEW vista_poke AS
SELECT
catalogo_pokemon.id AS id,
catalogo_pokemon.especie AS especie,
catalogo_pokemon.hit_points AS hit_points, 
catalogo_pokemon.ataque AS ataque,
catalogo_pokemon.defensa AS defensa,
catalogo_pokemon.velocidad AS velocidad,
catalogo_pokemon.evasion AS evasion,
catalogo_pokemon.prezision AS prezision,
regiones.nombre AS region,
imagenes_pokemon.imagen AS imagen
FROM
catalogo_pokemon, regiones, imagenes_pokemon
WHERE
catalogo_pokemon.region = regiones.id 
AND
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id;

SELECT enfermeras.id, enfermeras.nombre, enfermeras.apellidos, centros_pokemon.nombre FROM enfermeras INNER JOIN centros_pokemon 
ON (enfermeras.id_centro_pokemon = centros_pokemon.id);


CREATE VIEW vista_tipos AS
SELECT
catalogo_pokemon.id AS id,
catalogo_pokemon.especie AS especie,
catalogo_tipos.nombre AS tipo,
FROM
catalogo_pokemon, catalogo_tipos, tipos
WHERE
tipos.id_pokemon = catalogo_pokemon.id
AND
tipos.id_tipo = catalogo_tipos.id;


CREATE VIEW vista_habiles AS
SELECT
catalogo_pokemon.id AS id,
catalogo_pokemon.especie AS especie,
catalogo_habilidades.nombre AS habilidad
FROM
catalogo_pokemon, catalogo_habilidades, habilidades
WHERE
habilidades.id_pokemon = catalogo_pokemon.id
AND
habilidades.id_habilidad = catalogo_habilidades.id;


CREATE VIEW vista_evolucion AS
SELECT
catalogo_pokemon.id AS id, 
evoluciones.id_prevolucion AS id_prevolucion,
catalogo_pokemon.especie AS especie,
imagenes_pokemon.imagen AS imagen
FROM
catalogo_pokemon, imagenes_pokemon, evoluciones
WHERE
imagenes_pokemon.id_catalogo_pokemon = catalogo_pokemon.id 
AND
evoluciones.id_evolucion = catalogo_pokemon.id;

CREATE VIEW vista_perfilpokemon AS
SELECT
entrenadores.id AS id,
catalogo_pokemon.especie AS especie,
pokemon.alias AS alias,
pokemon.sexo AS sexo,
pokemon.nivel AS nivel,
pokemon.es_intercambiable AS es_intercambiable,
pokemon.hit_points AS hit_points, 
pokemon.ataque AS ataque,
pokemon.defensa AS defensa,
pokemon.velocidad AS velocidad,
pokemon.evasion AS evasion,
pokemon.prezision AS prezision,
catalogo_estatus.nombre AS estatus,
catalogo_tipos.nombre AS tipo,
catalogo_habilidades.nombre AS habilidades,
imagenes_pokemon.imagen AS imagen,
pokemon.suspendido AS suspendido
FROM
entrenadores, catalogo_pokemon, pokemon, catalogo_estatus, catalogo_tipos, catalogo_habilidades, imagenes_pokemon
WHERE
pokemon.especie = catalogo_pokemon.id
AND
habilidades.id_pokemon = catalogo_pokemon.id 
AND
habilidades.id_habilidad = catalogo_habilidades.id
AND
tipos.id_tipo = catalogo_tipos.id
AND
tipos.id_pokemon = catalogo_pokemon.id 
AND
catalogo_estatus.id_pokemon = catalogo_pokemon.id 
AND
imagenes_pokemon.id_pokemon = catalogo_pokemon.id;

CREATE VIEW vista_regeneradores AS
SELECT
regeneradores.id AS id,
regeneradores.slots AS slots, 
regeneradores.slots_funcionales	AS slots_funcionales,
regeneradores.esta_mantenimiento AS esta_mantenimiento, 
centros_pokemon.nombre AS centro,
regeneradores.suspendido AS suspendido
FROM
regeneradores, centros_pokemon
WHERE
regeneradores.id_centro_pokemon = centros_pokemon.id;

CREATE VIEW vista_habitaciones AS
SELECT
habitaciones.id AS id,
habitaciones.capacidad AS capacidad,
centros_pokemon.nombre AS centro,
habitaciones.suspendido AS suspendido 
FROM
habitaciones, centros_pokemon
WHERE
habitaciones.id_centro_pokemon = centros_pokemon.id;

CREATE VIEW vista_ayudantes AS 
SELECT 
ayudantes.id AS id, 
catalogo_pokemon.especie AS especie,
ayudantes.fecha_nacimiento AS fecha_nacimiento,
ayudantes.fecha_graduacion AS fecha_graduacion,
enfermeras.id AS id_enfermera,
enfermeras.nombre AS nombre,
enfermeras.apellidos AS apellidos,
ayudantes.suspendido AS suspendido
FROM
ayudantes, catalogo_pokemon, enfermeras
WHERE
ayudantes.id_enfermera = enfermeras.id
AND
ayudantes.tipo = catalogo_pokemon.id;

CREATE VIEW vista_registroestatus AS
SELECT
registros.id AS id,
registros.id_pokebola AS id_pokebola,
registros.hit_points AS hit_points,
registros.fecha_entrada AS fecha_entrada,
registros.estatus AS estatus,
catalogo_estatus.nombre AS nombre,
catalogo_estatus.tiempo AS tiempo,
catalogo_estatus.desaparece_a AS desaparece_a
FROM
registros, catalogo_estatus
WHERE
registros.estatus = catalogo_estatus.id;

CREATE VIEW vista_registros AS
SELECT
registros.id AS id,
registros.enfermera_entrada AS id_enfermeraentrada,
enfermeras.nombre AS nombreentrada,
enfermeras.apellidos AS apellidosentrada,
registros.enfermera_salida id_enfermerasalida,
enfermeras.nombre AS nombresalida,
enfermeras.apellidos AS apellidossalida,
registros.fecha_entrada AS fecha_entrada,
registros.fecha_estimada AS fecha_estimada,
registros.fecha_salida AS fecha_salida,
registros.id_regenerador AS id_regenerador,
registros.hit_points AS hit_points,
catalogo_estatus.nombre AS estatus,
registros.id_pokebola AS id_pokebola,
pokemon.id AS id_pokemon,
catalogo_pokemon.especie AS especie,
entrenadores.id AS id_entrenador,
entrenadores.nombre AS nombre_entrenador,
entrenadores.nombre AS apellidos_entrenador
FROM
registros, enfermeras, catalogo_estatus, catalogo_pokemon, entrenadores, pokemon
WHERE
registros.enfermera_entrada = enfermeras.id 
AND
registros.estatus = catalogo_estatus.id 
AND
pokemon.especie = catalogo_pokemon.id;

CREATE VIEW vista_camas AS
SELECT
camas.id AS id,
camas.en_uso AS en_uso,
camas.id_habitacion AS id_habitacion,
camas.id_entrenador AS id_entrenador,
entrenadores.nombre AS nombre,
entrenadores.apellidos AS apellidos,
entrenadores.alias AS alias
FROM
camas, entrenadores
WHERE
camas.id_entrenador = entrenadores.id;

insert into catalogo_pokemon values (null,"Treecko",4,40,45,35,65,55,70,1);

insert into catalogo_pokemon values (null,"Grovyle",4,50,65,45,85,65,95,1);
insert into catalogo_pokemon values (null,"Sceptile",4,70,85,65,105,85,120,0);
insert into catalogo_pokemon values (null,"Torchic",4,45,60,40,70,50,45,1);
insert into catalogo_pokemon values (null,"Combusken",4,60,85,60,85,60,55,1);
insert into catalogo_pokemon values (null,"Blaziken",4,80,120,70,110,70,80,0);
insert into catalogo_pokemon values (null,"Mudkip",4,50,70,50,50,50,40,1);
insert into catalogo_pokemon values (null,"Marshtomp",4,70,85,70,60,70,50,1);
insert into catalogo_pokemon values (null,"Swampert",4,100,110,90,85,90,60,0);
insert into catalogo_pokemon values (null,"Poochyena",4,35,55,35,30,30,35,1);
insert into catalogo_pokemon values (null,"Mightyena",4,70,90,70,60,60,70,0);
insert into catalogo_pokemon values (null,"Zigzagoon",4,38,30,41,30,41,60,1);
insert into catalogo_pokemon values (null,"Linoone",4,78,70,61,50,61,100,0);
insert into catalogo_pokemon values (null,"Wurmple",4,45,45,35,20,30,20,1);
insert into catalogo_pokemon values (null,"Silcoon",4,50,35,55,25,25,15,1);
insert into catalogo_pokemon values (null,"Beautifly",4,60,70,50,90,50,65,0);
insert into catalogo_pokemon values (null,"Lotad",4,40,30,30,40,50,30,1);
insert into catalogo_pokemon values (null,"Lombre",4,60,50,50,60,70,50,1);
insert into catalogo_pokemon values (null,"Ludicolo",4,80,70,70,90,100,70,0);
insert into catalogo_pokemon values (null,"Seedot",4,40,40,50,30,30,30,1);
insert into catalogo_pokemon values (null,"Nuzleaf",4,70,70,40,60,40,60,1);
insert into catalogo_pokemon values (null,"Shiftry",4,90,100,60,90,60,80,0);
insert into catalogo_pokemon values (null,"Taillow",4,40,55,30,30,30,85,1);
insert into catalogo_pokemon values (null,"Swellow",4,60,85,60,50,50,125,0);
insert into catalogo_pokemon values (null,"Wingull",4,40,30,30,55,30,85,1);
insert into catalogo_pokemon values (null,"Pelipper",4,60,50,100,85,70,65,0);
insert into catalogo_pokemon values (null,"Ralts",4,28,25,25,45,35,40,1);
insert into catalogo_pokemon values (null,"Kirlia",4,38,35,35,65,55,50,1);
insert into catalogo_pokemon values (null,"Gardevoir",4,68,65,65,125,115,80,0);
insert into catalogo_pokemon values (null,"Surskit",4,40,30,32,50,52,65,1);
insert into catalogo_pokemon values (null,"Masquerain",4,70,60,62,80,82,60,0);
insert into catalogo_pokemon values (null,"Shroomish",4,60,40,60,40,60,35,1);
insert into catalogo_pokemon values (null,"Breloom",4,60,130,80,60,60,70,0);
insert into catalogo_pokemon values (null,"Slakoth",4,60,60,60,35,35,30,1);
insert into catalogo_pokemon values (null,"Vigoroth",4,80,80,80,55,55,90,1);
insert into catalogo_pokemon values (null,"Slaking",4,150,160,100,95,65,100,0);
insert into catalogo_pokemon values (null,"Goldeen",4,45,67,60,35,50,63,1);
insert into catalogo_pokemon values (null,"Seaking",4,80,92,65,65,80,68,0);
                                                         
insert into imagenes_pokemon values (null,"Silcoon.png",43);

insert into imagenes_pokemon values (null,"Chansey.png",1);
insert into imagenes_pokemon values (null,"Blissey.png",4);
insert into imagenes_pokemon values (null,"Audino.png",5);
insert into imagenes_pokemon values (null,"Treecko.png",6);
insert into imagenes_pokemon values (null,"Grovyle.png",7);
insert into imagenes_pokemon values (null,"Sceptile.png",8);
insert into imagenes_pokemon values (null,"Torchic.png",9);
insert into imagenes_pokemon values (null,"Combusken.png",10);
insert into imagenes_pokemon values (null,"Blaziken.png",11);
insert into imagenes_pokemon values (null,"Mudkip.png",12);
insert into imagenes_pokemon values (null,"Marshtomp.png",13);
insert into imagenes_pokemon values (null,"Swampert.png",14);
insert into imagenes_pokemon values (null,"Poochyena.png",15);
insert into imagenes_pokemon values (null,"Mightyena.png",16);
insert into imagenes_pokemon values (null,"Zigzagoon.png",17);
insert into imagenes_pokemon values (null,"Linoone.png",18);
insert into imagenes_pokemon values (null,"Wurmple.png",19);
insert into imagenes_pokemon values (null,"Beautifly.png",20);
insert into imagenes_pokemon values (null,"Lotad.png",21);
insert into imagenes_pokemon values (null,"Lombre.png",22);
insert into imagenes_pokemon values (null,"Ludicolo.png",23);
insert into imagenes_pokemon values (null,"Seedot.png",24);
insert into imagenes_pokemon values (null,"Nuzleaf.png",25);
insert into imagenes_pokemon values (null,"Shiftry.png",26);
insert into imagenes_pokemon values (null,"Taillow.png",27);
insert into imagenes_pokemon values (null,"Swellow.png",28);
insert into imagenes_pokemon values (null,"Wingull.png",29);
insert into imagenes_pokemon values (null,"Pelipper.png",30);
insert into imagenes_pokemon values (null,"Ralts.png",31);
insert into imagenes_pokemon values (null,"Kirlia.png",32);
insert into imagenes_pokemon values (null,"Gardevoir.png",33);
insert into imagenes_pokemon values (null,"Surskit.png",34);
insert into imagenes_pokemon values (null,"Masquerain.png",35);
insert into imagenes_pokemon values (null,"Shroomish.png",36);
insert into imagenes_pokemon values (null,"Breloom.png",37);
insert into imagenes_pokemon values (null,"Slakoth.png",38);
insert into imagenes_pokemon values (null,"Vigoroth.png",39);
insert into imagenes_pokemon values (null,"Slaking.png",40);
insert into imagenes_pokemon values (null,"Goldeen.png",41);
insert into imagenes_pokemon values (null,"Seaking.png",42);
                                                         


insert into imagenes_entrenador values (null,"alfredo.jpg",2);
insert into imagenes_entrenador values (null,"ulises.jpg",3);
insert into imagenes_entrenador values (null,"karen.jpg",4);
insert into imagenes_entrenador values (null,"javier.jpg",6);
insert into imagenes_entrenador values (null,"job.jpg",7);
insert into imagenes_entrenador values (null,"manuel.jpg",8);

                                                    
ALTER TABLE evoluciones 
modify column id_prevolucion INT NOT NULL;

 alter table evoluciones
  add id_pokemon INT;

  alter table registros add foreign key (estatus) references catalogo_estatus(id);

 alter table registros
  add suspendido BOOLEAN DEFAULT '1';

INSERT INTO evoluciones VALUES(null,1,4);

