<header class="container max-w-screen-2xl grid grid-cols-2 mt-[14px]">
    <div class="container flex items-center">
        <img src="./utiles/img/front/logo.svg" alt="logo" class="mr-[54.67px]">
        <ul class="grid grid-cols-4 gap-[50px]">
            <li><a href="#" class="text-[18px]">Perfil</a></li>
            <li><a href="buscador" class="text-[18px]">Peliculas</a></li>
            <li><a href="#" class="text-[18px]">Series</a></li>
            <li><a href="#" class="text-[18px]">Top</a></li>
        </ul>
    </div>
    <div class="container flex justify-end items-center gap-[25px]">
        <?php if(isset($_SESSION['loggeado'])){ ?>
            <a href="index.php?ctl=logout"><u>Cerrar Sesion</u></a>
            <a href="buscador"><img src="./utiles/img/front/lupa.svg" alt="buscar"></a>
            <a href="#"><img src="./utiles/img/front/campana.svg" alt="notificacion"></a>
            <p><?= $_SESSION['usuario']['nombre'] ?></p>
            <img src="./utiles/img/back/usuarios/<?= $_SESSION['usuario']['avatar'] ?>" alt="usuario" class="w-[30px] rounded-[10px]">
        <?php }else{ ?>
            <a href="buscador"><img src="./utiles/img/front/lupa.svg" alt="buscar"></a>
            <a href="#"><img src="./utiles/img/front/campana.svg" alt="notificacion"></a>
            <a href="<?= $_SESSION['dir'] ?>"><img src="./utiles/img/front/usuario.svg" alt="usuario"></a>
        <?php } ?>
    </div>
</header>