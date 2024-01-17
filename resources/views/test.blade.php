@extends('layouts.home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart" width="10px" height="10px"></canvas>
        </div>
    </div>
</div>

@endsection



@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>    
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'radar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May'],
        datasets: [{
          label: 'Monthly Sales',
          data: [12, 1, 3, 5, 2],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1,
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
