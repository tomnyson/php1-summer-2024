<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <h1>Edit Product</h1>
    <?php
    var_dump($data);
    ?>
    <form method="POST" action="/product/edit/<?= $data['product']['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $data['product']['name'] ?>" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" class="form-control" name="price" id="price" value="<?= $data['product']['price'] ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/product/index">Back to Products</a>
</body>

</html>