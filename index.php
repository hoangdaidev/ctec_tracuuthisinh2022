<?php
session_start();
error_reporting(0);
include('config/db.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang tra cứu thông tin đăng kí xét tuyển</title>
    <link rel="stylesheet" href="assets/css/tracuu.css">
    <link rel="stylesheet" href="assets/css/table.css">
    <script src="assets/lib/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="main">
       
            <form class="form" id="form-1">
                <h3 class="heading">Tra cứu thí sinh đăng kí xét tuyển năm 2022</h3>
                <p class="desc">Thí sinh nhập <b style="color: red;">Mã Hồ Sơ</b>  hoặc <b style="color: red;">Họ và tên</b> vào ô bên dưới và nhấp mục <b style="color: #1dbfaf;">Tra cứu</b> để tìm kiếm kết quả</p>
      <br>
                <div class="form-group">
                  <label for="fullname" class="form-label">Nhập Mã Hồ Sơ hoặc Họ và Tên</label>
                  <input id="live_search" autocomplete="off" name="input" type="text" placeholder="VD:10001 hoặc Nguyễn Công Phượng" class="form-control">
                  <span class="form-message"></span>
                </div>
          
                <a style="display: block" id="tracuu" class="form-submit" name="tracuu">Tra cứu</a>
                <br>
                <small style="font-size: 16px">Dữ liệu cập nhật lần cuối ngày <i>02/06/2022</i></small>
                
            </form>
      </div>
      <div class="main main-ketqua">
        <form action="" method="POST" class="form-ketqua" id="form-1">      
            
              <table class="form-submit-ketqua">
                <caption>Kết quả đăng kí xét tuyển của thí sinh năm 2022</caption>
                <thead>
                  <tr>
                    <th scope="col">Mã hồ sơ</th>
                    <th scope="col">Họ và tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Ngành đăng ký</th>
                    <th scope="col">Điểm</th>
                    <th scope="col">Phương thức xét tuyển</th>
                    <th scope="col">Kết quả</th>
                    <th scope="col">Ghi chú</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <div>

                </div>
              </table>
            
      
        </form>
        
    </div>
      
      <script>
        
        

        $(document).ready(function () {
          $("#tracuu").click(function () {
            
            var input = document.getElementById('live_search').value;
            // alert(input);
              if(input != "") {
                $.ajax({
                  url: "ajax/search.php",
                  method: "POST",
                  data: {input:input},
                  success: function(data) {
                    $('tbody').html(data);
                  }
                });
                $('tbody').css("display", "");
              }else {
                $('tbody').css("display", "none");
              }
          });

          // $("#live_search").keyup(function() { 
          //     var input = $(this).val();
              
          //     if(input != "") {
          //       $.ajax({
          //         url: "ajax/search.php",
          //         method: "POST",
          //         data: {input:input},
          //         success: function(data) {
          //           $('tbody').html(data);
          //         }
          //       });
          //       $('tbody').css("display", "block");
          //     }else {
          //       $('tbody').css("display", "none");
          //     }
          //   });


          // load_data();
          function load_data(query = '')
          {
            
            $.ajax({
              url: "ajax/fetch.php",
              method: "POST",
              data: {query:query},
              success: function (data) {
                // debugger
                $('tbody').html(data);
              }
            });

           
          }
        });
      </script>
</body>
</html>

