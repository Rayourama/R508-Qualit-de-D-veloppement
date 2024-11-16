/* Ce fichier vous permet de créer la base de données*/

CREATE TABLE personne (
    mail VARCHAR(255) PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    mot_de_passe VARCHAR(255)
);

CREATE TABLE admin (
    mail VARCHAR(255),
    PRIMARY KEY (mail),
    FOREIGN KEY (mail) REFERENCES personne(mail)
);

CREATE TABLE nationalité (
    mail VARCHAR(255),
    est_national BOOLEAN,
    PRIMARY KEY (mail),
    FOREIGN KEY (mail) REFERENCES personne(mail)
);

-- Vous pouvez créer votre compte en l'ajoutant à la base comme ceci ou alors en créant un compte directement sur le site
INSERT INTO personne (mail, nom, prenom, mot_de_passe)
VALUES ('exemple@mail.com', 'Doe', 'John', 'motDePasse123');

-- Si vous avez utilisé la requête précédente, alors donnez vous la nationalité
INSERT INTO nationalité (mail, est_national)
VALUES ('exemple@mail.com', "true");

-- Si vous avez créez votre compte avec le formulaire de création, alors donnez la nationalité de cette manière
UPDATE nationalité 
SET est_national = 'true' WHERE mail = 'exemple@mail.com'

-- Donnez-vous les droits d'administrateur
INSERT INTO admin (mail)
VALUES ('exemple@mail.com');