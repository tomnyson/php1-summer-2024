<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
</head>

<body>
    <h1>Create Product</h1>
    <form method="POST" action="/product/create">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" required>
        <br>
        <button type="submit">Create</button>
    </form>
    <a href="/product/index">Back to Products</a>
</body>

</html>