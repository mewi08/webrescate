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


        <script>
            document.addEventListener("DOMContentLoaded", function(){
                function buscarPorId(){
                    const datos = new FormData()
                    datos.append("operacion","buscarPorId")
                    datos.append("idanimal", document.querySelector("#idbuscado").value)
                    fetch('../../app/controllers/animal.controller.php',{
                        method:'POST',
                        body:datos
                    })
                        .then(response => response.json())
                        .then(data=>{
                            renderizarDatos(data,"#animales-id")
                        })
                        .catch(error=>{
                            alert("No se encontro...")
                        })
                }

                function buscarPorCondicion(){
                    const datos = new FormData()
                    datos.append("operacion","buscarPorCondicion")
                    datos.append("condicion", document.querySelector("#condicion").value)

                    fetch('../../app/controllers/animal.controller.php', {
                        method:'POST',
                        body: datos
                    })
                        .then(response=>response.json())
                        .then(data=>{
                            if(data){
                            renderizarDatos(data,"#animales-condicion")
                        }
                        })
                        .catch(e=>{
                            console.error(e)
                        })
                }
                
                function renderizarDatos(listaAnimales,contenedor){
                    const registro = document.querySelector(contenedor)
                    registro.innerHTML=""
                    listaAnimales.forEach(animal => {   
                            registro.innerHTML+=`
                            <div class="card" style="width: 16rem;">
                                <img src="../../public/images/${animal.especie}.png" class="card-img-top img-fluid" alt="Fotografía de un ${animal.especie}">
                                <div class="card-body">
                                    <h5 class="card-title">${animal.nombre ?? 'Sin nombre'}</h5>
                                    <p class="card-text">Rescatada en ${animal.lugar} <br>el día ${animal.fecharescate} </p>
                                    <a href="./detalle.html?id=${animal.idanimal}" class="btn btn-primary">Saber más... </a>
                                </div>
                            </div>`
                             });
                }


                document.querySelector("#form-busqueda-id").addEventListener("submit",function(event){
                    event.preventDefault()
                    buscarPorId()
                })

                document.querySelector("#form-busqueda-condicion").addEventListener("submit",function(event){
                    event.preventDefault()
                    buscarPorCondicion()
                })
            })
        </script>
    </div>
</body>
</html>