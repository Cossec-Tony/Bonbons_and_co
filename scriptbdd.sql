
DROP TABLE IF EXISTS Stock;
DROP TABLE IF EXISTS Boutiques_liste;
DROP TABLE IF EXISTS Confiserie;
DROP TABLE IF EXISTS Adresses;
DROP TABLE IF EXISTS Utilisateurs;

CREATE TABLE Utilisateurs (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    admin_utilisateur BOOLEAN,
    client BOOLEAN,
    gerant BOOLEAN,
    password_utilisateur VARCHAR(50),
    nom_utilisateur VARCHAR(10)
);

CREATE TABLE Adresses (
    adresse_boutique VARCHAR(50) PRIMARY KEY
);

CREATE TABLE Confiserie (
    id_confiseries VARCHAR(10) PRIMARY KEY,
    nom_confiseries VARCHAR(10),
    prix_unit_confiseries FLOAT
);

CREATE TABLE Boutiques_liste (
    id_boutiques INT AUTO_INCREMENT PRIMARY KEY,
    nom_boutique VARCHAR(20),
    adresse_boutique VARCHAR(50),
    id_utilisateur INT,
    FOREIGN KEY (adresse_boutique) REFERENCES Adresses(adresse_boutique),
    FOREIGN KEY (id_utilisateur) REFERENCES Utilisateurs(id_utilisateur)
);

CREATE TABLE Stock (
    id_stock INT AUTO_INCREMENT PRIMARY KEY,
    quantite_stock FLOAT,
    id_confiseries VARCHAR(10),
    id_boutiques INT,
    FOREIGN KEY (id_confiseries) REFERENCES Confiserie(id_confiseries),
    FOREIGN KEY (id_boutiques) REFERENCES Boutiques_liste(id_boutiques)
);
