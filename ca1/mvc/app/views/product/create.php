<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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