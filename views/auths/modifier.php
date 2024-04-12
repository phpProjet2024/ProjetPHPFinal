<form method="post" class="container">
  <input type="text" hidden class="form-control" value="<?php echo $userDetails->id_utilisateur  ?>" id="id_utilisateur" name="id_utilisateur">

    <div class="mb-3">
        <label for="nom"  class="form-label">Nom</label>
        <input type="text" disabled class="form-control" value="<?php echo $userDetails->nom ?>" name="nom" id="nom">
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" disabled class="form-control" value="<?php echo $userDetails->prenom?>" name="prenom" id="prenom">
    </div>
    <div class="mb-3">
        <label for="courriel" class="form-label">Courriel</label>
        <input type="email" disabled class="form-control" value="<?php echo $userDetails->email ?>" name="email" id="courriel">
    </div>
    <div class="mb-3">
        <label for="numero_telephone" class="form-label">Numero telephone</label>
        <input type="text" disabled class="form-control" value="<?php echo $userDetails->numero_telephone ?>" name="numero_telephone" id="numero_telephone">
    </div>
    <div class="mb-3">
        <label for="numero_telephone" class="form-label">Actif</label>
        <input type="text" disabled class="form-control" value="<?php if ( $userDetails->actif==1) { echo "Oui" ;} else{ echo "Non";} ?>" name="actif" id="actif">
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <input type="text" class="form-control" value="<?php echo $userDetails->description ?>" name="id_role" id="id_role">
    </div>

    <?php
    if (isset($message)) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?= $message; ?>
        </div>
        <?php

    }

    ?>
    <input type="submit" class="btn btn-success" name="modifier" value="Valider les modifications">
</form>