<?php $token=Token::generate();?>

<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>

  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class=""><?=$data['profession']['name']?></h3>
    </div>
    <a href="/professions" class="btn btn-secondary">Geriyə</a>
    <hr>
    <div class="card p-3">
    <h4>Vəzifə əlavə et</h4>
    <form class="row g-3" action="/professions/update/<?=$data['profession']['id']?>" method="POST">
      <div class="col-12 col-md-6">
        <label for="name" class="form-label">Vəzifə</label>
        <input type="text" name="name" class="form-control" id="name" value="<?=$data['profession']['name']?>" required>
      </div>
     
      <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Düzəliş et</button>
      </div>
      <input type="hidden" name="token" value="<?=$token?>">
    </form>
    </div>
    <hr>
    <form class="row g-3" action="/professions/destroy/<?=$data['profession']['id']?>" method="POST">
      <div class="col-12">
        <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> Sil</button>
      </div>
      <input type="hidden" name="token" value="<?=$token?>">
    </form>


  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>