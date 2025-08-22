@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-success text-white text-center">
            <h3>Manager Dashboard</h3>
        </div>
        <div class="card-body text-center">
            <h5>Welcome, Manager!</h5>
            <p class="text-muted">Here you can oversee projects, track expenses, and monitor staff performance.</p>

            <div class="row mt-4">
                <!-- Projects -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Projects</h5>
                            <p class="card-text">View and manage all active construction projects.</p>
                            <a href="#" class="btn btn-outline-success">View Projects</a>
                        </div>
                    </div>
                </div>

                <!-- Expenses -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Expenses</h5>
                            <p class="card-text">Track expenses and vendor payments for each project.</p>
                            <a href="#" class="btn btn-outline-success">View Expenses</a>
                        </div>
                    </div>
                </div>

                <!-- Reports -->
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Reports</h5>
                            <p class="card-text">Generate financial and progress reports.</p>
                            <a href="#" class="btn btn-outline-success">Generate Reports</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ url('/') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
@endsection
