function obtenerDatos() {
    // Retorna la promesa de la solicitud fetch

    return fetch("estadisticas/reprobado.alumno.php")
    /* return fetch("estadisticas/alumno.grado.php") */
   
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
  
      
      let cantidad1 = 0;
      for (const edad of datos) {
        if (edad == "100%") {
          cantidad1++;
        }
      }
  

      let cantidad2 = 0;
      for (const edad of datos) {
        if (edad == "75%") {
          cantidad2++;
        }
      }

      let cantidad3 = 0;
      for (const edad of datos) {
        if (edad == "50%") {
          cantidad3++;
        }
      }

      let cantidad4 = 0;
      for (const edad of datos) {
        if (edad == "25%") {
          cantidad4++;
        }
      }

    
    const ctx = document.getElementById("reprobado").getContext("2d");
    const chart = new Chart(ctx, {

        type: "doughnut",
        data: {
        labels: ["100%", "75%", "50%", "25%"],
        datasets: [{
            label: "ALUMNO",
            backgroundColor: [
            '#F97F51',
            '#1B9CFC',
            '#55E6C1',
            '#58B19F',
            ],
            data: [cantidad1, cantidad2, cantidad3,cantidad4],
            borderWidth: 4,
            borderColor: 'rgb(255, 255, 255)'
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
             
                labels: ["100%", "75%", "50%", "25%"]
              }
            }
          }
        }});
    

        chart.render();
    
        });
    }


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