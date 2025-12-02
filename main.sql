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

/*added the data of if user add one animale*/
INSERT INTO animal (id_animal, name_animal, image_animal)
VALUES (1 , "lion" , "https://tse1.mm.bing.net/th/id/OIP.T-SQ5d8n6_jhLDOj3yx7_wHaEK?pid=Api&P=0&h=180 ");

/*added the data of if user add many animales*/
INSERT INTO animal ( name_animal, image_animal)
VALUES ( "lion" , "https://tse1.mm.bing.net/th/id/OIP.T-SQ5d8n6_jhLDOj3yx7_wHaEK?pid=Api&P=0&h=180 "),
( "fish", "https://tse4.mm.bing.net/th/id/OIP.xRrB_f7LSd3AfjjqYR6pDAHaEK?pid=Api&P=0&h=180"),
("tiger","https://tse3.mm.bing.net/th/id/OIP.wYKbiPYohf2SKxF02sSgHAHaEJ?pid=Api&P=0&h=180"),
( "snake","https://tse1.mm.bing.net/th/id/OIP.bdTDfzNFuYC1AUrd0TvhtgHaEK?pid=Api&P=0&h=180");

