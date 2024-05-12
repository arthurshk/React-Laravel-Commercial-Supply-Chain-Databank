<!-- <!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>
    <form method="POST" action="{{ url('/products') }}">
        @csrf
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>

        <label for="img_url">Image URL:</label><br>
        <input type="text" id="img_url" name="img_url"><br><br>

        <input type="submit" value="Create Product">
    </form>
</body>
</html> -->