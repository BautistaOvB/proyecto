const productos = [
    {
      nombre: "Camiseta Azul",
      precio: 15.99,
      imagen: "camiseta-azul.jpg",
      descripcion: "Camiseta de algodón suave en color azul."
    },
    {
      nombre: "Pantalón Negro",
      precio: 29.99,
      imagen: "pantalon-negro.jpg",
      descripcion: "Pantalón de vestir negro, elegante y cómodo."
    },
    // Agrega más productos aquí...
  ];



const catalogo = document.getElementById("catalogo");

productos.forEach(producto => {
  // Crea un elemento div para cada producto
  const productoDiv = document.createElement("div");
  productoDiv.classList.add("producto");

  // Agrega la imagen
  const imagen = document.createElement("img");
  imagen.src = producto.imagen;
  imagen.alt = producto.nombre;
  productoDiv.appendChild(imagen);

  // Agrega el nombre
  const nombre = document.createElement("h3");
  nombre.textContent = producto.nombre;
  productoDiv.appendChild(nombre);

  // Agrega el precio
  const precio = document.createElement("p");
  precio.textContent = `Precio: $${producto.precio}`; 
  productoDiv.appendChild(precio);

  // Agrega la descripción
  const descripcion = document.createElement("p");
  descripcion.textContent = producto.descripcion;
  productoDiv.appendChild(descripcion);

  // Agrega el producto al contenedor
  catalogo.appendChild(productoDiv);
});

  