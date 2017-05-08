<?php if ($actual != "jugar.php") {?>
<div class="user square flex-row-center">
    <div class="user-info">
        <div class="avatar">
                <a href="avatar.php"><img id="avatar" src=<?=avatar() . "?"?> alt="Avatar"></a>
        </div>

    </div>
    <div class="user-actions flex-row-center">
        <div class="user-actions-1 flex-row-center">
            <p>Hola, <a href="profile.php"><?=$_SESSION["user"]?></a>!</p>
        </div>
        <div class="user-actions-2 flex-row-center">
            <form action="<?=$actual?>" method="post">
                <button type="submit" name="logout">Logout</button>
            </form>
        </div>
        <div class="user-actions-3 flex-row-center">
            <ul>
                <li>Menu</li>
            </ul>
        </div>
        <div class="user-actions-4 flex-row-center">
            <ul>
                <a href="jugar.php"><li>Jugar</li></a>
            </ul>
        </div>
    </div>
</div>
<?php } else { ?>
    <div class="user-small square flex-row-center">
        <div class="user-info">
            <div class="avatar">
                    <a href="avatar.php"><img id="avatar" src=<?=avatar() . "?" ?> alt="Avatar"></a>
            </div>

        </div>
        <div class="user-actions-small flex-row-center">
            <div class="user-actions-small-1 flex-row-center">
                <p><a href="profile.php"><?=$_SESSION["user"]?></a></p>
            </div>
            <div class="user-actions-small-2 flex-row-center">
                <form action="<?=$actual?>" method="post">
                    <button type="submit" name="logout" id="logout">Logout</button>
                </form>
            </div>
            <div class="user-actions-small-3 flex-row-center">
                <ul>
                    <li>Menu</li>
                </ul>
            </div>
            <div class="user-actions-small-4 flex-row-center">
            </div>
        </div>
    </div>
<?php } ?>
