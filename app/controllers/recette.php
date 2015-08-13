<?php

class Recette extends Controller
{
    public function affiche($id_recette = -1)
    {
        $recette = $this->model('Reciep');
        $recette->$id_recette = $id_recette;

        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/affiche', ['result' => "ERROR : Failure connection Database."]);
        } else {
            $connect = $db->connect();
            $affiche_recette = $db->afficheRecette($connect, $recette->$id_recette);
            $affiche_categorie = $db->getCategorie($connect);
            $this->view('recette/affiche', ['recette' => $affiche_recette, 'categorie' => $affiche_categorie]);
        }
    }

    public function liste($id_categorie = -1)
    {
        $db = new My_connexion();
        if (!($db->connect())){
            $this->view('recette/liste', ['name' => 'pas ok']);
        } else {
            $connect = $db->connect();
            $affiche_categorie = $db->getCategorie($connect);

            if (isset($id_categorie) && !empty($id_categorie) && $id_categorie >= 0){
                $affiche_liste_triee = $db->listeRecetteByIdCategorie($connect, $id_categorie);
                $this->view('recette/liste', ['liste' => $affiche_liste_triee, 'categorie' => $affiche_categorie]);

            } else {
                $affiche_liste = $db->listeRecette($connect);
                $this->view('recette/liste', ['liste' => $affiche_liste, 'categorie' => $affiche_categorie]);
            }

            if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])
                && isset($_POST['email']) && !empty($_POST['email'])
                && isset($_POST['titre']) && !empty($_POST['titre'])
                && isset($_POST['description']) && !empty($_POST['description'])
                && isset($_POST['categorie']) && !empty($_POST['categorie'])) {

                $pseudo = $_POST['pseudo'];
                $email = $_POST['email'];
                $titre = $_POST['titre'];
                $description = $_POST['description'];
                $categorie = $_POST['categorie'];

                $db->updateRecette($connect, $pseudo, $email, $titre, $description, $categorie);

                // TODO : gérer l'image ici

                if ($_FILES['image']) {
                    $maxsize = 3000800;
                    $maxwidth = 550;
                    $maxheight = 550;

                    if ($_FILES['image']['error'] > 0)
                    {
                        die("ERROR image");
                    }

                    if ($_FILES['image']['size'] > $maxsize)
                    {
                        die("taille supéreiur");
                    }

                    $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
                    $extension_upload = strtolower( substr ( strrchr ($_FILES['image']['name'], '.') ,1));

                    if (!(in_array($extension_upload,$extensions_valides)))
                    {
                        die("mauvaise exension");
                    }

                    $image_sizes = getimagesize($_FILES['image']['tmp_name']);

                    if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
                    {
                        die("dimension non respectée");
                    }

                    $nom = "../public/img/{$titre}.jpg";
                    $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $nom);

                    if (!$resultat)
                    {
                        die("Ne marche pas");
                    }
                }
            } else {
                die;
            }
        }
    }
}