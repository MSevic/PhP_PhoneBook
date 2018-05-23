<?php
require 'connect.php';
if(isset($_GET['criteria'])){
	if(!empty($_GET['criteria'])){
		$criteria = trim($_GET['criteria']);
		$criteria = mysqli_real_escape_string($conn, $criteria);
		$query = "SELECT * FROM imenik WHERE name LIKE '%{$criteria}%' OR surname LIKE '%{$criteria}%'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				?>
				<section>
				<h2><b>Ime i prezime: </b><?php echo $row['name']." ".$row['surname'];?></h2>
				<h3><b>Tel: </b><?php echo $row['tel']?> <b>e-mail: </b><?php echo $row['email']?> </h3>
				<p>========================================</p>
				</section>
				<?php
			}
			echo "broj rezultata: " . mysqli_num_rows($result);
		}else{ echo'Nema rezultata';}
		
		}
		else{
			echo 'Kriterijum je prazan';
		}
}

?>