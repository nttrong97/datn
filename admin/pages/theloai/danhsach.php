<?php 
$theloai = get_theloai();
if(!mysqli_num_rows($theloai)){
  $message ="Khong co co so du lieu";
}
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Users <small>Some examples to get you started</small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Fixed Header Example <small>Users</small></h2>
          <?php if (isset($_SESSION['message'])): ?>
            <span style="margin-left: 200px;color: #EC0408;"><?= $_SESSION['message']; ?></span>
          <?php unset($_SESSION['message']); endif ?>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          <p class="text-muted font-13 m-b-30">
           
            Danh sách thể loại
           <span class="insert" style="float: right;"><a href="index.php?p=themTheLoai"><button type="button" class="btn btn-success">Thêm mới thể loại</button></a></span>
          </p>

          <?php if (mysqli_num_rows($theloai)): ?>
        
          <table id="datatable-fixed-header" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>idTL</th>
                <th>Tên</th>
                <th>Tên không dấu</th>
                <th>Thứ tự</th>
                <th>Trạng thái</th>
                <th>Action</th>
              </tr>
            </thead>


            <tbody>

              <?php while($result = mysqli_fetch_assoc($theloai)): ob_start();?>
              <tr>
                <td>{idTL}</td>
                <td>{TenTL}</td>
                <td>{TenTL_KhongDau}</td>
                <td>{ThuTu}</td>
                <td>{AnHien}</td>
                <td><a href="index.php?p=themTheLoai&idTL={idTL}">Sua <i class="fa fa-edit"></i></a><span style="margin: 0 10px;">-</span><a href="pages/theloai/xoaTheLoai.php?idTL={idTL}" onclick="delete_TL('{TenTL}')">Xoa <i class="fa fa-trash"></i></a></td>
              </tr>
              <?php 
              $s = ob_get_clean();
              $s = str_replace("{idTL}",$result['idTL'],$s);
              $s = str_replace("{TenTL}",$result['TenTL'],$s);
              $s = str_replace("{TenTL_KhongDau}",$result['TenTL_KhongDau'],$s);
              $s = str_replace("{ThuTu}",$result['ThuTu'],$s);
              $s = str_replace("{AnHien}",($result['AnHien']==1)?'Hiện':'Ẩn',$s);
              echo $s;
              ?>
              <?php endwhile ?>

            </tbody>
          </table>

        <?php endif ?>

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function delete_TL(idTL) {
       confirm('Ban co muon xoa '+idTL);
    }
  
</script>