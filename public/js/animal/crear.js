 
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