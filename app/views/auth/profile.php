<?php $csrfToken=Token::generate();?>

<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>
  
  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">Profil</h3>
    </div>
    <div class="card p-3">
    <h4>Profil məlumatlarını yenilə</h4>
    <form class="row g-3" action="/user/update" method="POST">
      <div class="col-12 col-md-6">
        <label for="fname" class="form-label">Ad</label>
        <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err']))?'is-invalid':'';?>" id="fname" value="<?=$data['employee']['first_name']?>" placeholder="Ad">
        <span class="invalid-feedback"><?php echo $data['first_name_err'];?></span>
      </div>
      <div class="col-12 col-md-6">
        <label for="lname" class="form-label">Soyad</label>
        <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err']))?'is-invalid':'';?>" id="lname" value="<?=$data['employee']['last_name']?>" placeholder="Soyad">
        <span class="invalid-feedback"><?php echo $data['last_name_err'];?></span>
      </div>
      <div class="col-12 col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err']))?'is-invalid':'';?>" id="email" value="<?=$data['employee']['email']?>">
        <span class="invalid-feedback"><?php echo $data['email_err'];?></span>
      </div>
      <div class="col-12 col-md-6">
        <label for="age" class="form-label">Yaş</label>
        <input type="number" name="age" min="18" max="80" class="form-control <?php echo (!empty($data['age_err']))?'is-invalid':'';?>" id="age" value="<?=$data['employee']['age']?>" placeholder="Yaş">
        <span class="invalid-feedback"><?php echo $data['age_err'];?></span>
      </div>
      
      <div class="col-12 col-md-4">
        <h5>
            İşçi statusu: 
            <?php
                if($data['employee']['admin']){
                    echo '<span class="badge bg-primary">Admin</span>';
                }else{
                    echo '<span class="badge bg-warning">İstifadəçi</span>';
                }
            ?>
        </h5>
       
      </div>
      <div class="col-12 col-md-4">
        <h5>
            Əmək haqqı: <?=$data['employee']['salary']?> &#8380;
        </h5>
      </div>
      <div class="col-12 col-md-4">
        <h5>
            Vəzifə: <?=$data['employee']['profession_name']?> 
        </h5>
        
      </div>
      
      
      <!-- blok, delete -->

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Saxla</button>
      </div>
      <input type="hidden" name="token" value="<?=$csrfToken?>">
    </form>
    </div>
    
    <hr>
    <div class="card p-3">
        <h4>Şifrəni yenilə</h4>
        <form class="row" id="updatePassword" method="post" action="/user/updatePassword" enctype="multipart/form-data">
            <div class="col-12 col-md-4">
                <label for="password" class="form-label">Hazırki Şifrə</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err']))?'is-invalid':'';?>" id="password">
                <span class="invalid-feedback"><?php echo $data['password_err'];?></span>
            </div>
            <div class="col-12 col-md-4">
                <label for="new_password" class="form-label">Yeni Şifrə</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($data['new_password_err']))?'is-invalid':'';?>" id="new_password">
                <span class="invalid-feedback"><?php echo $data['new_password_err'];?></span>
            </div>
            <div class="col-12 col-md-4">
                <label for="confirm_password" class="form-label">Şifrə təsdiqi</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err']))?'is-invalid':'';?>" id="confirm_password" >
                <span class="invalid-feedback"><?php echo $data['confirm_password_err'];?></span>
            </div>
            <div class="col-12 my-3">
                <button type="submit" class="btn btn-primary">Saxla</button>
            </div>
            <input type="hidden" name="token" value="<?=$csrfToken?>">
        </form>
    </div>
  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>