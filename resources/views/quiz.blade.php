<!DOCTYPE html>
<html>
<head>
    <title>Quiz App Sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
                body {
            background-color: #f8f9fa; /* Bootstrap's bg-light color */
        }
        .quiz-header {
            background-color: #043502; /* Bootstrap's primary color */
            color: white;
            padding: 2rem 0;
            margin-bottom: 3rem;
        }
        .quiz-header h1 {
            font-weight: 300;
        }
        .card-header h5 {
            margin-bottom: 0;
        }
        .lead {
            font-weight: 500
        }

    </style>
</head>
<body>
    <div class="quiz-header text-center">
        <div class="container">
            <h1 class="display-5">Quiz App</h1>
            <p class="lead">pengen liat seberapa pintar kamu</p>
        </div>
    </div>

    <div class="container">
        <form action="/submit" method="POST">
            @csrf
            @foreach($questions as $question)
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-gray">
                        <h5>Pertanyaan {{ $question['id'] }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $question['question'] }}</p>
                        @foreach($question['options'] as $option)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio"
                                    name="question_{{ $question['id'] }}"
                                    id="q{{ $question['id'] }}_{{ $loop->index }}"
                                    value="{{ $option }}" required>
                                <label class="form-check-label" for="q{{ $question['id'] }}_{{ $loop->index }}">
                                    {{ $option }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-success btn-lg px-5">Kirim Jawaban</button>
            </div>
        </form>
    </div>
</body>
</html>
