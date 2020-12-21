<?php include_once('config.php');?>
<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"  prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	
	
	
	<?php
	$condition	=	'';
	if(isset($_REQUEST['username']) and $_REQUEST['username']!=""){
		$condition	.=	' AND username LIKE "%'.$_REQUEST['username'].'%" ';
	}
	if(isset($_REQUEST['useremail']) and $_REQUEST['useremail']!=""){
		$condition	.=	' AND useremail LIKE "%'.$_REQUEST['useremail'].'%" ';
	}
	if(isset($_REQUEST['userphone']) and $_REQUEST['userphone']!=""){
		$condition	.=	' AND userphone LIKE "%'.$_REQUEST['userphone'].'%" ';
	}
	if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){

		$condition	.=	' AND DATE(dt)>="'.$_REQUEST['df'].'" ';

	}
	if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){

		$condition	.=	' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';

	}
	
	$userData	=	$db->getAllRecords('user','*',$condition,'ORDER BY username DESC');
	?>
   	<div class="container">
		<h1><a href="https://learncodeweb.com/php/php-crud-in-bootstrap-4-with-search-functionality/">PHP CRUD in Bootstrap with search and pagination</a></h1>
		<div class="card">
			<div class="card-header"><i class="fa fa-fw fa-globe"></i> <strong>Browse User</strong> <a href="add-users.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-plus-circle"></i> Add Users</a></div>
			<div class="card-body">
				<?php
				if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rds"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record deleted successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rus"){
					echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record updated successfully!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rnu"){
					echo	'<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
				}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
					echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> There is some thing wrong <strong>Please try again!</strong></div>';
				}
				?>
				<div class="col-sm-12">
					<h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
					<form method="get">
						<div class="row">
							<div class="col-sm-2">
								<div class="form-group">
									<label>ID</label>
									<input type="text" name="id" id="id" class="form-control" value="<?php echo isset($_REQUEST['id'])?$_REQUEST['id']:''?>" placeholder="Enter ID">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Alamat</label>
									<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo isset($_REQUEST['alamat'])?$_REQUEST['alamat']:''?>" placeholder="Enter alamat">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Desa ID</label>
									<input type="desa_id" name="desa_id" id="desa_id" class="form-control" value="<?php echo isset($_REQUEST['desa_id'])?$_REQUEST['desa_id']:''?>" placeholder="Enter desa_id">
								</div>
							</div>

                             <div class="col-sm-2">
								<div class="form-group">
									<label>Kecamatan ID</label>
									<input type="kecamatan_id" name="kecamatan_id" id="kecamatan_id" class="form-control" value="<?php echo isset($_REQUEST['kecamatan_id'])?$_REQUEST['kecamatan_id']:''?>" placeholder="Enter kecamatan_id">
								</div>
							</div>
                            
                             <div class="col-sm-2">
								<div class="form-group">
									<label>Nama Penerima</label>
									<input type="nama_penerima" name="nama_penerima" id="nama_penerima" class="form-control" value="<?php echo isset($_REQUEST['nama_penerima'])?$_REQUEST['nama_penerima']:''?>" placeholder="Enter nama_penerima">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Nomor KTP</label>
									<input type="nomor_ktp" name="nomor_ktp" id="nomor_ktp" class="form-control" value="<?php echo isset($_REQUEST['nomor_ktp'])?$_REQUEST['nomor_ktp']:''?>" placeholder="Enter nomor_ktp">
								</div>
							</div>
                           <div class="col-sm-2">
								<div class="form-group">
									<label>Nomor KK</label>
									<input type="nomor_kk" name="nomor_kk" id="nomor_kk" class="form-control" value="<?php echo isset($_REQUEST['nomor_kk'])?$_REQUEST['nomor_kk']:''?>" placeholder="Enter nomor_kk">
								</div>
							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>Jenis Bantuan ID</label>
									<input type="jenis_bantuan_id" name="jenis_bantuan_id" id="jenis_bantuan_id" class="form-control" value="<?php echo isset($_REQUEST['jenis_bantuan_id'])?$_REQUEST['jenis_bantuan_id']:''?>" placeholder="Enter jenis_bantuan_id">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Lintang</label>
									<input type="lintang" name="lintang" id="lintang" class="form-control" value="<?php echo isset($_REQUEST['lintang'])?$_REQUEST['lintang']:''?>" placeholder="Enter lintang">
								</div>
							</div>


								<div class="col-sm-2">
								<div class="form-group">
									<label>Bujur</label>
									<input type="bujur" name="bujur" id="bujur" class="form-control" value="<?php echo isset($_REQUEST['bujur'])?$_REQUEST['bujur']:''?>" placeholder="Enter bujur">
								</div>
							</div>

							<div class="col-sm-2">
								<div class="form-group">
									<label>Keterangan</label>
									<input type="keterangan" name="keterangan" id="keterangan" class="form-control" value="<?php echo isset($_REQUEST['keterangan'])?$_REQUEST['keterangan']:''?>" placeholder="Enter keterangan">
								</div>
							</div>








							<div class="col-sm-4">

								<div class="form-group">

									<label>Date</label>
									<div class="input-group">
										<input type="text" class="fromDate form-control hasDatepicker" name="df" id="df" value="" placeholder="Enter from date">
										<div class="input-group-prepend"><span class="input-group-text">-</span></div>
										<input type="text" class="toDate form-control hasDatepicker" name="dt" id="dt" value="" placeholder="Enter to date">
										<div class="input-group-append"><span class="input-group-text"><a href="javascript:;" onclick="$('#df,#dt').val('');"><i class="fa fa-fw fa-sync"></i></a></span></div>
									</div>

								</div>

							</div>
							<div class="col-sm-2">
								<div class="form-group">
									<label>&nbsp;</label>
									<div>
										<button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
										<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr>
		
		<div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>Sr#</th>
						<th>ID</th>
						<th>Alamat</th>
						<th>Desa_ID</th>
						<th>Kecamatan_ID</th>
						<th>Nama Penerima</th>
						<th>Nomor KTP</th>
						<th>Nomor KK</th>
						<th>Jenis Bantuan ID</th>
						<th>Lintang</th>
						<th>Bujur</th>
						<th>Keterangan</th>
						<th class="text-center">Record Date</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if(count($userData)>0){
						$s	=	'';
						foreach($userData as $val){
							$s++;
					?>
					<tr>
						<td><?php echo $s;?></td>
						<td><?php echo $val['id'];?></td>
						<td><?php echo $val['alamat'];?></td>
						<td><?php echo $val['desa_id'];?></td>
						<td><?php echo $val['kecamatan_id'];?></td>
						<td><?php echo $val['nama_penerima'];?></td>
						<td><?php echo $val['nomor_ktp'];?></td>

						<td><?php echo $val['nomor_kk'];?></td>
						<td><?php echo $val['jenis_bantuan_id'];?></td>
						<td><?php echo $val['lintang'];?></td>
						<td><?php echo $val['bujur'];?></td>
						<td><?php echo $val['keterangan'];?></td>
						<td align="center"><?php echo date('Y-m-d',strtotime($val['dt']));?></td>
						<td align="center">
							<a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
							<a href="delete.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
						</td>

					</tr>
					<?php 
						}
					}else{
					?>
					<tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
					<?php } ?>
				</tbody>
			</table>
		</div> <!--/.col-sm-12-->
		
	</div>
	
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script>
    <script>
		$(document).ready(function() {
			jQuery(function($){
				  var input = $('[type=tel]')
				  input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
				  input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				  })
			 });
			 
			 //From, To date range start
			var dateFormat	=	"yy-mm-dd";
			fromDate	=	$(".fromDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function(){
				toDate.datepicker("option", "minDate", getDate(this));
			}),
			toDate	=	$(".toDate").datepicker({
				changeMonth: true,
				dateFormat:'yy-mm-dd',
				numberOfMonths:2
			})
			.on("change", function() {
				fromDate.datepicker("option", "maxDate", getDate(this));
			});
			
			
			function getDate(element){
				var date;
				try{
					date = $.datepicker.parseDate(dateFormat,element.value);
				}catch(error){
					date = null;
				}
				return date;
			}
			//From, To date range End here	
			
		});
	</script>
</body>
</html>
