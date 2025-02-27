<main class="container">
    <h1 class="my-5">Gestion des étudiants</h1>
    <section class="row">
       
        <div class="col-9">
            <a href="<?php echo URL ?>?page=new_form" class="btn btn-outline-primary mb-3">Ajouter un nouveau étudiant</a>
            <div class="text-center">
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>prenom</th>
                        <th>nom</th>
                        <th>email</th>
                        <th>cv</th>
                        <th>date naissance</th>
                        <th>isAdmin</th>
                        <th>date mise à jour</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiants) : ?>
                        <tr>
                            <td><?php echo $etudiants["id"] ?></td>
                            <td><?php echo $etudiants["prenom"] ?></td>
                            <td><?php echo $etudiants["nom"] ?></td>
                            <td><?php echo $etudiants["email"] ?></td>
                            <td><?php echo $etudiants["cv"] ?></td>
                            <td><?php echo $etudiants["dt_naissance"] ?></td>
                            <td class="text-center"><?php echo $etudiants["isAdmin"] == 1 ? "✅" : "❌" ?></td>
                            <td><?php echo $etudiants["dt_mise_a_jour"] ?></td>
                            <td>
                            <a href="<?php echo URL ?>?page=etudiants/update&?id=<?php echo $etudiants["id"] ?>" class="btn btn-outline-dark me-3 mb-1 btn-sm">update</a>
                            <a href="<?php echo URL ?>?page=etudiants/delete&?id=<?php echo $etudiants["id"] ?>" class="btn btn-outline-danger me-3 btn-sm" onclick="return confirm('êtes vous sûr de vouloir supprimer?')">delete</a>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>
</main>

