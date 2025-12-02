/* Create a data base with name zoo*/
CREATE DATABASE zoo;

/* create table for habitats with parameters id & name & describtion and thier data type*/
CREATE TABLE habitats(
	id_hab int PRIMARY KEY AUTO_INCREMENT,
    name_hab varchar(100),
    describtion_hab varchar(500)
);

/* create table for animales with parameter id & name & name of alimentair & image and linke it with table of habitats*/
CREATE TABLE animal(
	id_animal int PRIMARY KEY AUTO_INCREMENT,
    name_animal varchar(100),
    name_alimentair varchar(100),
    image_animal varchar(500),
    habita_id int,
    FOREIGN KEY (habita_id) REFERENCES habitats(id_hab)
);

