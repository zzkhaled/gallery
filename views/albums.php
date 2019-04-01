<table class="table">
<?php foreach ($albums as $album) { ?>
 <tr>
    <td class="text-left">
3
    </td>
    <td class="text-right">
      <a class="btn" href="/index.php/gallery/albums_delete/<?=$album['album_id']?>">
        <i class="glyphicon glyphicon-trash"></i>
      </a>
    </td>
  </tr>
<?php } ?>
</table>

<a href="/index.php/gallery/albums_new" class="btn btn-primary"
   role="button">Créer un nouvel album</a>
