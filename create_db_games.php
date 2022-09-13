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

        $dbh->exec("USE $db_name; INSERT INTO game(game) VALUES('Pac-Man')");
        $dbh->exec("USE $db_name; INSERT INTO game(game) VALUES('Lode Runner')");
        $dbh->exec("USE $db_name; INSERT INTO game(game) VALUES('Mario')");

    }
    catch (PDOException $e) {
        die("DB ERROR: " . $e->getMessage());
    }




	
?>