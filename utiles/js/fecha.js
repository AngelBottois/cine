// Obtener la fecha actual en formato YYYY-MM-DD
function obtenerFechaActual() {
    const fechaActual = new Date();
    const year = fechaActual.getFullYear();
    const month = (fechaActual.getMonth() + 1).toString().padStart(2, '0');
    const day = fechaActual.getDate().toString().padStart(2, '0');
return `${year}-${month}-${day}`;
}
 
// Configurar el valor mínimo del input de fecha
document.getElementById('fecha').min = obtenerFechaActual();