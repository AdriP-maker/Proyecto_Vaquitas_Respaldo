/* =============================================
   ADMIN DASHBOARD JS – HOFLOC.SA
   ============================================= */

/* --- Sidebar: toggle submenú --- */
let barChart;
function toggleSubmenu(id, el) {
  const sub = document.getElementById(id);
  const isOpen = sub.classList.contains('open');

  // Cerrar todos
  document.querySelectorAll('.nav-submenu').forEach(s => s.classList.remove('open'));
  document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('open'));

  if (!isOpen) {
    sub.classList.add('open');
    el.classList.add('open');
  }
}

/* --- Breadcrumb dinámico --- */
function setBreadcrumb(items) {
  const bc = document.getElementById('breadcrumb');
  if (!bc) return;

  let html = `<a href="dashboard.php"><i class="fa-solid fa-house" style="font-size:.75rem"></i></a>`;
  items.forEach((item, i) => {
    html += `<span class="breadcrumb-sep">›</span>`;
    if (i === items.length - 1) {
      html += `<span class="breadcrumb-current">${item.label}</span>`;
    } else {
      html += `<a href="${item.href}">${item.label}</a>`;
    }
  });
  bc.innerHTML = html;
}

/* --- Donut chart: División de leche --- */
function initDonutChart() {
  const canvas = document.getElementById('donutChart');
  if (!canvas) return;

  new Chart(canvas, {
    type: 'doughnut',
    data: {
      labels: ['Leche a la venta', 'Consumo terneros', 'Consumo en casa'],
      datasets: [{
        data: [50, 25, 25],
        backgroundColor: ['#267474', '#2aba88', '#d4a853'],
        borderWidth: 0,
        hoverOffset: 6
      }]
    },
    options: {
      cutout: '68%',
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: ctx => ` ${ctx.label}: ${ctx.raw}%`
          }
        }
      },
      animation: { animateRotate: true, duration: 900 }
    }
  });
}

/* --- Bar chart: Producción semanal de leche --- */
function initBarChart() {
  const canvas = document.getElementById('barChart');
  if (!canvas) return;

  const btnSemanal = document.getElementById('btnSemanal');
  const btnMensual = document.getElementById('btnMensual');
  const prevBtn = document.getElementById('prevPage');
  const nextBtn = document.getElementById('nextPage');
  const pageIndicator = document.getElementById('pageIndicator');
  const subtitle = document.getElementById('chartSubtitle');

  let modo = 'semanal';
  let pagina = 0;

  // 🔹 DATA
  const semanalPages = [
    {
      labels: ['Sem 1','Sem 2','Sem 3','Sem 4','Sem 5'],
      datasets: [
        { label:'Producción alta', data:[380,420,395,450,410], backgroundColor:'#267474', borderRadius:5 },
        { label:'Producción media', data:[280,310,290,320,300], backgroundColor:'#2aba88', borderRadius:5 },
        { label:'Producción baja', data:[120,140,130,150,110], backgroundColor:'#d4a853', borderRadius:5 }
      ]
    },
    {
      labels: ['Sem 6','Sem 7','Sem 8','Sem 9','Sem 10'],
      datasets: [
        { label:'Producción alta', data:[420,430,410,460,440], backgroundColor:'#267474', borderRadius:5 },
        { label:'Producción media', data:[300,320,310,330,315], backgroundColor:'#2aba88', borderRadius:5 },
        { label:'Producción baja', data:[130,150,140,160,135], backgroundColor:'#d4a853', borderRadius:5 }
      ]
    }
  ];

  const mensualPages = [
    {
      labels: ['Ene','Feb','Mar','Abr','May'],
      datasets: [
        { label:'Producción alta', data:[1500,1700,1600,1800,1750], backgroundColor:'#267474', borderRadius:5 },
        { label:'Producción media', data:[1100,1200,1150,1300,1250], backgroundColor:'#2aba88', borderRadius:5 },
        { label:'Producción baja', data:[500,600,550,650,580], backgroundColor:'#d4a853', borderRadius:5 }
      ]
    },
    {
      labels: ['Jun','Jul','Ago','Sep','Oct'],
      datasets: [
        { label:'Producción alta', data:[1800,1900,2000,2100,1950], backgroundColor:'#267474', borderRadius:5 },
        { label:'Producción media', data:[1300,1350,1400,1450,1380], backgroundColor:'#2aba88', borderRadius:5 },
        { label:'Producción baja', data:[600,650,700,720,680], backgroundColor:'#d4a853', borderRadius:5 }
      ]
    }
  ];

  // 🔥 CREAR GRÁFICA
  barChart = new Chart(canvas, {
    type: 'bar',
    data: semanalPages[0],
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            usePointStyle: true,
            pointStyle: 'circle',
            boxWidth: 10,
            boxHeight: 10,
            padding: 14,
            color: '#6b8080',
            font: { size: 11 }
          }
        }
      },
      scales: {
        x: {
          grid: { display: false },
          ticks: { color: '#8aabab' }
        },
        y: {
          beginAtZero: true,
          ticks: {
            callback: v => v + ' L',
            color: '#8aabab'
          }
        }
      }
    }
  });

  // 🔥 ACTUALIZACIÓN CORRECTA
  function actualizarGrafica() {
    const pages = modo === 'semanal' ? semanalPages : mensualPages;

    barChart.data = {
  labels: [...pages[pagina].labels],
  datasets: pages[pagina].datasets.map(ds => ({ ...ds }))
};

barChart.update();

    if (subtitle) {
      subtitle.textContent =
        modo === 'semanal'
          ? 'Por semana — últimas 5 semanas'
          : 'Por mes — últimos 5 meses';
    }

    pageIndicator.textContent = pagina + 1;

    prevBtn.disabled = pagina === 0;
    nextBtn.disabled = pagina === pages.length - 1;
  }

  // 🔘 BOTONES
  btnSemanal.addEventListener('click', () => {
    modo = 'semanal';
    pagina = 0;
    actualizarGrafica();

    btnSemanal.classList.add('active');
    btnMensual.classList.remove('active');
  });

  btnMensual.addEventListener('click', () => {
    modo = 'mensual';
    pagina = 0;
    actualizarGrafica();

    btnMensual.classList.add('active');
    btnSemanal.classList.remove('active');
  });

  // ⬅➡ PAGINACIÓN
  prevBtn.addEventListener('click', () => {
    if (pagina > 0) {
      pagina--;
      actualizarGrafica();
    }
  });

  nextBtn.addEventListener('click', () => {
    const pages = modo === 'semanal' ? semanalPages : mensualPages;

    if (pagina < pages.length - 1) {
      pagina++;
      actualizarGrafica();
    }
  });

  actualizarGrafica();
}

/* --- Inicializar al cargar --- */
window.addEventListener('load', () => {
  initDonutChart();
  initBarChart();

  // Marcar nav-item activo según URL
  const path = window.location.pathname.split('/').pop();
  document.querySelectorAll('.nav-item').forEach(el => {
    if (el.getAttribute('href') === path) {
      el.classList.add('active');
    }
  });
});
