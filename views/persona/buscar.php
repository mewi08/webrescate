<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda</title>
      <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
      <!-- Botones boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-3">
        <h5>Búsqueda por ID</h5>
        <form action="" id="form-busqueda-id">
                <label for="idbuscado">ID Buscado</label>
                <div class="input-group">
                    <input type="text" id="idbuscado" class="form-control">
                     <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
                </div>
                
            <table class="table table-bordered mt-3" id="tabla-persona-id">
                <thead>
                     <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Registros -->
                </tbody>
            </table>
        </form>
        <hr>

        <h5>Búsqueda por DNI</h5>
        <form action="" id="form-busqueda-dni">
            <div class="mb-3">
                <label for="idbuscado">DNI Buscado</label>
                <div class="input-group">
                    <input type="text" id="dni" class="form-control">
                     <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Buscar</button>
                </div>
                
            </div>
            <table class="table table-bordered mt-3" id="tabla-persona-dni">
                <thead>
                     <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Registros -->
                </tbody>
            </table>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded",function(){
            function buscarPorId(){
                const datos = new FormData()
                datos.append("operacion","buscarPorId")
                datos.append("idpersona",document.querySelector("#idbuscado").value)

                fetch('../../app/controllers/persona.controller.php',{
                    method:'POST',
                    body:datos
                })
                    .then(response=>response.json())
                    .then(data=>{
                        const tabla = document.querySelector("#tabla-persona-id tbody")
                        tabla.innerHTML=""
                        data.forEach(element => {
                            tabla.innerHTML+=`
                            <tr>
                                <td>${element.dni}</td>
                                <td>${element.nombres}</td>
                                <td>${element.apellidos}</td>
                                <td>${element.telefono}</td>
                                <td>${element.email}</td>
                            </tr>`
                        });
                    })
                    .catch(e=>{
                        console.error(e)
                    })
            }

             function buscarPorDni(){
                const datos = new FormData()
                datos.append("operacion","buscarPorDni")
                datos.append("dni",document.querySelector("#dni").value)

                fetch('../../app/controllers/persona.controller.php',{
                    method:'POST',
                    body:datos
                })
                    .then(response=>response.json())
                    .then(data=>{
                        const tabla = document.querySelector("#tabla-persona-dni tbody")
                        tabla.innerHTML=""
                        data.forEach(element => {
                            tabla.innerHTML+=`
                            <tr>
                                <td>${element.nombres}</td>
                                <td>${element.apellidos}</td>
                                <td>${element.telefono}</td>
                                <td>${element.email}</td>
                            </tr>`
                        });
                    })
                    .catch(e=>{
                        console.error(e)
                    })
            }

            document.querySelector("#form-busqueda-id").addEventListener("submit", function(event){
                event.preventDefault()
                buscarPorId()
            })

            document.querySelector("#form-busqueda-dni").addEventListener("submit", function(event){
                event.preventDefault()
                buscarPorDni()
            })
        })
    </script>
</body>
</html>