function obtenerDatos() {
  // Retorna la promesa de la solicitud fetch
  return fetch("estadisticas/alumno.grado.php")
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

    // Contamos la cantidad de alumnos menores de 9 años
    let cantidad1 = 0;
    for (const edad of datos) {
      if (edad == 1) {
        cantidad1++;
      }
    }

    // Contamos la cantidad de alumnos mayores de 9 años
    let cantidad2 = 0;
    for (const edad of datos) {
      if (edad == 2) {
        cantidad2++;
      }
    }

    // Contamos la cantidad de alumnos menores de 9 años
    let cantidad3 = 0;
    for (const edad of datos) {
      if (edad == 3) {
        cantidad3++;
      }
    }

    // Contamos la cantidad de alumnos mayores de 9 años
    let cantidad4 = 0;
    for (const edad of datos) {
      if (edad == 4) {
        cantidad4++;
      }
    }

            // Contamos la cantidad de alumnos menores de 9 años
    let cantidad5 = 0;
    for (const edad of datos) {
      if (edad == 5) {
        cantidad5++;
      }
    }

    // Contamos la cantidad de alumnos menores de 9 años
    let cantidad6 = 0;
    for (const edad of datos) {
      if (edad == 6) {
        cantidad6++;
      }
    }

    // Contamos la cantidad de alumnos menores de 9 años
    let cantidad7 = 0;
    for (const edad of datos) {
      if (edad == 7) {
        cantidad7++;
      }
    }

    // Crea el gráfico
    const ctx = document.getElementById("grado").getContext("2d");
    const chart = new Chart(ctx, {
      // Define el tipo de gráfico
      type: "doughnut",
      // Define los datos del gráfico
      data: {
        labels: ["Primer Grado", "Segundo Grado", "Tercero Grado", "Cuarto Grado", "Quinto Grado", "Sexto Grado", "Nuevo Ingreso"],
        datasets: [{
          label: "ALUMNO",
          backgroundColor: [
            '#F97F51',
            '#1B9CFC',
            '#55E6C1',
            '#58B19F',
            '#FD7272',
            '#6D214F',
            'rgb(85, 0, 0)'
          ],
          data: [cantidad1, cantidad2, cantidad3, cantidad4, cantidad5, cantidad6, cantidad7],
          borderWidth: 4,
          borderColor: 'rgb(255, 255, 255)'
        }]
      },
      options: {
        title: {
          text: "Grados Actualmente",
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
              labels: ["Primer Grado", "Segundo Grado", "Tercero Grado", "Cuarto Grado", "Quinto Grado", "Sexto Grado", "Nuevo Ingreso"]
            }
          }
        }
      }});
    
        // Dibuja el gráfico
        chart.render();
    
      });
    }
    
    // Llama a la función principal
    main();








/* function obtenerDatos() {
  // Retorna la promesa de la solicitud fetch
  return fetch("estadisticas/alumno.edad.php")
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

    // Obtenemos la fecha actual
    const fechaActual = new Date();

    // Calculamos la edad de cada alumno
    const edades = datos.map(fechaNacimiento => {
      const fechaNacimientoDate = new Date(fechaNacimiento);
      const edadEnAños = fechaActual.getFullYear() - fechaNacimientoDate.getFullYear();
      return edadEnAños;
    });

    // Filtramos los datos para obtener solo los alumnos que son mayores de 9 años
    const datosFiltrados = datos.filter(edad => edad >= 9);

    // Crea el gráfico
const ctx = document.getElementById("edad").getContext("2d");
const chart = new Chart(ctx, {
  // Define el tipo de gráfico
  type: "pie",
  // Define los datos del gráfico
  data: {
    labels: ["Mayor a 9años", "Menor a 9años"],
    datasets: [{
      label: "ALUMNO",
      backgroundColor: ["#00a8ff", "#e84118"],
      borderColor: "rgba",
      data: [datosFiltrados.length, datos.length - datosFiltrados.length],
      borderWidth: 1
    }]
  },
  options: {
    title: {
      text: "Estatus de los alumnos",
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
          labels: ["Mayor a 9años", "Menor a 9años"]
        }
      }
    }
  }});

    // Dibuja el gráfico
    chart.render();

  });
}

// Llama a la función principal
main(); */