
function renderizarDatos(listaAnimales,contenedor){
    const registro = document.querySelector(contenedor)
    registro.innerHTML=""
    listaAnimales.forEach(animal => {   
    registro.innerHTML+=`
        <div class="card" style="width: 16rem;">
            <img src="../../public/images/${animal.especie}.png" class="card-img-top img-fluid" alt="Fotografía de un ${animal.especie}">
            <div class="card-body">
                <h5 class="card-title">${animal.nombre ?? 'Sin nombre'}</h5>
                <p class="card-text">Rescatada en ${animal.lugar} <br>el día ${animal.fecharescate} </p>
                <a href="./detalle.html?id=${animal.idanimal}" class="btn btn-primary">Saber más... </a>
            </div>
        </div>`
    });
}