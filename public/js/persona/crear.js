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
            datos.append("dni", document.querySelector("#dni").value )
        datos.append("nombres", document.querySelector("#nombres").value )
        datos.append("apellidos", document.querySelector("#apellidos").value )
        datos.append("telefono", document.querySelector("#telefono").value )
        datos.append("email", document.querySelector("#email").value )

        fetch('../../app/controllers/persona.controller.php',{
            method:'POST',
            body: datos
        })

        .then(response => response.json())
        .then(data=>{
            if(data.idpersona>0){
                document.querySelector("#formulario-persona").reset()
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