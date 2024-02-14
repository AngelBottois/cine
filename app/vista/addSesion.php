<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link rel="stylesheet" href="./utiles/css/dist/output.css" type="text/css" />
</head>
<body class="container max-w-screen-xxl mx-auto bg-fondohf text-white">
    <header class="container max-w-screen-2xl mt-[16px] mb-[10px]">
        <a href="index.php?ctl=inicio"  class="w-[100px]"><img src="./utiles/img/front/logo.svg" alt="logo"></a>
    </header>
    <main class="container max-w-screen-2xl h-[665px] pt-[47px] pb-[51px] px-[500px] bg-fondoImg">
        <div class="container h-[592px] px-[100px] pt-[30px] pb-[50px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <div class="">
                <a href="index.php?ctl=listadoA" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
            </div>
            <h2 class="pb-[12px]">Añadir sesión</h2>
            <form action="index.php?ctl=addSesion" method="post">
                <input type="date" name="fecha" id="fecha" placeholder="Fecha" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <label for="hora">Hora</label>
                <select name="hora" id="hora" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <option value="1">17:00</option>
                    <option value="2">20:00</option>
                    <option value="3">23:00</option>
                </select>
                <label for="sala">Sala</label>
                <select name="sala" id="sala" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <option value="1">Sala 3D</option>
                    <option value="2">Sala VIP</option>
                </select>
                <input type="number" name="precio" id="precio" placeholder="Precio" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input list="peliculas" id="pelicula" name="pelicula" placeholder="Introduce una pelicula" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form"/>
                    <datalist id="peliculas">
                        <?php foreach($_SESSION['admin']['peliculas'] as $pelicula){ ?>
                            <option value="<?= $pelicula['nombre'] ?>"><?= $pelicula['id'] ?></option>
                        <?php } ?>
                    </datalist>
                <input type="submit" value="Confirmar" class="block w-[100%] bg-rosa mb-[7px] px-[80px] py-[10px] rounded-[7px]">
            </form>
        </div>
    </main>
    <script src="./utiles/js/fecha.js"></script>
</body>
</html>