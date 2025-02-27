<?php

class FrontController extends AbstractController
{


    public function home()
    {

        //var_dump($etudiants);


        $data = [
            "titre" => "home",
            "etudiants" => BDD::getInstance()->query("
                SELECT *
                FROM etudiants
            ")
        ];

        $this->render("home", $data);
    }




    public function new_form($id = null)
    {
        //var_dump($_POST);

       //echo "Méthode new_form appelée avec id: " . ($id !== null ? $id : 'aucun ID');
        $id = "";
        $prenom = "";
        $nom = "";
        $email = "";
        $cv = "";
        $dt_naissance = "";
        $isAdmin = 0;
        //$dt_mise_a_jour = "";
        $erreurs = [];


        if (!empty($_POST)) {
            $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $prenom;
            $nom = isset($_POST['nom']) ? $_POST['nom'] : $nom;
            $email = isset($_POST['email']) ? $_POST['email'] : $email;
            $cv = isset($_POST['cv']) ? $_POST['cv'] : $cv;
            $dt_naissance = isset($_POST['dt_naissance']) ? $_POST['dt_naissance'] : $dt_naissance;
            $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;
           // $dt_mise_a_jour = isset($_POST['dt_mise_a_jour']) ? $_POST['dt_mise_a_jour'] : $dt_mise_a_jour;


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs[] = "l'email n'est pas conforme";
            }

            $etudiants = BDD::getInstance()->query("SELECT * FROM etudiants WHERE email = :email", ["email" => $email]);
            if (!empty($etudiants)) {
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre";
            }

            if (count($erreurs) === 0 && !empty($_POST)) {
                BDD::getInstance()->query("INSERT INTO etudiants(email, password, role) VALUES (:email, :password, :role)");
            }
        }
        $data = [
            "titre" => "créer un nouveau profil etudiant",
            "data_form" => [
                "id" => $id,
                "prenom" => $prenom,
                "nom" => $nom,
                "email" => $email,
                "cv" => $cv,
                "dt_naissance" => $dt_naissance,
                "isAdmin" => $isAdmin,
                //"dt_mise_a_jour" => $dt_mise_a_jour,
            ],
            "erreurs" => $erreurs
        ];

        $this->render("new_form", $data);


      // header("Location: " . URL . "?page=new_form");
        //die();
    }



    public function delete(string $id)
    {
        BDD::getInstance()->query("SELECT * FROM etudiants WHERE id = :id", ["id" => $id]);

        if (empty($etudiants)) {
            $data = [
                "titre" => "impossible de supprimer le profil etudiant",
                "contenu" => [
                    "num" => 404,
                    "message" => "le profil que vous souhaitez supprimer n'existe pas"
                ]
            ];

            $this->render("delete", $data);
            die();
        }
    }

    public function update(string $id)
    {

        $user = BDD::getInstance()->query("SELECT * FROM user WHERE id = :id", ["id" => $id]);

        if (empty($etudiants)) {
            $data = [
                "titre" => "impossible de supprimer le profil etudiant",
                "contenu" => [
                    "num" => 404,
                    "message" => "le profil que vous souhaitez supprimer n'existe pas"
                ]
            ];
            $this->render("erreur", $data);
            die();
        }


        $prenom = $etudiants[0]["prenom"];
        $nom = $etudiants[0]["nom"];
        $email = $etudiants[0]["email"];
        $cv = $etudiants[0]["cv"];
        $dt_naissance = $etudiants[0]["dt_naissance"];
        $isAdmin = $etudiants[0]["isAdmin"];

        $erreurs = [];

        if (!empty($_POST)) {
            $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : $prenom;
            $nom = isset($_POST["nom"]) ? $_POST["nom"] : $nom;
            $email = isset($_POST["email"]) ? $_POST["email"] : $email;
            $cv = isset($_POST["cv"]) ? $_POST["cv"] : $cv;

            $dt_naissance = isset($_POST["dt_naissance"]) ? $_POST["dt_naissance"] : $dt_naissance;

            $isAdmin = isset($_POST["isAdmin"]) && $_POST["isAdmin"] ? 1 : 0;



            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs[] = "l'email n'est pas conforme";
            }
            $etudiants = BDD::getInstance()->query("SELECT * FROM etudiants WHERE email = :email", ["email" => $email]);

            if (!empty($etudiants) || $_SESSION["etudiants"]["email"] == $email) {
                $erreurs[] = "l'email soumis est déjà utilisé, veuillez en choisir un autre";
            }

            if (count($erreurs) === 0 && !empty($_POST)) {
                BDD::getInstance()->query("UPDATE etudiants SET prenom = :prenom, nom = :nom, email = :email, cv = :cv, dt_naissance = :dt_naissance, isAdmin = 0, WHERE id = :id", [
                    "id" => $id,
                    "prenom" => $prenom,
                    "nom" => $nom,
                    "email" => $email,
                    "cv" => $cv,
                    "dt_naissance" => $dt_naissance,
                    "isAdmin" => $isAdmin,
                ]);
            } else {
                BDD::getInstance()->query("UPDATE etudiants SET prenom = :prenom, nom = :nom, email = :email, cv = :cv, dt_naissance = :dt_naissance, isAdmin = 1, WHERE id = :id", [
                    "id" => $id,
                    "prenom" => $prenom,
                    "nom" => $nom,
                    "email" => $email,
                    "cv" => $cv,
                    "dt_naissance" => $dt_naissance,
                    "isAdmin" => $isAdmin,
                ]);
            }
            header("Location: " . URL . "?page=admin/user");
            die();
        }



        $data = [
            "titre" => "mise à jour d'un nouveau profil utilisateur",
            "data_form" => [
                "id" => $id,
                "prenom" => $prenom,
                "nom" => $nom,
                "email" => $email,
                "cv" => $cv,
                "dt_naissance" => $dt_naissance,
                "isAdmin" => $isAdmin,
            ],
            "erreurs" => $erreurs,
        ];
        $this->render("update", $data);
    }
}
