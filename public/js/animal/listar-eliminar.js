    
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