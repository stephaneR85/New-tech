-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db614802715.db.1and1.com
-- Généré le :  Mar 23 Février 2016 à 16:59
-- Version du serveur :  5.5.46-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db614802715`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Téléphone'),
(2, 'Tablette'),
(3, 'Ordinateur'),
(4, 'Péripherique'),
(5, 'Montre'),
(6, 'Appareil photo');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `fk_id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_utilisateur`, `date`, `prix`) VALUES
(6, 14, '2016-01-22', '1076.95'),
(7, 14, '2016-01-22', '1139.98'),
(18, 14, '2016-02-01', '1076.95'),
(21, 14, '2010-02-04', '419.99'),
(22, 14, '2015-12-22', '1044.99'),
(23, 14, '2015-11-22', '1076.95'),
(24, 14, '2015-10-22', '849.99'),
(25, 14, '2016-02-05', '2272.95'),
(26, 14, '2014-03-15', '553.99'),
(27, 14, '2015-07-15', '1076.95'),
(28, 14, '2015-12-16', '999.97'),
(29, 14, '2015-06-18', '209.01'),
(30, 14, '2015-10-01', '758.00'),
(31, 14, '2016-02-16', '706.98'),
(32, 14, '2015-09-11', '1349.25'),
(33, 14, '2015-04-02', '91.87'),
(34, 14, '2016-02-17', '89.99'),
(38, 14, '2016-02-17', '159.99'),
(39, 14, '2016-02-17', '459.00'),
(40, 14, '2016-02-17', '449.99'),
(41, 14, '2016-02-22', '972.99');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `prix_total` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id_ligne_commande`),
  KEY `fk_id_produit` (`id_produit`),
  KEY `fk_id_commande` (`id_commande`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_ligne_commande`, `id_produit`, `quantite`, `id_commande`, `prix`, `prix_total`) VALUES
(5, 9, 1, 6, '1076.95', '1076.95'),
(6, 3, 2, 7, '569.99', '1139.98'),
(17, 9, 1, 18, '1076.95', '1076.95'),
(18, 2, 1, 21, '419.99', '419.99'),
(19, 10, 1, 22, '1044.99', '1044.99'),
(20, 9, 1, 23, '1076.95', '1076.95'),
(21, 8, 1, 24, '849.99', '849.99'),
(22, 1, 2, 25, '598.00', '1196.00'),
(23, 9, 1, 25, '1076.95', '1076.95'),
(24, 12, 1, 26, '254.99', '254.99'),
(25, 30, 1, 26, '299.00', '299.00'),
(26, 9, 1, 27, '1076.95', '1076.95'),
(27, 21, 1, 28, '159.99', '159.99'),
(28, 2, 2, 28, '419.99', '839.98'),
(29, 29, 1, 29, '209.01', '209.01'),
(30, 38, 1, 30, '459.00', '459.00'),
(31, 30, 1, 30, '299.00', '299.00'),
(32, 22, 2, 31, '168.99', '337.98'),
(33, 29, 1, 31, '209.01', '209.01'),
(34, 21, 1, 31, '159.99', '159.99'),
(35, 26, 1, 32, '1349.25', '1349.25'),
(36, 32, 1, 33, '36.88', '36.88'),
(37, 13, 1, 33, '54.99', '54.99'),
(38, 41, 1, 34, '89.99', '89.99'),
(39, 41, 1, 34, '89.99', '89.99'),
(40, 41, 1, 34, '89.99', '89.99'),
(41, 41, 1, 34, '89.99', '89.99'),
(42, 21, 1, 38, '159.99', '159.99'),
(43, 38, 1, 39, '459.00', '459.00'),
(44, 16, 1, 40, '449.99', '449.99'),
(45, 38, 2, 41, '459.00', '918.00'),
(46, 13, 1, 41, '54.99', '54.99');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `prix` decimal(6,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(45) NOT NULL,
  `date_ajout` date DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `fk_id_categorie` (`id_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `description`, `id_categorie`, `prix`, `stock`, `image`, `date_ajout`) VALUES
