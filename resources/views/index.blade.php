<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


    <title>Index</title>
</head>

<body>

    <div class="container-fluid">
        <br>
        <div class="row">
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
                        <input class="form-control" type="date" name="desde" id="desde">
                        <br>
                        <label for="hasta">Fecha fin</label>
                        <input class="form-control" type="date" name="hasta" id="hasta">
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-blocked btn-success">Consultar</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-striped py-3" id="tabla_actualizacion">
                    <thead class="table-dark">
                        <tr>
                            <th>Folio</th>
                            <th>Importe</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>Doe</td>
                            <td>john@example.com</td>
                        </tr>
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

    <script>
        const table = $("#tabla_actualizacion").DataTable({
            dom: "frtip",
            ordering: true,
            searching: true,
            paging: true,
            lengthMenu: [15],
            language: {
                url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json", // Reemplaza 'Spanish' por el idioma deseado
            },
        });
    </script>
</body>

</html>