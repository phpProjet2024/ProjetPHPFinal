<table class="table container">

    <a class="btn btn-primary" href="<?= URI . "cumpters/ajouter"; ?>">Ajouter un nouveau produit</a>
    <thead>
    <tr>
        <th scope="col">N</th>
        <th scope="col">Image</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantite</th>
        <th scope="col">Courte description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $cmpt = 1;
    foreach ($cumpters as $cumpter) {
        ?>
        <tr>
            <th scope="row"><?= $cmpt++; ?></th>
            <td><img height="100px" width="100px" src="<?=
                (isset($cumpter->path)) ? URI . $cumpter->path
                    : URI . "assets/image.jpeg";

                ?>" alt="">

            </td>
            <td><?= $cumpter->nom; ?></td>
            <td><?= $cumpter->prix; ?></td>
            <td><?= $cumpter->quantite; ?></td>
            <td><?= $cumpter->courte_description; ?></td>
            <td class="row">
                <a class="btn btn-info col" href=<?= URI . "cumpters/modifier/" . $cumpter->id_cumpter; ?>><i class="bi bi-pencil-square"></i></a>


                <a class="btn btn-danger col" href=<?= URI . "cumpters/supprimer/" . $cumpter->id_cumpter; ?>><i class="bi bi-trash3"></i></a>

            </td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>