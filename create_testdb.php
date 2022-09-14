<?php
	
	require("db_login.php");

	// Блок создаёт вновь тестовую БД и таблицы
	try {

        $dbh = new PDO("mysql:host=$db_host", $db_user, $db_pass);

        $dbh->exec("DROP DATABASE IF EXISTS `$db_name`;
        			CREATE DATABASE `$db_name`;
                	CREATE USER `$db_user`@`$db_host` IDENTIFIED BY '$db_pass';
                	GRANT ALL ON `$db_name`.* TO '$db_user'@'$db_host';
                	FLUSH PRIVILEGES;");
        //or die(print_r($dbh->errorInfo(), true));

        $dbh->exec("USE $db_name;
        			CREATE TABLE studio(studio_id INT NOT NULL AUTO_INCREMENT,
										studio VARCHAR(150),
										PRIMARY KEY(studio_id));
					CREATE TABLE genre(genre_id INT NOT NULL AUTO_INCREMENT,
									   genre VARCHAR(150),
									   PRIMARY KEY(genre_id));
                	CREATE TABLE game(game_id INT NOT NULL AUTO_INCREMENT,
					  				  game VARCHAR(150),
					  				  studio_id INT REFERENCES studio(studio_id),
					  				  genre_id INT REFERENCES genre(genre_id),
					  				  PRIMARY KEY(game_id));");
		//or die(print_r($dbh->errorInfo(), true));

    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }

    // Блок заполняет таблицы начальными данными
    try {
    	$games = ["Pac-Man", "Lode Runner", "Mario", "Syberia", "Counter-Strike"];
        $studios = ["Namco", "Broderbund&Ariolasoft", "Nintendo", "Microids", "Valve Corporation"];
        $genres = ["arcade", "platformer", "quest", "FPS", "RTS"];
        $genres_id = [1, 2, 2, 3, 5];
        $studios_id = [1, 3, 2, 4, 5];

        $dbh->exec("USE $db_name;");

        foreach ($studios as $studio) {
        	echo "$studio <br>";
        	$dbh->exec("INSERT INTO studio(studio) VALUES('$studio');");
        }

        foreach ($genres as $genre) {
        	echo "$genre <br>";
        	$dbh->exec("INSERT INTO genre(genre) VALUES('$genre');");
        }

        for ($i=0; $i < sizeof($games); $i++) { 
        	$dbh->exec("INSERT INTO game(game, studio_id, genre_id) VALUES('$games[$i]', $studios_id[$i], $genres_id[$i]);");
        }

    } catch (PDOException $e) {
    	die("DB ERROR: " . $e->getMessage());
    }

?>