<?php
	
	require("db_login.php");

	try {

        $dbh = new PDO("mysql:host=$db_host", $db_user, $db_pass);

        $dbh->exec("CREATE DATABASE IF NOT EXISTS `$db_name`;
                	CREATE USER `$db_user`@`$db_host` IDENTIFIED BY '$db_pass';
                	GRANT ALL ON `$db_name`.* TO '$db_user'@'$db_host';
                	FLUSH PRIVILEGES;")
        or die(print_r($dbh->errorInfo(), true));

        $dbh->exec("USE $db_name;
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
					CREATE TABLE game_to_studio(game_d INT, studio_id INT);")
        or die(print_r($dbh->errorInfo(), true));

    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }

    try {
    	$games = ["Pac-Man", "Lode Runner", "Mario", "Syberia", "Counter-Strike"];
        $studios = ["Namco", "Broderbund&Ariolasoft", "Nintendo", "Microids", "Valve Corporation"];
        $genres = ["arcade", "platformer", "quest", "FPS", "RTS"];

        $dbh->exec("USE $db_name;");

        foreach ($games as $game) {
        	$dbh->exec("INSERT INTO game(game) VALUES('$game');");
        }

        foreach ($studios as $studio) {
        	$dbh->exec("INSERT INTO studio(studio) VALUES('$studio');");
        }

        foreach ($genres as $genre) {
        	$dbh->exec("INSERT INTO genre(genre) VALUES('$genre');");
        }


    } catch (PDOException $e) {
    	die("DB ERROR: " . $e->getMessage());
    }

?>