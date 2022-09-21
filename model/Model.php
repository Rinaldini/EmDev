<?php

	/**
	 * 
	 */
	class Model	{
		
		protected $db = null;

		public function setQuery() {

			$this->db = DB::connToDB();

			$temp = $this->db->prepare("USE games;");
			$temp->execute();
			$temp = $this->db->prepare("SELECT game.game, genre.genre, studio.studio FROM game, genre, studio WHERE genre.genre_id = game.genre_id AND studio.studio_id = game.studio_id;");
			$temp->execute();
			$game_details = array();
			while ($row = $temp->fetch()) {
				$game_details[] = $row;
			}
			return $game_details;
		}
	}

?>