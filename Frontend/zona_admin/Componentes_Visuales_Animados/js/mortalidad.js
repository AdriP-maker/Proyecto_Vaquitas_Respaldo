
// 1. Configuración de movimiento en la estadística

document.addEventListener("DOMContentLoaded", () => {
    
    const canvas = document.getElementById('mortalidadChart');

    if (canvas) {
        const ctx = canvas.getContext('2d');
        
        // Creación de un degradado vertical para el relleno del grafico
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.4)'); 
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0.0)');

        new Chart(ctx, {
            type: 'line', //Grafico de Lineas 
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Casos Registrados',
                    data: [5, 9, 6, 6, 8, 14], // Datos del eje Y
                    borderColor: '#10b981',// Colo de la linea 
                    backgroundColor: gradient, // Aplicación del degradado
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#10b981',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true, // Rellena el área bajo la linea
                    tension: 0.4 // Suaviza la linea para crear curva
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Hide default legend for a cleaner look
                    },
                    tooltip: {
                        // personalización estetica de la caja al pasar el curso por encima
                        backgroundColor: '#0f172a',
                        titleFont: { size: 13, family: "'Inter', sans-serif" },
                        bodyFont: { size: 14, family: "'Inter', sans-serif", weight: 'bold' },
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false
                    }
                },
                scales: {
                    x: {
                        grid: { display: false, drawBorder: false }, // Quita las líneas de fondo verticales
                        ticks: { color: '#64748b', font: { family: "'Inter', sans-serif" } }
                    },
                    y: {
                        // Estilas la líneas horizontales como líneas punteadas
                        grid: { color: '#f1f5f9', borderDash: [5, 5], drawBorder: false },
                        ticks: { color: '#64748b', font: { family: "'Inter', sans-serif" }, padding: 10 }
                    }
                },
                interaction: {
                    intersect: false, // Permite que el tooltip aparezca al acercarse a la línea, no solo sobre el punto
                    mode: 'index',
                },
            }
        });
    }

    // 2. Lógica del filtrado de la tabla

    const searchInput = document.getElementById('searchInput');
    const causeFilter = document.getElementById('causeFilter');
    const sexoFilter = document.getElementById('sexoFilter');
    const tableBody = document.getElementById('tableBody');

    /**
     * Función que recorre las filas de la tabla y decide si mostrarlas u ocultarlas
     * basándose en el buscador de texto y el selector de causa.
     */

    function filterTable() {
        if (!searchInput || !causeFilter || !sexoFilter || !tableBody) return;
        
        const searchTerm = searchInput.value.toLowerCase().trim();
        const selectedCause = causeFilter.value.toLowerCase();
        const selectedSexo = sexoFilter.value.toLowerCase();
        const rows = tableBody.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            // Extrae el contenido de las columnas específicas (ajustable según tu HTML)
            const arete = row.cells[0].textContent.toLowerCase(); // Columna 1: ID/Arete
            const causa = row.cells[5].textContent.toLowerCase(); // Columna 2: Causa de muerte
            const sexo = row.cells[4].textContent.toLowerCase(); // Columna de sexo del animal
            
            //Condiciones lógicas 
            const matchesSearch = arete.includes(searchTerm);
            const matchesCause = selectedCause === 'todos' || causa.includes(selectedCause);
            const matchesSexo = selectedSexo === 'todos' || sexo.includes(selectedSexo);

            // Muestra u oculta la fila mediante el CSS
            if (matchesSearch && matchesCause && matchesSexo) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    }

    // Escucha eventos de escritura y cambio para activar el filtro en tiempo real
    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (causeFilter) causeFilter.addEventListener('change', filterTable);
    if (sexoFilter) sexoFilter.addEventListener('change', filterTable);
});

    /**
     * Función que actualiza automáticamente el contador de estadística de mortalidad
     * basándose en el sexo
     */

