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
            
        document.querySelector("#form-busqueda-id").addEventListener("submit", function(event){
                event.preventDefault()
                buscarPorId()
            })    
})