const { Chart } = require('chart.js');

describe('Chart.js tareasPrioridadChart', () => {
  beforeEach(() => {
    // Prepara el DOM
    document.body.innerHTML = `
      <canvas id="tareasPrioridadChart"></canvas>
    `;

    // Simula el contexto 2D del canvas
    const canvas = document.getElementById('tareasPrioridadChart');
    canvas.getContext = jest.fn(() => ({
      fillRect: jest.fn(),
      clearRect: jest.fn(),
      getImageData: jest.fn(() => ({ data: [] })),
      putImageData: jest.fn(),
      createImageData: jest.fn(() => []),
      setTransform: jest.fn(),
      drawImage: jest.fn(),
      save: jest.fn(),
      fillText: jest.fn(),
      restore: jest.fn(),
      beginPath: jest.fn(),
      moveTo: jest.fn(),
      lineTo: jest.fn(),
      closePath: jest.fn(),
      stroke: jest.fn(),
      translate: jest.fn(),
      scale: jest.fn(),
      rotate: jest.fn(),
      arc: jest.fn(),
      fill: jest.fn(),
      measureText: jest.fn(() => ({ width: 0 })),
      transform: jest.fn(),
      rect: jest.fn(),
      clip: jest.fn(),
    }));
  });

  it('debe inicializar un gráfico de barras en el canvas', () => {
    const labels = ['Alta', 'Media', 'Baja'];
    const data = [5, 8, 3];

    const canvas = document.getElementById('tareasPrioridadChart');
    const ctx = canvas.getContext('2d');

    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Cantidad de tareas',
          data: data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(54, 162, 235, 0.6)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderWidth: 1
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
              precision: 0
            }
          }
        }
      }
    });

    expect(chart.config.type).toBe('bar');
    expect(chart.data.labels).toEqual(labels);
    expect(chart.data.datasets[0].data).toEqual(data);
  });
});

