<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>

     <!-- Estilos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- Botones boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="../../public/css/listar.css">
</head>
<body>
    <div class="container mt-3">
        <h3>Búsqueda de animales rescatados</h3>
        <a href="./index.php" class="btn btn-outline-success">Listar</a>
        <hr>
        <!-- BÚSQUEDA POR ID -->
        <h5>Búsqueda por ID</h5>
        <form action="" id="form-busqueda-id">
            <div class="mb-3">
                <label for="idbuscado">ID Buscado</label>
                <div class="input-group mb-3">
                    <input type="text" id="idbuscado" class="form-control">
                     <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
                </div>
                 
                <div class="row" id="animales-id">     
                    <!-- Card -->
                </div>
            </div>
        </form>
        <hr>


        <!-- BÚSQUEDA POR CONDICIÓN -->
        <h5>Búsqueda por Condición</h5>
        <form action="" id="form-busqueda-condicion">
            <div class="input-group mb-3">
                <select id="condicion" class="form-select">
                    <option value="">Selecciona</option>
                    <option value="Rescatado">Rescatado</option>
                    <option value="Tratamiento">Tratamiento</option>
                    <option value="Adopcion">Adopcion</option>
                    <option value="Adoptado">Adoptado</option>
                   </select>
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </div>

            <div class="row" id="animales-condicion">     
            <!-- Card -->
            </div>
        </form>
        <hr>

        <!-- BÚSQUEDA POR ESPECIE -->
        <h5>Búsqueda por Especie</h5>
        <form action="" id="form-busqueda-especie">
            <div class="input-group mb-3">
                <select id="especie" class="form-select">
                    <option value="">Selecciona</option>
                    <option value="Perro">Perro</option>
                    <option value="Gato">Gato</option>
                    <option value="Ave">Ave</option>
                    <option value="Conejo">Conejo</option>
                    <option value="Otro">Otro</option>
                   </select>
                <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
            </div>

            <div class="row" id="animales-especie">     
            <!-- Card -->
            </div>
        </form>

    </div>
    <!-- Funciones de javascript -->
    <script src="../../public/js/animal/renderizar-card.js"></script>
    <script src="../../public//js/animal/buscar-id.js"></script>
    <script src="../../public/js/animal/buscar-condicion.js"></script>
    <script src="../../public/js//animal/buscar-especie.js"></script>
</body>
</html>