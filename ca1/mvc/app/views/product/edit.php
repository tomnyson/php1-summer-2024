<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>

<body>
    <h1>Edit Product</h1>
    <form method="POST" action="/product/edit/<?= $data['product']['id'] ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= $data['product']['name'] ?>" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?= $data['product']['price'] ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
    <a href="/product/index">Back to Products</a>
</body>

</html>