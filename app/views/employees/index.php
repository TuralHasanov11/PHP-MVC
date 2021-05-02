<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>

  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">İşçilər</h3>
    </div>
    <a href="/employees/create" class="btn btn-primary">İşçi əlavə et</a>
    <hr>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Ad</th>
          <th scope="col">Soyad</th>
          <th scope="col">Yaş</th>
          <th scope="col">Email</th>
          <th scope="col">Hüquq</th>
          <th scope="col">Vəzifə</th>
          <th scope="col">Əmək haqqı (&#8380;)</th>
          <th scope="col">Status</th>
          <th scope="col">Əməliyyatlar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($data['employees'] as $key => $employee) {
            ?>
              <tr>
                <th scope="row"><?=$employee['id'];?></th>
                <td><?=$employee['first_name'];?></td>
                <td><?=$employee['last_name'];?></td>
                <td><?=$employee['age'];?></td>
                <td><?=$employee['email'];?></td>
                <td>
                  <?php
                    if($employee['admin']){
                      echo '<h5 class="badge bg-primary">Admin</h5>';
                    }else{
                      echo '<h5 class="badge bg-secondary">İstifadəçi</h5>';
                    }
                  ?>
                </td>
                <td><?=$employee['first_name'];?></td>
                <td><?=$employee['salary'];?></td>
                <td>
                  <?php
                    if($employee['blocked']){
                      echo '<h5 class="badge bg-danger">Bloklanıb</h5>';
                    }else{
                      echo '<h5 class="badge bg-success">Aktiv</h5>';
                    }
                  ?>
                </td>
                <td>
                    <a href="/employees/show/<?=$employee['id']?>" class="btn btn-info"><i class="bi bi-pencil-square"></i> Edit</a>
                </td>
              </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    </div>

    <nav>
      <ul class="pagination justify-content-center">
        
        <?php

          if($data['current_page']>1){
            ?>
              <li class="page-item">
                <a class="page-link" href="/employees?page=<?=$data['current_page']-1;?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
            <?php
          }          

          for ($i=1; $i <= $data['total_pages']; $i++) { 
            ?>
              <li class="page-item <?='active'?$i==$data['current_page']:'';?>">
               <a class="page-link" href="/employees?page=<?=$i;?>"><?=$i;?></a>
              </li>
            <?php
          }

          if($data['current_page']<$data['total_pages']){
            ?>
              <li class="page-item">
                <a class="page-link" href="/employees?page=<?=$data['current_page']+1;?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            <?php
          }
        ?>
        
      </ul>
    </nav>

  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>