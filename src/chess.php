<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="author" content="Seweryn P.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Szachy - wprowadzenie</title>
	<link rel="stylesheet" href="../stylesheets/style.css">
	<script src="../scripts/work-in-progress.js" defer></script>
	<script src="../scripts/mobile-navigation.js" defer></script>
</head>
<body>
	<nav class="mobile-navigation-bar">≡</nav>
	<h1 style="text-align:center;">Czym są szachy?</h1>
	<nav class="topics-pane">
		<span class="close">✖</span>
		<a class="work-in-progress" href="">Otwarcia</a>
		<a class="work-in-progress" href="">Podstawy taktyki</a>
		<a href="../index.php" href="">Strona główna</a>
	</nav>
	<main class="central-pane">
	<?php
		$filename = 'chess.php';
		require "../backend/get_post.php";
	?>
	</main>
	<?php
		require "../footer.php";
	?>	
</body>
</html>
