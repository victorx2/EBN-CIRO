
function obtenerDatos() {
  // Retorna la promesa de la solicitud fetch
  return fetch("estadisticas/inscribir.php")
    .then(response => response.json())
    .then(datos => {
      // Devuelve los datos
      return datos;
    });
}

const Utils = {
  months: function(count) {
    return [
      "Enero",
      "Febrero",
      "Marzo",
      "Abril",
      "Mayo",
      "Junio",
      "Julio",
      "Agosto",
      "Septiembre",
      "Octubre",
      "Noviembre",
      "Diciembre"
    ];
  }
};

// Función principal
function main() {
  // Llama a la función para obtener los datos
  obtenerDatos().then(datos => {

    // Crea el gráfico
const ctx = document.getElementById("inscripcion").getContext("2d");
const chart = new Chart(ctx, {
  // Define el tipo de gráfico
  type: "line",
  // Define los datos del gráfico
  data: {
    labels: Utils.months({count: 12}),
    datasets: [{
      label: "Inscripciones",
      borderColor: 'rgb(0, 4, 253)',
      tension: 0.1,
      data: datos.map(month => data.filter(m => m === month).length),
      fill: false,
    }]
  },
  options: {
    title: {
      text: "Inscripciones por mes",
      display: true
    },
    indexAxis:'y',
    scales: {
      y: {
        beginAtZero: true,

      },
      x: {
        ticks: {
          // Define los nombres de las categorías
          // Los nombres deben estar en el mismo orden que los labels
          labels: Utils.months({count: 12})
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