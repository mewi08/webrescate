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