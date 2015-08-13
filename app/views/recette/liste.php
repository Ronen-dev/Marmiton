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
                    <a href="<?php echo '/public/Marmiton/public/recette/liste/' . $value['id']?>" class="list-group-item"><?php echo $value['nom']; ?></a>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-9">

            <div class="row">

                <?php foreach ($data['liste'] as $value) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4" >
                        <div class="thumbnail" >
                            <img src = "<?php echo '../../../public/img/' . $value['titre'] . '.jpg'; ?>" alt = "" >
                            <div class="caption" >
                                <h4 class="pull-right" ></h4 >
                                <h4 ><a href = "<?php echo '/public/Marmiton/public/recette/affiche/' . $value['id']; ?>" > <?php echo $value['titre']; ?> </a >
                                </h4 >
                                <p > <?php echo $value['description']; ?></a></p>
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
                <?php } ?>
            </div>


            <div class="center"><button data-toggle="modal" data-target="#squarespaceModal" class="btn btn-primary center-block">Cliquez ici pour ajouter une nouvelle recette !</button></div>


            <!-- line modal -->
            <div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Fermer</span></button>
                            <h3 class="modal-title text-center" id="lineModalLabel">Nouvelle recette</h3>
                        </div>
                        <div class="modal-body">

                            <!-- content goes here -->
                            <form method="POST" action="/public/Marmiton/public/recette/liste/" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre pseudo">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez votre e-mail">
                                </div>
                                <div class="form-group">
                                    <label for="categorie">Catégorie</label>
                                    <select class="form-control" name="categorie">
                                        <?php foreach($data['categorie'] as $value) { ?>
                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['nom']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre de la recette</label>
                                    <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre de la recette">
                                </div>
                                <div class="form-group">
                                    <label for="contenu">Contenu</label>
                                    <textarea class="form-control" name="description" rows="5" placeholder="Saisir le contenu de la recette"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Choisissez une image</label>
                                    <input type="file" name="image" id="image">
                                </div>
                                <button type="submit" class="btn btn-default">Envoyer</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Fermer</button>
                                </div>
                                <div class="btn-group btn-delete hidden" role="group">
                                    <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
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