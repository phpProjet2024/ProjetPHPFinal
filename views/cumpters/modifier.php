
<form class="m-5" method="post" enctype="multipart/form-data" >
        <input type="text" hidden class="form-control" value="<?php echo $cumpterDetails->id_cumpter  ?>" id="id_cumpter" name="id_cumpter">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" value="<?php echo $cumpterDetails->nom ?>" id="nom" name="nom">

    </div>
    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" value="<?php echo $cumpterDetails->prix ?>" id="prix" name="prix">
    </div>
    <div class="mb-3">
        <label for="quantite" class="form-label">Quantite</label>
        <input type="number" class="form-control" value="<?php echo $cumpterDetails->quantite?>" id="quantite" name="quantite">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control"  id="image"  name="image" value ="<?php echo $cumpterDetails->path ?>">
     </div>
    <div class="mb-3 form-floating">
        <label for="courte_description" class="form-label">Courte description </label>
        <textarea class="form-control"  name="courte_description" style="height: 100px" placeholder="Entrer votre courte description ici"
         id="courte_description"><?php echo $cumpterDetails->courte_description;?></textarea>

    </div>
    <div class="mb-3 form-floating">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" style="height: 100px"
         placeholder="Entrer votre description ici"  id="description"><?php echo $cumpterDetails->description;?></textarea>

    </div>
    <input class="btn btn-primary" type="submit" value="Modifier" name="modifier">
</form>

