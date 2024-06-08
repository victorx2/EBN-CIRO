
function obtenerDatos() {
  // Retorna la promesa de la solicitud fetch
  return fetch("estadisticas/alumno.genero.php")
    .then(response => response.json())
    .then(datos => {
      // Devuelve los datos
      return datos;
    });
}

// Función principal
function main() {
  // Llama a la función para obtener los datos
  obtenerDatos().then(datos => {

    const datosNumeros = datos.reduce((acumulado, dato) => {
      return acumulado + (dato == "M" ? 1 : 0);
    }, 0);

    // Crea el gráfico
    // Crea el gráfico
const ctx = document.getElementById("genero").getContext("2d");
const chart = new Chart(ctx, {
  // Define el tipo de gráfico
  type: "pie",
  // Define los datos del gráfico
  data: {
    labels: ["Masculino", "Femenino"],
    datasets: [{
      label: "ALUMNO",
      backgroundColor: ["#0abde3", "#f368e0"],
      borderColor: "rgba",
      data: [datosNumeros, datos.length - datosNumeros],
      borderWidth: 4,
      borderColor: 'rgb(255, 255, 255)'
    }]
  },
  options: {
    title: {
      text: "Alumnos Masculinos y Femeninos",
      display: true
    },
    indexAxis:'y',
    scales: {
      y: {
        beginAtZero: true
      },
      x: {
        ticks: {
          // Define los nombres de las categorías
          // Los nombres deben estar en el mismo orden que los labels
          labels: ["Masculino", "Femenino"]
        }
      }
    }
  }
});

// Dibuja el gráfico
chart.render();

  });
}

// Llama a la función principal
main();