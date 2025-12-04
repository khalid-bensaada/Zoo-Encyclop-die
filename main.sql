/* Create a data base with name zoo*/
CREATE DATABASE Zoo;

USE Zoo;

/* create table for habitats with parameters id & name & describtion and thier data type*/
CREATE TABLE Habitats (
    ID_Hab INT PRIMARY KEY AUTO_INCREMENT,
    Name_Hab VARCHAR(50),
    Description_Hab TEXT
);

/* create table for animales with parameter id & name & name of alimentair & image and linke it with table of habitats*/
CREATE TABLE Animal (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Name_animal VARCHAR(50),
    Type_food VARCHAR(20),
    Image_animal VARCHAR(255),
    Habitat_ID INT,
    FOREIGN KEY (Habitat_ID) REFERENCES Habitats(ID_Hab)
);

/*added the data of if user add many animales*/
INSERT INTO Animal (Name_animal, Type_food, Image_animal, Habitat_ID)
VALUES ('Lion', 'Carnivore', 'lion.jpg', 1),
       ('Elephant', 'Herbivore', 'elephant.jpg', 1),
       ('Monkey', 'Omnivore', 'monkey.jpg', 2);

/* Update a animale have id 1 */
UPDATE Animal
SET Type_food = 'Herbivore'
WHERE Name = 'Monkey';

UPDATE Animal
SET Image_animal = 'lion_new.jpg'
WHERE Name = 'Lion';

/*delete the animal*/
DELETE FROM Animal
WHERE Name_animal = 'Monkey';

/*afechage the list of animales */
SELECT Animal.Name, Animal.Type_food, Animal.Image, Habitats.Name_Hab
FROM Animal
JOIN Habitats ON Animal.Habitat_ID = Habitats.ID_Hab;

/*added the data of if user add one habitat*/
INSERT INTO habitats (Name_Hab , Description_Hab)
VALUES ( "Foret amazonienne" , "La forêt amazonienne est la plus grande forêt tropicale du monde et est considérée comme le poumon de la Terre en raison de son énorme biodiversité et de ses plantes et animaux rares. ");

/*filter animales with type of food*/
SELECT Type_food, COUNT(*) AS NumAnimals
FROM Animal
GROUP BY Type_food;

