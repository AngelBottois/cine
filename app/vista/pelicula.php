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
    <main class="container max-w-screen-2xl pb-[55px]">
        <section class="container max-w-screen-2xl h-[673px] pb-[46px] mb-[50px] mt-[12px] rounded-[20px] grid content-between bg-cover" style="background-image: url('utiles/img/back/peliculas/<?= $_SESSION['admin']['pelicula']['cartel'] ?>');">
            <div class="h-[673px] w-[100%] px-[34.75px] grid content-between bg-gradient-to-r from-black">
                <div>
                    <a href="buscador" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
                </div>
                <div>
                    <h1 class="text-[60px] mb-[30px]"><?= $_SESSION['admin']['pelicula']['nombre'] ?></h1>
                    <ul class="container flex gap-[30px] text-[12px] mb-[28px]">
                        <li class="text-gray"><?= $_SESSION['admin']['pelicula']['clasificacion_edad'] ?></li>
                        <li class="text-gray"><?= $_SESSION['admin']['pelicula']['genero_id'] ?></li>
                    </ul>
                    <p class="mb-[16px] w-[320px]"><?= $_SESSION['admin']['pelicula']['argumento'] ?></p>
                    <p class="mb-[16px]">Director: </p>
                    <p>Actores: </p>
                </div>
                <?php 
                $act = '';
                isset($_SESSION['loggeado']) ? $act='ctl=sesion&s='.$_SESSION['admin']['pelicula']['id'] : $act='ctl=login' ; 
                ?>
                <form action="index.php?<?= $act ?>" method="post">
                    <div class="w-[400px]">
                        <select name="sesiones" id="sesiones" class="w-[100%] mb-[17px] rounded-[5px] pl-[21px] py-[16px] bg-gray ">
                            <?php foreach($_SESSION['admin']['pelicula']['sesiones'] as $sesion){ ?>
                                <option value="<?= $sesion['fecha'] ?>" class="text-black"><?= $sesion['fecha'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="flex">
                        <button class="px-[45px] py-[14px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href="#">Trailer</a></button>
                        <input type="submit" value="Comprar" class="px-[45px] cursor-pointer py-[14px] text-center bg-rosa rounded-[6.25px]">
                        <img src="./utiles/img/front/like.svg" alt="like" class="ml-[41px] mr-[15px]">
                        <img src="./utiles/img/front/guardado.svg" alt="guardar">
                    </div>
                </form>
            </div>
        </section>    
        <section class="container max-w-screen-2xl px-[34.75px] pb-[50px] bg-fondo rounded-[18px]">
            <h2>Recomendaciones</h2>
            <div class="grid grid-cols-5 gap-[40px] mt-[20px]">
                <a href="#"><img src="./utiles/img/front/rec1.svg" alt="recomendacion"></a>
                <a href="#"><img src="./utiles/img/front/rec2.svg" alt="recomendacion"></a>
                <a href="#"><img src="./utiles/img/front/rec3.svg" alt="recomendacion"></a>
                <a href="#"><img src="./utiles/img/front/rec4.svg" alt="recomendacion"></a>
                <a href="#"><img src="./utiles/img/front/rec5.svg" alt="recomendacion"></a>
            </div>
        </section>
    </main>
    <?php include './app/vista/inicio-footer.php'; ?>
</body>
</html>