<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="http://images.marmitoncdn.org/skins/1/common/images/favicon.ico">

    <title>Marmiton - La délicieuse recette</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../../public/css/shop-homepage.css" rel='stylesheet'>

    <!-- Surcouche CSS -->
    <link href="../../../public/css/style.css" rel='stylesheet'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../../../public/img/resize_marmiton.gif"</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/public/Marmiton/public/home/index/">Accueil</a>
                </li>
                <li>
                    <a href="/public/Marmiton/public/recette/liste/">Recette</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-3">
            <p class="lead">Catégorie de recette</p>
            <div class="list-group">
                <?php foreach($data['categorie'] as $value) { ?>
                    <a href="#" class="list-group-item"><?php echo $value['nom']; ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-9">

            <div class="row">
                <div class="text-center">
                    <?php foreach($data['recette'] as $value){ ?>
                        <img src = "<?php echo '../../../public/img/' . $value['titre] . '.jpg'; ?>" alt = "" >
                        <br>
                        <h1 class="orange"><?php echo $value['titre']; ?></h1>
                        <br>
                        <?php echo $value['description']; ?>
                    <?php } ?>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Marmiton 2015</p>
            </div>
        </div>
    </footer>
</div>
<!-- /.container -->

<!-- jQuery -->
<script src="../../../public/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../../public/js/bootstrap.min.js"></script>

</body>

</html>