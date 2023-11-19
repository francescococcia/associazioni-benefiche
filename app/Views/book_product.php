<!-- app/Views/confirmation_email.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Conferma Iscrzione</title>
</head>

<body style="font-family: Arial, sans-serif;">

    <h1>Ciao <?= $firstName ?>,</h1>
    <p>Ti confermiamo che la tua prenotazione è andata a buon fine.</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 10px; border: 1px solid #dddddd;">Prodotto</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Quantità</th>
                <th style="padding: 10px; border: 1px solid #dddddd;">Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 10px; border: 1px solid #dddddd;"><?= $productName ?></td>
                <td style="padding: 10px; border: 1px solid #dddddd;"><?= $quantity ?></td>
                <td style="padding: 10px; border: 1px solid #dddddd;">€ <?= number_format($productPrice, 2, ',', ' '); ?></td>
            </tr>
        </tbody>
    </table>

    <p>Ti ricordiamo che potrai ritirare il/i prodotto/i presso la sede di <strong><?= $nameAssociation ?></strong> in <?= $associationAddress ?>.</p>
    <p>Tutte le informazioni inerenti ai prodotti prenotati, le puoi trovare nella sezione "I miei prodotti" del tuo profilo personale.</p>
    <p>Grazie per la tua donazione!</p>
</body>

</html>
