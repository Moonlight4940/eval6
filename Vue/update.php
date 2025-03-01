<main class="container">
   <h1>La page update de l'etudiant</h1>
   <section class="row">
        <div class="col-3">

        </div>
        <div class="col-9">
            <form method="POST" action="<?php echo URL; ?>?page=update">
            <input type="hidden" name="id" value="<?php echo $data_form["id"]; ?>">
           
                <div class="mb-3">
                    <label for="prenom">prenom</label>
                    <input type="prenom" name="prenom" id="prenom" class="form-control" value="<?php echo $data_form["prenom"] ?>">
                </div>
                <div class="mb-3">
                    <label for="nom">nom</label>
                    <input type="nom" name="nom" id="nom" class="form-control" value="<?php echo $data_form["nom"] ?>">
                </div>
                <div class="mb-3">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $data_form["email"] ?>">
                </div>
                <div class="mb-3">
                    <label for="cv">cv</label>
                    <input type="text" name="cv" id="cv" class="form-control" value="<?php echo $data_form["cv"] ?>">
                </div>
                <div class="mb-3">
                    <label for="dt_naissance">dt_naissance</label>
                    <input type="date" name="dt_naissance" id="dt_naissance" class="form-control" value="<?php echo $data_form["dt_naissance"] ?>">
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="isAdmin" id="isAdmin" <?php echo $data_form["isAdmin"] == 1 ? "checked" : "" ?>>
                        <label class="form-check-label" for="isAdmin">
                            is Admin
                        </label>
                    </div>
                </div>
          
                <div class="d-flex justify-content-between">
                    <input type="submit" class="btn btn-outline-success">
                    <a href="<?php echo URL ?>" class="btn btn-outline-primary">Retour à la page d'accueil</a>
                </div>
            </form>

        </div>
    </section>
</main>