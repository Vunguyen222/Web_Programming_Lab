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
    <title>Add</title>
</head>
<body>
    <div class="container-fluid my-3">
        <div class="card">
            <div class="card-header">
                <h2>Create New Product</h2>
            </div>
            <div class="card-body">
                <form id="form">

                <div class="mb-3">
                    <label for="" class="form-label">ID <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="id" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameError" required>
                    <div id="nameError" class="form-text text-danger"></div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea id="description" class="form-control" cols="30" rows="5" aria-describedby="desError"
                        required></textarea>
                    <div id="desError" class="form-text text-danger"></div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Price <span class="text-danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="price" required>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">URL of the product's image <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="image" aria-describedby="urlError" required>
                    <div id="urlError" class="form-text text-danger"></div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>

    <!-- jquer and ajax -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>
        
    <script>
        const form = document.getElementById("form"); 
        
        form.addEventListener("submit", (event) => {
            event.preventDefault();

            const id = document.getElementById("id").value;
            const name = document.getElementById("name").value;
            const description = document.getElementById("description").value;
            const price = document.getElementById("price").value; 
            const url = document.getElementById("image").value;

            let post = true; 

            if((0 < name.length && name.length < 5) || name.length > 40){
                document.getElementById("nameError").innerHTML = "Name length from 5 to 40 charactes !!";  
                post = false; 
            }
            if(description.length > 5000){
                document.getElementById("desError").innerHTML = "Description must not exceed 5000 characters !!";  
                post = false; 
            }
            
            if(url.length > 255){
                document.getElementById("urlError").innerHTML = "URL must not exceed 255 characters !!";  
                post = false; 
            }

            if(post){
                var formData = {
                    id : id, 
                    name : name, 
                    description : description, 
                    price : price, 
                    url : url
                };

                $.ajax({
                    url: "./server/controller/b.php",
                    type: "POST",
                    data : JSON.stringify(formData), 
                    contentType: "application/json; charset=utf-8",
                    success: function (response) {
                        if(response["status"] == 200){
                            console.log("thanh cong");  
                            location.href="index.php";
                        }
                        else{
                            alert("that bai");
                        }
                    },
                    error: function () {
                        // Hiển thị thông báo lỗi
                        alert('Đã xảy ra lỗi khi thêm sản phẩm');
                    }
                });
            }
            
        });
    </script>

</body>
</html>