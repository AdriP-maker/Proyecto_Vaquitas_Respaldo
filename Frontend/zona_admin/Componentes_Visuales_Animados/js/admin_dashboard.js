/* =============================================
   ADMIN DASHBOARD JS – HOFLOC.SA
   ============================================= */

/* --- Sidebar: toggle submenú --- */
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

  const semanas = ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5'];

  new Chart(canvas, {
    type: 'bar',
    data: {
      labels: semanas,
      datasets: [
        {
          label: 'Producción alta',
          data: [380, 420, 395, 450, 410],
          backgroundColor: '#267474',
          borderRadius: 5,
          borderSkipped: false
        },
        {
          label: 'Producción media',
          data: [280, 310, 290, 320, 300],
          backgroundColor: '#2aba88',
          borderRadius: 5,
          borderSkipped: false
        },
        {
          label: 'Producción baja',
          data: [120, 140, 130, 150, 110],
          backgroundColor: '#d4a853',
          borderRadius: 5,
          borderSkipped: false
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            font: { size: 11, family: "'DM Sans', sans-serif" },
            color: '#6b8080',
            boxWidth: 10,
            boxHeight: 10,
            usePointStyle: true,
            pointStyle: 'circle',
            padding: 14
          }
        },
        tooltip: {
          callbacks: {
            label: ctx => ` ${ctx.dataset.label}: ${ctx.raw} L`
          }
        }
      },
      scales: {
        x: {
          stacked: false,
          grid: { display: false },
          ticks: { color: '#8aabab', font: { size: 11 } }
        },
        y: {
          beginAtZero: true,
          grid: { color: 'rgba(0,0,0,.05)' },
          ticks: {
            color: '#8aabab',
            font: { size: 11 },
            callback: v => v + ' L'
          }
        }
      },
      animation: { duration: 900 }
    }
  });
}

/* --- Inicializar al cargar --- */
document.addEventListener('DOMContentLoaded', () => {
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
