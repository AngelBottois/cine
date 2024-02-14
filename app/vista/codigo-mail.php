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
        <div class="container h-[592px] px-[100px] pt-[113px] pb-[112px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <div class="">
                <a href="index.php?ctl=login"  class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
            </div>
            <h2 class="pb-[12px]">Código registro</h2>
            <form action="index.php?ctl=trylog" method="post">
                <input type="text" name="cod" id="cod" placeholder="Código" class="w-[100%] mb-[17px] rounded-[7px] pl-[21px] py-[16px] bg-form">
                <input type="submit" value="Confirmar" class="block w-[100%] bg-rosa px-[80px] py-[10px] rounded-[7px]">
            </form>
        </div>
    </main>
</body>
</html>