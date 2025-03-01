<main class="container">
    <h1>
    Profile d'étudiant numéro : <?php echo $etudiants["id"] ?>
    </h1>
    <section class="row">
        <div class="col-4">
            <ul>
                <li>prénom : <?php echo $prenom["prenom"] ?></li>
                <li>nom : <?php echo $nom["nom"] ?></li>
                <li>email : <?php echo $email["email"] ?></li>
                <li>cv : <?php echo $cv["cv"] ?></li>
                <li>date de naissance : <?php echo $dt_naissance["dt_naissance"] ?></li>
            </ul>
        </div>
    </section>
</main>