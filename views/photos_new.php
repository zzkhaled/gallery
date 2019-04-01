<?php if (!empty($error_message)) { ?>
  <div class="alert alert-warning" role="alert"><?= $error_message ?></div>
<?php } ?>
<form enctype="multipart/form-data" method="post" action="/index.php/gallery/photos_add/<?=$album_id ?>">
  <div class="form-group">
    <input type="file" id="photo" name="photo" autofocus>
  </div>
  <div class="form-group">
    <label for="photo_name">Nom de la photo</label> <input value="<?=set_value('photo_name');?>" type="text"
      class="form-control" id="photo_name" name="photo_name">
  </div>
  <br>
  <button type="submit" class="btn btn-success">Ajouter la photo</button>
  <a href="/index.php/gallery/albums_show/<?=$album_id ?>"  class="btn btn-danger">Annuler</a>
</form>