<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>
  
  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">Daxil ol</h3>
    </div>
    <?php
        if(isset($_GET['registered'])){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Qeydiyyatdan uğurla keçdiniz!</strong> Hesabınıza daxil olun!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    ?>
    <div class="row justify-content-center">
        <div class="card col-12 col-md-6">
        <form class="row p-3 g-3" action="/login" method="POST">
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Şifrə</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Daxil ol</button>
            </div>
            <input type="hidden" name="token" value="<?php echo Token::generate();?>">
            </form>
        </div>
    </div>

  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>