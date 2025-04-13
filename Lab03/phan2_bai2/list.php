<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

        <link rel="stylesheet" href="style.css">
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

        $arr = array(array());
        // init data for array 
        for($i = 0; $i < 3; $i++){
            for($j = 0; $j < 2; $j++){
                $arr[$i][$j] = "";
            }
        }


        // connect database
        $conn = new mysqli($servername, $username, $password, $database); 

        if($conn -> connect_error){
            die("Connection failed: " . $conn->connect_error);
        }

        // query database
        $sql = "SELECT price, image FROM products"; 
        $result = $conn->query($sql); 

        if($result->num_rows > 0){
            $x = 0; 
            while($row = $result->fetch_assoc()){
                $arr[$x][0] = $row['price'];
                $arr[$x][1] = $row['image'];
                $x++; 
            }
        }

        // close connection
        $conn -> close(); 
    ?>



    <div class="container" style="border: 2px solid black;">
        <!-- header of page -->
        <div class="header row">
            <div class="title col-lg-2 col-md-2">
                <h1>Demo Shop</h1>
            </div>
            <div class="navigation col-lg-7 col-md-5" style="line-height: 60px;">
                <a href="#">Categories</a> |
                <a href="#">Contact us</a> |
                <a href="#">Follow us</a> 
            </div>
            <div class="search col-lg-3 col-md-5">
                <input type="text" name="search" id="search" placeholder="Search">
            </div>
        </div>

        <!-- content of page -->
        <div class="content row">
            <div class="leftSidebar col-md-2 col-lg-2">
                <div class="headSidebar">
                    <h2>Category</h2>
                </div>
                <div class="contentSidebar">
                    <ul class="list">
                        <li class="listItem"><a href="#">Item 1 ...</a></li>
                        <li class="listItem"><a href="#">Item 2 ...</a></li>
                        <li class="listItem"><a href="#">Item 3 ...</a></li>
                        <li class="listItem"><a href="#">Item 4 ...</a></li>
                        <li class="listItem"><a href="#">Item 5 ...</a></li>
                    </ul>
                </div>

                <div class="headSidebar">
                    <h2>Top Products</h2>
                </div>
                <div class="contentSidebar">
                    <ul class="list">
                        <li class="listItem"><a href="#">Item 1 ...</a></li>
                        <li class="listItem"><a href="#">Item 2 ...</a></li>
                        <li class="listItem"><a href="#">Item 3 ...</a></li>
                        <li class="listItem"><a href="#">Item 4 ...</a></li>
                        <li class="listItem"><a href="#">Item 5 ...</a></li>
                    </ul>
                </div>

                <div class="empty left"></div>
            </div>


            <div class="mainContent col-md-8 col-lg-8">
                <div class="topProducts">
                    <h2>Top Products</h2>
                </div>
                <div class="shellProduct row">
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[0][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[0][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[1][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[1][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[2][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[2][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[0][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[0][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[1][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[1][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="product">
                            <div class="picture">
                                <img src=<?php echo $arr[2][1] ?> alt="mypicture">
                            </div>
                            <div class="buy">
                                <p>Price: <?php echo $arr[2][0]?>$</p>
                                <button type="button">Buy Now</button>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="pageChange">
                    <ul class="pagination pagination-md pagination-sm justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">prev</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">next</a></li>
                    </ul>
                </div>
                <!-- pagination-sm -->
            </div>

            <div class="rightSidebar col-md-2 col-lg-2">
                <div class="top"> </div>
                <div class="bottom"></div>
            </div>
        </div>

        
        <div class="footer">
            <p style="margin: 0;">Footer Information</p>
            <a href="#">Link1</a> | <a href="#">Link2</a> | <a href="#">Link3</a>
        </div>
    </div>

   
</body>
</html>