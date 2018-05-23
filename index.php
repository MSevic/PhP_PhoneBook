<DOCTYPE HTML>
<head>
<title> Imenik </title>
<link rel="stylesheet" type="text/css" href="css/Style.css">

</head>
<body>
<header>
<!--dobrodosli u imenik-->
<h1>Dobrodošli u imenik</h1>
</header>
<nav>
<!--ovde se nalazi pretraga-->
<a href="php/add.php"><img src="img/add.png" title="Dodaj novi kontakt" height="50px" id="img1"></a>
<a href="php/remove.php"><img src="img/remove.png" title="Ukloni kontakt" height="50px"></a><br/>
<p>========================================</p>
<form action="#" method="GET">
	<input type="text" name="criteria" placeholder="Kriterijum...">
	<input type="submit" value="Traži">
</form>
</nav>
<article align="middle">
<!--ovde se nalaze rezultati pretrage, za svaki kontakt se pravi nova sekcija-->
<p>========================================</p>
<?php
	include 'php/getResults.php';
?>
</article>
</body>