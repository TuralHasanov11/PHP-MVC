<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>

  <div class="container py-4">
    <div class="bg-light p-3 my-3 border-bottom">
        <h3 class="">Vəzifələr</h3>
    </div>
    <a href="/professions/create" class="btn btn-primary">Vəzifə əlavə et</a>
    <hr>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Vəzifə</th>
          <!-- <th scope="col">İşçi sayı</th> -->
          <th scope="col">Əməliyyatlar</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($data['professions'] as $key => $profession) {
            ?>
              <tr>
                <th scope="row"><?=$profession['id'];?></th>
                <td><?=$profession['name'];?></td>
                
                <td>
                    <a href="/professions/show/<?=$profession['id']?>" class="btn btn-info"><i class="bi bi-pencil-square"></i> Edit</a>
                </td>
              </tr>
            <?php
          }
        ?>
      </tbody>
    </table>
    </div>


  </div>

  <?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>