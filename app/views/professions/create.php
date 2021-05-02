<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>

  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">Vəzifə əlavə et</h3>
    </div>
    <a href="/professions" class="btn btn-secondary">Geriyə</a>
    <hr>
    <div class="card p-3">
    <h4>Vəzifə əlavə et</h4>
    <form class="row g-3" action="/professions/store" method="POST">
      <div class="col-12 col-md-6">
        <label for="name" class="form-label">Vəzifə</label>
        <input type="text" name="name" class="form-control" id="name" required>
      </div>
     
      <div class="col-12">
        <button type="submit" class="btn btn-primary">Əlavə et</button>
      </div>
      <input type="hidden" name="token" value="<?php echo Token::generate();?>">
    </form>
    </div>



  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>