<?php include '../config/database.php'; ?>
<?php include '../templates/header.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $stmt = $pdo->prepare("INSERT INTO product (name, description, price, category_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $category_id]);

    header('Location: index.php');
    exit;
}
?>

<form method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Product Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Product Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <?php
            $categories = $pdo->query('SELECT * FROM category_product')->fetchAll();
            foreach ($categories as $category) {
                echo "<option value='{$category['id']}'>{$category['category_name']}</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<?php include '../templates/footer.php'; ?>
