@extends('layouts.app')

@section('content')
<div class="d-flex min-vh-100">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-primary text-white" style="width: 280px;">
        <h2 class="fs-4 fw-bold">School MS</h2>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
            </li>
            <li>
                <a href="{{ route('students.index') }}" class="nav-link text-white">Students</a>
            </li>
            <li>
                <a href="{{ route('classes.index') }}" class="nav-link text-white">Classes</a>
            </li>
            <li>
                <a href="{{ route('reports') }}" class="nav-link active bg-light text-dark" aria-current="page">Reports</a>
            </li>
            <li>
                <a href="{{ route('settings') }}" class="nav-link text-white">Settings</a>
            </li>
        </ul>
        <hr>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100 text-start">Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column">
        <!-- Header -->
        <header class="bg-white shadow p-3">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-dark">Reports</h1>
                <div class="text-muted">
                    Welcome, {{ auth()->user()->name }}
                </div>
            </div>
        </header>

        <!-- Reports Content -->
        <main class="flex-grow-1 container-fluid p-4">
            <!-- Attendance Summary -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Attendance Summary</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Attendance (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendanceSummary as $record)
                                <tr>
                                    <td>{{ $record['name'] }}</td>
                                    <td>{{ $record['grade'] }}</td>
                                    <td>
                                        <span class="{{ $record['attendance_percentage'] < 80 ? 'text-danger' : 'text-success' }}">
                                            {{ $record['attendance_percentage'] }}%
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Class Enrollment Statistics -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Class Enrollment Statistics</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Room</th>
                                <th>Student Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classEnrollments as $class)
                                <tr>
                                    <td>{{ $class['name'] }}</td>
                                    <td>{{ $class['room'] }}</td>
                                    <td>{{ $class['student_count'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white py-3">
            <div class="container-fluid text-center">
                <p class="mb-0">© {{ date('Y') }} School Management System. All rights reserved.</p>
            </div>
        </footer>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection