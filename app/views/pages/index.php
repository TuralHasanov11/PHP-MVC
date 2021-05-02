<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/header.php'; ?>

<div class="container py-4">
    <div class="bg-light p-3">
        <h1 class="display-4">Xoş gəlmisiniz!</h1>
        <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure, vitae.</p>
        <hr class="my-4">
        <p class="lead">
            <?=!auth()?'<a class="btn btn-primary btn-lg" href="/login">Hesabınıza daxil olun!</a>':''?>
        </p>
    </div>
  
</div>

<?php require dirname($_SERVER['DOCUMENT_ROOT']).'/app/views/inc/footer.php'; ?>