<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div></div>
		<div class=""></div>
		<br/><br/>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 m-auto mt-10">
					<?php echo $_SESSION["user"] ?>
					<br/><br/>
					<form action="create_db.php" method="post">
						<input type="submit" value="Új DB">
					</form>
					<br/><br/>
					<form action="init_create_table.php" method="post">
						Tábla: <input type="text" name="task"><br>
						<input type="submit" value="Init DB">
					</form>
					<br/><br/>
					<form action="create_table2.php" method="post">
						Projekt: <input type="text" name="project"><br>
						<input type="submit" value="Új projekt">
					</form>
					<br/><br/>
					<form action="insert_into_db.php" method="post">
						<input type="text" placehorder="Vezeték név" name="firstname"><br>
						<input type="text" placehorder="Keresztnév név" name="lastname"><br>
						<input type="text" placehorder="Felhasználó név" name="username"><br>
						<input type="text" placehorder="Jelszó" name="password"><br>
						<input type="text" placehorder="Email cím" name="email"><br>
						<input type="text" placehorder="Telefonszám" name="phone"><br>
						<input type="text" placehorder="Típus" name="type"><br>
						<input type="text" placehorder="Munkakör" name="title"><br>
						<input type="submit" value="Új felhasználó">
					</form>
					<br/><br/>
					<form action="select.php" method="post">
						<input type="submit" value="Lekérdezés">
					</form>
					<br/><br/>
					<a href="logout.php">Kilépés</a>
				</div>
			</div>
		</div>
	</body>




	<script>

	</script>


</html>
