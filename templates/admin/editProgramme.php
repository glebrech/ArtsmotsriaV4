<?php include "templates/include/header.php" ?>
<div class="main backgroundAdmin">
    <div id="adminHeader">
        <h2>ArtsMotsRia Admin</h2>
        <p>Vous êtes connectez en temps qu'<b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a
                href="admin.php?action=logout" ?>Déconnexion</a></p>
    </div>

    <h1><?php echo $results['pageTitle']?></h1>

    <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="programmeId" value="<?php echo $results['programme']->id ?>" />

        <?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
        <?php } ?>

        <ul>

            <li>
                <label for="title">Titre du Programme</label>
                <input type="text" name="title" id="title" placeholder="Name of the programme" required autofocus
                    maxlength="255" value="<?php echo htmlspecialchars( $results['programme']->title )?>" />
            </li>

            <li>
                <label for="url_image">URL de l'image Programme </label>
                <textarea name="url_image" id="url_image" placeholder="Url de l'image" required
                    maxlength="1000"
                    style="height: 5em;"><?php echo htmlspecialchars( $results['programme']->url_image )?></textarea>
            </li>

            <li>
                <label for="dayofweek">Jour du Programme </label>
                <textarea name="dayofweek" id="dayofweek" placeholder="Jour du programme" required
                    maxlength="1000"
                    style="height: 5em;"><?php echo htmlspecialchars( $results['programme']->dayofweek )?></textarea>
            </li>

            <li>
                <label for="content">Contenu du Programme</label>
                <textarea name="content" id="content" placeholder="The HTML content of the programme" required
                    maxlength="100000"
                    style="height: 30em;"><?php echo htmlspecialchars( $results['programme']->content )?></textarea>
            </li>

            <li>
                <label for="publicationDate">Date Publication </label>
                <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required
                    maxlength="10"
                    value="<?php echo $results['programme']->publicationDate ? date( "Y-m-d", $results['programme']->publicationDate ) : "" ?>" />
            </li>


        </ul>

        <div class="buttons">
            <input type="submit" name="saveChanges" value="Sauvegarder les changements" />
            <input type="submit" formnovalidate name="cancel" value="Annuler" />
        </div>

    </form>

    <?php if ( $results['programme']->id ) { ?>
    <p><a href="admin.php?action=deleteProgramme&amp;programmeId=<?php echo $results['programme']->id ?>"
            onclick="return confirm('Delete This Programme?')">Supprimer le Programme</a></p>
    <?php } ?>
</div>
<?php include "templates/include/footer.php" ?>