import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
import './bootstrap';
import '../css/app.css'; // Tailwind CSS

// Optional: Include Chart.js if using charts
import Chart from 'chart.js/auto';
window.Chart = Chart;


Alpine.start();
