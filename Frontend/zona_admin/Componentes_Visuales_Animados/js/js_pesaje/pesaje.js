/**
 * pesaje.js – Lógica de la vista de Pesaje
 * HOFLOC.SA
 */

function filtrarAnimales(query) {
  var items = document.querySelectorAll('#animalList .animal-item');
  var q = query.toLowerCase().trim();
  items.forEach(function(item) {
    var nombre = item.querySelector('.animal-name').textContent.toLowerCase();
    item.style.display = (q === '' || nombre.includes(q)) ? '' : 'none';
  });
}

function seleccionarAnimal(el) {
  document.querySelectorAll('#animalList .animal-item').forEach(function(i) {
    i.classList.remove('selected');
  });
  el.classList.add('selected');
}

function registrarPeso() {
  var fecha = document.getElementById('fecha').value.trim();
  var hora  = document.getElementById('hora').value.trim();
  var peso  = parseFloat(document.getElementById('pesoRegistrado').value);
  var selec = document.querySelector('#animalList .animal-item.selected');

  if (!fecha || !hora) { mostrarToast('Ingresa la fecha y hora.', 'danger'); return; }
  if (!selec)          { mostrarToast('Selecciona un animal.', 'danger'); return; }
  if (isNaN(peso) || peso <= 0) { mostrarToast('Ingresa un peso válido.', 'danger'); return; }

  var nombre = selec.querySelector('.animal-name').textContent;
  agregarUltimoRegistro(nombre, peso);
  mostrarToast('Peso de ' + nombre + ' registrado: ' + peso + ' kg', 'success');
  cancelarPesaje();
}

function cancelarPesaje() {
  ['fecha','hora','pesoRegistrado','buscarCodigo'].forEach(function(id) {
    var el = document.getElementById(id);
    if (el) el.value = '';
  });
  filtrarAnimales('');
  document.querySelectorAll('#animalList .animal-item').forEach(function(i) {
    i.classList.remove('selected');
  });
  document.querySelectorAll('input[name="alimentacion"]').forEach(function(c) {
    c.checked = false;
  });
}

function agregarUltimoRegistro(nombre, peso) {
  var lista = document.getElementById('ultimosList');
  var item  = document.createElement('div');
  item.className = 'ultimo-item';
  item.innerHTML =
    '<img src="https://placehold.co/34x34/4a8c3f/fff?text=%F0%9F%90%84" class="ultimo-avatar" alt="" />' +
    '<div class="ultimo-info"><span class="ultimo-name">' + nombre + '</span>' +
    '<span class="ultimo-meta">Ahora</span></div>' +
    '<span class="ultimo-peso">' + peso + ' kg</span>';
  lista.insertBefore(item, lista.firstChild);
}

function mostrarToast(msg, tipo) {
  var prev = document.getElementById('hofloc-toast');
  if (prev) prev.remove();
  var toast = document.createElement('div');
  toast.id = 'hofloc-toast';
  toast.className = 'alert-flash alert-flash--' + tipo;
  toast.innerHTML = '<i class="fa fa-' + (tipo === 'success' ? 'check-circle' : 'exclamation-circle') + '"></i> ' + msg;
  document.body.appendChild(toast);
  setTimeout(function() { if (toast.parentNode) toast.remove(); }, 3500);
}

document.addEventListener('DOMContentLoaded', function() {
  var flash = document.querySelector('.alert-flash');
  if (flash) {
    setTimeout(function() { flash.style.opacity = '0'; }, 3000);
    setTimeout(function() { if (flash.parentNode) flash.remove(); }, 3500);
  }
});