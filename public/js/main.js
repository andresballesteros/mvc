const botones = document.querySelectorAll(".bEliminar");

botones.forEach(boton => {
  boton.addEventListener("click", function() {
    const matricula = this.dataset.matricula;
    const confirm = window.confirm(
      "Desea eliminar el alumno " + matricula + "?"
    );

    if (confirm) {
      httpRequest(
        "http://localhost:8080/mvc/consulta/eliminarAlumno/" + matricula,
        function() {
          const tbody = document.querySelector("#tbody-alumnos");
          const fila = document.querySelector("#fila-" + matricula);
          tbody.removeChild(fila);
          alert(this.responseText);
        }
      );
    }
  });
});

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();

  http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  };
}
