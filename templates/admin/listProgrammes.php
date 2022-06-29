<?php include "templates/include/header.php" ?>
<div class="main backgroundAdmin">
    <div id="adminHeader">
        <h2>ArtsMotsRia Admin</h2>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a
                href="admin.php?action=logout" ?>Déconnexion</a></p>
    </div>

    <h1>Liste des Programmes</h1>

    <?php if ( isset( $results['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>


    <?php if ( isset( $results['statusMessage'] ) ) { ?>
    <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
    <?php } ?>

    <table>
        <tr>
            <th>Date de Publication</th>
            <th>Programme</th>
        </tr>

        <?php foreach ( $results['programmes'] as $programme ) { ?>

        <tr onclick="location='admin.php?action=editProgramme&amp;programmeId=<?php echo $programme->id?>'">
            <td><?php echo date('j M Y', $programme->publicationDate)?></td>
            <td>
                <?php echo $programme->title?>
            </td>
        </tr>

        <?php } ?>

    </table>

    <p><?php echo $results['totalRows']?> programme<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> au total.</p>

    <p><a href="admin.php?action=newProgramme">Ajouter un nouveau Programme</a></p>

    <p><a href="./?action=archive">Programme Archiver</a></p>

</div>
<?php include "templates/include/footer.php" ?>