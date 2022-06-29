<?php include "templates/include/header.php" ?>



<div class="main backProgrammation">

    <h1>Programmation</h1>


    <div class="pdf_Programme">
        <a class="pdf" href="programme.pdf">En pdf</a>
        <h2 class="day">Vendredi</h2>
        <div class="pageProgrammation " id="headlines">

            <?php

            foreach ($results['programmes'] as $programme) {
            ?>
            <?php if ($programme->dayofweek == "Vendredi") { //Verify if dayofweek is equal at "Vendredi" ?> 
            <div class="blockProgramme">
                <img class="imageProgramme" src="<?php echo $programme->url_image; ?>" alt="Illustration du programme">
                <h2 class="titleProgramme">
                    <?php echo ($programme->title) ?>
                </h2>
                <p class="content"><?php echo ($programme->content) ?></p>

            </div>

            <?php }
            } ?>

        </div>

    </div>

    <div>
        <h2 class="day">Samedi</h2>
        <div class="pageProgrammation " id="headlines">

            <?php

            foreach ($results['programmes'] as $programme) {
            ?>
            <?php if ($programme->dayofweek == "Samedi") { ?>
            <div class="blockProgramme">
                <img class="imageProgramme" src="<?php echo $programme->url_image; ?>" alt="Illustration du programme">
                <h2 class="titleProgramme">
                    <?php echo ($programme->title) ?>
                </h2>
                <p class="content"><?php echo ($programme->content) ?></p>

            </div>

            <?php }
            } ?>

        </div>

    </div>

    <div>
        <h2 class="day">Dimanche</h2>
        <div class="pageProgrammation " id="headlines">

            <?php

            foreach ($results['programmes'] as $programme) {
            ?>
            <?php if ($programme->dayofweek == "Dimanche") { ?>
            <div class="blockProgramme">
                <img class="imageProgramme" src="<?php echo $programme->url_image; ?>" alt="Illustration du programme">
                <h2 class="titleProgramme">
                    <?php echo ($programme->title) ?>
                </h2>
                <p class="content"><?php echo ($programme->content) ?></p>

            </div>

            <?php }
            } ?>

        </div>

    </div>



</div>

<?php include "templates/include/footer.php" ?>