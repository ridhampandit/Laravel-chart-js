@extends('layouts.app')
@section('main')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <canvas id="myChart" height="100px"></canvas>
        </div>
    </section>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Data',
                        data: @json($data),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: true
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
        });
    </script>
@endsection
