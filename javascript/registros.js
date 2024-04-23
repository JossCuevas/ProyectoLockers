

function habilitarEdicion(btn) {
    const fila = btn.closest('tr');
    fila.querySelectorAll('.entrada').forEach(input => {
        input.disabled = false;
    });
    fila.querySelector('.borrar').disabled = true;
    fila.querySelector('.guardar').disabled = false;
}

function confirmarBorrado(btn) {
    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
        const fila = btn.closest('tr');
        fila.remove();
    }
}

function guardarCambios(btn) {
    const fila = btn.closest('tr');
    fila.querySelectorAll('.entrada').forEach(input => {
        input.disabled = true;
    });
    fila.querySelector('.borrar').disabled = false;
    fila.querySelector('.guardar').disabled = true;
    alert("Elemento guardado Correctamente")
}