<?php 
$tin = get_tin();
if(!mysqli_num_rows($tin)){
  $message ="Khong co co so du lieu";
}
?>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Danh sách loại tin</h3>
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
            Danh sách tin tức
           <span class="insert" style="float: right;"><a href="index.php?p=themtintuc"><button type="button" class="btn btn-success">Thêm mới tin tức</button></a></span>
          </p>

          <?php if (mysqli_num_rows($tin)): ?>
        
          <table id="datatable-fixed-header" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>idLT-Ngày</th>
                <th>Tiêu đề - Tóm tắt</th>
                <th width="10%">Loại tin</th>
                <th>Trạng thái</th>
                <th width="10%">Action</th>
              </tr>
            </thead>


            <tbody>
              
              <?php while($result = mysqli_fetch_assoc($tin)): ob_start();?>
                <?php $loaitin = get_Ten_LoaiTin($result['idLT']);?>
              <tr>
                <td>{idTin} - {Ngay}</td>
                <td><span style="font-size: 16px;color: blue;">{TieuDe}</span><br/>
                  <img src="../upload/tintuc/{urlHinh}" alt="{TieuDe}" width="50px" style="float: left;"> {TomTat}</td>
                <td>{idLT}</td>
                <td>{AnHien}</td>
                <td><a href="index.php?p=suatintuc&idTin={idTin}">Sửa <i class="fa fa-edit"></i></a><span style="margin: 0 10px;">-</span><a href="index.php?p=listtin&idLTdel={idTin}" onclick="delete_TL('{TieuDe}')">Xóa <i class="fa fa-trash"></i></a></td>
              </tr>
              <?php 
              $s = ob_get_clean();
              $s = str_replace("{idTin}",$result['idTin'],$s);
              $s = str_replace("{Ngay}",$result['Ngay'],$s);
              $s = str_replace("{TieuDe}",$result['TieuDe'],$s);
              $s = str_replace("{urlHinh}",$result['urlHinh'],$s);
              $s = str_replace("{TomTat}",$result['TomTat'],$s);
              $s = str_replace("{idLT}",$loaitin['Ten'],$s);
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
   function delete_TL(idTin) {
       confirm('Ban co muon xoa '+idTin);
    }
  
</script>
<?php
if(isset($_GET['idTindel'])){

	$idTin = $_GET['idTindel'];
	$tin = get_tin($idTin);

	if(mysqli_num_rows($tin)){
		tin_delete($idTin);
	}
}