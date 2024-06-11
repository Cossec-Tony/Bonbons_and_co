
DROP TABLE IF EXISTS Stock;
DROP TABLE IF EXISTS Boutiques_liste;
DROP TABLE IF EXISTS Confiserie;
DROP TABLE IF EXISTS Adresses;
DROP TABLE IF EXISTS Utilisateurs;

CREATE TABLE Utilisateurs (
    id_utilisateur INT NOT NULL AUTO_INCREMENT,
    admin_utilisateur BOOLEAN,
    client BOOLEAN,
    gerant BOOLEAN,
    password_utilisateur VARCHAR(50),
    nom_utilisateur VARCHAR(10),
    PRIMARY KEY (id_utilisateur)
);

CREATE TABLE Adresses (
    adresse_boutique VARCHAR(50) NOT NULL,
    PRIMARY KEY (adresse_boutique) 
);

CREATE TABLE Confiserie (
    id_confiseries VARCHAR(10) NOT NULL,
    nom_confiseries VARCHAR(10),
    prix_unit_confiseries FLOAT,
    PRIMARY KEY (id_confiseries)
);

CREATE TABLE Boutiques_liste (
    id_boutiques INT NOT NULL AUTO_INCREMENT,
    nom_boutique VARCHAR(20),
    adresse_boutique VARCHAR(50),
    id_utilisateur INT,
    PRIMARY KEY (id_boutiques),
    FOREIGN KEY (adresse_boutique) REFERENCES Adresses(adresse_boutique),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id_utilisateur)
);

CREATE TABLE Stock (
    id_stock INT NOT NULL AUTO_INCREMENT,
    quantite_stock FLOAT,
    id_confiseries VARCHAR(10),
    id_boutiques INT,
    PRIMARY KEY (id_stock),
    FOREIGN KEY (id_confiseries) REFERENCES Confiserie(id_confiseries),
    FOREIGN KEY (id_boutiques) REFERENCES Boutiques_liste(id_boutiques)
);
