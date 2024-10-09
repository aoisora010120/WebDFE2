<?php include '../config/database.php'; ?>
<?php include '../templates/header.php'; ?>

<div class="mt-4">
    <a href="add_product.php" class="btn btn-success mb-3">Add Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query('SELECT p.id, p.name, p.description, p.price, c.category_name AS category, p.created_at 
                                 FROM product p 
                                 LEFT JOIN category_product c ON p.category_id = c.id');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['category']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                        <a href='edit_product.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='delete_product.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../templates/footer.php'; ?>
