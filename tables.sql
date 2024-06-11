-- Table utilisateurs
INSERT INTO utilisateurs(id, username, password, email, role, prenom, nom, ddn) VALUES
(1, 'alice22', md5('1234'), 'alice22@example.com', 'admin', 'Alice', 'Dumoulin', '1982-11-26'),
(2, 'chalie', md5('1234'), 'chalie@example.com', 'gerant', 'Charlie', 'Elachocoleterie', '1977-01-12'),
(3, 'bobdu35', md5('1234'), 'bobdu35@example.com', 'client', 'Robert', 'Kinsey', '1982-10-12'),
(4, 'tywin', md5('1234'), 'tywin@example.com', 'client', 'Charles', 'Dance', '1946-10-10');

-- Table boutiques
INSERT INTO boutiques(id, nom, utilisateur_id, numero_rue, nom_adresse, code_postal, ville, pays) VALUES
(1, 'La mika-line', 1, '10', 'Rue des Bonbons', '75001', 'Paris', 'France'),
(2, 'OK Bonbons', 2, '20', 'Avenue des Friandises', '69001', 'Lyon', 'France'),
(3, 'Saccharo', 3, '30', 'Boulevard des Saveurs', '13001', 'Marseille', 'France');

-- Table confiseries
INSERT INTO confiseries(id, nom, type, prix, illustration, description) VALUES
(1, 'Tagada', 'Acide', 1.99, '', 'Bonbon acide Haribo délicieux'),
(2, 'Car en Sac', 'Douceur', 2.49, '', 'Caramel fondant au beurre salé Haribo'),
(3, 'Chamallows', 'Chocolat', 3.99, '', 'Chamallows tendres et moelleux Haribo'),
(4, 'Dragibus', 'Fête', 4.99, '', 'Bonbons Dragibus colorés et fruités Haribo'),
(5, 'Krema', 'Classique', 1.50, '', 'Bonbons tendres et fruités Haribo'),
(6, 'Pik', 'Douceur', 2.99, '', 'Bonbons acidulés Pik Haribo'),
(7, 'Ours d\'Or'', 'Fruité', 1.75, '', 'Bonbons gélifiés en forme de ours Haribo'),
(8, 'Schtroumpfs', 'Classique', 1.89, '', 'Bonbons gélifiés en forme de Schtroumpfs Haribo'),
(9, 'Rotella', 'Gourmandise', 5.49, '', 'Bonbons en forme de rouleau Haribo'),
(10, 'Dragibus Bi-Cool', 'Frais', 1.20, '', 'Bonbons Dragibus bi-goût Haribo'),
(11, 'Happy Cola', 'Acide', 2.30, '', 'Bonbons en forme de bouteille de cola Haribo'),
(12, 'caca', 'Douceur', 3.50, '', 'Bonbons en forme de banane Haribo'),
(13, 'Fraise Tagada', 'Chocolat', 2.99, '', 'Bonbons en forme de fraise Haribo'),
(14, 'Crocodiles', 'Fête', 3.00, '', 'Bonbons gélifiés en forme de crocodile Haribo'),
(15, 'Surf Pik', 'Classique', 2.00, '', 'Bonbons acidulés en forme de planche de surf Haribo'),
(16, 'Gummy Bears', 'Fruité', 4.00, '', 'Bonbons gélifiés en forme de ours Haribo'),
(17, 'Happy Cherries', 'Gourmandise', 3.20, '', 'Bonbons en forme de cerise Haribo'),
(18, 'Rainbow Fizz', 'Classique', 2.50, '', 'Bonbons acidulés en forme de ruban Haribo'),
(19, 'Goldbären', 'Douceur', 1.99, '', 'Bonbons gélifiés en forme de ours Haribo'),
(20, 'Mi-Cho-Ko', 'Chocolat', 4.49, '', 'Bonbons enrobés de chocolat Haribo'),
(21, 'Dragibus Soft', 'Frais', 1.80, '', 'Bonbons Dragibus tendres Haribo'),
(22, 'Chamallows Choco', 'Gourmandise', 3.75, '', 'Chamallows enrobés de chocolat Haribo'),
(23, 'Smurfs', 'Frais', 1.50, '', 'Bonbons en forme de Schtroumpfs Haribo'),
(24, 'Happy Peaches', 'Fruité', 2.20, '', 'Bonbons en forme de pêche Haribo'),
(25, 'Régalade', 'Classique', 1.60, '', 'Bonbons gélifiés aux fruits Haribo'),
(26, 'Tagada Purple', 'Chocolat', 3.80, '', 'Bonbons en forme de fraise Haribo'),
(27, 'Vampire Fangs', 'Fruité', 1.99, '', 'Bonbons en forme de dents de vampire Haribo'),
(28, 'Mini Rainbow Frogs', 'Classique', 1.70, '', 'Bonbons gélifiés en forme de grenouille Haribo'),
(29, 'Twin Snakes', 'Douceur', 2.10, '', 'Bonbons en forme de serpents Haribo'),
(30, 'Funny Mix', 'Chocolat', 5.00, '', 'Mélange de bonbons Haribo'),
(31, 'Sour Sghetti', 'Classique', 1.75, '', 'Bonbons en forme de spaghettis acidulés Haribo'),
(32, 'Watermelon Slices', 'Fête', 3.99, '', 'Bonbons en forme de tranche de pastèque Haribo'),
(33, 'Starfish', 'Douceur', 3.25, '', 'Bonbons en forme de étoile de mer Haribo'),
(34, 'Tangfastics', 'Fruité', 2.50, '', 'Mélange de bonbons acidulés Haribo'),
(35, 'Happy Grapes', 'Fruité', 1.90, '', 'Bonbons en forme de grappe de raisin Haribo'),
(36, 'Bananas', 'Douceur', 2.75, '', 'Bonbons en forme de banane Haribo'),
(37, 'Happy Cherries', 'Chocolat', 4.00, '', 'Bonbons en forme de cerise Haribo'),
(38, 'Little Cupcakes', 'Frais', 1.50, '', 'Bonbons en forme de cupcake Haribo'),
(39, 'Fruitilicious', 'Classique', 2.30, '', 'Bonbons gélifiés aux fruits Haribo'),
(40, 'Smurfs XXL', 'Douceur', 2.99, '', 'Bonbons en forme de Schtroumpfs Haribo'),
(41, 'Maoam Bloxx', 'Fête', 2.80, '', 'Bonbons fruités Haribo'),
(42, 'Maoam Pinballs', 'Chocolat', 3.75, '', 'Bonbons en forme de boule Haribo'),
(43, 'Maoam Sour Bloxx', 'Classique', 1.99, '', 'Bonbons acidulés Haribo'),
(44, 'Maoam Stripes', 'Fête', 4.50, '', 'Bonbons en forme de bande Haribo'),
(45, 'Maoam JoyStixx', 'Douceur', 3.50, '', 'Bonbons en forme de bâton Haribo'),
(46, 'Maoam Happy Fruttis', 'Frais', 1.70, '', 'Bonbons fruités Haribo'),
(47, 'Maoam Fruitmania', 'Douceur', 2.20, '', 'Bonbons aux fruits Haribo'),
(48, 'Maoam Rocks', 'Classique', 2.00, '', 'Bonbons fruités et croquants Haribo'),
(49, 'Maoam Sour Sticks', 'Chocolat', 4.20, '', 'Bonbons acidulés en forme de bâton Haribo'),
(50, 'Maoam Giants', 'Classique', 1.50, '', 'Bonbons géants Haribo');

-- Table stocks
INSERT INTO stocks(quantite, date_de_modification, boutique_id, confiserie_id) VALUES
(24, NOW(), 1, 1),
(54, NOW(), 1, 4),
(17, NOW(), 2, 6),
(120, NOW(), 2, 7),
(8, NOW(), 2, 10);
