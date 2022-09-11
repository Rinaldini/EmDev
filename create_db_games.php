CREATE DATABASE games;
USE games;
CREATE TABLE game(game_id INT NOT NULL AUTO_INCREMENT,
				  game VARCHAR(150),
				  PRIMARY KEY(game_id));
CREATE TABLE studio(studio_id INT NOT NULL AUTO_INCREMENT,
				  studio VARCHAR(150),
				  PRIMARY KEY(studio_id));
CREATE TABLE genre(genre_id INT NOT NULL AUTO_INCREMENT,
				  genre VARCHAR(150),
				  PRIMARY KEY(genre_id));
CREATE TABLE game_to_genres(game_d INT, genre_id INT);
CREATE TABLE game_to_studio(game_d INT, studio_id INT);