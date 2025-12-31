document.addEventListener("DOMContentLoaded",function(){
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

        document.querySelector("#form-busqueda-dni").addEventListener("submit", function(event){
            event.preventDefault()
            buscarPorDni()
        })
})