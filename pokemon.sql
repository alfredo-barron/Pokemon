--Regiones
create table regions(
  id serial primary key,
  name text not null
);

--UNO A UNO
--Centros Pokemon
create table centers(
  id serial primary key,
  name text not null,
  region_id int not null,
  available boolean default '1',
  foreign key (region_id) references regions(id)
);
--Catalogo Tipos
create table types(
  id serial primary key,
  name text not null
);
--Catalogo Habilidades
create table abilities(
  id serial primary key,
  name text not null
);
--Uno a muchos
--Catalogo Pokemon
create table pokemons(
  id serial primary key,
  species text not null,
  image text not null,
  region_id int not null,
  hit_points int not null,
  attack int not null,
  defense int not null,
  speed int not null,
  evasion int not null,
  accuracy int not null,
  foreign key (region_id) references regions(id)
);
--Catalgo estatus
create table statuses(
  id serial primary key,
  name text not null,
  time int not null,
  disappears int not null
);
--MUCHOS A MUCHOS
--Habilidades
create table pokemon_ability(
  id serial primary key,
  pokemon_id int not null,
  ability_id int not null,
  foreign key (pokemon_id) references pokemons(id),
  foreign key (ability_id) references abilities(id)
);
--MUCHO A MUCHOS
--Tipos
create table pokemon_type(
  id serial primary key,
  pokemon_id int not null,
  type_id int not null,
  foreign key (pokemon_id) references pokemons(id),
  foreign key (type_id) references types(id)
);
--UNO A UNO
create table evolutions(
  id serial primary key,
  pokemon_id int not null,
  pokemon_id_e int not null,
  foreign key (pokemon_id) references pokemons(id),
  foreign key (pokemon_id_e) references pokemons(id)
);

--Uno a muchos
create table trainers(
  id serial primary key,
  name text not null,
  last_name text not null,
  image text not null,
  username text not null,
  password text not null,
  birthday date not null,
  region_id int not null,
  gender text default 'Hombre',
  leader boolean default '1',
  region_id_actual int not null,
  available boolean default '1',
  foreign key (region_id) references regions(id),
  foreign key (region_id_actual) references regions(id)
);
--UNO A MUCHOS (STATUS)
--UNO A UNO (Pokemon)
--Mis pokemones
create table pokeballs(
  id serial primary key,
  trainer_id int not null,
  pokemon_id int not null,
  specie text not null,
  alias text,
  gender text default 'Masculino',
  level int not null,
  hit_points int not null,
  attack int not null,
  defense int not null,
  speed int not null,
  evasion int not null,
  accuracy int not null,
  status_id int not null,
  available boolean default '1',
  foreign key (pokemon_id) references pokemons(id),
  foreign key (trainer_id) references trainers(id),
  foreign key (status_id) references statuses(id)
);

--Uno a muchos
create table regenerators(
  id serial primary key,
  slots int not null default 50,
  slots_functional int not null,
  maintenance boolean default '0',
  center_id int not null,
  available boolean default '1',
  foreign key (center_id) references centers(id)
);
--Muchos a muchos
create table regenerator_pokeball(
  id serial primary key,
  date_start timestamp,
  date_estimated timestamp,
  date_end timestamp,
  regenerator_id int not null,
  hit_points int not null,
  status int not null,
  pokeball_id int not null,
  available boolean default '1',
  foreign key (regenerator_id) references regenerators(id),
  foreign key (pokeball_id) references pokeballs(id)
);

create table rooms(
  id serial primary key,
  capacity int not null,
  center_id int not null,
  available boolean default '1',
  foreign key (center_id) references centers(id)
);

create table room_trainer(
  id serial primary key,
  in_use boolean default '0',
  room_id int not null,
  trainer_id int not null,
  available boolean default '1',
  foreign key (room_id) references rooms(id),
  foreign key (trainer_id) references trainers(id)
);

INSERT INTO regiones VALUES (1,'Kanto'),(2,'Jotho'),(3,'Sinnoh'),(4,'Hoenn'),(5,'Almia');
INSERT INTO regions VALUES (1,'Kanto'),(2,'Jotho'),(3,'Sinnoh'),(4,'Hoenn'),(5,'Almia');

