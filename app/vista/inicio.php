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
        <!-- Primera sección -->
        <section class="container max-w-screen-xl mt-[16px] pt-[30px]">
            <h1 class="text-[30px]">Cartelera</h1>
            <button class="text-[18px] mt-[15px] mr-[27px] pt-[8px] pb-[11px] pr-[15px] pl-[19px] bg-gray rounded-[6.27px]"><a href="#">En cartelera</a></button>
            <button class="text-[18px] mr-[27px] pt-[8px] pb-[11px] pr-[15px] pl-[19px] bg-gray2 rounded-[6.27px]"><a href="#">Próximamente</a></button>
        </section>
        <!-- Segunda sección -->
        <section class="container max-w-screen-[1400px] h-[780px] bg-guardianes bg-no-repeat">
        </section>
        <!-- Tercera sección -->
        <section class="container grid grid-cols-1 max-w-screen-xl mt-[28px]">
            <!-- Dos primeras peliculas -->
            <div class="container grid grid-cols-2 gap-[55px] mb-[84px]">
                <!-- Primera -->
                <div class="container px-[31.5px] pt-[35px] pb-[28px] bg-pelis rounded-[15.8px]">
                    <div class="mb-[28px]"><img src="./utiles/img/front/fast.svg" alt="fast"></div>
                    <div class="container grid grid-cols-2 mb-[37px]">
                        <ul class="container flex gap-[30px] text-[12px] text-gray">
                            <li class="bg-gray border rounded-[3px] px-[4.5px] py-[1px] border-none font-semibold text-white">9.5</li>
                            <li>2023</li>
                            <li>Action movie</li>
                            <li>2:21</li>
                            <li>16+</li>
                        </ul>
                        <p class="text-end text-gray">Director: <span class="text-white">Louis Leterrier</span></p>
                    </div>
                    <div class="container flex justify-between">
                        <div>
                            <button class="px-[45px] py-[14px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href="">Trailer</a></button>
                            <button class="px-[45px] py-[14px] text-center bg-rosa rounded-[6.25px]"><a href="">Comprar</a></button>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="./utiles/img/front/like.svg" alt="like">
                            <img src="./utiles/img/front/guardado.svg" alt="guardar">
                        </div>
                    </div>
                </div>
                <!-- Segunda -->
                <div class="container px-[31.5px] pt-[35px] pb-[28px] bg-pelis rounded-[15.8px]">
                    <div class="mb-[28px]"><img src="./utiles/img/front/air.svg" alt="air"></div>
                    <div class="container grid grid-cols-2 mb-[37px]">
                        <ul class="container flex gap-[30px] text-[12px] text-gray">
                            <li class="bg-gray border rounded-[3px] px-[4.5px] py-[1px] border-none font-semibold text-white">7.5</li>
                            <li>2023</li>
                            <li>Drama</li>
                            <li>1:52</li>
                            <li>16+</li>
                        </ul>
                        <p class="text-end text-gray">Director: <span class="text-white">Ben Affleck</span></p>
                    </div>
                    <div class="container flex justify-between">
                        <div>
                            <button class="px-[45px] py-[14px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href="">Trailer</a></button>
                            <button class="px-[45px] py-[14px] text-center bg-rosa rounded-[6.25px]"><a href="">Comprar</a></button>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="./utiles/img/front/like.svg" alt="like">
                            <img src="./utiles/img/front/guardado.svg" alt="guardar">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tres siguientes peliculas -->
            <div class="container grid grid-cols-3 gap-[58px]">
                <!-- Primera -->
                <div class="container px-[32.5px] pt-[23px] pb-[20px] bg-pelis rounded-[15.8px]">
                    <div class="mb-[18px]"><img src="./utiles/img/front/sirena.svg" alt="mermaid"></div>
                    <div class="container mb-[37px]">
                        <ul class="container flex gap-[35px] text-[12px] text-gray">
                            <li class="bg-gray border rounded-[3px] px-[4.5px] py-[1px] border-none font-semibold text-white">6.5</li>
                            <li>2023</li>
                            <li>Fantasy</li>
                            <li>2:15</li>
                            <li>6+</li>
                        </ul>
                        <p class="mt-[26px] text-gray">Director: <span class="text-white">Rob Marshall</span></p>
                    </div>
                    <div class="container flex justify-between">
                        <div>
                            <button class="px-[36.5px] py-[11px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href="">Trailer</a></button>
                            <button class="px-[26.5px] py-[11px] text-center bg-rosa rounded-[6.25px]"><a href="">Comprar</a></button>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="./utiles/img/front/like.svg" alt="like">
                            <img src="./utiles/img/front/guardado.svg" alt="guardar">
                        </div>
                    </div>
                </div>
                <!-- Segunda -->
                <div class="container px-[32.5px] pt-[23px] pb-[20px] bg-pelis rounded-[15.8px]">
                    <div class="mb-[18px]"><img src="./utiles/img/front/onion.svg" alt="onion"></div>
                    <div class="container mb-[37px]">
                        <ul class="container flex gap-[35px] text-[12px] text-gray">
                            <li class="bg-gray border rounded-[3px] px-[4.5px] py-[1px] border-none font-semibold text-white">8.5</li>
                            <li>2023</li>
                            <li>Detective</li>
                            <li>2:19</li>
                            <li>16+</li>
                        </ul>
                        <p class="mt-[26px] text-gray">Director: <span class="text-white">Ryan Johnson</span></p>
                    </div>
                    <div class="container flex justify-between">
                        <div>
                            <button class="px-[36.5px] py-[11px] text-center bg-gray rounded-[5.61px] mr-[24px] font-semibold"><a href="">Trailer</a></button>
                            <button class="px-[26.5px] py-[11px] text-center bg-rosa rounded-[6.25px]"><a href="">Comprar</a></button>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="./utiles/img/front/like.svg" alt="like">
                            <img src="./utiles/img/front/guardado.svg" alt="guardar">
                        </div>
                    </div>
                </div>
                <!-- Tercera -->
                <div class="container px-[32.5px] pt-[23px] pb-[20px] bg-pelis rounded-[15.8px]">
                    <div class="mb-[18px]"><img src="./utiles/img/front/65.svg" alt="65"></div>
                    <div class="container mb-[37px]">
                        <ul class="container flex gap-[35px] text-[12px] text-gray">
                            <li class="bg-gray border rounded-[3px] px-[4.5px] py-[1px] border-none font-semibold text-white">7.5</li>
                            <li>2023</li>
                            <li>Fantasy</li>
                            <li>1:30</li>
                            <li>16+</li>
                        </ul>
                        <p class="mt-[26px] text-gray">Director: <span class="text-white">Skot Beyk</span></p>
                    </div>
                    <div class="container flex justify-between">
                        <div>
                            <button class="px-[36.5px] py-[11px] text-center bg-gray rounded-[5.61px] mr-[24px]"><a href="">Trailer</a></button>
                            <button class="px-[26.5px] py-[11px] text-center bg-rosa rounded-[6.25px]"><a href="">Comprar</a></button>
                        </div>
                        <div class="flex gap-[15px]">
                            <img src="./utiles/img/front/like.svg" alt="like">
                            <img src="./utiles/img/front/guardado.svg" alt="guardar">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Cuarta sección -->
        <section class="container max-w-screen-xl h-[684.49px] bg-lambo pl-[47px] pb-[20.26px] flex items-end">
            <div class="grid grid-cols-2 items-center">
                <p class="inline text-[105px]">PLAY</p>
                <button class=""><a href="#"><img src="./utiles/img/front/like.svg" alt="play" width="100px"></a></button>
            </div>
        </section>
        <!-- Quinta sección -->
        <section class="container max-w-screen-xl flex justify-center mt-[84.74px] py-[21px] bg-gray2 border border-gray rounded-[7px]">
            <p class="text-[30px]">Show more</p>
        </section>
    </main>
    <?php include './app/vista/inicio-footer.php'; ?>
</body>
</html>