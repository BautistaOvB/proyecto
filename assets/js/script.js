document.addEventListener("DOMContentLoaded", function() {
    const preguntas = document.querySelectorAll(".pregunta h3");

    preguntas.forEach(pregunta => {
        pregunta.addEventListener("click", function() {
            // Alternar la clase "active" para mostrar u ocultar la respuesta
            pregunta.parentElement.classList.toggle("active");
        });
    });
});

