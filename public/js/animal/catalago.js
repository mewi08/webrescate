    document.addEventListener("DOMContentLoaded", function(){
            function obtenerDatos(){
                const datos = new FormData()
                datos.append("operacion","listar")

                fetch('../../app/controllers/animal.controller.php',{
                    method:'POST',
                    body: datos
                })
                    .then(response => response.json())
                    .then(data=>{
                        
                        if(data){
                            renderizarDatos(data,"#catalago")
                        }

                    })
                    .catch(e=>{
                        console.error(e)
                    })
            }
            obtenerDatos()
        })