function mostrarFormulario5() {
    var opcion = document.querySelector('input[name="opcion5"]:checked').value;
    var formulario = document.getElementById("col");
    
    if (opcion === "si") {
      formulario.style.display = "block";
    } else {
      formulario.style.display = "none";
    }
  }


function mostrarFormulario4() {
    var opcion = document.querySelector('input[name="opcion4"]:checked').value;
    var formulario = document.getElementById("opcional");
      
    if (opcion === "si") {

        
      formulario.style.display = "block";

       

    } else {
      formulario.style.display = "none";
    }
  }
  
  function mostrarFormulario3() {
    var opcion = document.querySelector('input[name="opcion3"]:checked').value;
    var formulario = document.getElementById("row");
  
    if (opcion === "no") {
      formulario.style.display = "block";
    } else {
      formulario.style.display = "none";
    }
  }
  
      function mostrarFormulario1() {
    var opcion = document.querySelector('input[name="opcion1"]:checked').value;
    var formulario = document.getElementById("formulario1");
      
    if (opcion === "si") {
      formulario.style.display = "block";
    } else {
      formulario.style.display = "none";
    }
  }
  
  function mostrarFormulario2() {
    var opcion = document.querySelector('input[name="opcion2"]:checked').value;
    var formulario = document.getElementById("formulario2");
  
    if (opcion === "si") {
      formulario.style.display = "block";
    } else {
      formulario.style.display = "none";
    }
  }