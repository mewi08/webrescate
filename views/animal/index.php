<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>

    <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="   https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div>
            <h3>Mantenimiento de animales rescatados</h3>
            <p>Este módulo permitirá el listado, eliminación y edición</p>
            <a href="./crear.php" class="btn btn-sm btn-outline-success">Registrar</a>
            <a href="./buscar.php" class="btn btn-sm btn-outline-success">Buscar</a>
        </div>
        <hr>

        <div class="table-responsive">
            <table class="table table-sm table-striped" id="tabla-animales">
                <thead>
                    <tr>
                        <th>Rescatista</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Condición</th>
                        <th>Fecha Rescate</th>
                        <th>Lugar</th>
                        <th>Observaciones</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                <!-- Registros de la base de datos -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../public/js/animal/listar-eliminar.js"></script>

</body>
</html>