<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
     <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="   https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
   <div class="container mt-3">
        <h3>Edición de colaboradores</h3>
        <a href="./index.php" class="btn btn-outline-success">Listar</a>
        <hr>
        <form action="" id="formulario-editar">
            <div class="card">
                <div class="card-header">Formulario</div>
                <div class="card-body">

                    <div class="form-floating mb-2">
                            <input type="text" id="dni" class="form-control" required>
                            <label for="dni" class="form-label">DNI</label>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-6 g-2">
                            <div class="form-floating mb-2">
                                <input type="text" id="nombres" class="form-control" required>
                                <label for="nombres" class="form-label">Nombres</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="apellidos" class="form-control" required>
                                <label for="apellidos" class="form-label">Apellidos</label>
                            </div>
                        </div>
                    </div> 
                    <!-- .row -->

                    <div class="row g-2">
                        <div class="col-md-6 g-2">
                            <div class="form-floating mb-2">
                                <input type="text" id="telefono" class="form-control" required>
                                <label for="telefono" class="form-label">Teléfono</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" id="email" class="form-control" required>
                                <label for="email" class="form-label">Email</label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-outline-secondary" type="reset">Cancelar</button>
                </div>
            </div>
        </form>
   </div> 

   <script src="../../public/js/persona/edicion.js"></script>
</body>
</html>