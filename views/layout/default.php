
<link rel="stylesheet" href=".<?php URI ?>./CSS/style.css">
<header>
    <?php
   
    require_once(RACINE . "views/public/header.php");
    ?>
</header>
<main>
    <?php
    echo $contenu;
    ?>
</main>

<footer>
<?php
    require_once(RACINE . "views/public/footer.php");
?></footer>