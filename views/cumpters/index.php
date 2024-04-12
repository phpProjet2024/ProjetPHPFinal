<table class="table container">
<h1 class="text-center">Ordinateurs populaire</h1>
    <thead>
    <tr>
        <th scope="col">N</th>
        <th scope="col">Image</th>
        <th scope="col">Nom</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantite</th>
        <th scope="col">Courte description</th>

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
            <td><a class="btn btn-primary" href="<?= URI."paniers/ajouter/".$cumpter->id_cumpter ?>" >Ajouter au panier</a></td>
        </tr>
        <?php
    }

    ?>

    </tbody>
</table>

