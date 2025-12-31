// public/js/animales/buscar-id.js
document.addEventListener("DOMContentLoaded", () => {

    function buscarPorId() {
        const datos = new FormData()
        datos.append("operacion", "buscarPorId")
        datos.append("idanimal", document.querySelector("#idbuscado").value)

        fetch('../../app/controllers/animal.controller.php', {
            method: 'POST',
            body: datos
        })
        .then(r => r.json())
        .then(data => {
            renderizarDatos(data, "#animales-id")
        })
        .catch(() => alert("No se encontró..."))
    }

    document.querySelector("#form-busqueda-id").addEventListener("submit", e => {
            e.preventDefault()
            buscarPorId()
    })
})
