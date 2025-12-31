document.addEventListener("DOMContentLoaded",function(){
           let parametro = new URLSearchParams (location.search)
           let id = parametro.get('id')

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

           document.querySelector("#formulario-editar").addEventListener("submit",function(event){
            event.preventDefault()

            if(confirm("¿Está seguro de actualizar el registro?")){
                actualizarRegistro()
            }
           })

           function actualizarRegistro(){
                const datos = new FormData()
                datos.append("operacion","actualizar")
                datos.append("idpersona",document.querySelector("#rescatistas").value)
                datos.append("nombre", document.querySelector("#nombre").value )
                datos.append("especie", document.querySelector("#especie").value )
                datos.append("sexo", document.querySelector("#sexo").value )
                datos.append("condicion", document.querySelector("#condicion").value )
                datos.append("fecharescate", document.querySelector("#fecharescate").value )
                datos.append("lugar", document.querySelector("#lugar").value )
                datos.append("observaciones", document.querySelector("#observaciones").value )
                datos.append("foto", document.querySelector("#foto").value)
                datos.append("idanimal",id)
                fetch('../../app/controllers/animal.controller.php',{
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