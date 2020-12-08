<html>
<body>

<div style="text-align: center;margin-top: 100px">
    <p style="font-size: 25px">Testa uzdevums</p>

    <form method="post" action="/session">
        <input style="width: 200px;margin-bottom: 20px" type="text" name="name" placeholder="ievadi savu vārdu..."
               required><br>
        <select style="width: 200px" name="test">
            <?php foreach ($allTestNames as $test): ?>
                <option value="<?= $test['name'] ?>"><?= $test['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="submit" value="Sākt">
    </form>
</div>

</body>
</html>