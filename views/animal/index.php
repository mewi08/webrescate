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

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            function obtenerDatos(){
                const datos = new FormData()
                datos.append("operacion","listar")
                fetch('../../app/controllers/animal.controller.php',{
                    method:'POST',
                    body: datos
                })
                .then(response =>response.json())
                .then(data =>{
                    const tabla = document.querySelector("#tabla-animales tbody")
                    tabla.innerHTML=""
                    data.forEach(animal => {
                        tabla.innerHTML+=`
                        <tr>
                            <td>${animal.Rescatista}</td>
                            <td>${animal.nombre}</td>
                            <td>${animal.especie}</td>
                            <td>${animal.sexo}</td>
                            <td>${animal.condicion}</td>
                            <td>${animal.fecharescate}</td>
                            <td>${animal.lugar}</td>
                            <td>${animal.observaciones}</td>
                            <td>
                                <a href='./edicion.php?id=${animal.idanimal}' class='btn btn-sm btn-outline-info'>Editar</a>
                                <a href='#'data-id='${animal.idanimal}' class='btn btn-sm btn-outline-danger'>Eliminar</a>
                            </td>
                        </tr>`
                    });
                })
                .catch(e=>{
                    console.error(e)
                })
            }
            obtenerDatos()

            const tabla = document.querySelector("#tabla-animales")
                tabla.addEventListener("click",async(event)=>{
                if(event.target.classList.contains('btn-outline-danger')){
                    event.preventDefault()

                    const idanimal = event.target.dataset.id
                    if(confirm('¿Está seguro de eliminar el registro?')){
                        eliminarRegistro(idanimal)
                    }
                }
            })

            function eliminarRegistro(idanimal){
                const datos = new FormData()
                datos.append("operacion","eliminar")
                datos.append("idanimal",idanimal)
                fetch('../../app/controllers/animal.controller.php',{
                    method:'POST',
                    body: datos
                })
                .then(response => response.json())
                .then(data=>{
                    if(data.filas>0){
                        obtenerDatos()
                    }
                })
                .catch(e=>{
                        console.error(e)
                })
            }
        })
    </script>
</body>
</html>