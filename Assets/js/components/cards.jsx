
const value =[{ producto:avion, text:descripcion,precio:$1300
},{producto:boat, text:descripcion,precio:$1400,
},{producto:boat, text:descripcion,precio:$1500}];

value.map((value) =>{
<div class="card" style="width: 18rem;">
                <img src="Assets/imgs/Avion.jpg" class="card-img-top" alt="avioncito">
                <div class="card-body">
                <h5 class="card-title">${value.producto}</h5>
                <p class="card-text"> ${value.text} </p>
                <p class="card-text"> ${value.text} </p>
                <a href="principal.html" class="btn btn-primary"> comprar</a>
                </div>
            </div>}
);
