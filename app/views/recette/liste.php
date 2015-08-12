<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <a href="#">Hello <?php if (isset($data['name'])) {echo $data['name'];}?></a>
                </li>
                <li>
                    <a href="#">Accueil</a>
                </li>
                <li>
                    <a href="#">Recette</a>
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
                <a href="#" class="list-group-item">Cuisine du monde</a>
                <a href="#" class="list-group-item">Italien</a>
                <a href="#" class="list-group-item">Turque</a>
            </div>
        </div>

        <div class="col-md-9">

            <div class="row">

                <?php
                    $connection = mysqli_connect("localhost", "root", "root", "marmiton_db");

                    if (!$connection){
                        echo "Une erreur s'est produite.\n";
                        exit;
                    }

                    $query = "SELECT * FROM recette";

                    $result = mysqli_query($connection, $query);

                    if (!$result)
                    {
                        echo "Une erreur s'est produite.\n";
                        exit;
                    }

                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){ ?>
                            <div class="col-sm-4 col-lg-4 col-md-4" >
                            <div class="thumbnail" >
                                <img src = "<?php echo '../../../public/img/' . $row['id'] . '.jpg'; ?>" alt = "" >
                                <div class="caption" >
                                    <h4 class="pull-right" > $24.99 </h4 >
                                    <h4 ><a href = "#" > <?php echo $row['titre'];; ?> </a >
                                    </h4 >
                                    <p > <?php echo $row['description']; ?></a></p>
                                </div >
                                <div class="ratings" >
                                    <p class="pull-right" > 15 reviews </p >
                                    <p >
                                        <span class="glyphicon glyphicon-star" ></span >
                                        <span class="glyphicon glyphicon-star" ></span >
                                        <span class="glyphicon glyphicon-star" ></span >
                                        <span class="glyphicon glyphicon-star" ></span >
                                        <span class="glyphicon glyphicon-star" ></span >
                                    </p >
                                </div >
                            </div >
                        </div >
                <?php } } ?>
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