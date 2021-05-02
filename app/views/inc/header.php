<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo SITENAME;?></title> 
  
  <link rel="stylesheet" href="/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
</head>
<body>

   
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><?php echo SITENAME;?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="/">Ana səhifə</a>
          </li>
          <?php
              if(auth() && auth()['admin']){
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="/employees">İşçilər</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/professions">Vəzifələr</a>
                  </li>
                <?php
              }
          ?>
        </ul>
        <ul class="navbar-nav me-right mb-2 mb-lg-0">
          <?php
            if(auth()){
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?=auth()['first_name'].' '.auth()['last_name']?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                  <li><a class="dropdown-item" href="/user/profile">Profil</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/user/logout" method="post">
                      <button class="mx-2 btn btn-danger" type="submit"><i class="bi bi-box-arrow-right"></i> Çıxış</button>
                    </form>
                  </li>
                </ul>
              </li>
              <?php
            }else{
            ?>
              <li class="nav-item">
                  <a class="nav-link" href="/login">Daxil ol</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/register">Qeydiyyatdan keç</a>
              </li>
            <?php
            }
          ?>
          
        </ul>
      </div>
    </div>
  </nav>
