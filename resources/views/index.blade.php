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
                            <option value="1">Carl's JR</option>
                            <option value="2">Dairy Queen</option>
                        </select>

                        <label for="empresa">Tipo de Documento</label>
                        <select class="form-control" name="tipoDocumento" id="tipoDocumento">
                            <option value="56">56 - Ingreso Bancario Panamericano</option>
                            <option value="57">57 - Egreso Comisiones - IVA</option>
                            <option value="58">58 - Ingreso Bancario Tarjetas</option>
                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-blocked btn-success" onclick="consultar()">Consultar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped py-3" id="tabla_actualizacion">
                    <thead class="table-dark">
                        <tr>
                            <th>Folio</th>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Numero Póliza</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <br><br>
                <div class="text-end">
                    <button class="btn btn-primary">Actualizar Datos</button>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script src="{{ asset('js/alertas.js') }}"></script>
    <script src="{{ asset('/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

</body>

</html>