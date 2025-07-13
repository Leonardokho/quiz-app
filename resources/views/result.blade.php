<!DOCTYPE html>
<html>
<head>
    <title>Quiz Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Bootstrap's bg-light color */
        }
        .results-page-header {
            background-color: #043502; /* Bootstrap's primary color */
            color: white;
            padding: 2rem 0;
            margin-bottom: 3rem;
        }
        .results-page-header h1 {
            font-weight: 300;
        }
        .card-header h2 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="results-page-header text-center">
        <div class="container">
            <h1 class="display-5">Hasil Kuis Anda</h1>
            <p class="lead">Kamu keren bisa sampai tahap ini...</p>
        </div>
    </div>

    <div class="container">
        <div class="card text-center shadow-sm">
            <div class="card-header bg-success text-white">
                <h2>Skor Kuis</h2>
            </div>
            <div class="card-body py-4">
                <h3 class="card-title">Skor Anda: {{ $score }}/{{ $total }}</h3>
                <div class="progress mt-4 mb-4" style="height: 30px;">
                    <div class="progress-bar bg-success" role="progressbar"
                         style="width: {{ $percentage }}%"
                         aria-valuenow="{{ $percentage }}"
                         aria-valuemin="0"
                         aria-valuemax="100">
                        {{ round($percentage, 2) }}%
                    </div>
                </div>
                <p class="card-text fs-5 mb-4">
                    @if($percentage >= 80)
                        sangat bagus
                    @elseif($percentage >= 60)
                        kamu telah lolos dengan poin 60
                    @else
                        Semangat belajarnyaa
                    @endif
                </p>
                <a href="/" class="btn btn-success btn-lg px-4 mt-3">Coba Lagi</a>
            </div>
        </div>
    </div>
</body>
</html>
