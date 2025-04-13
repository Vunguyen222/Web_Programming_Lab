<?php
    require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <!-- end bootstrap -->

    <title>List</title>
</head>
<body>
    <div class="container-fluid">
        <div class="my-3">
            <h1>Read Products</h1>
        </div>

        <!-- add button -->
        <a href="add.php" class="btn btn-primary mb-4 fw-bold">Create New Product</a>

        <!-- table of content -->
        <!-- scope to define that the header is header of row or col -->
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="text-center">Description</th>
                    <th scope="col" class="text-center">Price($)</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM products";
                    $result = $conn->query($sql); 
                    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){ ?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['name']?></td>
                                <td><?php echo $row['description']?></td>
                                <td><?php echo $row['price']?></td>
                                <td class="text-center"><img src="<?php echo $row['image']?>" class="h-50 w-50" alt=""></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-info w-100 mb-2">Edit</a>
                                    <a onclick="return Del('<?php echo $row['name'] ?>')" href="delete.php?id=<?php echo $row['id']?>" 
                                        class="btn btn-danger w-100">Delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        function Del(name){
            return confirm("Are you sure to delete this product: " + name + " ?");
        }
    </script>
</body>
</html>