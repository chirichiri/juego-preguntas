<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado = 1) {

    $user = $repoUser->buscarUser("user", $_SESSION["user"]); ?>

    <div class="profile square flex-row-center">
        <h1>Cambiar Avatar</h1>
        <img src=<?=User::getAvatar() . "?"?> alt="Avatar" id="avatar">
        <form action="<?=$actual?>" method="post" enctype="multipart/form-data">
            <input type="file" name="imagen" id="imagen">
            <button type="submit" name="avatar">Cambiar Avatar</button>
        </form>
    </div>

    <?php }
 require_once('footer.php'); ?>
