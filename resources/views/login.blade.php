<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/login.css">
    <!-- Bootstrap CSS -->
    
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">


    <title>Ingresar</title>
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img class="img-fluid" src="{{asset('img/actualizar.png')}}" alt="">
        </div>
        <div class="text-center mt-4 name">
            Actualizacion de información
        </div>
    
        <form class="p-3 mt-3" action="{{ route('validar') }}" method="POST">
            @csrf
            @if ($errors->has('usuario'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('usuario') }}
            </div>
            @endif
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="usuario" id="usuario" placeholder="Correo">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Contraseña">
            </div>
            <button class="btn mt-3" type="submit">Ingresar</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">© Grupo KUALE -</a> <a href="#">Api</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>



</body>

</html>