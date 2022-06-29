<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo ( $results['pageTitle'] )?></title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://www.dafontfree.net/embed/bG91aXMtZ2VvcmdlLWNhZmUtcmVndWxhciZkYXRhLzk1L2wvMTY3ODg5L0xvdWlzIEdlb3JnZSBDYWZlLnR0Zg" rel="stylesheet" type="text/css"/>
    <link href="https://db.onlinewebfonts.com/c/596ad608a41bd28960c777827cdd6af1?family=Apple+Chancery" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">

</head>

<body>
    <div class="header brown">
        
            <img id="logo" src="images/Logo_bleu.png" alt="logo" />
        

        <div class=margenav>
            <!-- For each <a/> is underline if is select -->
            <div class="nav">
            <a href="./?action=homepage" <?php if(isset($_GET["action"])) {if($_GET["action"]=="homepage" ){echo "class='select'";}} else {echo"class='select'";} ?> >Accueil</a>
            </div>
            <div class="nav">
            <a href="./?action=programmation" <?php if(isset($_GET["action"])) {if($_GET["action"]=="programmation"){echo "class='select'";}} ?>>Programmation</a>
            </div>
            <div class="nav">
            <a href="./?action=infos" <?php if(isset($_GET["action"])) {if($_GET["action"]=="infos"){echo "class='select'";}} ?>>Infos</a>
            </div>
            <div class="nav">
            <a href="./?action=contact" <?php if(isset($_GET["action"])) {if($_GET["action"]=="contact"){echo "class='select'";}} ?>>Contact</a>
            </div>

            <div>

                <a href="./?action=billeterie" type="button" class="btn headerBouton"><img src="images/billet.png" />Billetterie</a>
            </div>
            <div>
                
                <a href="admin.php" type="button" class="btn headerBouton"><img src="images/compte.png" />Mon compte</a>
            </div>
        </div>
    </div>

    <main>