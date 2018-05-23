<DOCTYPE HTML>
<head>
<title> Imenik </title>
<link rel="stylesheet" type="text/css" href="../css/Style.css">

</head>
<body>
<header>
<!--dobrodosli u imenik-->
<h1>Brisanje kontakta</h1>
</header>
<nav>
<!--ovde je samo navigacija, dodavanje je u artiklu-->
<a href="../index.php"><img src="../img/home.png" title="Pocetna" height="50px" id="img2"></a>
<a href="add.php"><img src="../img/add.png" title="Dodaj kontakt" height="50px" id="img1"></a><br/>

</nav>
<article align="middle" id="art">
<!--ovde se nalazi naredba bazi-->
<p>========================================</p>

<?php
require 'connect.php';
$query = "SELECT * FROM imenik";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
	?>
	<section>
				<h2><b>Ime i prezime: </b><?php echo $row['name']." ".$row['surname'];?></h2>
				<h3><b>Tel: </b><?php echo $row['tel']?> <b>e-mail: </b><?php echo $row['email']?> </h3>
				<a href="obrisiKontakt.php?id=<?php echo $row['ID']?>"><img src="../img/delete.png" height="20xp" widh="20px" alt="delete"/></a>
								
	<p>========================================</p>
	</section>
	<?php
	}
}else{echo "Nema kontakata";}

?>

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