document.addEventListener("DOMContentLoaded", () => {

    const tableBody = document.getElementById("tableBody");
    if (!tableBody) {
        console.error("No se encontró #tableBody");
        return;
    }

    const rows = tableBody.querySelectorAll("tr");

    let hembras = 0;
    let machos = 0;

    rows.forEach(row => {

        const genero = row.children[4]?.textContent.trim().toLowerCase();

        if (genero === "hembra") hembras++;
        if (genero === "macho") machos++;

    });

    const h = document.getElementById("countHembras");
    const m = document.getElementById("countMachos");

    if (h) h.textContent = hembras;
    if (m) m.textContent = machos;

});

    /**
     * Aquí simulamos la funcionalidad de relleno de la tabla atrayendo el sexo
     * y fecha de nacimiento del animal
     */

/* Base de datos simulada de animales indexada por el número de arete */
const animales = {
  "201": { sexo: "Hembra", nacimiento: "15/2/2023", trazabilidad: "12345" },
  "205": { sexo: "Macho", nacimiento: "12/4/2020", trazabilidad: "56342"},
  "250": { sexo: "Macho", nacimiento: "6/5/2022", trazabilidad: "12345" }
};

/* Escucha el envío del formulario y detiene la recarga de la página */
document.getElementById("formMortalidad").addEventListener("submit", function(e) {
  e.preventDefault();

  /* Captura los valores ingresados por el usuario */
  const arete = document.getElementById("areteInput").value;
  const causa = this.causa.value;
  const fecha = this.fecha.value;

  /* Verifica que no existan campos vacíos antes de continuar */
  if (!arete || !causa || !fecha) {
    alert("Completa todos los campos");
    return;
  }

  /* Intenta localizar el animal en el objeto 'animales' usando el arete como clave */
  const animal = animales[arete];

  /* Si el arete no existe en la base de datos, detiene el proceso */
  if (!animal) {
    alert("Arete no encontrado");
    return;
  }

  /* Referencia al cuerpo de la tabla donde se mostrarán los datos */
  const table = document.getElementById("tableBody");

  /* Crea una nueva fila HTML inyectando los datos encontrados y los del formulario */
  const row = `
  <tr>
    <td><span class="fw-bold">${arete}</span></td>
    <td>${animal.trazabilidad}</td>
    <td>${animal.nacimiento}</td>
    <td>${fecha}</td>
    <td>${animal.sexo}</td>
    <td class="text-end">
      <span class="estado-badge danger">${causa}</span>
    </td>
  </tr>
`;

  /* Agrega la nueva fila al final de la tabla existente */
  table.innerHTML += row;

  /* Limpia los campos del formulario tras el registro exitoso */
  this.reset();

  /* Cierra automáticamente la ventana modal usando la API de Bootstrap */
  const modal = bootstrap.Modal.getInstance(document.getElementById('modalMortalidad'));
  modal.hide();
});

    /**
     * Codigo del funcionamiento del modal de la tabla independientemente
     * comenzamos con traer la tabla a nuestro modal
    */
const modalHistorial = document.getElementById('modalHistorial');

if (modalHistorial) {
  modalHistorial.addEventListener('show.bs.modal', function () {
    
    const originalTable = document.getElementById('tableBody');
    const modalTable = document.getElementById('tableBodyModal');

    // Clonar contenido
    if (originalTable && modalTable) {
      modalTable.innerHTML = originalTable.innerHTML;
    }

  });
}

/*Filtros independente para el modal, cambiando los ID */
function filterTableModal() {

  const search = document.getElementById('searchInputModal').value.toLowerCase();
  const cause = document.getElementById('causeFilterModal').value;
  const sexo = document.getElementById('sexoFilterModal').value;

  const rows = document.getElementById('tableBodyModal').getElementsByTagName('tr');

  for (let row of rows) {

    const arete = row.cells[0].textContent.toLowerCase();
    const causa = row.cells[5].textContent.toLowerCase();
    const genero = row.cells[4].textContent.toLowerCase();

    const matchSearch = arete.includes(search);
    const matchCause = cause === "todos" || causa.includes(cause);
    const matchSexo = sexo === "todos" || genero.includes(sexo);

    row.style.display = (matchSearch && matchCause && matchSexo) ? "" : "none";
  }
}

// eventos
document.getElementById('searchInputModal').addEventListener('input', filterTableModal);
document.getElementById('causeFilterModal').addEventListener('change', filterTableModal);
document.getElementById('sexoFilterModal').addEventListener('change', filterTableModal);