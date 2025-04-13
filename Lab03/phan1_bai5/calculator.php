<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calculator.css">

    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- end link here -->
    <title>Document</title>
</head>
<body>
    <div class="bg-danger container-fluid vh-75">
        <!-- header -->
        <div class="header text-center mb-5">
            <h1>Calculator Online</h1>
        </div>

        <!-- container -->
        <div class="container py-5">

            <!-- add -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="row mb-3" id="add">
                    <div class="col">
                        <input type="text" name="firstNum" id="firstNum" class="form-control text-center">
                    </div>
                    <div class="col text-center fs-5">
                        <select name="operand" id="operand" class="form-select">
                            <option value="+">+</option>
                            <option value="-">-</option>
                            <option value="*">*</option>
                            <option value="/">/</option>
                            <option value="^">^</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="secondNum" id="secondNum" class="form-control text-center">
                    </div>
                    <div class="col text-center">
                        <button type="submit" class="btn btn-success fs-5 fw-bold">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php
        if (isset($_POST['firstNum']) && isset($_POST['secondNum']) && isset($_POST['operand'])) {
            $firstNum = $_POST['firstNum']; 
            $secondNum = $_POST['secondNum']; 
            $operand = $_POST['operand'];
            $result = 0; 
            if($firstNum != '' && $secondNum !=''){
                switch ($operand) {
                    case '+':
                        # code...
                        $result = $firstNum + $secondNum; 
                        break;
                    case '-':
                        # code...
                        $result = $firstNum - $secondNum;
                        break;
                    case '*':
                        # code...
                        $result = $firstNum * $secondNum; 
                        break;
                    case '/':
                        # code...
                        if($secondNum == 0){
                            echo '
                            <div class="row bg-dark rounded-2 text-white text-center">
                                <div class="h-100 py-2 fs-5">Divided by zero !!</div>
                            </div>
                            ';
                            return; 
                        }
                        $result = $firstNum / $secondNum; 
    
                        break;
                    case '^':
                        # code...
                        $result = pow($firstNum, $secondNum); 
                        break;
                    
                    default:
                        # code...
                        break;
                }
                echo '
                <div class="row bg-dark rounded-2 text-white text-center">
                    <div class="h-100 py-2 fs-5">'.$firstNum.' '.$operand.' '.$secondNum.' = '.$result.'</div>
                </div>
                ';
            }
            else{
                echo '
            <div class="row bg-dark rounded-2 text-white text-center">
                <div class="h-100 py-2 fs-5">Please fill the numbers!!</div>
            </div>
            ';
            }
        }
        else{
            echo '
            <div class="row bg-dark rounded-2 text-white text-center">
                <div class="h-100 py-2 fs-5">Result!!</div>
            </div>
            ';
        }
    ?>
</body>
</html>