INSERT INTO centros_pokemon VALUES (1,'Pokémon Verde',1,true),(2,'Pokémon Rojo',2,true),(3,'Pokémon Azul',3,true),(4,'Pokémon Amarillo',4,true),(5,'Pokémon Oro',5,true);
INSERT INTO centers VALUES (1,'Pokémon Verde',1,true),(2,'Pokémon Rojo',2,true),(3,'Pokémon Azul',3,true),(4,'Pokémon Amarillo',4,true),(5,'Pokémon Oro',5,true);

INSERT INTO centers VALUES (6,'Pokémon Amarillo',1,true);

INSERT INTO catalogo_tipos VALUES (1,'Acero'),(2,'Agua'),(3,'Bicho'),(4,'Dragón'),(5,'Eléctrico'),(6,'Fantasma'),(7,'Fuego'),(8,'Hada'),(9,'Hielo'),(10,'Lucha'),(11,'Normal'),(12,'Planta'),(13,'Psíquico'),(14,'Roca'),(15,'Siniestro'),(16,'Tierra'),(17,'Veneno'),(18,'Volador'),(19,'???'),(20,'Pájaro'),(21,'Oscuro');
INSERT INTO types VALUES (1,'Acero'),(2,'Agua'),(3,'Bicho'),(4,'Dragón'),(5,'Eléctrico'),(6,'Fantasma'),(7,'Fuego'),(8,'Hada'),(9,'Hielo'),(10,'Lucha'),(11,'Normal'),(12,'Planta'),(13,'Psíquico'),(14,'Roca'),(15,'Siniestro'),(16,'Tierra'),(17,'Veneno'),(18,'Volador'),(19,'???'),(20,'Pájaro'),(21,'Oscuro');

