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

   <script>
        document.addEventListener("DOMContentLoaded",function(){
            let parametro = new URLSearchParams (location.search)
            let id = parametro.get('id')

           function buscarRegistro(idbuscado){
            const datos = new FormData()
            datos.append("operacion","buscarPorId")
            datos.append("idpersona",idbuscado)

            fetch('../../app/controllers/persona.controller.php',{
                method:'POST',
                body:datos
            })

            .then(response => response.json())
            .then(data=>{
                document.querySelector("#dni").value=data[0].dni
                document.querySelector("#nombres").value=data[0].nombres
                document.querySelector("#apellidos").value=data[0].apellidos
                document.querySelector("#telefono").value=data[0].telefono
                document.querySelector("#email").value=data[0].email           
            })
            .catch(e=>{
                console.error(e)
            })
            
           }

           document.querySelector("#formulario-editar").addEventListener("submit",function(event){
            event.preventDefault()

            if(confirm("¿Está seguro de actualizar el registro?")){
                actualizarRegistro()
            }
           })

           function actualizarRegistro(){
                const datos = new FormData()
                datos.append("operacion","actualizar")
                datos.append("dni",document.querySelector("#dni").value)
                datos.append("nombres", document.querySelector("#nombres").value )
                datos.append("apellidos", document.querySelector("#apellidos").value )
                datos.append("telefono", document.querySelector("#telefono").value )
                datos.append("email", document.querySelector("#email").value )
                datos.append("idpersona",id)
                fetch('../../app/controllers/persona.controller.php',{
                    method:'POST',
                    body: datos
                })

                .then(response => response.json())
                .then(data=>{
                    if(data.filas>0){
                        document.querySelector("#formulario-editar").reset()
                     alert("Se guardo correctamente...")
                    }else{
                        alert("No se pudo concretar el proceso")
                    }
                })
                .catch(e=>{
                    console.error(e)
                })
           }

           buscarRegistro(id)
        })
    </script>
</body>
</html>