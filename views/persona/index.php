<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>

    <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="   https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <!-- js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-3">
        <div>
            <h3>Mantenimiento de colaboradores</h3>
            <p>Este módulo permitirá el listado, eliminación y edición</p>
            <a href="./crear.php" class="btn btn-sm btn-outline-success">Registrar</a>
            <a href="./buscar.php" class="btn btn-sm btn-outline-success">Buscar</a>
        </div>
        <hr>

        <div class="table-responsive">
            <table class="table table-sm table-striped" id="tabla-personas">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Email</th>
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
        document.addEventListener("DOMContentLoaded",function(){
            function obtenerDatos(){
                const datos = new FormData()
                datos.append("operacion","listar")

                fetch('../../app/controllers/persona.controller.php', {
                    method:'POST',
                    body:datos
                })
                    .then(response=>response.json())
                    .then(data=>{
                        const tabla = document.querySelector("#tabla-personas tbody")
                        tabla.innerHTML=""
                        data.forEach(persona => {
                            tabla.innerHTML+=`
                            <tr>
                                <td>${persona.dni}</td>    
                                <td>${persona.nombres}</td>    
                                <td>${persona.apellidos}</td>    
                                <td>${persona.telefono}</td>    
                                <td>${persona.email}</td> 
                                <td>
                                    <a href='./editar.php?id=${persona.idpersona}' class='btn btn-sm btn-outline-info'>Editar</a>
                                    <a href='#'data-id='${persona.idpersona}' class='btn btn-sm btn-outline-danger'>Eliminar</a>
                                </td>   
                            </tr>`
                        });
                    })
                    .catch(e=>{
                    console.error(e)
                    })
            }obtenerDatos()
            const tabla = document.querySelector("#tabla-personas")
                tabla.addEventListener("click",async(event)=>{
                if(event.target.classList.contains('btn-outline-danger')){
                    event.preventDefault()

                    const idpersona = event.target.dataset.id
                    if(confirm('¿Está seguro de eliminar el registro?')){
                        eliminarRegistro(idpersona)
                    }
                }
            })

            function eliminarRegistro(idpersona){
                const datos = new FormData()
                datos.append("operacion","eliminar")
                datos.append("idpersona",idpersona)
                fetch('../../app/controllers/persona.controller.php',{
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