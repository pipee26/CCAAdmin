

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stylelogin.css">
    <script src="validar.js"></script>
    <title>Document</title>
</head>

<body>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="imglogin/canaco.png" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Inicio de Sesion</h5>
            <form action="logeo.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Ingrese Nombre De Usuario</label>
                    <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Usuario..">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ingrese Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Contraseña..">
                </div>

                <button type="submit" class="btn btn-primary" name="btnlogin">Ingresar</button>
            </form>
        </div>
    </div>

</body>

</html>