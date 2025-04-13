<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- end link here -->
    <title>Document</title>
</head>
<body>
    <style>
        .formerror{
            color : red; 
        }
    </style>
    <?php
        $fname = $lname = $email = $password = $gender = $dd = $mm = $yyyy = $country = $about = "";
        $ferror = array(); 

        for($i = 0; $i < 8; $i++){
            $ferror[$i] = ""; 
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function Val($str){
            global $fname, $lname, $email, $password, $about; 
            if(isset($_POST[$str])){
                switch ($str) {
                    case 'firstName':
                        # code...
                        return $fname;
                    case 'lastName':
                        # code...
                        return $lname;
                    case 'email':
                        # code...
                        return $email;
                    case 'password':
                        # code...
                        return $password;
                    default:
                        # code...
                        return $about; 
                }
            }
            return "";
        }

        function check($str){
            global $gender;
            if(isset($_POST['gender'])){
                if($gender == $str){
                    return "checked";
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = test_input($_POST["firstName"]);
            $lname = test_input($_POST["lastName"]);
            $email = test_input($_POST["email"]);
            $password = test_input($_POST["password"]);
            $day = (int)test_input($_POST["dd"]);
            $month = (int)test_input($_POST["mm"]);
            $year = (int)test_input($_POST["yyyy"]);
            $country = test_input($_POST["country"]);
            $about = test_input($_POST["about"]);
            
            if(isset($_POST["gender"])){
                $gender = test_input($_POST["gender"]);
            }

            // first name input
            if ($fname == "") {
                $ferror[0] = "please type your first name !!";
            } 
            else if (strlen($fname) < 2) {
                $ferror[0] = "First name is at least 2 characters !!";
            }
            else if (strlen($fname) > 30) {
                $ferror[0] = "First name's maximum characters is 30 !!";
            }

            // last name input
            if ($lname == "") {
                $ferror[1] = "please type your last name !!";
            } 
            else if (strlen($lname) < 2) {
                $ferror[1] = "Last name is at least 2 characters !!";
            }
            else if (strlen($lname) > 30) {
                $ferror[1] = "Last name's maximum characters is 30 !!";
            }

            // email input
            if (strlen($email) == 0) {
                $ferror[2] = "please type your email address !!";
            }
            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $ferror[2] = "Invalid email address !!";
            }

            // password input
            if (strlen($password) == 0) {
                $ferror[3] = "please type your password !!";
            }
            else if (strlen($password) < 2) {
                $ferror[3] = "password is at least 2 charactes !!";
            }
            else if (strlen($password) > 30) {
                $ferror[3] = "password's maximum characters is 30 !!";
            }

            // Birthday input
            // nam tron khong nhuan (2000, 3000)
            if ($month == 2 && $day > 29 ) {
                $ferror[4] = "Invalid Birthday !!";
            }

            if ($month == 2 && $day == 29 && ($year % 100 == 0 && $year % 400 != 0)) {
                $ferror[4] = "Invalid Birthday !!";
            }

            // nam thuong khong nhuan (2001, 2002)
            if ($month == 2 && $day == 29 && ($year % 100 != 0 && $year % 4 != 0)) {
                $ferror[4] = "Invalid Birthday !!";
            }

            if (($month == 4 || $month == 6 || $month == 9 || $month == 11) && $day == 31) {
                $ferror[4] = "Invalid Birthday !!";
            }

            // gender input
            if(strlen($gender) == 0){
                $ferror[5] = "please choose your gender !!";
            }

            // textarea input
            if (strlen($about) == 0) {
                $ferror[6] = "Please tell somthing about yourself !!";
            }
            else if (strlen($about) > 10000) {
                $ferror[6] = "The About description is too long, please shorten it !!";
            }

            $error = 0; 
            for($i = 0; $i < 8 ; $i++){
                if($ferror[$i] != ""){
                    $error = 1; 
                    break; 
                }
            }

            if($error == 0){
                $ferror[7] = "<h1>Complete Form !!</h1>";
                $fname = $lname = $email = $password = $gender = $dd = $mm = $yyyy = $country = $about = "";
            }
        }

    ?>

    <div class="container border bg-info">
        <div class="header">
            <h1>Membership Registration !!</h1>
            <span><?php echo $ferror[7];?></span>
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="form-group mb-3">
                <label for="firstName">First Name</label>
                <input type="text" name="firstName" id="firstName" placeholder="First Name here" class="form-control my-2"
                    value="<?php echo Val("firstName") ?>">
                <span class="formerror"><?php echo $ferror[0];?></span>
            </div>

            <div class="form-group mb-3">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" placeholder="Last Name here" class="form-control my-2"
                    value="<?php echo Val("lastName") ?>">
                <span class="formerror"><?php echo $ferror[1];?></span>
            </div>
            
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="email.@gmail.com" class="form-control my-2"
                    value="<?php echo Val("email") ?>">
                <span class="formerror"><?php echo $ferror[2];?></span>
            </div>

            <div class="form-group mb-3">
                <label for="">Password</label>
                <input type="password" name="password" id="password" placeholder="your password here" class="form-control my-2"
                    value="<?php echo Val("password") ?>">
                <span class="formerror"><?php echo $ferror[3];?></span>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-lable">Birthday (dd/mm/yyyy)</label>
                <div class="row my-2">
                    <div class="col-3">
                        <select name="dd" id="dd" class="form-select">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="mm" id="mm" class="form-select">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="yyyy" id="yyyy" class="form-select">
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                    </div>
                </div>
                <span class="formerror"><?php echo $ferror[4];?></span>
            </div>

            <div class="my-2">
                <label for="" class="form-lable me-4">Gender</label>
                <br>
                <div class="form-check form-check-inline my-2">
                    <input type="radio" name="gender" value="male" class="form-check-input" <?php echo check("male")?>>
                    <label for="male" class="form-check-label me-4">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="female" class="form-check-input" <?php echo check("female")?>>
                    <label for="female" class="form-check-label me-4">Female</label>
                </div>

                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="others" class="form-check-input" <?php echo check("others")?>>
                    <label for="others" class="form-check-label me-4">Others</label>
                </div>
                <span class="formerror"><?php echo $ferror[5];?></span>
            </div>

            <div class="form-group mb-3">
                <label class="form-lable" for="country">Country</label>
                <select name="country" id="country" class="form-select my-2">
                    <option value="0">Vietnam</option>
                    <option value="1">Australia</option>
                    <option value="2">United States</option>
                    <option value="3">India</option>
                    <option value="4">Other</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="" class="form-lable">About</label>
                <textarea name="about" id="about" cols="30" rows="10" class="form-control my-2"> <?php echo Val("about") ?></textarea>
                <span class="formerror"><?php echo $ferror[6];?></span>
            </div>

            <div class="row justify-content-end my-4 d-flex">
                <button type="reset" class="col-2 btn btn-danger mx-2 fs-5">Reset</button>
                <button type="submit" class="col-2 btn btn-success fs-5 me-4" >Submit</button>
            </div>
        </form>
    </div>

    <script src="form.js"></script>
</body>
</html>
