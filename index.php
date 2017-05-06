<?php require_once ('header.php');
if ($logueado == 0) { ?>

    <div class="forms square flex-row-center">
        <div class="opciones">
            <div id="login" class="flex-row-center" onclick="toggle_login()">
                <p>LOGIN</p>
            </div>
            <div id="register" class="flex-row-center" onclick="toggle_registro()">
                <p>REGISTRO</p>
            </div>
        </div>
        <div class="formulario flex-column-center">
            <form id="loguearse" class="flex-row-center" action="index.php" method="post">
                <div class="campo">
                    <input type="text" name="user" placeholder="Usuario">
                </div>
                <div class="campo">
                    <input type="password" name="pass" placeholder="Password">
                </div>
                <div class="campo">
                    <button type="submit" name="login">Loguearse</button>
                </div>
            </form>
            <form id="registro" class="flex-row-center" action="index.php" method="post">
                <div class="campo">
                    <input type="text" name="user" placeholder="Usuario">
                </div>
                <div class="campo">
                    <input type="email" name="mail" placeholder="Correo">
                </div>
                <div class="campo">
                    <input type="password" name="pass" placeholder="Password">
                </div>
                <div class="campo">
                    <button type="submit" name="register">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <?php } elseif ($logueado == 1) {?>
        <div class="user square flex-row-center">
            <div class="user-info">
                <div class="avatar">
                        <a href="#"><img id="avatar" src="<?php echo avatar(); ?>" alt="Avatar"></a>
                </div>
                <div class="username">
                    <p><?=$_SESSION["user"]?></p>
                </div>
            </div>
            <div class="user-actions">
                <div class="deslog">
                    <form action="<?=$actual?>" method="post">
                        <button type="submit" name="logout">Salir</button>
                    </form>
                </div>
                <div class="cambiar-avatar">
                    <form action="<?=$actual?>" method="post" enctype="multipart/form-data">
                        <input type="file" name="imagen" id="imagen">
                        <button type="submit" name="avatar">Cambiar Avatar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="noticias square flex-row-center">
            <p>noticias</p>
        </div>
        <div class="jugar square flex-row-center">
            <a href="jugar.php">JUGAR</a>
        </div>

        <?php } ?>





        <?php include_once('footer.php') ?>
