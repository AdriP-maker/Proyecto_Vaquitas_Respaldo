// --- Modal Me Interesa ---
const modalOverlay = document.getElementById('modalOverlay');

function abrirModal(btn) {
  const nombre = btn.dataset.nombre;
  const finca  = btn.dataset.finca;
  const img    = btn.dataset.img;

  document.getElementById('modalAnimalNombre').textContent = nombre;
  document.getElementById('modalAnimalFinca').textContent  = finca;
  document.getElementById('modalAnimalImg').src            = img;

  modalOverlay.classList.add('active');
}

document.getElementById('modalCerrar').addEventListener('click',  () => modalOverlay.classList.remove('active'));
document.getElementById('modalCerrar2').addEventListener('click', () => modalOverlay.classList.remove('active'));

modalOverlay.addEventListener('click', (e) => {
  if (e.target === modalOverlay) modalOverlay.classList.remove('active');
});

// Enviar por WhatsApp
document.getElementById('btnWhatsapp').addEventListener('click', () => {
  const nombre  = document.getElementById('modalNombre').value;
  const cel     = document.getElementById('modalCel').value;
  const correo  = document.getElementById('modalCorreo').value;
  const desc    = document.getElementById('modalDesc').value;
  const finca   = document.getElementById('modalAnimalFinca').textContent;
  const animal  = document.getElementById('modalAnimalNombre').textContent;

  const msg = `Hola HOFLOC, estoy interesado en el animal:\n*${animal}* - Finca #${finca}\n\nNombre: ${nombre}\nCelular: ${cel}\nCorreo: ${correo}\nMensaje: ${desc}`;
  const url = `https://wa.me/507XXXXXXXX?text=${encodeURIComponent(msg)}`;
  window.open(url, '_blank');
});

// Enviar por correo
document.getElementById('btnCorreo').addEventListener('click', () => {
  const nombre  = document.getElementById('modalNombre').value;
  const cel     = document.getElementById('modalCel').value;
  const correo  = document.getElementById('modalCorreo').value;
  const desc    = document.getElementById('modalDesc').value;
  const finca   = document.getElementById('modalAnimalFinca').textContent;
  const animal  = document.getElementById('modalAnimalNombre').textContent;

  const asunto  = `Interés en animal: ${animal} - Finca #${finca}`;
  const cuerpo  = `Nombre: ${nombre}\nCelular: ${cel}\nCorreo: ${correo}\nAnimal: ${animal}\nFinca: ${finca}\nMensaje: ${desc}`;
  window.location.href = `mailto:info@hofloc.com?subject=${encodeURIComponent(asunto)}&body=${encodeURIComponent(cuerpo)}`;
});


// --- Modal Ver Detalles ---
const modalDetallesOverlay = document.getElementById('modalDetallesOverlay');
let graficaInstance = null;

function abrirDetalles(btn) {
  const img        = btn.dataset.img;
  const numero     = btn.dataset.numero;
  const raza       = btn.dataset.raza;
  const edad       = btn.dataset.edad;
  const peso       = btn.dataset.peso;
  const produccion = btn.dataset.produccion;
  const vacunas    = btn.dataset.vacunas;

  document.getElementById('modalDetImg').src        = img;
  document.getElementById('detNumero').textContent  = numero;
  document.getElementById('detRaza').textContent    = raza;
  document.getElementById('detEdad').textContent    = edad;
  document.getElementById('detPeso').textContent    = peso;
  document.getElementById('detProduccion').textContent = produccion;
  document.getElementById('detVacunas').textContent = vacunas;

  // Progenitores
  document.getElementById('detPadreNum').textContent    = btn.dataset.padreNum;
  document.getElementById('detPadreRaza').textContent   = btn.dataset.padreRaza;
  document.getElementById('detPadreEdad').textContent   = btn.dataset.padreEdad;
  document.getElementById('detPadrePeso').textContent   = btn.dataset.padrePeso;
  document.getElementById('detPadreEstado').textContent = btn.dataset.padreEstado;

  document.getElementById('detMadreNum').textContent    = btn.dataset.madreNum;
  document.getElementById('detMadreRaza').textContent   = btn.dataset.madreRaza;
  document.getElementById('detMadreEdad').textContent   = btn.dataset.madreEdad;
  document.getElementById('detMadrePeso').textContent   = btn.dataset.madrePeso;
  document.getElementById('detMadreEstado').textContent = btn.dataset.madreEstado;

  document.getElementById('detCriaNum').textContent  = btn.dataset.criaNum;
  document.getElementById('detCriaRaza').textContent = btn.dataset.criaRaza;

  modalDetallesOverlay.classList.add('active');
  renderGrafica();
}

// Gráfica
function renderGrafica() {
  if (graficaInstance) graficaInstance.destroy();
  const ctx = document.getElementById('graficaProduccion').getContext('2d');
  graficaInstance = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May'],
      datasets: [{
        data: [18000, 21000, 23000, 22000, 22500],
        backgroundColor: '#426B1F',
        borderRadius: 6
      }]
    },
    options: {
      maintainAspectRatio: false,   /* respeta la altura fija del contenedor */
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });
}

// Botones vista/unidad
document.querySelectorAll('#btnVista .det-btn').forEach(b => {
  b.addEventListener('click', () => {
    document.querySelectorAll('#btnVista .det-btn').forEach(x => x.classList.remove('active'));
    b.classList.add('active');
  });
});

document.querySelectorAll('#btnUnidad .det-btn').forEach(b => {
  b.addEventListener('click', () => {
    document.querySelectorAll('#btnUnidad .det-btn').forEach(x => x.classList.remove('active'));
    b.classList.add('active');
  });
});

document.getElementById('modalDetallesCerrar').addEventListener('click',  () => modalDetallesOverlay.classList.remove('active'));
document.getElementById('modalDetallesCerrar2').addEventListener('click', () => modalDetallesOverlay.classList.remove('active'));
modalDetallesOverlay.addEventListener('click', (e) => {
  if (e.target === modalDetallesOverlay) modalDetallesOverlay.classList.remove('active');
});