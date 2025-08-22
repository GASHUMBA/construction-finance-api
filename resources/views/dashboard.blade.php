@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>


<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="stats-card bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Employees</h2>
        <p class="text-3xl font-bold text-blue-600">{{ $employeesCount ?? 0 }}</p>
    </div>

    <div class="stats-card bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Projects</h2>
        <p class="text-3xl font-bold text-green-600">{{ $projectsCount ?? 0 }}</p>
    </div>

    <div class="stats-card bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Expenses</h2>
        <p class="text-3xl font-bold text-red-600">{{ $expensesCount ?? 0 }}</p>
    </div>

    <div class="stats-card bg-white shadow rounded-lg p-6 text-center">
        <h2 class="text-lg font-semibold text-gray-700">Users</h2>
        <p class="text-3xl font-bold text-purple-600">{{ $usersCount ?? 0 }}</p>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Bar Chart: Projects vs Expenses -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Projects & Expenses Overview</h2>
        <canvas id="barChart"></canvas>
    </div>

    <!-- Pie Chart: Employee Distribution -->
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Employee Distribution</h2>
        <canvas id="pieChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<div class="container mx-auto py-6">
    <h2 class="text-xl font-bold mb-4">Monthly Income Chart</h2>
    <canvas id="incomeChart" class="bg-white p-4 rounded shadow"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('incomeChart').getContext('2d');
    const incomeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Income ($)',
                data: @json(array_map(fn($m) => $m ?? 0, $monthlyIncomes ?? [])), 
                backgroundColor: 'rgba(34, 197, 94, 0.7)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection('scripts')
                    
</div>
