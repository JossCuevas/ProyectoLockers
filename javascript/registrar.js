
const fechaActual = new Date();

document.getElementById('fechaIn').value = formatDate(fechaActual);

const fechaSeisMesesDespues = new Date(fechaActual);
fechaSeisMesesDespues.setMonth(fechaSeisMesesDespues.getMonth() + 6);

document.getElementById('fechaFin').value = formatDate(fechaSeisMesesDespues);

function formatDate(date) {
    const day = String(date.getDate()).padStart(2, '0');
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}