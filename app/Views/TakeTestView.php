<html>

<header>
    <link rel="stylesheet" href="/../app/Views/Styles/TakeTestViewStyles.css">
</header>

<body>
<a href="/session">Beigt</a>
<div style="text-align: center;margin-top: 100px">
    <p style="font-size: 25px"><?= $test->getContent()->question ?></p>

    <form method="post" action="/test">

        <?php for ($i = 0; $i < count($test->getContent()->answers); $i += 2): ?>
            <div class="section group">
                <div class="col span_1_of_2">
                    <input class="checkboxes" onclick="checkOnlyOne(this.value);" type="checkbox" name="answer"
                           value="<?= $test->getContent()->answers[$i] ?>"/> <?= $test->getContent()->answers[$i] ?>

                </div>
                <?php if ($test->getContent()->answers[$i + 1] != null): ?>
                    <div class="col span_1_of_2">
                        <input class="checkboxes" onclick="checkOnlyOne(this.value);" type="checkbox" name="answer"
                               value="<?= $test->getContent()->answers[$i + 1] ?>"/> <?= $test->getContent()->answers[$i + 1] ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
        <br/><br/>

        <progress value="<?= $test->getCurrentQuestion() ?>" max="<?= $test->getQuestionCount() ?>"></progress>
        <br><br>
        <?php if ($test->getCurrentQuestion() == $test->getQuestionCount()): ?>
            <input type="submit" value="Pabeigt">
        <?php else: ?>
            <input type="submit" value="Nākamais">
        <?php endif; ?>
    </form>
    <br>
    <p style="color:red"><?= $error ?></p>

</div>

<script src="app/Views/Javascript/Checkbox.js"></script>

</body>
</html>
