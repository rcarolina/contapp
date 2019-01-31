<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Encabezado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">

</head>
<body>
    <div style="text-align:center;">
        <img src="http://icons.iconarchive.com/icons/chanut/role-playing/128/Centaur-icon.png">
        <h2 style="font-family: 'Mukta', sans-serif;">Bienvenido a CONTAPP</h2>
        <div style="margin: 0 auto;text-align:center;width:400px; font-family: 'Mukta', sans-serif; border:1px #ccc solid;padding:40px;">
        <?=$mensaje?><br>
        <a href="<?=$url?>"><?=$url?></a>
        <br><br>
        <a href="<?=$url?> " style="color:#fff;background-color:#000;text-decoration:none;font-family: 'Mukta', sans-serif; border:1px #000 solid;padding-left:30px;padding-right:30px;padding-top:6px;padding-bottom:6px;"><?=$boton?> </a>
        </div>
    </div>
</body>
</html>