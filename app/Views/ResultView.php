<html>
<body>

<div style="text-align: center;margin-top: 100px">
    <p style="font-size: 25px">Paldies, <?= \App\Services\Convert::removeS($test->getSubject()) ?>!</p><br>
    <p>Tu atbildēji pareizi uz <?= $test->getCorrectAnswerCount() ?> no <?= $test->getQuestionCount() ?> jautājumiem</p>
    <br>
    <form method="get" action="/session">
        <input type="submit" value="Uz sākumu">
    </form>
</div>

</body>
</html>