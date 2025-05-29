@extends('layouts.side-layout')

@section('admin-content')
  
<nav class="navbar navbar-expand-lg navbar-dark" 
     style="background: linear-gradient(90deg, #3187e2, #87d948); padding: 0.8rem 1rem; border-radius: 10px 10px 10px 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2);">
    <div class="container-fluid justify-content-center">
        <a class="navbar-brand fw-bold text-white text-center" href="#">
            <i class="bi bi-speedometer2 me-2"></i> Welcome, Admin!
        </a>
    </div>
</nav>



<div class="container mt-4">
    
    <div class="row mb-4">
        <!-- Example stats cards -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Products</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $productsCount }}</h5>
                    <p class="card-text">Products currently in the catalog.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Sales</div>
                <div class="card-body">
                    <h5 class="card-title">${{ number_format($totalSales, 2) }}</h5>
                    <p class="card-text">Sales amount this month.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Active Users</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $activeUsers }}</h5>
                    <p class="card-text">Currently active users.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Products category pie chart -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Products by Category</div>
                <div class="card-body">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Products price bar chart -->
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Product Prices</div>
                <div class="card-body">
                    <canvas id="priceChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Chart.js scripts with data passed from backend
const categoryLabels = @json(array_keys($productsByCategory));
const categoryData = @json(array_values($productsByCategory));

const priceLabels = @json($products->pluck('name'));
const priceData = @json($products->pluck('price'));

const ctxCategory = document.getElementById('categoryChart').getContext('2d');
const categoryChart = new Chart(ctxCategory, {
    type: 'pie',
    data: {
        labels: categoryLabels,
        datasets: [{
            label: 'Products by Category',
            data: categoryData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderWidth: 1
        }]
    },
});

const ctxPrice = document.getElementById('priceChart').getContext('2d');
const priceChart = new Chart(ctxPrice, {
    type: 'bar',
    data: {
        labels: priceLabels,
        datasets: [{
            label: 'Price ($)',
            data: priceData,
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
@endsection
