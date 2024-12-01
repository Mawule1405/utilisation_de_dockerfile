-- Création de la base de données
CREATE DATABASE IF NOT EXISTS ing CHARACTER SET utf8;

-- Création de l'utilisateur
CREATE USER 'ing'@'localhost' IDENTIFIED BY 'ing';
GRANT ALL PRIVILEGES ON ing.* TO 'ing'@'localhost';

-- Utilisation de la base de données
USE ing;

-- Création de la table etudiants
CREATE TABLE IF NOT EXISTS etudiants (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    specialisation VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- Insertion des données
INSERT INTO etudiants (nom, prenom, specialisation) VALUES
('APEDO', 'Kossi Emmanuel', 'Project Manager'),
('BAWANA', 'Théodore', 'Cybersécurité'),
('DZIDZINYO', 'Komlan Maurie Yann', 'Administrateur système'),
('HELOU', 'Komlan Mawulé', 'Développeur logiciel');