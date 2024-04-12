<table class="table container">

    <a class="btn btn-primary" href="<?= URI . "auths/inscription"; ?>">Ajouter un nouveau utilisateur</a>
    <thead>
    <tr>
        <th scope="col">N</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenom</th>
        <th scope="col">Email</th>
        <th scope="col">Date Naissance</th>
        <th scope="col">Telephone</th>
        <th scope="col">Photo</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $cmpt = 1;
    foreach ($users as $user) {
        ?>
        <tr>
            <th scope="row"><?= $cmpt++; ?></th>
            <td><?= $user->nom; ?></td>
            <td><?= $user->prenom; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->date_naissance; ?></td>
            <td><?= $user->numero_telephone; ?></td>
            <td><img height="100px" width="100px" src="<?=
                (isset($cumpter->path)) ? URI . $cumpter->path
                    : URI . "assets/image.jpeg";

                ?>" alt="">
            </td>
            <td><?= $user->description; ?></td> 
            <td class="row">
                <a class="btn btn-danger col" href=<?= URI . "auths/bloquer/" . $user->id_utilisateur; ?>>
                <?php if ($user->actif==0) { ?> <i class="bi bi-eye-slash-fill"></i>  <?php } 
                      else { ?> <i class="bi bi-eye-fill"></i> <?php } ?></a>  
                <a class="btn btn-info col" href=<?= URI . "auths/modifier/" . $user->id_utilisateur; ?>><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger col" href=<?= URI . "auths/supprimer/" . $user->id_utilisateur; ?>><i class="bi bi-trash3"></i></a>
            </td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>