INSERT INTO catalogo_habilidades VALUES (1,'Latigo Cepa'),(2,'Clorofila'),(3,'Mar Llamas'),(4,'Poder Solar'),(5,'Ascuas'),(6,'Torrente'),(7,'Cura Lluvia'),(8,'Hidro Bomba'),(9,'Demora'),(10,'Endurecer'),(11,'Esporas'),(12,'Polvo Escudo'),(13,'Mudar'),(14,'Enjambre'),(15,'Placaje'),(16,'Vista Lince'),(17,'Tormenta Arena'),(18,'Arañazo'),(19,'Placaje'),(20,'Agallas'),(21,'Picotazo'),(22,'Francotirador'),(23,'Intimidacion'),(24,'Veneno'),(25,'Trueno'),(26,'Pararayos'),(27,'Velo Arena'),(28,'Impetu Arena'),(29,'Entusiasmo'),(30,'Arañazo'),(31,'Ataque Tierra'),(32,'Picotazo Venenoso'),(33,'Megapuño'),(34,'Metronomo'),(35,'Agilidad'),(36,'Lanzallamas'),(37,'Sequia'),(38,'Gran Encanto'),(39,'Tenacidad'),(40,'Supersonico'),(41,'Foco'),(42,'Fuga'),(43,'Bomba Olor'),(44,'Esporas'),(45,'Picotazo Venenoso'),(46,'Humedad'),(47,'Placaje'),(48,'Polvo Sueño'),(49,'Dig'),(50,'Arena'),(51,'Arañazo'),(52,'Nerviosismo'),(53,'Confusion'),(54,'HydroPunch'),(55,'Furia'),(56,'Ira'),(57,'Gruñido'),(58,'Chorro Agua'),(59,'Absorber'),(60,'Teletransportacion'),(61,'Telequinesis'),(62,'Confusion'),(63,'Golpe Karate'),(64,'Golpe Roca'),(65,'Corpulencia'),(66,'Danza Caos'),(67,'Atraccion'),(68,'Hierva Lazo'),(69,'Cura Lluvia'),(70,'Rayo Aurora'),(71,'Avalancha'),(72,'Pisoton'),(73,'Daño Secreto'),(74,'Cola Agua'),(75,'Danza Lluvia'),(76,'Destello'),(77,'Onda Trueno'),(78,'Doble Filo'),(79,'Ladron'),(80,'Fly'),(81,'Viento Hielo'),(82,'Surf'),(83,'Mal de Ojo'),(84,'Residuos'),(85,'Chirrido'),(86,'Rayo Burbuja'),(87,'Tinieblas'),(88,'Maldicion'),(89,'Bola Sombra'),(90,'Atadura'),(91,'Hipnosis'),(92,'Confusion'),(93,'Garra Metal'),(94,'Corte'),(95,'Explosion'),(96,'Campana Cura'),(97,'Aromaterapia'),(98,'Recuperacion'),(99,'Cura Natural'),(100,'Dicha'),(101,'Alma Cura'),(102,'Regeneracion'),(103,'Espesura'),(104,'Pies Rapidos'),(105,'Gula'),(106,'Recogida'),(107,'Nado Rapido'),(108,'Madrugar'),(109,'Rastro'),(110,'Sincronia'),(111,'Ausente'),(112,'Espiritu Vital'),(113,'Velo Agua'),(114,'Foco Interno');
INSERT INTO abilities VALUES (1,'Latigo Cepa'),(2,'Clorofila'),(3,'Mar Llamas'),(4,'Poder Solar'),(5,'Ascuas'),(6,'Torrente'),(7,'Cura Lluvia'),(8,'Hidro Bomba'),(9,'Demora'),(10,'Endurecer'),(11,'Esporas'),(12,'Polvo Escudo'),(13,'Mudar'),(14,'Enjambre'),(15,'Placaje'),(16,'Vista Lince'),(17,'Tormenta Arena'),(18,'Arañazo'),(19,'Placaje'),(20,'Agallas'),(21,'Picotazo'),(22,'Francotirador'),(23,'Intimidacion'),(24,'Veneno'),(25,'Trueno'),(26,'Pararayos'),(27,'Velo Arena'),(28,'Impetu Arena'),(29,'Entusiasmo'),(30,'Arañazo'),(31,'Ataque Tierra'),(32,'Picotazo Venenoso'),(33,'Megapuño'),(34,'Metronomo'),(35,'Agilidad'),(36,'Lanzallamas'),(37,'Sequia'),(38,'Gran Encanto'),(39,'Tenacidad'),(40,'Supersonico'),(41,'Foco'),(42,'Fuga'),(43,'Bomba Olor'),(44,'Esporas'),(45,'Picotazo Venenoso'),(46,'Humedad'),(47,'Placaje'),(48,'Polvo Sueño'),(49,'Dig'),(50,'Arena'),(51,'Arañazo'),(52,'Nerviosismo'),(53,'Confusion'),(54,'HydroPunch'),(55,'Furia'),(56,'Ira'),(57,'Gruñido'),(58,'Chorro Agua'),(59,'Absorber'),(60,'Teletransportacion'),(61,'Telequinesis'),(62,'Confusion'),(63,'Golpe Karate'),(64,'Golpe Roca'),(65,'Corpulencia'),(66,'Danza Caos'),(67,'Atraccion'),(68,'Hierva Lazo'),(69,'Cura Lluvia'),(70,'Rayo Aurora'),(71,'Avalancha'),(72,'Pisoton'),(73,'Daño Secreto'),(74,'Cola Agua'),(75,'Danza Lluvia'),(76,'Destello'),(77,'Onda Trueno'),(78,'Doble Filo'),(79,'Ladron'),(80,'Fly'),(81,'Viento Hielo'),(82,'Surf'),(83,'Mal de Ojo'),(84,'Residuos'),(85,'Chirrido'),(86,'Rayo Burbuja'),(87,'Tinieblas'),(88,'Maldicion'),(89,'Bola Sombra'),(90,'Atadura'),(91,'Hipnosis'),(92,'Confusion'),(93,'Garra Metal'),(94,'Corte'),(95,'Explosion'),(96,'Campana Cura'),(97,'Aromaterapia'),(98,'Recuperacion'),(99,'Cura Natural'),(100,'Dicha'),(101,'Alma Cura'),(102,'Regeneracion'),(103,'Espesura'),(104,'Pies Rapidos'),(105,'Gula'),(106,'Recogida'),(107,'Nado Rapido'),(108,'Madrugar'),(109,'Rastro'),(110,'Sincronia'),(111,'Ausente'),(112,'Espiritu Vital'),(113,'Velo Agua'),(114,'Foco Interno');

