function showSection(sectionId) {
  var sections = document.querySelectorAll('.section');
  sections.forEach(function(section) {
    section.classList.remove('active');
  });
  
  var section = document.getElementById(sectionId);
  section.classList.add('active');

  // Ocultar todos los botones primero
  var buttons = document.querySelectorAll('.button-container button');
  buttons.forEach(function(button) {
    button.style.display = 'none';
  });

  // Mostrar los botones correspondientes a la sección seleccionada
  var sectionButtons = document.querySelectorAll('#' + sectionId + ' .button-container button');
  sectionButtons.forEach(function(button) {
    button.style.display = 'block';
  });
}

function toggle1() {
  var form = document.getElementById('productoForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle2() {
  var form = document.getElementById('actualizarForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle3() {
  var form = document.getElementById('registrarForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle4() {
  var form = document.getElementById('generarForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}


function toggle5() {
  var productosForm = document.getElementById("productosForm");
  if (productosForm.style.display === "none") {
      productosForm.style.display = "block";
      cargarProductos('cargar_productos.php'); // Pasar la URL correcta para cargar los productos
  } else {
      productosForm.style.display = "none";
  }
}

function cargarProductos(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4) {
          if (this.status === 200) {
              document.getElementById("productosForm").innerHTML = this.responseText;
          } else {
              console.error("Error al cargar los productos: " + this.status);
              document.getElementById("productosForm").innerHTML = "Error al cargar los productos.";
          }
      }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}





function toggle6() {
  var proveedoresForm = document.getElementById("proveedoresForm");
  if (proveedoresForm.style.display === "none") {
      proveedoresForm.style.display = "block";
      cargarProveedores(); // Llamar a la función para cargar los proveedores
  } else {
      proveedoresForm.style.display = "none";
  }
}

function cargarProveedores() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4) {
          if (this.status === 200) {
              document.getElementById("proveedoresForm").innerHTML = this.responseText;
          } else {
              console.error("Error al cargar los proveedores: " + this.status);
              document.getElementById("proveedoresForm").innerHTML = "Error al cargar los proveedores.";
          }
      }
  };
  xhttp.open("GET", "cargar_proveedores.php", true);
  xhttp.send();
}

function toggle7() {
  var informesForm = document.getElementById("informesForm");
  if (informesForm.style.display === "none") {
      informesForm.style.display = "block";
      cargarInformes(); // Llamar a la función para cargar los informes
  } else {
      informesForm.style.display = "none";
  }
}

function cargarInformes() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4) {
          if (this.status === 200) {
              document.getElementById("informesForm").innerHTML = this.responseText;
          } else {
              console.error("Error al cargar los informes: " + this.status);
              document.getElementById("informesForm").innerHTML = "Error al cargar los informes.";
          }
      }
  };
  xhttp.open("GET", "cargar_informes.php", true);
  xhttp.send();
}

function toggleProductosAlmacenamiento() {
  var productossForm = document.getElementById("productossForm");
  if (productossForm.style.display === "none") {
      productossForm.style.display = "block";
      cargarProductosAlmacenamiento('productos_almacenamiento.php'); // URL para cargar los productos de almacenamiento
  } else {
      productossForm.style.display = "none";
  }
}

function cargarProductosAlmacenamiento(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4) {
          if (this.status === 200) {
              document.getElementById("productossForm").innerHTML = this.responseText;
          } else {
              console.error("Error al cargar los productos: " + this.status);
              document.getElementById("productossForm").innerHTML = "Error al cargar los productos.";
          }
      }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}




function toggleUbicaciones() {
  var form = document.getElementById('ubicacionesForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}



function toggleInformesAlmacenamiento() {
  var informessForm = document.getElementById("informessForm");
  if (informessForm.style.display === "none") {
      informessForm.style.display = "block";
      cargarInformesAlmacenamiento('informes_almacenamiento.php');
  } else {
      informessForm.style.display = "none";
  }
}

function cargarInformesAlmacenamiento(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4) {
          if (this.status === 200) {
              document.getElementById("informessForm").innerHTML = this.responseText;
          } else {
              console.error("Error al cargar los informes: " + this.status);
              document.getElementById("informessForm").innerHTML = "Error al cargar los informes.";
          }
      }
  };
  xhttp.open("GET", "cargar_informes.php", true);
  xhttp.send();
}



function toggle11() {
  var form = document.getElementById('productosssForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle12() {
  var form = document.getElementById('cantidaddForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle13() {
  var form = document.getElementById('ventaproductoForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle14() {
  var form = document.getElementById('tranferenciaproductosForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle15() {
  var form = document.getElementById('devolucionproductosForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}


function toggle16() {
  var form = document.getElementById('destruccionproductosForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle17() {
  var form = document.getElementById('productossssForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

function toggle18() {
  var form = document.getElementById('controlarstockForm');
  if (form.style.display === 'none') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

