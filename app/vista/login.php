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
    <main class="container max-w-screen-2xl h-[665px] pt-[84px] pb-[90px] px-[500px] bg-fondoImg">
        <div class="container h-[516px] px-[100px] pt-[113px] pb-[112px] bg-blur backdrop-blur-[10px] rounded-[15px]">
            <h2 class="pb-[12px]">Login</h2>
            <form action="index.php?ctl=login" method="post">
                <input type="email" name="mail" id="mail" placeholder="Email" value="<?= $_SESSION['resguardo']['email'] ?>" class="w-[100%] mb-[17px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <input type="password" name="pass" id="pass" placeholder="Password" class="w-[100%] mb-[27px] rounded-[5px] pl-[21px] py-[16px] bg-form">
                <p class="text-white mb-[20px]"><?= $_SESSION['error']; ?></p>
                <input type="submit" value="Entrar" class="block w-[100%] bg-rosa mb-[7px] px-[80px] py-[10px] rounded-[7px]">
            </form>
            <div class="container grid grid-cols-1 justify-items-end">
                <p><a href="index.php?ctl=recuperar-pass">¿Has olvidado la contraseña?</a></p>
                <p><a href="register">¿No tienes cuenta? Registrate!</a></p>
            </div>
        </div>
    </main>
</body>
</html>