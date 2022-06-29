<?php include "templates/include/header.php" ?>

<div class="main contact">
    <div>
        <h1 class="titreContact" >Contact</h1>
        <div class="blockContact">
            <div>

                <button type="button" class="btn headerBouton"><img src="images/telephone.png"
                        alt="image téléphone" /></button>

                <p>06.38.38.38.38</p>
            </div>
            <div>
                <button type="button" class="btn headerBouton"><img src="images/letter.png" alt="image mail" /></button>

                <p>artsmotsria@outlook.fr</p>
            </div>
            <div>
                <button type="button" class="btn headerBouton"><img src="images/carte-du-monde_contact.png"
                        alt="image de carte" /></button>
                <p>Locoal-Mendon</p>
            </div>

        </div>

        <h2 class="titreContact">Des questions ?</h2>

        <div class="question questionp">
            <p>Nom</p>
            <input type="text">
            <p>Prénom</p>
            <input type="text">
            <p>E-mail*</p>
            <input type="text">
            <p>Object</p>
            <input type="text">
            <p>Message</p>
            <input class="message" type="text">
        </div>
        <div class="btnEnvoyer">
        <button type="button" class="btn headerBouton btnEnvoyer">Envoyer</button>
</div>
    </div>
</div>

<?php include "templates/include/footer.php" ?>