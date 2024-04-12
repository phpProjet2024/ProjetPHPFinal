<h1 class="text-center">Gestion Panier</h1>
<table class="table container">
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
    foreach ($cumpters

             as $cumpter) {
        // film=> [$quantite,$film]
        $quantite = $cumpter[0];
        $cumpter = $cumpter[1];
        ?>
        <form action="<?= URI . "paniers/modifier/" . $cumpter->id_cumpter; ?>" method="post">
            <tr>
                <th scope="row"><?= $cmpt++; ?></th>
                <td><img height="100px" width="100px" src="<?=
                    (isset($cumpter->path)) ? URI . $cumpter->path
                        : URI . "assets/image.jpeg";

                    ?>" alt="">

                </td>
                <td><?= $cumpter->nom; ?></td>
                <td><?= $cumpter->prix; ?></td>
                <td><input name="quantite" type="number" min="0" max="<?= $cumpter->quantite; ?>"
                           value="<?= $quantite; ?>">
                </td>
                <td><?= $cumpter->courte_description; ?></td>
                <td class="row">
                    <button type="submit" name="modifier" class="btn btn-info col"><i
                                class="bi bi-pencil-square"></i></button>


                    <a class="btn btn-danger col" href=<?= URI . "paniers/supprimer/" . $cumpter->id_cumpter; ?>><i
                                class="bi bi-trash3"></i></a>
                </td>
            </tr>
        </form>
        <?php
    }

    ?>

    </tbody>
</table>