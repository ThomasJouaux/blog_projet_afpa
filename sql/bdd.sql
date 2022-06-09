DROP DATABASE IF EXISTS projet_blog;

CREATE DATABASE projet_blog;

USE projet_blog;
 
CREATE TABLE articles (
 article_id  INT PRIMARY KEY AUTO_INCREMENT,
 title_art VARCHAR(255),
 date_art DATETIME,
 article TEXT
);
 

CREATE TABLE utilisateurs (
 users_id INT PRIMARY KEY AUTO_INCREMENT ,
 pseudo VARCHAR(255),
 adresse_mail VARCHAR(255),
 mot_de_passe VARCHAR(60),
 date_naissance DATETIME,
 article_id INT NULL,
 FOREIGN KEY (article_id) REFERENCES articles(article_id)

 );
 
