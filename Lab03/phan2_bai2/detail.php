<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="detail.css">
    <title>Document</title>
</head>
<body>
    <!-- php code -->
    <?php
        // global variable
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $database = "shop"; 

        $description = ""; 
        $name = ""; 
        $img = [];

        // connect database
        $conn = new mysqli($servername, $username, $password, $database); 
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        // query on table of database
        $sql = "SELECT id, name, description, image FROM products";
        $result = $conn->query($sql); 

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                if($row['id'] == 3){
                    $description = $row['description'];
                    $name = $row['name']; 
                }
                array_push($img, $row['image']);
            }
        }


        // close connection
        $conn->close(); 
    ?>

    <div class="container">

        <!-- header of page -->
        <div class="header">    
            <div class="header-name">
                <h1>Site Title</h1>
            </div>
            <div class="navigation">
                <a href="#">Categories</a> | <a href="#">Contact us</a> | <a href="#">Follow us</a>
            </div>
            <div class="search">
                <input type="text" name="search" id="search" placeholder="Search ...">
            </div>
        </div>


        <!-- content of page -->
        <div class="content">

            <!-- left side bar -->
            <div class="left-Sidebar">
                <div class="Category">
                    <h2>Category</h2>
                </div>

                <div class="Category-list">
                    <ul class="list">
                        <li class="list-items"><a href="#">Item 1...</a></li>
                        <li class="list-items"><a href="#">Item 2...</a></li>
                        <li class="list-items"><a href="#">Item 3...</a></li>
                        <li class="list-items"><a href="#">Item 4...</a></li>
                        <li class="list-items"><a href="#">Item 5...</a></li>
                    </ul>
                </div>

                <div class="Top-Products">
                    <h2>Top Products</h2>
                </div>

                <div class="Top-Products-list">
                   <ul class="list">
                        <li class="list-items"><a href="#">Item 1...</a></li>
                        <li class="list-items"><a href="#">Item 2...</a></li>
                        <li class="list-items"><a href="#">Item 3...</a></li>
                        <li class="list-items"><a href="#">Item 4...</a></li>
                        <li class="list-items"><a href="#">Item 5...</a></li>
                   </ul>
                </div>
            </div>

            <!-- main content -->
            <div class="main-Content">
                <div class="path">
                    <h3>Home > Main Category > Sub Category</h3>
                </div>

                <div class="main-Product">
                    <div class="picture">
                        <img src=<?php echo $img[2] ?> alt="mypicture" style="width: 100%; height: 200px; margin-bottom: 10px;">
                        <div class="other-Product">
                            <img src=<?php echo $img[2] ?> alt="my picture" class="picture-Item">
                            <img src=<?php echo $img[1] ?> alt="my picture" class="picture-Item">
                            <img src=<?php echo $img[0] ?> alt="my picture" class="picture-Item">
                        </div>
                    </div>
                    <div class="information">
                        <h2><?php echo $name ?></h2>
                        <h3>Summary:</h3>
                        <p><?php echo $description ?></p>
                        <button type="button">Buy Now</button>
                    </div>
                </div>

                <div class="description">
                    <h3>Description</h3>
                    <ul class="Lorem">
                        <li class="Lorem-Item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, cum.</li>
                        <li class="Lorem-Item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, cum.</li>
                        <li class="Lorem-Item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, cum.</li>
                        <li class="Lorem-Item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, cum.</li>
                    </ul>
                </div>
            </div>


            <!-- right side bar -->
            <div class="right-Sidebar">
                <div class="top"></div>
                <div class="bottom"></div>
            </div>
        </div>


        <!-- footer of page -->
        <div class="footer">
            <p>Footer Information ...</p>
            <a href="#">Link 1</a> <span>|</span>
            <a href="#">Link 2</a> <span>|</span>
            <a href="#">Link 3</a>
        </div>
    </div>
</body>
</html>