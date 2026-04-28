document.addEventListener("DOMContentLoaded", () => {
    initLineChart();
});

function initLineChart() {
    const ctx = document.getElementById("lineChart");
    if (!ctx) return;

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
            datasets: [{
                label: 'Producción',
                data: [900, 1000, 950, 1000, 880],
                borderColor: '#2aba88',
                backgroundColor: 'rgba(42,186,136,0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: { 
                legend: { display: false } 
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: v => v + ' L'
                    }
                }
            }
        }
    });
}


// Modal
document.addEventListener("DOMContentLoaded", () => {

    const modal = document.getElementById("modalProduccion");
    const abrir = document.getElementById("btnAbrirModal");
    const cerrar = document.getElementById("cerrarModal");

    abrir?.addEventListener("click", () => {
        modal.style.display = "flex";
    });

    cerrar?.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // Fecha automática
    const fechaInput = document.getElementById("fechaInput");
    if (fechaInput) {
        const hoy = new Date().toISOString().split("T")[0];
        fechaInput.value = hoy;
    }

    // Llenar combo con aretes (ejemplo)
    const vacas = [120, 118]; // luego puedes sacarlo dinámico
    const select = document.getElementById("selectVaca");

    vacas.forEach(v => {
        const option = document.createElement("option");
        option.value = v;
        option.textContent = v;
        select.appendChild(option);
    });

    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });

});


const btnDiario = document.getElementById("btnDiario");
const btnSemanal = document.getElementById("btnSemanal");

btnDiario.addEventListener("click", () => {
    btnDiario.classList.add("active");
    btnSemanal.classList.remove("active");
});

btnSemanal.addEventListener("click", () => {
    btnSemanal.classList.add("active");
    btnDiario.classList.remove("active");
});