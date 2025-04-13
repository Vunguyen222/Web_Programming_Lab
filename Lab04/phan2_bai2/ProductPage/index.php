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
            </tbody>
        </table>
    </div>

    <!-- jquer and ajax -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous">
    </script>


    <script>
        function Del(name, id){
            if( confirm("Are you sure to delete this product: " + name + " ?")){
                $.ajax({
                    url: `./server/controller/d.php?id=${id}`,
                    type: "DELETE",
                    success: function (response) {
                        if(response["status"] == 200){
                            console.log("thanh cong");
                            location.reload();
                        }
                        else{
                            alert("that bai");
                        }
                    },
                    error: function () {
                        alert('Đã xảy ra lỗi khi xóa sản phẩm');
                    }
                });
            }
        }

        $(document).ready(function () {
             $.ajax({
                url: "./server/controller/a.php",
                type: "GET",
                success: function (response) {
                    if(response["status"] == 200){
                        for(let key in response){
                            console.log(response[key]);
                            if(response[key] == 200) break;
                            let tdoc = `<tr>
                                        <td>${response[key]['id']}</td>
                                        <td>${response[key]['name']}</td>
                                        <td>${response[key]['description']}</td>
                                        <td>${response[key]['price']}</td>
                                        <td class="text-center"><img src="${response[key]['image']}" class="h-50 w-50" alt=""></td>
                                        <td>
                                            <a href="edit.php?id=${response[key]['id']}" class="btn btn-info w-100 mb-2">Edit</a>
                                            <a onclick="Del('${response[key]['name']}',${response[key]['id']})" " 
                                                class="btn btn-danger w-100">Delete</a>
                                        </td>
                                    </tr>`
                            document.getElementsByTagName("tbody")[0].innerHTML += tdoc; 
                        }
                    }
                    else{
                        alert("Không có sản phẩm nào trong giỏ hàng . ");
                    }
                },
                error: function () {
                    alert('Đã xảy ra lỗi khi tải ảnh từ server.');
                }
            });
        })
    </script>
</body>
</html>