(1, 'APPLE iPhone 6 16 Go Or                   ', 'Ecran 4.7 pouces Retina HD - Résolution : 1334x750 - 6.9mm - Puce A8 avec coprocesseur de mouvement M8 - Architecture 64 bits - iOS 8 et iCloud - 4G LTE- Wi-Fi - Appareil photo iSight 8 mégapixels avec Focus Pixels- flash True Tone - Enregistrement vidéo HD 1080p à 60 i/s et ralenti à 240 i/s - Caméra FaceTime HD - Capteur d''identité par empreinte digitale Touch ID', 1, '598.00', 11, '../Images/apple-iphone6.jpg', '2016-01-02'),
(2, 'Asus PC portable X751MA-TY174T', 'Ordinateur portable avec écran 17,3 pouces - Processeur Intel Pentium N3540 - Mémoire 4Go - Stockage 1000Go - Intel HD graphics - Webcam - Graveur DVD - Lecteur de cartes SD - Clavier AZERTY avec pavé numérique - Windows 10 - Garantie 1 an', 3, '419.99', 0, '../Images/PC-asus.jpg', '2016-01-05'),
(3, 'Samsung Galaxy S6 Edge 32 Go Blanc', 'Ecran 5.1 pouces Super Amoled Quad HD - Android Lollipop 5.0 - Processeur Octo Core 2.1Ghz - 4G+ - ROM : 32Go RAM : 3Go - Appareil Photo 16Mp - Batterie 2600mAh - Bluetooth 4.1 - NFC - Charge Induction - Lecteur d''empreinte digitale - DAS Tete : 0.334 W/Kg  Corps : 0.594 W/Kg', 1, '569.99', 40, '../Images/samsung-galaxy-s6-edge.jpg', '2015-12-02'),
(8, 'Apple iPad Pro Wi-Fi 32Go Gris Sidéral', 'Apple iPad Pro avec écran Retina 12,9" (2732x2048px) Wifi - Gris Sidéral - Processeur Apple A9X - Stockage 32 Go - 5,6 millions pixels - Appareil photo iSight 8 Mpx - Caméra FaceTime HD - Capteur d?identité par empreinte digitale Touch ID - 4 hauts-parleurs - Autonomie jusqu?à 10h - iOS 9 - Garantie 1 an', 2, '849.99', 44, '../Images/apple-ipad-pro.jpg', '2015-11-06'),
(9, 'Apple Watch Sport Boitier aluminium SPACE GRAY', 'Avec l''Apple Watch vous avez l''heure, vous restez connecté à votre réseau et vous bénéficiez d''un coach sportif Cadran analogique ou digital, modulaire ou utilitaire ? Personnalisez le...', 5, '1076.95', 11, '../Images/apple-watch-sport.jpg', '2016-01-17'),
(10, 'Surface Pro 4 i5/4GB/128GB', 'Surface Pro 4 avec écran 12,3 pouces - Processeur Intel Core i5 6e génération - Stockage 128 Go - 4 Go de RAM - 2736 x 1824 pixels - USB 3.0 standard - Caméra avant 5 MPx / arrière 8,0 MPx - jusqu''à 9h de lecture vidéo - stylet Surface inclus - Mini DisplayPort - lecteur de cartes microSD - port clavier Cover - prise casque - Surface Connect - Windows 10 Professionnel', 3, '1044.99', 11, '../Images/surface-pro-4.jpg', '0000-00-00'),
(11, 'Imprimante EPSON XP-235 Expression Home', 'Imprimante multifonction ultra compact jet d''encre 3 en 1 Wifi - Impression, Numérisation, Copie - Résolution de l’impression 5760x1440 dpi - Vitesse d’impression jusqu''à 26 Pages/min - Wifi - USB - Format jusqu''à A4 - Capacité du bac de papier 50 Feuilles Standard, 10 Feuilles photo - Recto Verso manuel - Compatible Mac et Windows - Impression mobile possible - Garantie 1 an', 4, '51.99', 22, '../Images/imprimante-epson-xp.jpg', '2016-01-20'),
(12, 'MAD CATZ PC GAMING Clavier S.T.R.I.K.E 7', 'Clavier mécanique de jeu modulable - Technologie Cherry - Rétro éclairage - Type AZERTY - 5 parties (Partie centrale, Extension boutons programmables, Pavé numérique, Repose-paume, Ecran LCD tactile V.E.N.O.M) - Compatible Windows (XP, Vista, 7).', 4, '254.99', 15, 'Images/mad-catz-pc-gaming-clavier.jpg', '2016-01-20'),
(13, 'Philips enceintes multimédias 2.1 SPA5300', 'Enceintes multimédias 2.1 idéales pour PC, TV - Puissance de sortie 50W RMS 2 x 10W + 30W - Puissance musicale 100W - 2 enceintes satellites - 1 caisson de basses - Connexion prise jack 3.5mm - Amplification dynamique ds basses avec contrôle du niveau - Enceintes ouvertes en façade pour un son cristallin ', 4, '54.99', 44, 'Images/philips-enceintes.jpg', '2016-02-05'),
(14, 'Samsung Galaxy A3 Noir', ' Samsung Galaxy A3 - Ecran 4.5'''' Super AMOLED qHD - Android KitKat 4.4.4 - Processeur Quad Core 1.2 GHz - Compatible 4G - Batterie : Li-ion 1900 mAh - Stockage : 16Go - Extension jusqu''à 64Go - Connectivité : WiFi, Bluetooth 4.0, USB 2.0 - Appareil photo 8MP - Vidéo : Full HD 1920*1080p', 1, '192.00', 22, 'Images/galaxy-a3.jpg', '2016-02-11'),
(15, 'HP ENVY Phoenix PC Gamer 860-002nf', 'Système d''exploitation      Windows 10 Famille 64      Mémoire, standard      8 Go de mémoire DDR4 2 x 4 Go      Description du disque dur      SATA SSD 128 Go      Disque dur 2     SATA 1 To, 7200 tr/min      Famille de processeurs      Processeur Intel® Core™ i5      Processeurs      Processeur Intel® Core™ i5-6400 avec carte graphique Intel® HD 530 2,7 GHz jusqu''à 3,3 GHz, 6 Mo de mémoire cache, 4 cœurs    Poids      10,52 kg      Ecran      Moniteurs à cristaux liquides vendus séparément. Po', 3, '1198.96', 15, 'Images/hp-phoenix.jpg', '2016-02-11'),
(16, 'Toshiba Satellite PC Portable Blanc', 'PC Portable Blanc avec écran 15.6’’ HD (1366x768px) Brillant - Processeur Intel Core i5-5200U - Mémoire 4Go - Stockage 750Go - Intel® HD Graphics - WiFi - Bluetooth - HDMI - Réseau 10/100 - 1xUSB 3.0 + 2xUSB 2.0 - Webcam HD (0.9MP) - DVD-Super-Multi - Windows 10 - Garantie 2 ans', 3, '449.99', 14, 'Images/toshiba-satellite.jpg', '2016-02-11'),
(17, 'Motorola nexus 6', 'Ecran 6" Quad HD - 4G LTE Cat 4 - Processeur Quad Core 2.7Ghz - Android™ 5.0 Lollipop - Appareil Photo / 13MP - ROM : 64Go / RAM : 3Go - Batterie : 3220mAh - Bluetooth 4.0 - NFC - Nano Sim - DAS : 0.93W/Kg - Couleur : Blanc', 1, '924.98', 25, 'Images/nexus-6.jpg', '2016-02-14'),
(19, 'Huawei P8 Lite Noir', 'Ecran 5" HD - 4G - Android 5.0 Lollipop + EMUI 3.1 - Processeur Octo-Core 1.2Ghz - ROM : 16 Go / RAM : 2 Go - Extensible par Micro SD jusqu''à 128 Go - Photo : 13Mp + Flash / Frontal : 5M - Bluetooth 4.0- NFC - Wifi - Batterie : 2200mAh - DAS : 0.331W/kg - Garantie Constructeur : 2 Ans', 1, '200.79', 9, 'Images/huawei-p8.jpg', '2016-02-14'),
(20, 'Sony Xperia Z5 Noir', 'Ecran 5.2" Full HD - 4G - Android Lollipop - Processeur Octa Core 4x2 + 4x1.5 Ghz - Appareil Photo 23 Mp autofocus / Frontal : 5Mp - Vidéo 4K - ROM : 32 Go / RAM : 3 Go - Extensible par Micro SD jusqu''à 200 Go - Nano SIM - Wi-Fi - NFC - Résistant à l''eau et à la poussière - IP65/68 - Lecteur d''empreintes digitales - DAS : 0.751W/kg - Garantie Constructeur : 2 Ans', 1, '508.89', 14, 'Images/sony-xperia-z5-noir.jpg', '2016-02-14'),
(21, 'Lenovo IdeaTab A10', 'La tablette A10 constitue une station multimédia abordable: son écran à grand angle de visualisation délivrant une image très lumineuse en HD et ses haut-parleurs avec améliorations Dolby Digital Plus situés en façade donnent vie à votre musique, vos vidéos et vos jeux Android. Son processeur quadruple cœur et son autonomie prolongée vous permettent d''en faire plus pendant plus longtemps.', 2, '159.99', 17, 'Images/lenovo-ideatab-a10.jpg', '2016-02-14'),
(22, 'Asus ZenPad Z300C', 'Tablette tactile métal aurora Z300C-1L050A avec écran 10.1 IPS - Processeur Intel Sofia T C3200 Quad Core - Mémoire 2Go - Stockage 16Go - Lecteur de cartes micro SD - Webcam avant 0,3Mpixels, arrière 2Mpixels - WiFi - Bluetooth 4.0 - Double Haut-parleurs en face avant - Android 5.0 Lollipop - Garantie 1 an', 2, '168.99', 13, 'Images/asus-zenpad-z300.jpg', '2016-02-14'),
(23, 'Samsung Galaxy View ', 'Samsung Galaxy View Noire avec écran 18,4" Full HD (1080 x 1920) - Processeur Octo Core 1,6 Ghz (64 bits) - Mémoire 2 Go - Stockage 32 Go - WiFi - Bluetooth - USB 2.0 - Caméra frontale 2,1 MP - Batterie 5700mAh - Android™ Lollipop 5.1', 2, '699.99', 14, 'Images/samsung-galaxy-view.jpg', '2016-02-14'),
(24, 'Microsoft Surface RT ', 'Ecran capacitif tactile HD 10,6" Mémoire interne 32 Go Processeur Quad-Core NVIDIA Tegra 3 Système Windows RT', 2, '159.99', 17, 'Images/microsoft-surface.jpg', '2016-02-14'),
(25, 'ARCHOS Tablette 121 NEON', 'Tablette tactile Archos avec écran 12.1" HD 1600x900 - Processeur Quad Core 1.3GHz – A7 - Mémoire 1 Go - Stockage 16 Go - Wifi - Bluetooth - GPS - Port Micro USB - Port Micro SD - Port Mini HDMI - Caméras avant et arrière : VGA/2MP - Batterie 6000 mAH - Google Play - Android 5.1 Lollipop - Garantie 1 an', 2, '131.95', 12, 'Images/Archos 121 neon.jpg', '2016-02-14'),
(26, 'Apple iMac ME087F/A', 'Ordinateur tout en en avec écran 21,5" LED - Processeur Intel Core i5 quadricœur à 2,9 GHz - Mémoire 8192Mo - Stockage 1000Go - NVIDIA GeForce GT 750M 1Go dédié - Lecteur de cartes SD - Thunderbolt - WiFi 802.11 b/g/n - Bluetooth 4.0 - Mac OS X Mountain Lion - Garantie 1 an', 3, '1349.25', 19, 'Images/apple-imac.jpg', '2016-02-14'),
(27, 'Nokia 3310', 'Marque	NOKIA Nom du produit	Nokia 3310 Catégorie	Téléphone portable Général Type de produit	Téléphone mobile Facteur de forme	Monobloc Profondeur	22 mm Largeur	48 mm Hauteur	113 mm Poids	133 g Antenne	Interne Facteur de Forme	Monobloc Téléphone mobile Technologie	GSM Bande	EGSM 900 - GSM 1800 (bi-bande) Fournisseur de services	Non spécifié Jeux intégrés	Snake II, Pairs II, Space Impact, Bantumi Nombre de jeux intégrés	4 Affichage Résolution écran	84 x 48 pixels Caractéristiques	Economiseur d''écr', 1, '34.99', 5, 'Images/nokia-3310.jpg', '2016-02-15'),
(28, 'SAMSUNG GALAXY Montre Connectée Gear Fit', 'Bracelet Connecté - Processeur : 168Mhz - Ecran 1.84'''' capacitif Super AMOLED Incurvé - Résolution : 128x432 - Batterie : Li-ion 210 mAh - Interface : Gear Fit Manager - Connectivité : Bluetooth 4.0/USB - Messagerie/Appels/E-mails - Applications Health - Poids : 127g - Couleur : noir - Bracelets interchangeables - ', 5, '165.08', 23, 'Images/samsung-galaxy-montre.jpg', '2016-02-15'),
(29, 'Smartwatch Pebble Time Steel', 'La Pebble Time Steel est une montre connectée dernière génération. Compatible iPhone et Android 4.0 et supérieur. Dotée d''un écran rétroéclairé e-paper, elle vous suivra au quotidien en vous permettant de recevoir vos notifications, appels, sms etc. De plus, elle assurera le suivi de votre activité physique et de votre sommeil. Autonomie: jusquà 10 jours - Garantie: 1 an - Couleur: Or et rouge', 5, '209.01', 12, 'Images/smartwatch.jpg', '2016-02-15'),
(30, 'Smartwatch Motorola Moto 360', 'Compatible à partir d''Android 4.3 via bluetooth 4.0 - Android Wear™ - Écran 46mm : 1.56" LCD rétroéclairé Verre Corning® Gorilla® Glass 3 - Recharge sans fil grâce à la station de recharge incluse : 300 mAh - Processeur Qualcomm MSM8026 - Snapdragon™ 400 - Mémoire interne de 4 Go + 512 Mo de RAM - Podomètre - Capteur de fréquence cardiaque - Accéléromètre - capteur de luminosité - IP67 - Garantie 2 ans', 5, '299.00', 5, 'Images/motorola-moto.jpg', '2016-02-15'),
(31, 'HP OfficeJet Pro X451dw', ' Vitesse d''impression noire (ISO, comparable au laser)  Jusqu''à 36 ppm Vitesse d''impression noire (brouillon, A4)  Jusqu''à 55 ppm Vitesse d''impression couleur (ISO, comparable au laser)  Jusqu''à 36 ppm Vitesse d''impression couleur (brouillon, A4)  Jusqu''à 55 ppm Délai d''impression de la première page noire (A4, prêt)  Vitesse : 9,5 s Délai d''impression de la première page couleur (A4, prêt)  Vitesse : 9,5 s Volume de pages mensuel recommandé  500 à 4 200 Notice relative au volume de pages mensue', 4, '198.20', 18, 'Images/hp-officejet-pro-x451dw.jpg', '2016-02-15'),
(32, 'Logitech souris sans fil laser', 'Souris laser sans fil - Connection RF 2.54 GHz avec dongle USB Unifying* - Résolution 1000 dpi - 7 boutons dont molette de défilement multidirectionnelle - Alimentation : 2 piles AA - Longévité des piles accrue - Conception pour droitiers - Défilement ultra rapide - Compatible PC (Windows Xp / Vista / 7 / 8 / Windows 10) et Mac - Garantie 3 ans', 4, '36.88', 41, 'Images/logitech-souris.jpg', '2016-02-15'),
(33, 'Canon EOS M2 Noir avec 18-55mm et 22mm', '3.0 "-Dot 1,040k écran tactile LCD Monitor Full HD enregistrement vidéo 1080p à 30 ips Hybrid CMOS système Autofocus Speedlite 90EX Canon Flash externe EF-M 18-55 mm f / 3,5-5,6 IS STM EF-M 22mm f / 2.0 STM Mount ', 6, '479.00', 15, 'Images/canon-eos-m2.jpg', '2016-02-15'),
(34, 'CANON POWERSHOT SX410 IS  ', 'Bridge - Capteur CCD 20 Mégapixels - Processeur DIGIC 4+ avec technologie iSAPS - Zoom optique 40x - ZoomPlus 80x - Écran TFT de 7,5 cm (3 pouces), environ 230.000 points - Vidéo HD 1280 × 720p - Batterie rechargeable lithium-ion ', 6, '159.99', 16, 'Images/canon-powershot-sx410-is-rouge.jpg', '2016-02-15'),
(35, 'SONY DSC-H300 - CCD 20 MP Zoom 35x ', 'Le Cyber-shot H300, avec zoom optique 35x, vous rapproche de votre sujet. Capteur 20,1 mégapixels, vidéo HD et fonctions créatives ; vos photos et films en toute facilité. Le boîtier de style reflex numérique est idéal dans chaque situation.Effectuez un gros plan en toute confiance grâce au Cyber-shot H300. Le zoom optique 35x vous permet de photographier de près sans flou et d''effectuer un zoom arrière pour des clichés grand angle.Appuyez simplement sur le bouton d''enregistrement pour commencer', 6, '179.80', 17, 'Images/sony-dsc-h300-bridge.jpg', '2016-02-15'),
(36, 'POLAROID SOCIALMATIC blanc', 'Capturer, imprimer et partager vos photos - Système d’exploitation : Android™ - Double appareil photo (arrière et frontal) - Avant : 14 Mpixels - Arrière: 2 Mpixels - Ecran tactile 4.5" - Mémoire interne 4 Go - Hauts-parleurs stéréo - GPS, Wi-Fi, Bluetooth - 2” x 3” Zink® Imprimante instantané - Impression en moins d’une minute', 6, '319.00', 17, 'Images/polaroid-socialmatic.jpg', '2016-02-15'),
(37, 'OLYMPUS Compact étanche TG4 ', 'Dédié aux amateurs de sports nautiques ou d’hiver, le Stylus Tough TG-4 est conçu pour résister à un environnement difficile : protégé contre la poussière, antichoc (chute jusqu’à 2,1m de haut), étanche (jusqu’à 15 m de profondeur), résistant au froid (jusqu’à -10 °C) et capable de supporter une charge de 100 Kg! Il est équipé d’un capteur CMOS rétroéclairé de 1/2.3’’ avec 15,9 mégapixels, d’un zoom 4x avec une ouverture de f:2 à 4,9 et d’un écran de 7,6cm (460 000 points). Les performances du T', 6, '377.89', 18, 'Images/olympus.jpg', '2016-02-15'),
(38, 'SONY RX100 KII', 'Compact expert - Coloris: Noir - Grand capteur CMOS 20.2MP Exmor 1,0" -Zoom 3.6x (28-100 mm) - Optique Carl Zeiss lumineuse f/1.8 - 4.9 - Large écran LCD 3,0’’ lumineux 1229 kpts - Format RAW - Effets créatifs, Panoramas, recadrage portrait automatique - Garantie 1 an', 6, '459.00', 19, 'Images/sony-rx100.jpg', '2016-02-16'),
(40, 'Wacom tablette graphique Intuos Pro L', 'WACOM - Intuos Creative Pro Large - Tablette graphique 2048 niveaux de pression sur point du stylet et gomme - Reconnaissance de l''inclinaison - Multi-touch - Surface de la tablette 487x318x12mm - 8 ExpressKeys personnalisables, spécifiques à l''application - Touch Ring avec 4 fonctions personnalisables - Menu radial - Affichage Express View - Utilisation pour droitier et gaucher', 4, '374.43', 19, 'Images/wacom-tablette-graphique.jpg', '2016-02-16'),
(41, 'Brother DCP-1610W', 'Imprimante Laser Multifonction 3-en-1 monochrome - Vitesse d’impression A4 jusqu’à 20 ppm - Résolution 2400 x 600 dpi - Connexion Wi-Fi et USB Hi-Speed 2.0 - Entrée papier standard : 150 feuilles - Emulation GDI - Ecran 2 lignes 16 caractères - Garantie 1 an', 4, '89.99', 19, 'Images/brother-dcp-1610w.jpg', '2016-02-17'),
(42, 'Samsung Disque Dur M3 1To USB3.0', 'Disque dur externe 2.5" - Capacité 1To (1024Go) - Interface USB3.0 compatible USB2.0 - Auto-alimenté - Vitesse de transfert 4.8 Gbps - Anti-rayures et anti-empreintes - Finition mate aux formes arrondies - Garantie 1 an', 4, '58.48', 56, 'Images/samsung-disque-dur.jpg', '2016-02-23');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `adr` varchar(200) NOT NULL,
  `num_tel` text,
  `adr_mail` varchar(100) NOT NULL,
  `mot_de_passe` varchar(40) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `adr`, `num_tel`, `adr_mail`, `mot_de_passe`, `role`) VALUES
(14, 'Client', 'Bon', '10 rue des pommiers 51000 Chalons en Champagne', '0600000000', 'client@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'client'),
(19, 'admin', 'administrateur', '10 rue du Général De Gaulle 51000 Chalons en Champagne', '0600000000', 'admin@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43', 'admin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `fk_id_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
