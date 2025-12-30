<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Estilos de bootstrap -->
    <link rel="stylesheet" href="   https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-3">
        <h3>Registro de animales rescatados</h3>
        <a href="./index.php" class="btn btn-outline-success">Listar</a>
        <hr>
        <form action="" id="formulario-animal">
            <div class="card">
                <div class="card-header">Formulario</div>
                <div class="card-body">
                    <div class="form-floating mb-2">
                                <select name="" id="rescatistas" class="form-select" required>
                                    <option value="">Selecciona</option>
                                    <option value="1">Melanie Elizabeth</option>
                                </select>
                                <label for="rescatistas"class="form-label">Rescatista</label>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-6 g-2">
                            <div class="form-floating mb-2">
                                <input type="text" name="" id="nombre" class="form-control">
                                <label for="nombre"class="form-label">Nombre</label>
                            </div> 
                        </div>
                        <div class="col-md-6">
                             <div class="form-floating mb-2">
                               <select name="" id="condicion" class="form-select">
                                <option value="">Selecciona</option>
                                <option value="Rescatado">Rescatado</option>
                                <option value="Tratamiento">Tratamiento</option>
                                <option value="Adopcion">Adopcion</option>
                                <option value="Adoptado">Adoptado</option>
                             </select>
                                <label for="nombre"class="form-label">Condicion</label>
                            </div> 
                        </div>
                    </div>
                    <!-- .row -->
                    
                    <div class="row g-2">
                        <div class="col-md-6 g-2">
                            <div class="form-floating mb-2">
                                <select name="" id="sexo" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="F">Hembra</option>
                                    <option value="M">Macho</option>
                                </select>
                                <label for="sexo"class="form-label">Sexo</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                             <div class="form-floating mb-2">
                               <select name="" id="especie" class="form-select" required>
                                    <option value="">Selecione</option>
                                    <option value="Perro">Perro</option>
                                    <option value="Gato">Gato</option>
                                    <option value="Ave">Ave</option>
                                    <option value="Conejo">Conejo</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <label for="especie"class="form-label">Especie</label>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->
                    
                    <div class="row g-2">
                        <div class="col-md-6 g-2">
                            <div class="form-floating mb-2">
                                <input type="date" name="" id="fecharescate" class="form-control" required>
                                <label for="fecharescate"class="form-label">Fecha rescate</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input type="text" name="" id="lugar" class="form-control" required>
                                <label for="lugar" class="form-label">Lugar</label>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <div class="form-floating mb-2">
                        <input type="text" name="" id="observaciones" class="form-control" required>
                        <label for="observaciones" class="form-label">Observaciones</label>
                    </div>

                    <!-- .row -->
                    <div class="row g-2 ">   
                        <div class="col-md-2">
                            <div class="form-floating mb-2">
                            <label for="" class="form-label">Foto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="" id="foto" class="form-control" required>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-outline-secondary" type="reset">Cancelar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded",function(){
            document.addEventListener("submit",function(event){
                event.preventDefault()
                if(confirm("¿Está seguro de guardar el registro?")){
                    guardarDatos()
                }
            })
            function guardarDatos(){
                const datos = new FormData()
                datos.append("operacion","registrar")
                datos.append("idpersona",document.querySelector("#rescatistas").value)
                datos.append("nombre", document.querySelector("#nombre").value )
                datos.append("especie", document.querySelector("#especie").value )
                datos.append("sexo", document.querySelector("#sexo").value )
                datos.append("condicion", document.querySelector("#condicion").value )
                datos.append("fecharescate", document.querySelector("#fecharescate").value )
                datos.append("lugar", document.querySelector("#lugar").value )
                datos.append("observaciones", document.querySelector("#observaciones").value )
                datos.append("foto", document.querySelector("#foto").value)

                fetch('../../app/controllers/animal.controller.php',{
                    method:'POST',
                    body: datos
                })

                .then(response => response.json())
                .then(data=>{
                    if(data.idanimal>0){
                        document.querySelector("#formulario-animal").reset()
                     alert("Se guardo correctamente...")
                    }else{
                        alert("No se pudo concretar el proceso")
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