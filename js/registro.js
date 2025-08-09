const date = document.getElementById("date");
const edad = document.getElementById("edad");
const calcular = (date) => {
    const fechaActual = new Date();
    const anoActual = parseInt(fechaActual.getFullYear());
    const mesActual = parseInt(fechaActual.getMonth()) + 1;
    const diaActual = parseInt(fechaActual.getDate());

    const anoNacimiento = parseInt(String(date).substring(0, 4));
    const mesNacimiento = parseInt(String(date).substring(5, 7));
    const diaNacimiento = parseInt(String(date).substring(8, 10));
    let edad = anoActual - anoNacimiento;
    if (mesActual < mesNacimiento) {
        edad--;
    } else if (mesActual === mesNacimiento) {
        if (diaActual < diaNacimiento) {
            edad--;
        }
    }

    return edad;
};

window.addEventListener('load', function() {
    date.addEventListener('change', function() {
        if (this.value) {
            edad.value = calcular(this.value);
            console.log(edad.value);

            // Agregado: ocultar o mostrar el elemento con ID datos_representante
            const datosRepresentante = document.getElementById("datos_representante");
            if (parseInt(edad.value) >= 18) {
                datosRepresentante.style.display = "none";
            } else {
                datosRepresentante.style.display = "block";
            }
        }
    });
});