INSERT INTO catalogo_pokemon VALUES
(1,'Bulbasaur','pokemon_1',1,45,49,49,65,65,45),
(2,'Ivysaur','pokemon_2',1,60,62,63,80,80,60),
(3,'Venusaur','pokemon_3',1,80,82,83,100,100,80),
(4,'Charmander','pokemon_4',1,39,52,43,60,50,65),
(5,'Charmeleon','pokemon_5',1,58,64,58,80,65,80),
(6,'Charizard','pokemon_6',1,78,84,78,109,85,100),
(7,'Squirtle','pokemon_7',1,44,48,65,50,64,43),
(8,'Wartortle','pokemon_8',1,59,63,80,65,80,58),
(9,'Blastoise','pokemon_9',1,79,83,100,85,105,78),
(10,'Pidgey','pokemon_10',1,40,45,40,35,35,56),
(11,'Pikachu','pokemon_11',1,35,55,40,50,50,90),
(12,'Raichu','pokemon_12',1,60,90,55,90,80,110),
(13,'Jigglypuff','pokemon_13',1,115,45,20,45,25,20),
(14,'Meowth','pokemon_14',1,40,45,35,40,40,90),
(15,'Psyduck','pokemon_15',1,50,52,48,65,50,55),
(16,'Gengar','pokemon_16',1,60,65,60,130,75,110),
(17,'Gyarados','pokemon_17',1,95,125,79,60,100,81),
(18,'Lapras','pokemon_18',1,130,85,80,85,95,60),
(19,'Eevee','pokemon_19',1,55,55,50,45,65,55),
(20,'Vaporeon','pokemon_20',1,130,65,60,110,95,65),
(21,'Jolteon','pokemon_21',1,65,65,60,110,95,130),
(22,'Flareon','pokemon_22',1,65,130,60,95,110,65),
(23,'Porygon','pokemon_23',1,65,60,70,85,75,40),
(24,'Snorlax','pokemon_24',1,160,110,65,65,110,30),
(25,'Dragonite','pokemon_25',1,91,134,95,100,100,80),
(26,'Chikorita','pokemon_26',2,45,49,65,49,65,45),
(27,'Bayleef','pokemon_27',2,60,62,80,63,80,60),
(28,'Meganium','pokemon_28',2,80,82,100,83,100,80),
(29,'Cyndaquil','pokemon_29',2,39,52,43,60,50,65),
(30,'Quilava','pokemon_30',2,58,64,58,80,65,80),
(31,'Typhlosion','pokemon_31',2,78,84,78,109,85,100),
(32,'Totodile','pokemon_32',2,50,65,64,44,48,43),
(33,'Croconaw','pokemon_33',2,65,80,80,59,63,58),
(34,'Feraligatr','pokemon_34',2,85,105,100,79,83,78),
(35,'Hoothoot','pokemon_35',2,60,30,30,36,56,50),
(36,'Pichu','pokemon_36',2,20,40,15,35,35,60),
(37,'Togepi','pokemon_37',2,35,20,65,40,65,20),
(38,'Ampharos','pokemon_38',2,90,75,85,115,90,55),
(39,'Marill','pokemon_39',2,70,20,50,20,50,40),
(40,'Sudowoodo','pokemon_40',2,70,100,115,30,65,30),
(41,'Espeon','pokemon_42',2,65,65,60,130,95,110),
(42,'Umbreon','pokemon_42',2,95,65,110,60,130,65),
(43,'Unown','pokemon_43',2,48,72,48,72,48,48),
(44,'Wobbuffet','pokemon_44',2,190,33,58,33,58,33),
(45,'Steelix','pokemon_45',2,75,85,200,55,65,30),
(46,'Scizor','pokemon_46',2,70,130,100,55,80,65),
(47,'Heracros','pokemon_47',2,80,125,75,40,95,85),
(48,'Donphan','pokemon_48',2,90,120,120,60,60,50),
(49,'Militank','pokemon_49',2,95,80,105,40,70,100),
(50,'Tyranitar','pokemon_50',2,100,134,110,95,100,61),
(51,'Treecko','pokemon_51',4,40,45,35,65,55,70),
(52,'Grovyle','pokemon_52',4,50,65,45,85,65,95),
(53,'Sceptile','pokemon_53',4,70,85,65,105,85,120),
(54,'Torchic','pokemon_54',4,45,60,40,70,50,45),
(55,'Combusken','pokemon_55',4,60,85,60,85,60,55),
(56,'Blaziken','pokemon_56',4,80,120,70,110,70,80),
(57,'Mudkip','pokemon_57',4,50,70,50,50,50,40),
(58,'Marshtomp','pokemon_58',4,70,85,70,60,70,50),
(59,'Swampert','pokemon_59',4,100,110,90,85,90,60),
(60,'Beautifly','pokemon_60',4,60,70,50,90,50,65),
--(10,'Caterpie',img,1,45,30,35,20,20,45),
--(11,'Metapod',img,1,50,20,55,25,25,30),
--(12,'Butterfree',img,1,60,45,50,90,80,70),
--(13,'Weedle',img,1,40,35,30,20,20,50),
--(14,'Kakuna',img,1,45,25,50,25,25,35),
--(15,'Beedrill',img,1,65,90,40,45,80,75),
(17,'Pidgeotto',img,1,63,60,55,50,50,71),
(18,'Pidgeot',img,1,83,80,75,70,70,101),
(19,'Rattata',img,1,30,56,35,25,35,72),
(20,'Raticate',img,1,55,81,60,50,70,97),
(21,'Spearow',img,1,40,60,30,31,31,70),
(22,'Fearow',img,1,65,90,65,61,61,100),
(23,'Ekans',img,1,35,60,44,40,54,55),
(24,'Arbok',img,1,60,85,69,65,79,80),
(27,'Sandshrew',img,1,50,75,85,20,30,40),
(28,'Sandslash',img,1,75,100,110,45,55,65),
(29,'Nidoran♀',img,1,55,47,52,40,40,41),
(30,'Nidorina',img,1,70,62,67,55,55,56),
(31,'Nidoqueen',img,1,90,92,87,75,85,76),
(32,'Nidoran♂',img,1,46,57,40,40,40,50),
(33,'Nidorino',img,1,61,72,57,55,55,65),
(34,'Nidoking',img,1,81,102,77,85,75,85),
(35,'Clefairy',img,1,70,45,48,60,65,35),
(36,'Clefable',img,1,95,70,73,95,90,60),
(37,'Vulpix',img,1,38,41,40,50,65,65),
(38,'Ninetales',img,1,73,76,75,81,100,100),
(40,'Wigglytuff',img,1,140,70,45,85,50,45),
(41,'Zubat',img,1,40,45,35,30,40,55),
(42,'Golbat',img,1,75,80,70,65,75,90),
(43,'Oddish',img,1,45,50,55,75,65,30),
(44,'Gloom',img,1,60,65,70,85,75,40),
(45,'Vileplume',img,1,75,80,85,110,90,50),
(46,'Paras',img,1,35,70,55,45,55,25),
(47,'Parasect',img,1,60,95,80,60,80,30),
(48,'Venonat',img,1,60,55,50,40,55,45),
(49,'Venomoth',img,1,70,65,60,90,75,90),
(50,'Diglett',img,1,10,55,25,35,45,95),
(51,'Dugtrio',img,1,35,80,50,50,70,120),
(53,'Persian',img,1,65,70,60,65,65,115),
(55,'Golduck',img,1,80,82,78,95,80,85);

