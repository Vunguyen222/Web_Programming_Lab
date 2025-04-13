<?php
    require_once "config.php";
    $id = 0;
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
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
    <!-- end -->
    
    <title>Edit</title>
</head>
<body>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function Val($str){
                global $name, $description, $price, $url, $id; 
                switch ($str) {
                    case 'name':
                        # code...
                        return $name;
                    case 'description':
                        # code...
                        return $description;
                    case 'price':
                        # code...
                        return $price;
                    case 'image':
                        # code...
                        return $url;
                    default:
                        # code...
                        return ""; 
                }
            }


        // start edit data of product when the form is submitted
        $error = ["","",""]; 

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = test_input($_POST['name']);
            $description = test_input($_POST['description']);
            $price = doubleval(test_input($_POST['price']));
            $id = intval(test_input($_POST['id']));
            $url = test_input($_POST['image']);
            
            $valid = true;
    
            if((0 < strlen($name) && strlen($name) < 5) || strlen($name) > 40){
                $error[0] = "Name length from 5 to 40 characters !!";
                $valid = false;
            }
    
            if(strlen($description) > 5000){
                $error[1] = "Description must not exceed 5000 characters !!";
                $valid = false;
            }
    
            if(strlen($url) > 255){
                $error[2] = "URL must not exceed 255 characters !!";
                $valid = false;
            }

            // Update database
            
            if($valid){
                $sql = "UPDATE products SET name='$name', description='$description', price=$price, image='$url' WHERE id=$id";
                $result = $conn->query($sql);
                if($result == false){
                    echo "Error";
                }
                header("Location: index.php");
            }
        }
        else{
            // get data from database to perform product when the form is not submitted (at the first time access)
            $getData = $conn->query("SELECT name, description, price, image FROM products WHERE id=$id");

            $rs = $getData->fetch_assoc(); 
            if($rs == false){
                echo "Error";
            }
            
            $name = $rs['name'];
            $description = $rs['description'];
            $price = $rs['price'];
            $url = $rs['image'];
        }

    ?>

    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-header">
                <h2>Edit Existing Product</h2>
            </div>
            <div class="card-body">
                <form action=<?php echo $_SERVER['PHP_SELF']?> method="POST">
    
                <div class="mb-3">
                    <label for="" class="form-label">ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" value="<?php echo $id?>" disabled>
                </div>
                <!-- hidden input to get old id -->
                <input type="hidden" name="id" value="<?php echo $id?>">

                <div class="mb-3">
                    <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" aria-describedby="nameError" required 
                        value="<?php echo Val("name") ?>">
                    <div id="nameError" class="form-text text-danger"><?php echo $error[0]?></div>
                </div>
    
                <div class="mb-3">
                    <label for="" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" cols="30" rows="5" aria-describedby="desError"
                        required><?php echo Val("description")?></textarea>
                    <div id="desError" class="form-text text-danger"><?php echo $error[1]?></div>
                </div>
    
                <div class="mb-3">
                    <label for="" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" name="price" required value="<?php echo Val("price")?>">
                </div>
    
                <div class="mb-3">
                    <label for="" class="form-label">URL of the product's image <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="image" aria-describedby="urlError" required 
                        value="<?php echo Val("image")?>">
                    <div id="urlError" class="form-text text-danger"><?php echo $error[2]?></div>
                </div>
    
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="index.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>