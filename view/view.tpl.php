<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<th>Game</th>
			<th>Studio</th>
			<th>Genre</th>
		</tr>
		<tr>
			<?php
				foreach ($data as $row) {
					echo '<tr class="row">';
					echo '<td>' . $row['game'] . '</td>';
					echo '<td>' . $row['studio'] . '</td>';
					echo '<td>' . $row['genre'] . '</td>';
					echo '</tr>';
				}
			?>
		</tr>
	</table>
</body>
</html>