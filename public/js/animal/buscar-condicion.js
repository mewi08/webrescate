// public/js/animales/buscar-condicion.js
document.addEventListener("DOMContentLoaded", () => {

    function buscarPorCondicion() {
        const datos = new FormData()
        datos.append("operacion", "buscarPorCondicion")
        datos.append("condicion", document.querySelector("#condicion").value)

        fetch('../../app/controllers/animal.controller.php', {
            method: 'POST',
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            if (data) {
                renderizarDatos(data, "#animales-condicion")
            }
        })
        .catch(console.error)
    }

    document.querySelector("#form-busqueda-condicion").addEventListener("submit", e => {
            e.preventDefault()
            buscarPorCondicion()
    })
})
