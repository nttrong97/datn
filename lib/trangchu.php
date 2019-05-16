<?php
require ('dbCon.php');


// ham tạo tin mới nhất
 function tinmoinhat($start=0,$limit=1)
{
	global $con;
    $sql = "SELECT * FROM tin ORDER BY idTin DESC LIMIT $start,$limit";
    return mysqli_query($con, $sql);
}

 function XemNhieuNhat($start=0,$limit=6)
{
	global $con;
    $sql = "SELECT * FROM tin ORDER BY SoLanXem DESC LIMIT $start,$limit";
    return mysqli_query($con, $sql);
}

// ham tạo tin mới nhất theo loai tin
 function tinmoinhat_TheoLoaiTin($idLT,$start=0,$limit=1)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idLT=$idLT ORDER BY idTin DESC LIMIT $start,$limit";
    return mysqli_query($con, $sql);
}

// ham tạo tin mới nhất theo the loai
 function tinmoinhat_TheoTheLoai($idTL,$start=0,$limit=1)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idTL=$idTL AND AnHien=1 ORDER BY idTin DESC LIMIT $start,$limit";
    return mysqli_query($con, $sql);
}

// Lay  thong tin loai tin theo the loai
function get_info_loaitin($idLT)
{
	global $con;
    $sql = "SELECT * FROM loaitin WHERE idLT=$idLT";
    return mysqli_query($con, $sql);
}

// lay ramdon loai tin trong bang loai tin
function get_random_loaitin()
{
	global $con;
    $sql = "SELECT idLT FROM loaitin ORDER BY RAND() LIMIT 0,3";
    $result = array();
    $query = mysqli_query($con, $sql);
    while($array_LT = mysqli_fetch_array($query)){
        $result[]= $array_LT['idLT'];
    }
    
    return $result;
}

// ham lay quang cao top ben phai
function get_Advert_right($vitri=1)
{
	global $con;
    $sql = "SELECT * FROM quangcao WHERE vitri=$vitri";
    return mysqli_query($con, $sql);
}

// ham lay danh sach the loai
function get_theloai()
{
	global $con;
    $sql = "SELECT * FROM theloai";
    return mysqli_query($con, $sql);
}

// ham lay danh sach the loai len menu
function get_TheLoai_menu()
{
	global $con;
    $sql = "SELECT * FROM theloai WHERE AnHien=1  ORDER BY rand() LIMIT 11";
    return mysqli_query($con, $sql);
}

// Ham lay loai tin voi IdTL cho truoc
function get_loaitin($idTL)
{
	global $con;
    $sql = "SELECT * FROM loaitin WHERE idTL=".$idTL." AND AnHien=1";
    return mysqli_query($con, $sql);
}

// Ham lay loai tin trong bang loai tin 
function Danhsach_tin($idLT)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idLT=".$idLT." AND AnHien=1 ORDER BY idTin DESC";
    return mysqli_query($con, $sql);
}

// Ham lay tin trong bang loai tin 
function Danhsach_2tin($idLT,$start=1,$end=2)
{
	global $con;
    // $sql = "SELECT * FROM tin WHERE idLT=".$idLT." AND AnHien=1 ORDER BY idTin DESC LIMIT $start,$end";
    $sql = "SELECT * FROM tin WHERE idLT=$idLT LIMIT $start,$end";
    return mysqli_query($con, $sql);
}

// Ham lay loai tin trong bang loai tin 
function Danhsach_tin_Phantrang($idLT,$from,$sotin1trang)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idLT=".$idLT." AND AnHien=1 ORDER BY idTin DESC LIMIT $from,$sotin1trang";
    return mysqli_query($con, $sql);
}


// Ham lay loai tin trong bang the loai tin 
function Danhsach_tin_theloai($idTL,$start=0,$end=10)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idTL=".$idTL." AND AnHien=1 ORDER BY idTin DESC";
    return mysqli_query($con, $sql);
}

// Ham lay loai tin trong bang the loai tin  phan trang
function Danhsach_tin_theloai_Phantrang($idTL,$from,$sotin1trang)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE idTL=".$idTL." AND AnHien=1 ORDER BY idTin DESC LIMIT $from,$sotin1trang";
    return mysqli_query($con, $sql);
}


// Lay thong tin tin theo IDTIN
function get_tin_info($idTin)
{
	global $con;
     $sql = "SELECT * FROM tin WHERE idTin=".$idTin." AND AnHien=1";
    return mysqli_query($con, $sql);
}

// ham lay loai tin va the loai
function get_theloai_loaitin($idLT)
{
	global $con;
    $sql ="SELECT * FROM theloai INNER JOIN loaitin ON theloai.idTL=loaitin.idTL WHERE loaitin.idLT=$idLT";
    return mysqli_query($con, $sql);
}

function get_query($sql='')
{
	global $con;
    return mysqli_query($con, $sql);
}

function timkiem($key='')
{
	global $con;
    $sql = "SELECT * FROM tin WHERE TieuDe LIKE '%$key%'";
    return mysqli_query($con, $sql);
}

function timkiem_Phantrang($key='',$from,$sotin1trang)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE TieuDe REGEXP '$key' ORDER BY idTin DESC LIMIT $from,$sotin1trang";
    return mysqli_query($con, $sql);
}

function timkiem_Phantrang2($key='',$from,$sotin1trang)
{
	global $con;
    $sql = "SELECT * FROM tin WHERE TieuDe LIKE '%$key%' ORDER BY idTin DESC LIMIT $from,$sotin1trang";
    return mysqli_query($con, $sql);
}
// where Ten like '%" + Tim + "%'

// tim kiem user
function get_user($user_info)
{
	global $con;
    $username = $user_info['username'];
    $password = md5($user_info['password']);
    $sql = "SELECT * FROM users WHERE Username = '$username ' AND `Password`='$password' AND Active=1";
    return mysqli_query($con, $sql);
}