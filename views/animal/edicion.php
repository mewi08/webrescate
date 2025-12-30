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
    <div class="container mt-5">
            <h3>Edición de animales rescatados</h3>
        <form action="" id="formulario-editar">
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
                                <label for="nombre"class="form-label">Condición</label>
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
                                <input type="text" name="" id="especie" class="form-control" required>
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
           let parametro = new URLSearchParams (location.search)
           let id = parametro.get("id")
           function buscarRegistro(idbuscado){
            const datos = new FormData()
            datos.append("operacion","buscarPorId")
            datos.append("idanimal",idbuscado)

            fetch('../../app/controllers/animal.controller.php',{
                method:'POST',
                body:datos
            })

            .then(response => response.json())
            .then(data=>{
                document.querySelector("#rescatistas").value=data[0].idpersona
                document.querySelector("#nombre").value=data[0].nombre
                document.querySelector("#especie").value=data[0].especie
                document.querySelector("#sexo").value=data[0].sexo
                document.querySelector("#condicion").value=data[0].condicion
                document.querySelector("#fecharescate").value=data[0].fecharescate
                document.querySelector("#lugar").value=data[0].lugar
                document.querySelector("#observaciones").value=data[0].observaciones   
                document.querySelector("#foto").value=data[0].foto             
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