<!-- app/Views/confirmation_email.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Email</title>
</head>
<body>
    <h1>Benvenuto/a <?= $firstName ?>,</h1>
    <p>Clicca il seguente link per confermare l'iscrizione:</p>
    <a href="<?= $activationLink ?>"><?= $activationLink ?></a>
</body>
</html>

