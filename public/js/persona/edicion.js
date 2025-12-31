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