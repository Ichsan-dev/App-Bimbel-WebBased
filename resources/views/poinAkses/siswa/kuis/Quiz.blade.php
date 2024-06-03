<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('kuis/style.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="app">
        <h1> Kuis Sederhana</h1>
        <span id="score"></span>
        <div class="quiz">
            <h2 id="question">
                Kuis Dibawah Sini
            </h2>
            {{-- <div id="answer-buttons">
                <button class="btn">Jawaban 1</button>
                <button class="btn">Jawaban 2</button>
                <button class="btn">Jawaban 3</button>
                <button class="btn">Jawaban 4</button>
            </div> --}}
            <button id="next-btn">x</button>
        </div>
    </div>
    <script src="{{asset('kuis/new-sct-fixed.js')}}"></script>
</body>
</html>
