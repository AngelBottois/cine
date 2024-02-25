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
        <a href="inicio" class="w-[100px]"><img src="./utiles/img/front/logo.svg" alt="logo"></a>
    </header>
    <main class="container max-w-screen-2xl h-[665px] pt-[47px] pb-[51px] px-[500px] bg-fondoImg">
        <div class="container h-[592px] px-[100px] pt-[30px] pb-[50px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <div>
                <a href="login" class="block w-[25px]"><img src="./utiles/img/front/flecha.svg" alt="flecha"></a>
            </div>
            <h2 class="pb-[12px]">Registro</h2>
            <form action="index.php?ctl=register" method="post">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $_SESSION['resguardo']['nombre'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" value="<?= $_SESSION['resguardo']['apellidos'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input type="email" name="mail" id="mail" placeholder="Email" value="<?= $_SESSION['resguardo']['email'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input type="text" name="nif" id="nif" placeholder="NIF" value="<?= $_SESSION['resguardo']['nif'] ?>" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input type="password" name="pass" id="pass" placeholder="Password" class="w-[100%] mb-[14px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <div class="container flex justify-end text-[10px] mb-[14px]">
                    <input type="checkbox" name="terminos" id="terminos" class="mr-[3px]">
                    <label for="terminos" class="text-[14px]">He leido y acepto la <a href="#"><u>política de privacidad</u></a></label>
                </div>
                <p class="text-center"><?= $_SESSION['error'] ?></p>
                <input type="submit" value="Entrar" class="text-[22px] block w-[100%] bg-rosa mb-[7px] px-[80px] py-[10px] rounded-[7px]">
            </form>
        </div>
    </main>
</body>
</html>