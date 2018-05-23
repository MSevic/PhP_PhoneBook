<DOCTYPE HTML>
<head>
<title> Imenik </title>
<link rel="stylesheet" type="text/css" href="../css/Style.css">

</head>
<body>
<header>
<!--dobrodosli u imenik-->
<h1>Dodavanje novog kontakta</h1>
</header>
<nav>
<!--ovde je samo navigacija, dodavanje je u artiklu-->
<a href="../index.php"><img src="../img/home.png" title="Pocetna" height="50px" id="img2"></a>
<a href="remove.php"><img src="../img/remove.png" title="Ukloni kontakt" height="50px"></a><br/>

</nav>
<article align="middle" id="art">
<!--ovde se nalazi naredba bazi-->
<p>========================================</p>
<section>
<form action="#" method="POST">
	<label> Ime: <br/>
	<input type="text" name="name"></label><br/>
	<label> Prezime: <br/>
	<input type="text" name="surname"></label><br/>
	<label> E-mail: <br/>
	<input type="text" name="email"></label><br/>
	<label> Telefon: <br/>
	<input type="text" name="tel"></label><br/><br/>
	<input type="submit" name="insert" value="Dodaj"> <br/>
</form>
<p>========================================</p>
</section>
<section id="poruka">
	<?php
		if(isset($_POST['insert'])){
			if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['tel'])){
				if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['tel'])){
					$name = trim($_POST['name']);
					$surname = trim($_POST['surname']);
					$email = trim($_POST['email']);
					$tel = trim($_POST['tel']);
					require 'connect.php';
					$name = mysqli_real_escape_string($conn, $name);
					$surname = mysqli_real_escape_string($conn, $surname);
					$email = mysqli_real_escape_string($conn, $email);
					$tel = mysqli_real_escape_string($conn, $tel);
					
					$query = "INSERT INTO imenik (name, surname, email, tel) VALUES ('{$name}','{$surname}','{$email}','{$tel}')";
					
					if(mysqli_query($conn, $query) === TRUE){
						echo "Novi kontakt uspešno dodat";
					}else{echo "Greska";}
					
				}else{
					echo "svi parametri moraju biti popunjeni";
				}
			}else{
				echo "Svi parametri moraju biti poslati";
			}
		}
	?>
</section>
</article>
</body>