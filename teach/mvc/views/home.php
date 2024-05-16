<!-- views/home.php -->

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($translations['title']); ?></title>
</head>

<body>
    <h1><?php echo htmlspecialchars($translations['users']); ?></h1>
    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?php echo htmlspecialchars($user['name']) . ' (' . htmlspecialchars($user['email']) . ')'; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>