<!-- joined_events.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Joined Events</title>
</head>
<body>

<h1>Your Joined Events</h1>

<ul>
    <?php foreach ($joinedEvents as $event): ?>
        <li>
            <h2><?= $event['title'] ?></h2>
            <p>Date: <?= $event['date'] ?></p>
            <p>Location: <?= $event['location'] ?></p>
            <p>Description: <?= $event['description'] ?></p>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
