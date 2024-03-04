<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">

    <title>Index</title>
</head>

<body>


    <div class="container-fluid">
        
        <div class="row bg-dark">
            <div class="col-md-12 text-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <img src="{{asset('img/salir.png')}}" style="width: 30px; height: 30px;" alt="Actualizar" class="img-fluid mr-2"> Salir
                    </button>
                </form>
            </div>
        </div>
        <br>
        <div class="row">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <div class="text-center">
                <h2>Consulta y Actualizacion de Información</h2>
            </div>
            <div class="col-md-2">
            </div>
            <div class="col-md-2 py-5">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">Busca por fecha</h5>
                    </div>
                    <div class="card-body">
                        <label for="desde">Fecha inicio</label>
                        <input class="form-control py-2" type="date" name="desde" id="desde">

                        <label for="hasta">Fecha fin</label>
                        <input class="form-control" type="date" name="hasta" id="hasta">

                        <label for="empresa">Empresa</label>
                        <select class="form-control py-2" name="empresa" id="empresa">
                            <option value="">-- Selecciona una empresa --</option>

                            <option value="1">Carl's JR</option>
                            <option value="2">Dairy Queen</option>
                            <option value="3">5aSec</option>
                        </select>

                        <label for="empresa">Tipo de Documento</label>
                        <select class="form-control" name="tipoDocumento" id="tipoDocumento">

                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-blocked btn-success" onclick="consultar()">Consultar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-striped py-3" id="tabla_actualizacion">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 50px;">Folio</th>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    <th style="width: 115px;">Numero Póliza</th>
                                    <th style="width: 100px;">Total</th>
                                    <th style="width: 115px;">Metodo Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                <br><br>
                <div class="text-end">
                    <button class="btn btn-primary" onclick="actualizar()">Actualizar Datos</button>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="{{ asset('js/alertas.js') }}"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

</body>

</html>