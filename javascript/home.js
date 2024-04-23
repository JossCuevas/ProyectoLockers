
function toggleMenu() {
    var menu = document.getElementById('menu');
    var container = document.getElementById("contenedor-home")
    container.classList.toggle('desenfoque');
    menu.classList.toggle('open');
}