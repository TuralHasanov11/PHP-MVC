<?php $csrfToken=Token::generate();?>

<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>
  
  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class=""><?=$data['employee']['first_name'].' '.$data['employee']['last_name']?></h3>
    </div>
    <div class="card p-3">
    <form class="row g-3" action="/employees/update/<?=$data['employee']['id']?>" method="POST">
      <div class="col-12 col-md-6">
        <label for="fname" class="form-label">Ad</label>
        <input type="text" name="first_name" class="form-control" id="fname" value="<?=$data['employee']['first_name']?>" placeholder="Ad">
      </div>
      <div class="col-12 col-md-6">
        <label for="lname" class="form-label">Soyad</label>
        <input type="text" name="last_name" class="form-control" id="lname" value="<?=$data['employee']['last_name']?>" placeholder="Soyad">
      </div>
      <div class="col-12 col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="<?=$data['employee']['email']?>">
      </div>
      <div class="col-12 col-md-6">
        <label for="age" class="form-label">Yaş</label>
        <input type="number" name="age" min="18" max="80" class="form-control" id="age" value="<?=$data['employee']['age']?>" placeholder="Yaş">
        <span class="invalid-feedback"><?php echo $data['age_err'];?></span>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" name="admin" type="checkbox" id="admin" <?=$data['employee']['admin']?'checked':'';?> value="admin">
          <label class="form-check-label" for="admin">
            Admin
          </label>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <label for="profession" class="form-label">Vəzifə</label>
        <select id="profession" name="profession" class="form-select"> 
          <?php 
            foreach ($data['professions'] as $key => $profession) {
              ?>
                <option value="<?=$profession['id'];?>" <?php if($profession['id'] === $data['employee']['profession_id']){
                    echo "selected";
                  }?>> <?=$profession['name']?>
                </option>
              <?php
            }
          ?>
        </select>
      </div>
      <div class="col-12 col-md-6">
        <label for="salary" class="form-label">Əmək haqqı</label>
        <input type="number" name="salary" class="form-control" id="salary" value="<?=$data['employee']['salary']?>">
      </div>
      
      <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Dəyişiklik et</button>
      </div>
      <input type="hidden" name="token" value="<?=$csrfToken?>">
    </form>

    <hr>
      
      <div class="form-group my-2">
        
        <?php
          if($data['employee']['blocked']){
            ?>
              <button type="button" class="btn btn-info mx-1" data-bs-toggle="modal" data-bs-target="#blockModal">
                <i class="bi bi-x-circle-fill"></i> Blokdan çıxar
              </button>
            <?php
          }else{
            ?>
              <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#blockModal">
                <i class="bi bi-x-circle-fill"></i> Blokla
              </button>
            <?php
          }
        ?>

        <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal">
            <i class="bi bi-trash-fill"></i> İstifadəçini sil
        </button>
       

        <div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
              <h5 class="text-center"><?=$data['employee']['blocked']?"İstifadəçini blokdan çıxarmaq istədiyinizə əminsinizmi?":"İstifadəçini bloklamaq istədiyinizə əminsinizmi?"?></h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                <form action="/employees/<?=$data['employee']['blocked']?"unblock":"block"?>/<?=$data['employee']['id']?>" method="POST">
                  <button type="submit" class="btn <?=$data['employee']['blocked']?"btn-info":"btn-warning"?>"><i class="bi bi-x-circle-fill"></i> 
                    <?=$data['employee']['blocked']?"Blokdan çıxar":"Blokla"?>
                  </button>
                  <input type="hidden" name="token" value="<?=$csrfToken?>">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <h5 class="text-center">İstifadəçini silmək istədiyinizə əminsinizmi?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bağla</button>
                <form action="/employees/destroy/<?=$data['employee']['id']?>" method="POST">
                  <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i> İstifadəçini sil</button>
                  <input type="hidden" name="token" value="<?=$csrfToken?>">
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

     

    </div>


      
  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>