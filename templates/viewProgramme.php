<?php include "templates/include/header.php" ?>
<div class="main backgroundAdmin">
      
      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['programme']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['programme']->content )?></div>
      <p class="pubDate">Publié le <?php echo date('j F Y', $results['programme']->publicationDate)?></p>

      <p><a href="./">Retourner à la page d'accueil</a></p>
</div>
<?php include "templates/include/footer.php" ?>