<?php require_once ('header.php');
if ($logueado == 0) {
    redirect('index.php');
}elseif ($logueado == 1) {
    $user = $repoUser->buscarUser("user", $_SESSION["user"]);
    if ($_POST && isset($_POST["cambiarDatos"])) { ?>
        <div class="profile square flex-row-center">
            <h1>Cambiar Datos</h1>
        <form id="cambiarDatos" class="flex-row-center" action="<?=$actual?>" method="post" enctype="multipart/form-data">
            <div class="campo">
                <input type="text" name="user" placeholder=<?=$user["user"]?>>
            </div>
            <div class="campo">
                <input type="email" name="mail" placeholder=<?=$user["mail"]?>>
            </div>
            <div class="campo">
                <input type="password" name="pass" placeholder="*****">
            </div>
            <div class="campo">
                <input type="password" name="cpass" placeholder="Introducir Contraseña">
            </div>
            <div class="campo">
                <button type="submit" name="cambiarDatos">Cambiar Datos</button>
            </div>
        </form>
        </div>
    <?php } else {?>
<div class="profile square flex-row-center">
    <h1>Datos</h1>
    <ul>
        <li><p>User: </p><?=$user["user"]?></li>
        <li><p>Mail: </p><?=$user["mail"]?></li>
        <li><p>Pass: </p>*******</li>
    </ul>
    <form class="campo" action="<?=$actual?>" method="post">
        <button type="submit" name="cambiarDatos">Cambiar Datos</button>
    </form>
</div>

<?php
} }
 require_once('footer.php'); ?>
