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
        <section class="w-[100%] bg-pelis grid grid-cols-2 py-[30px] px-[30px] mb-[100px] rounded-[15px]">
            <h1 class="text-[30px]">Pagar entradas</h1>   
        </section>
        <section class="grid grid-cols-1 justify-items-center">
            <form action="index.php?ctl=genFac" method="post">
            <div class="grid justify-items-start w-[500px] h-[655px] bg-pelis rounded-[13px] px-[35px] pt-[25px] pb-[40px] border-[2px] border-gray gap-y-[20px]">
                <h2>Factura</h2>
                <div class="w-[100%] border-b-[2px] border-gray">
                    <p class="font-semibold">Numero de butacas</p>
                </div>
                <div class="w-[100%] border-b-[2px] border-gray">
                    <p class="font-semibold">Película</p>
                </div>
                <div class="w-[100%] border-b-[2px] border-gray">
                    <p class="font-semibold">Precio total a pagar</p>
                </div>
                <div>
                    <p class="font-semibold">Metodo de pago</p>
                </div>
                <span>
                    <input type="checkbox" name="sendEm" id="sendEm">
                    <label for="sendEm">Enviar factura al email</label>
                </span>
                <input type="submit" value="RESERVAR" class="text-yellow-600 text-center font-semibold bg-azul rounded-[8px] w-[100%] h-[70px] block text-[24px]">
            </div>
            </form>
        </section>
    </main>
    <?php include './app/vista/inicio-footer.php'; ?>
</body>
</html>