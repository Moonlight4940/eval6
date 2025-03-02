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
                    <?php foreach ($etudiants as $etudiant) : ?>
                        <tr>
                            <td><a href="<?php echo URL; ?>?page=profile&id=<?php echo $etudiant["id"]?>"><?php echo $etudiant["id"] ?></a></td>
                            <td><?php echo $etudiant["prenom"] ?></td>
                            <td><?php echo $etudiant["nom"] ?></td>
                            <td><?php echo $etudiant["email"] ?></td>
                            <td><?php echo $etudiant["cv"] ?></td>
                            <td><?php echo $etudiant["dt_naissance"] ?></td>
                            <td class="text-center"><?php echo $etudiant["isAdmin"] == 1 ? "✅" : "❌" ?></td>
                            <td><?php echo $etudiant["dt_mise_a_jour"] ?></td>
                            <td>
                            <a href="<?php echo URL; ?>?page=update&id=<?php echo $etudiant["id"]; ?>" class="btn btn-outline-dark me-3 mb-1 btn-sm">update</a>
                           
                            <a href="<?php echo URL ?>?page=delete&id=<?php echo $etudiant["id"] ?>" class="btn btn-outline-danger me-3 btn-sm" onclick="return confirm('êtes vous sûr de vouloir supprimer?')">delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
        </div>
    </section>
</main>