INSERT INTO pokemons VALUES
(1,'Bulbasaur','pokemon_1',1,45,49,49,65,65,45),
(2,'Ivysaur','pokemon_2',1,60,62,63,80,80,60),
(3,'Venusaur','pokemon_3',1,80,82,83,100,100,80),
(4,'Charmander','pokemon_4',1,39,52,43,60,50,65),
(5,'Charmeleon','pokemon_5',1,58,64,58,80,65,80),
(6,'Charizard','pokemon_6',1,78,84,78,109,85,100),
(7,'Squirtle','pokemon_7',1,44,48,65,50,64,43),
(8,'Wartortle','pokemon_8',1,59,63,80,65,80,58),
(9,'Blastoise','pokemon_9',1,79,83,100,85,105,78),
(10,'Pidgey','pokemon_10',1,40,45,40,35,35,56),
(11,'Pikachu','pokemon_11',1,35,55,40,50,50,90),
(12,'Raichu','pokemon_12',1,60,90,55,90,80,110),
(13,'Jigglypuff','pokemon_13',1,115,45,20,45,25,20),
(14,'Meowth','pokemon_14',1,40,45,35,40,40,90),
(15,'Psyduck','pokemon_15',1,50,52,48,65,50,55),
(16,'Gengar','pokemon_16',1,60,65,60,130,75,110),
(17,'Gyarados','pokemon_17',1,95,125,79,60,100,81),
(18,'Lapras','pokemon_18',1,130,85,80,85,95,60),
(19,'Eevee','pokemon_19',1,55,55,50,45,65,55),
(20,'Vaporeon','pokemon_20',1,130,65,60,110,95,65),
(21,'Jolteon','pokemon_21',1,65,65,60,110,95,130),
(22,'Flareon','pokemon_22',1,65,130,60,95,110,65),
(23,'Porygon','pokemon_23',1,65,60,70,85,75,40),
(24,'Snorlax','pokemon_24',1,160,110,65,65,110,30),
(25,'Dragonite','pokemon_25',1,91,134,95,100,100,80),
(26,'Chikorita','pokemon_26',2,45,49,65,49,65,45),
(27,'Bayleef','pokemon_27',2,60,62,80,63,80,60),
(28,'Meganium','pokemon_28',2,80,82,100,83,100,80),
(29,'Cyndaquil','pokemon_29',2,39,52,43,60,50,65),
(30,'Quilava','pokemon_30',2,58,64,58,80,65,80),
(31,'Typhlosion','pokemon_31',2,78,84,78,109,85,100),
(32,'Totodile','pokemon_32',2,50,65,64,44,48,43),
(33,'Croconaw','pokemon_33',2,65,80,80,59,63,58),
(34,'Feraligatr','pokemon_34',2,85,105,100,79,83,78),
(35,'Hoothoot','pokemon_35',2,60,30,30,36,56,50),
(36,'Pichu','pokemon_36',2,20,40,15,35,35,60),
(37,'Togepi','pokemon_37',2,35,20,65,40,65,20),
(38,'Ampharos','pokemon_38',2,90,75,85,115,90,55),
(39,'Marill','pokemon_39',2,70,20,50,20,50,40),
(40,'Sudowoodo','pokemon_40',2,70,100,115,30,65,30),
(41,'Espeon','pokemon_42',2,65,65,60,130,95,110),
(42,'Umbreon','pokemon_42',2,95,65,110,60,130,65),
(43,'Unown','pokemon_43',2,48,72,48,72,48,48),
(44,'Wobbuffet','pokemon_44',2,190,33,58,33,58,33),
(45,'Steelix','pokemon_45',2,75,85,200,55,65,30),
(46,'Scizor','pokemon_46',2,70,130,100,55,80,65),
(47,'Heracros','pokemon_47',2,80,125,75,40,95,85),
(48,'Donphan','pokemon_48',2,90,120,120,60,60,50),
(49,'Militank','pokemon_49',2,95,80,105,40,70,100),
(50,'Tyranitar','pokemon_50',2,100,134,110,95,100,61),
(51,'Treecko','pokemon_51',4,40,45,35,65,55,70),
(52,'Grovyle','pokemon_52',4,50,65,45,85,65,95),
(53,'Sceptile','pokemon_53',4,70,85,65,105,85,120),
(54,'Torchic','pokemon_54',4,45,60,40,70,50,45),
(55,'Combusken','pokemon_55',4,60,85,60,85,60,55),
(56,'Blaziken','pokemon_56',4,80,120,70,110,70,80),
(57,'Mudkip','pokemon_57',4,50,70,50,50,50,40),
(58,'Marshtomp','pokemon_58',4,70,85,70,60,70,50),
(59,'Swampert','pokemon_59',4,100,110,90,85,90,60),
(60,'Beautifly','pokemon_60',4,60,70,50,90,50,65);

