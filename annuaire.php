<?php
require_once 'database.php';

// Recherche par nom
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
try {
    // Construction dynamique de la requête
    $sql = 'SELECT * FROM repartss WHERE 1=1';
    $params = [];

    if ($search !== '') {
        $sql .= ' AND (`NOM` LIKE :search OR `Prénom` LIKE :search)';
        $params['search'] = '%' . $search . '%';
    } else {
        // Requête sans filtre
        $sql = 'SELECT * FROM repartss';
        $stmt = $db->query($sql);
    }
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur lors de la requête : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Recherche des participants</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/logo sans écriture.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
</head>

<body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
                src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
    </div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
            <p>Loading...</p>
        </div>
    </div>
    <div class="page">
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
                    data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
                    data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
                    data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
                    data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
                    data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
                        <span></span>
                    </div>
                    <div class="rd-navbar-aside-outer">
                        <div class="rd-navbar-aside">
                            <!-- RD Navbar Panel-->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle-->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand-->
                                <div class="rd-navbar-brand">
                                    <!--Brand--><a class="brand" href="index.html"><img src="images/Croisière AM (2).png" alt=""
                                            width="225" height="18" /></a>
                                </div>
                            </div>
                            <div class="rd-navbar-aside-right rd-navbar-collapse">
                                <ul class="rd-navbar-corporate-contacts">
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="icon  fa fa-envelope"></span></div>
                                            <div class="unit-body">
                                                <a class="link-aemail" href="mailto:#"
                                                    style="text-transform: lowercase;">croisieream.ue@gadz.org</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="unit unit-spacing-xs">
                                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                                            <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                                        </div>
                                    </li>
                                </ul><a class="button button-md button-default-outline-2 button-ujarak" href="#">Se connecter</a>
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main-outer">
                        <div class="rd-navbar-main">
                            <div class="rd-navbar-nav-wrap">
                                <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                                    <li><a class="icon fa fa-linkedin" href="https://www.linkedin.com/company/croisiere-arts-et-metiers?originalSubdomain=fr"></a></li>
                                    <li><a class="icon fa fa-instagram" href="https://www.instagram.com/croisiere.am/?hl=en"></a></li>
                                </ul>
                                <!-- RD Navbar Nav-->
                                <ul class="rd-navbar-nav">
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                                    </li>
                                    <li class="rd-nav-item active"><a class="rd-nav-link" href="annuaire.php">Annuaire</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">A propos</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="Album.html">Album</a>
                                    </li>
                                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Nous contacter</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <section class="breadcrumbs-custom-inset">
            <div class="breadcrumbs-custom context-dark bg-overlay-60">
                <div class="container">
                    <h2 class="breadcrumbs-custom-title">Recherche d'inscrits</h2>
                    <ul class="breadcrumbs-custom-path">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">About</li>
                    </ul>
                </div>
                <div class="box-position" style="background-image: url(images/IMG_8125.jpg);"></div>
            </div>
        </section>


        <form method="GET" action="" class="search-form">
            <input type="text" name="search" placeholder="Nom ou prénom" value="<?= htmlspecialchars($search) ?>" class="search-input">
            <button type="submit" class="search-button">Rechercher</button>
        </form>
        <div class="container">
            <?php if ($results): ?>
                <h2>Résultats :</h2>
                <?php foreach ($results as $row): ?>
                    <div style="border:1px solid #ccc; padding:10px; margin:10px;">
                        <strong>Adresse e-mail :</strong> <?= htmlspecialchars($row['Adresse e-mail']) ?><br>
                        <strong>NOM :</strong> <?= htmlspecialchars($row['NOM']) ?><br>
                        <strong>Prénom :</strong> <?= htmlspecialchars($row['Prénom']) ?><br>
                        <?php
                        // Génère une URL avec NOM et Prénom en GET
                        $href = 'teste_pdo.php?nom=' . urlencode($row['NOM']) . '&prenom=' . urlencode($row['Prénom']);
                        ?>
                        <a class="button button-default-outline2 button-ujarak" href="<?= $href ?>" data-caption-animate="fadeInLeft"
                            data-caption-delay="0">Voir</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun résultat trouvé.</p>
            <?php endif; ?>


        </div>
        <!-- Global Mailform Output-->
        <div class="snackbars" id="form-output-global"></div>
        <!-- Javascript-->
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
</body>

</html>