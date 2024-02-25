<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayOn</title>
    <link rel="stylesheet" href="./utiles/css/dist/output.css" type="text/css" />
</head>
<body class="container max-w-screen-xxl mx-auto bg-fondohf text-white">
    <?php include './app/vista/inicio-header.php'; ?>
    <main class="container max-w-screen-2xl bg-fondo pb-[55px]">
        <section class="container max-w-screen-xl mt-[16px] pt-[30px]">
            <h1 class="text-[30px]">Buscar peliculas</h1>
        </section>
        <section class="container max-w-screen-xl mt-[16px] pt-[30px]">
            <label for="buscador" class="text-[20px]">Buscador</label>
            <input type="text" name="buscador" id="buscador" placeholder="Introduce el título de la película" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] mt-[20px] py-[16px] bg-slate-700">
        </section>
        <section class="container max-w-screen-xl mt-[16px] pt-[30px] grid grid-cols-6 gap-x-[40px] gap-y-[158.21px]">
            <?php foreach($_SESSION['admin']['peliculas'] as $indice => $pelicula) { ?>
            <div class="w-[200px] h-[296px]"><a href="index.php?ctl=pelicula&p=<?= $pelicula['id'] ?>"><img src="utiles/img/back/peliculas/<?= $pelicula['cartel'] ?>" alt="cartelera" class="w-[100%] h-[100%] rounded-[12px]"></a></div>
            <?php } ?>
        </section>
    </main>
    <?php include './app/vista/inicio-footer.php'; ?>
</body>
</html>