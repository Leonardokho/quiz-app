<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $questions = json_decode(Storage::get('questions.json'), true);
    return view('quiz', ['questions' => $questions]);
});

Route::post('/submit', function () {
    $questions = json_decode(Storage::get('questions.json'), true);
    $score = 0;
    $total = count($questions);

    foreach ($questions as $question) {
        $userAnswer = request('question_' . $question['id']);
        if ($userAnswer === $question['correct_answer']) {
            $score++;
        }
    }

    return view('result', [
        'score' => $score,
        'total' => $total,
        'percentage' => ($score / $total) * 100
    ]);
});

