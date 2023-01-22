<!-- function: getProducts() -->
<?php
    require 'connection.php';

    function getProducts(){
        $conn = connection();
        $sql = "SELECT products.id AS id, products.title AS title, products.description AS `description`, products.price AS price, sections.title AS section FROM products INNER JOIN sections ON products.section_id = sections.id ORDER BY products.id";

        if($result = $conn->query($sql)){
            return $result;
        }else{
            die("Error retreaving all products".$conn->error);
        }
    }
    print_r (getProducts());
?>
<!doctype html>
<html lang="en">
<head>
    <title>Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include "main-nav.php";
    ?>
    <main class="container py-5">
        <a href="sections.php" class="btn btn-outline-info float-end ms-2"><i class="fas fa-plus-circle"></i> Add New Section</a>
        <a href="add-product.php" class="btn btn-success float-end"><i class="fas fa-plus-circle"></i> Add New Product</a>

        <h2 class="h3 text-muted">Product List</h2>

        <table class="table table-hover mt-4">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>TITLE</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>SECTION</th>
                    <th style="width: 95px"></th>   <!-- for the action buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                $prod_result = getProducts();
                while($prod_row = $prod_result->fetch_assoc()){
                    // print_r($prod_row);
                ?>
                <tr>
                    <td><?= $prod_row['id'] ?></td>
                    <td><?= $prod_row['title'] ?></td>
                    <td><?= $prod_row['description'] ?></td>
                    <td>$<?= $prod_row['price'] ?></td>
                    <td><?= $prod_row['section'] ?></td>
                    <td>
                        <a href="edit-product.php?prod_id=<?= $prod_row['id'] ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        <a href="remove-product.php?prod_id=<?= $prod_row['id'] ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>