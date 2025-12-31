document.addEventListener("DOMContentLoaded", () => {

    function buscarPorEspecie() {
        const datos = new FormData()
        datos.append("operacion", "buscarPorEspecie")
        datos.append("especie", document.querySelector("#especie").value)

        fetch('../../app/controllers/animal.controller.php', {
            method: 'POST',
            body: datos
        })
        .then(response => response.json())
        .then(data => {
            if (data) {
                renderizarDatos(data, "#animales-especie")
            }
        })
        .catch(console.error)
    }

    document.querySelector("#form-busqueda-especie").addEventListener("submit", e => {
            e.preventDefault()
            buscarPorEspecie()
    })
})