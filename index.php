<?php
    session_start();
if(!isset($_SESSION['logged_in']))
    $_SESSION['logged_in'] = false;
?>
<!DOCTYPE html>
<html lang="pl">
<head>
        <meta charset="utf-8">
	<meta name="author" content="Seweryn Pajor">
	<meta name="description" content="Blog poświęcony programowaniu, informatyce i wielu innym rzeczom">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog Seweryna</title>
	<link rel="stylesheet" href="/stylesheets/style.css" type="text/css">
	<script src="https://kit.fontawesome.com/370a890af0.js" crossorigin="anonymous"></script>
	<script src="scripts/work-in-progress.js" defer></script>
	<script src="scripts/mobile-navigation.js" defer></script>
</head>
<body>
	<nav class="mobile-navigation-bar">≡</nav>
	<header>
          <h1> Strona główna </h1>
	</header>
    <?php
     if($_SESSION['logged_in'] === false) {
     echo '<div class="login-buttons-container">
     <button><a href="login.html">Zaloguj się</a></button>
     <button><a href="signin.html">Zarejestruj się</a></button>
     </div>';
     } else {
        echo '<div class="login-buttons-container">
     <p>Zalogowany jako <strong>'.$_SESSION["username"].'</strong></p>
     <form method="post" action="backend/logout.php" style="display:inline;">
	<button>Wyloguj się</button>
     </form>
     </div>';
     }
    ?>
    

	<nav class="topics-pane">
		<span class="close">✖</span>
		<a href="src/linux.php">Linux</a>
		<a  href="src/programming.html">Programowanie</a>
		<a  href="src/chess.php">Szachy</a>
		<a  class="work-in-progress" href="">Gry wideo</a>
		<a  class="work-in-progress" href="">Seriale</a>
		<a  class="work-in-progress" href="">Kostki Rubika</a>
		<a  class="work-in-progress" href="">Sekcja piłkarska</a>
	</nav>
	<main class="central-pane">
		<h2>O mnie</h2>
		<p> Cześć! Nazywam się Seweryn, a ty trafiłeś/aś na mojego bloga! Ten blog jest poświęcony moim zainteresowaniom.
		Interesuję się programowaniem, informatyką, piłką nożną, grą w szachy oraz grami wideo. Lubię także oglądać seriale i 
		okazjonalnie gram na instrumentach(pianinie i gitarze basowej).</p>
		<p>Mam nadzieję, że spodoba ci się mój blog. Jeżeli masz jakąś propozycję wprowadzenia zmian do tej strony to skontaktuj się ze mną.
		Kontakt do mnie podany jest na dole strony. Za wszelkie słowa pochwały i konstruktywnej krytyki z góry dziękuję.</p>
		<hr>
		<h2>Nowe artykuły</h2>
		<ul>
			<?php
				require "backend/get_article_names.php";	
			?>
		</ul>
		
	</main>
	<?php
		require_once "footer.php";
	?>
</body>
</html>