INSERT INTO catalogo_estatus VALUES (1,'Normal',30,100),(2,'Quemado',85,70),(3,'Congelado',85,70),(4,'Paralizado',100,90),(5,'Envenenado',100,70),(6,'Fuertemente envenenado',120,90),(7,'Dormido',60,70),(8,'Desmayado',60,70);
INSERT INTO statuses VALUES (1,'Normal',30,100),(2,'Quemado',85,70),(3,'Congelado',85,70),(4,'Paralizado',100,90),(5,'Envenenado',100,70),(6,'Fuertemente envenenado',120,90),(7,'Dormido',60,70),(8,'Desmayado',60,70);

INSERT INTO habilidades VALUES (1,1,1),(2,1,2);
INSERT INTO pokemon_ability VALUES (1,1,1),(2,1,2);


INSERT INTO habilidades VALUES (1,1,100),(2,1,99),(3,4,99),(4,4,100),(5,5,102),(6,5,101),(7,6,103),(8,7,103),(9,8,103),(10,9,3),(11,10,3),(12,11,3),(13,12,6),(14,13,6),(15,15,42),(16,15,104),(17,16,23),(18,16,104),(19,17,106),(20,17,105),(21,18,106),(22,18,105),(23,19,12),(24,43,13),(25,20,14),(26,21,7),(27,21,107),(28,22,7),(29,22,107),(30,23,7),(31,23,107),(32,24,2),(33,24,108),(34,25,2),(35,25,108),(36,26,2),(37,26,108),(38,27,20),(39,28,20),(40,29,16),(41,30,16),(42,31,109),(43,31,110),(44,32,109),(45,32,110),(46,33,109),(47,33,110),(48,38,111),(49,39,112),(50,40,111),(51,41,107),(52,41,113),(53,42,107),(54,42,113),(55,35,23);

