<?php include "templates/include/header.php" ?>
<div class="main blockconnexion">
    <div class="blockwhite">
        <form class="" action="admin.php?action=login" method="post">
            <input type="hidden" name="login" value="true" />

            <?php if (isset($results['errorMessage'])) { ?>
            <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
            <?php } ?>

            <div>

                <div>
                    <label for="username">E-mail</label>
                    <input class="widthform" type="text" name="username" id="username" placeholder="E-mail" required
                        autofocus maxlength="20" />
                </div>

                <div>
                    <label for="password">Mot de Passe</label>
                    <input class="widthform" type="password" name="password" id="password" required maxlength="20" />
                </div>

            </div>
            <div class="connectermdp">
                <button type="submit" name="login" class="btn headerBouton">Me connecter</button>
                <a href="">Mot de passe oublié</a>
                
            </div>
        </form>
    </div>
    <div class="formcss blockwhite">
        <p class="titreinscription">Je n'ai pas encore de compte</p>
        <h2 class="h2connexion">Inscription</h2>
        <div>
            <label for="nom">Nom</label>
            <input name="nom" type="text">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input name="prenom" type="text">
        </div>
        <div>
            <label for="email">E-mail*</label>
            <input name="email" type="text">
        </div>
        <div>
            <label for="mdp">Choisissez votre mot de passe*</label>
            <input name="mdp" type="text">
        </div>
        <div>
            <label for="mdpconfirm">Comfirmer votre mot de passe*</label>
            <input name="mdpconfirm" type="text">
        </div>
        <div class="connectermdp">
            <a type="submit" name="login" class="btn headerBouton">Je m'inscris</a>
        <a href="">Mot de passe oublié</a>
        
    </div>
    </div>
</div>



<?php include "templates/include/footer.php" ?>