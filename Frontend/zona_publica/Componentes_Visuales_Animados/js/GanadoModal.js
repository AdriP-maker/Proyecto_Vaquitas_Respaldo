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