INSERT INTO tipos VALUES (1,1,5),(2,4,5),(3,5,5),(4,6,1),(5,7,1),(6,8,1),(7,9,2),(8,10,2),(9,10,10),(10,11,2),(11,12,3),(12,13,3),(13,13,8),(14,14,3),(15,14,8),(16,15,14),(17,16,14),(18,17,5),(19,18,5),(20,19,4),(21,43,4),(22,20,4),(23,20,15),(24,21,3),(25,21,1),(26,22,3),(27,22,1),(28,23,3),(29,23,1),(30,24,1),(31,25,1),(32,25,14),(33,26,1),(34,26,14),(35,27,5),(36,27,15),(37,28,5),(38,28,15),(39,29,3),(40,29,15),(41,30,3),(42,30,15),(43,31,11),(44,31,9),(45,32,11),(46,32,9),(47,33,11),(48,33,9),(49,38,5),(50,39,5),(51,40,5),(52,41,3),(53,42,3),(54,35,15);

INSERT INTO evoluciones VALUES (2,1,4),(3,6,7),(4,7,8),(5,9,10),(6,10,11),(7,12,13),(8,13,14),(9,15,16),(10,17,18),(11,19,43),(12,43,20),(13,21,22),(14,22,23),(15,24,25),(16,25,26),(17,27,28),(18,29,30),(19,31,32),(20,32,33),(21,34,35),(22,36,37),(23,38,39),(24,39,40),(25,41,42);
INSERT INTO evolutions VALUES (1,1,2),(2,2,3);

INSERT INTO entrenadores VALUES (1,'Alfredo','Barrón','entrenador.png','Freddy','110992','1992-09-11',4,'Hombre',true,4,true),(2,'Ulises','Larraga','entrenador.png','Kross','030593','1993-05-03',1,'Hombre',false,1,true),(3,'Karen','Osuna','entrenadora.png','Anna','carlitos','1992-09-27',1,'Mujer',false,1,true),(4,'Javier','Ramirez','entrenador.png','samy','vkjbvk','2013-12-05',1,'Hombre',true,3,true),(5,'Alain','Olvera','entrenador.png','bebe','259206','1992-06-25',2,'Hombre',true,1,true),(6,'Manuel','Hdez','entrenador.png','Manny','akatsuki','1993-02-12',2,'Hombre',true,4,true),(7,'Jaime Jesus','Delgado Meraz','entrenador.png','j2deme','1234','1987-08-21',1,'Hombre',true,1,true);
INSERT INTO trainers VALUES (1,'Alfredo','Barrón','entrenador','Freddy','110992','1992-09-11',4,'Hombre',true,4,true),(2,'Ulises','Larraga','entrenador','Kross','030593','1993-05-03',1,'Hombre',false,1,true),(3,'Karen','Osuna','entrenadora','Anna','carlitos','1992-09-27',1,'Mujer',false,1,true),(4,'Javier','Ramirez','entrenador','samy','vkjbvk','2013-12-05',1,'Hombre',true,3,true),(5,'Alain','Olvera','entrenador','bebe','259206','1992-06-25',2,'Hombre',true,1,true),(6,'Manuel','Hdez','entrenador','Manny','akatsuki','1993-02-12',2,'Hombre',true,4,true),(7,'Jaime Jesus','Delgado Meraz','entrenador','j2deme','1234','1987-08-21',1,'Hombre',true,1,true);

