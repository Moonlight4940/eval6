<main class="container">
    <h1>
    Profile d'étudiant  <?php echo $data["id"]; ?>
    </h1>
    <section class="row">
        <div class="col-4">
            <ul>
                <li>Prénom: <?php echo $data["prenom"]; ?></li>
                <li>nom : <?php echo $data["nom"] ?></li>
                <li>email : <?php echo $data["email"] ?></li>
                <li>cv : <?php echo $data["cv"] ?></li>
                <li>date de naissance : <?php echo $data["dt_naissance"] ?></li>
            </ul>
        </div>
        <div class="d-flex justify-content-between">
                    
                    <a href="<?php echo URL ?>" class="btn btn-outline-primary">Retour à la page d'accueil</a>
                </div>
    </section>
</main>