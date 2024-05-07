<!DOCTYPE html>
<title>bai 2</title>
<link rel="stylesheet" href="./style.css">

<head></head>

<body>
    <h1>bai 3 for/while/do-while </h1>
    <?php
    // 1 -100
    for ($i = 0; $i < 100; $i++) {
        echo "<p>$i</p>";
    }
    // while -> in so le
    $i = 0;
    while ($i < 100) {
        if ($i % 2 != 0) {
            echo "<p>$i</p>";
        }
        $i++;
    }

    // do while
    $i = 0;
    do {
        if ($i % 2 != 0) {
            echo "<p>$i</p>";
        }
        $i++;
    } while ($i < 100);

    ?>

</body>

</html>