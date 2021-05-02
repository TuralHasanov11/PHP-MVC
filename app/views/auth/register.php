<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>
  
  <div class="container py-4">
  <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">Qeydiyyatdan keç</h3>
    </div>
    <div class="card p-3">
    <h3>Qeydiyyatdan keç</h3>
    <form class="row g-3" action="/register" method="POST">
      <div class="col-12 col-md-6">
        <label for="fname" class="form-label">Ad</label>
        <input type="text" name="first_name" class="form-control" id="fname" placeholder="Ad" required>
      </div>
      <div class="col-12 col-md-6">
        <label for="lname" class="form-label">Soyad</label>
        <input type="text" name="last_name" class="form-control" id="lname" placeholder="Soyad" required>
      </div>
      <div class="col-12 col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" required>
      </div>
      <div class="col-12 col-md-6">
        <label for="password" class="form-label">Şifrə</label>
        <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err']))?'is-invalid':'';?>" id="password" required>
      </div>
      <div class="col-12 col-md-4">
        <label for="age" class="form-label">Yaş</label>
        <input type="number" name="age" min="18" max="80" class="form-control" id="age" required>
      </div>
      <div class="col-12 col-md-4">
        <label for="profession" class="form-label">Vəzifə</label>
        <select id="profession" name="profession" class="form-select" required> 
            <option value="">Vəzifə seçin</option>
            <?php 
                foreach ($data['professions'] as $key => $profession) {
                ?>
                    <option value="<?=$profession['id'];?>"><?=$profession['name'];?></option>
                <?php
                }
            ?>
        </select>
      </div>
      <div class="col-12 col-md-4">
        <label for="salary" class="form-label">Əmək haqqı</label>
        <input type="number" name="salary" class="form-control" id="salary" required>
      </div>
    

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Əlavə et</button>
      </div>
      <input type="hidden" name="token" value="<?php echo Token::generate();?>">
    </form>

    </div>

  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>