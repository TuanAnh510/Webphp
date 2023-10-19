<?php
if (isset($_POST['suadulieu'])) {
    $id = $_POST['Sua_MaLG'];
    $TenLoaiGiay = $_POST['Sua_TenLoaiGiay'];
    $query = "UPDATE danhmucsp SET TenLoaiGiay='$TenLoaiGiay'  WHERE MaLG='$id'  ";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
            Edit();
    } else {
        echo '<script> alert("Dữ liệu chưa được cập nhật"); </script>';
    }
}
?>

<?php
if(isset($_POST['xoadulieu']))
{
    $id = $_POST['Xoa_MaLG'];
   
    $query1=  "DELETE FROM danhmucsp WHERE MaLG=$id";
    $query_run1 = mysqli_query($conn, $query1);
    if($query_run1)
    {
        Delete();
    }
    else
    {
        echo '<script> alert("Chưa xoá"); </script>';
    }
}

?>
<?php


if(isset($_POST['themdulieu']))
{   
    
    $Them_TenLoaiGiay= $_POST['Them_TenLoaiGiay'];
    $query = "insert into danhmucsp values (null,'$Them_TenLoaiGiay')";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        Add();     
    }
    else
    {
        echo '<script> alert("Dữ liệu chưa được thêm"); </script>';
    }
}
?>
