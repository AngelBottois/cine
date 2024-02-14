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
        <div>
            <a href="buscador" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
        </div>
        <form action="index.php?ctl=factura" method="post">
            <section class="w-[100%] bg-pelis grid grid-cols-2 py-[50px] px-[250px] rounded-[15px]">
                <div class="grid grid-rows-2 gap-[60px]">
                    <div>
                        <?php foreach($_SESSION['sala'] as $sala) { ?>
                        <button class="px-[45px] py-[14px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href=""><?= $sala['nombre'] ?></a></button>
                        <?php } ?>
                    </div>
                    <div>
                        <?php foreach($_SESSION['sesion'] as $sesion) { ?>
                        <button class="px-[45px] py-[14px] text-center bg-rosa rounded-[6.25px]"><a href=""><?= $sesion['hora'] ?></a></button>
                        <?php } ?>
                    </div>
                </div>
                <div>
                    <h1 class="text-[30px]">Sala - Hora</h1>
                    <p>Elige tus butacas</p>
                </div>
            </section>
            <section class="w-[100%] grid justify-items-center mt-[56px]">
                <div class="w-[1215px] grid justify-items-center">
                    <table>
                        <tr>
                        <?php
                        $_SESSION['sala'][0]['nombre'] == "Sala 3D" ? $limit = 21 : $limit = 18 ;
                        $count = 1; for($filas = 0; $filas < 8; $filas++){
                            for($columnas = 0; $columnas < $limit; $columnas++){ ?>
                            <td class="w-[55px] h-[55px] bg-butaca bg-center bg-no-repeat">
                                <label for="" class="grid items-center justify-items-center">
                                    <label for="butaca" class="text-center text-black"><?= $count ?></label>
                                    <input type="checkbox" name="butaca" id="butaca" hidden>
                                </label>
                            </td>
                            <?php $count++; }?> </tr><tr> <?php 
                        } ?>
                    </table>
                </div>
                <div class="w-[323px] grid grid-cols-3  mt-[65px] mb-[87px]">
                    <div class="grid justify-items-center">
                        <img src="./utiles/img/front/butaca.svg" alt="libre">
                        <p>Disponible</p>
                    </div>
                    <div class="grid justify-items-center">
                        <img src="./utiles/img/front/ocupada.svg" alt="ocupada">
                        <p>No disponible</p>
                    </div>
                    <div class="grid justify-items-center">
                        <img src="./utiles/img/front/selecionado.svg" alt="selecionada">
                        <p>Selecionada</p>
                    </div>
                </div>
            </section>
            <section class="w-[100%]">
                <input type="submit" value="Comprar" class="cursor-pointer text-center bg-rosa py-[21px] rounded-[7px] w-[100%]">
            </section>
        </form>
    </main>
    <?php include './app/vista/inicio-footer.php'; ?>
</body>
</html>