INSERT INTO pokemon VALUES (1,6,'Tree','Masculino',1,true,100,40,50,70,50,90,1,false),(2,9,'Thor','Femenino',1,true,75,20,40,40,100,50,1,false),(3,12,'Mukito','Masculino',1,false,90,20,40,30,50,70,1,true),(4,9,'Torchic','Masculino',1,false,70,40,50,100,30,60,1,false),(5,12,'Mosca','Masculino',1,true,40,70,30,60,100,90,1,false),(6,31,'el guapo','Masculino',1,true,2,5,5,3,81,1,1,false),(7,27,'cuchurrumin','Masculino',1,true,30,79,30,50,90,60,1,false),(8,13,'','Masculino',1,true,100,85,50,80,90,75,1,false),(9,27,'','Masculino',1,true,100,87,80,30,100,80,1,true);

INSERT INTO pokebolas VALUES (1,2,1,true,false),(2,2,2,true,false),(3,2,3,true,true),(4,3,4,true,false),(5,4,5,true,false),(6,2,1,true,false),(7,6,6,true,false),(8,7,7,true,false),(9,8,8,true,false),(10,9,9,true,true);

INSERT INTO regeneradores VALUES (1,'50',10,false,1,true),(2,'150',50,true,1,true),(3,'75',20,false,1,true),(4,'50',15,false,1,true),(5,'75',10,true,1,true);
INSERT INTO regenerators VALUES (1,'50',10,false,1,true),(2,'150',50,true,1,true),(3,'75',20,false,1,true),(4,'50',15,false,1,true),(5,'75',10,true,1,true);

INSERT INTO registros VALUES (1,12,NULL,'2013-12-10 20:18:00',NULL,NULL,1,100,1,3,false),(2,12,NULL,'2013-12-10 23:21:00',NULL,NULL,1,100,1,1,false),(3,12,NULL,'2013-12-11 00:29:00',NULL,NULL,1,5,7,2,true),(4,13,NULL,'2013-12-11 09:48:00',NULL,NULL,1,100,1,10,false);

INSERT INTO habitaciones VALUES (1,10,1,true),(2,14,1,true);
INSERT INTO rooms VALUES (1,10,1,true),(2,14,1,true);

INSERT INTO camas VALUES (1,true,1,1,true),(2,true,1,7,true);
INSERT INTO room_trainer VALUES (1,true,1,1,true),(2,true,1,7,true);

INSERT INTO imagenes_pokemon VALUES (1,'Chansey.png',1),(2,'Blissey.png',4),(3,'Audino.png',5),(4,'Treecko.png',6),(5,'Grovyle.png',7),(6,'Sceptile.png',8),(7,'Torchic.png',9),(8,'Combusken.png',10),(9,'Blaziken.png',11),(10,'Mudkip.png',12),(11,'Marshtomp.png',13),(12,'Swampert.png',14),(13,'Poochyena.png',15),(14,'Mightyena.png',16),(15,'Zigzagoon.png',17),(16,'Linoone.png',18),(17,'Wurmple.png',19),(18,'Beautifly.png',20),(19,'Lotad.png',21),(20,'Lombre.png',22),(21,'Ludicolo.png',23),(22,'Seedot.png',24),(23,'Nuzleaf.png',25),(24,'Shiftry.png',26),(25,'Taillow.png',27),(26,'Swellow.png',28),(27,'Wingull.png',29),(28,'Pelipper.png',30),(29,'Ralts.png',31),(30,'Kirlia.png',32),(31,'Gardevoir.png',33),(32,'Surskit.png',34),(33,'Masquerain.png',35),(34,'Shroomish.png',36),(35,'Breloom.png',37),(36,'Slakoth.png',38),(37,'Vigoroth.png',39),(38,'Slaking.png',40),(39,'Goldeen.png',41),(40,'Seaking.png',42),(41,'Silcoon.png',43);

INSERT INTO imagenes_entrenador VALUES (1,'alfredo.jpg',2),(2,'ulises.jpg',3),(3,'karen.jpg',4),(4,'javier.jpg',6),(5,'job.jpg',7),(6,'manuel.jpg',8),(7,'j2deme.jpg',9);


tipos
1 4
1 5
2 7
2 6

