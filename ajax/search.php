<?php 
include('../config/db.php');

if(isset($_POST['input'])) {
    $input = $_POST['input'];
    $sql = "SELECT * FROM cec_sinhvientam
    INNER JOIN cec_chuyennganh ON cec_sinhvientam.ID_CHUYENNGANH = cec_chuyennganh.ID_CHUYENNGANH 
    WHERE SOHOSO LIKE '{$input}' OR CONCAT(HODEM,TEN) LIKE '%{$input}%'";
    $query = $con->query($sql);
    $total_row = mysqli_num_rows($query);
    // $result = mysqli_query($con, $query);
    $output = '';
    if($total_row > 0) {
        while ($row = $query->fetch_object()) {

            $result_gt = (int)$row->PHAI === 1 ? "Nam" : "Nữ";
            $result_kqxt = (int)$row->TRUNGTUYEN === 1 ? "Trúng tuyển" : "Rớt";
     
             $output .= ' <tr style="font-weight:lighter;">
                 <td data-label="Mã hồ sơ">'.$row->SOHOSO.'</td>
                 <td data-label="Họ và tên">'.$row->HODEM.' '.$row->TEN.'</td>
                 <td data-label="Ngày sinh">'.$row->NGAYSINH.'</td>
                 <td data-label="Giới tính">'.$result_gt.'</td>
                 <td data-label="Ngành đăng ký">'.$row->TENCHUYENNGANH.'</td>
                 <td data-label="Điểm">'.$row->TONGDIEMCHUAUUTIEN.'</td>
                 <td data-label="Phương thức xét tuyển">Xét tuyển học bạ</td>
                 <td data-label="Kết quả">'.$result_kqxt.'</td>
                 <td data-label="Ghi chú"></td>
             </tr>';
         }
    }else {
        $output .= '
            <tr>
                <td>Không có dữ liệu...</td>
                <th scope="col"></th>
            </tr>
            ';
    }
    echo $output;
}
?>
