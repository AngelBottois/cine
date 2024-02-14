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
        <div class="container h-[592px] px-[100px] pt-[70px] pb-[50px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <div class="">
                <a href="index.php?ctl=listadoA" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
            </div>
            <h2 class="pb-[12px]">Añadir actor</h2>
            <form action="index.php?ctl=addActor" method="post" enctype="multipart/form-data">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $_SESSION['resguardo']['nombre'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <label for="tipo">Rol desempeñado</label>
                <select name="tipo" id="tipo" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                    <option value="Actor">Actor</option>
                    <option value="Actriz">Actriz</option>
                    <option value="Director">Director</option>
                </select>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <p class="text-white mb-[20px]"><?= $_SESSION['error']; ?></p>
                <input type="submit" value="Confirmar" class="block w-[100%] bg-rosa mb-[7px] px-[80px] py-[10px] rounded-[7px]">
            </form>
        </div>
    </main>
</body>
</html>