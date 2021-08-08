<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//echo '<pre>';print_r($values); die;
?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


<div class="main-content container-fluid">
    <div class="card-body">
		<div class="card">
			<div class="card-body">   
				<div class="col-auto">
					<div class="row">					
						<div class="col-md-12 mar-t-10 ">
							<a href="<?php echo $url=base_url()."Home/create";?>" class="btn btn-sm btn-outline-secondary clearfix float-right "> Create new</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="section">
			<div class="card">
				<div class="card-body">
					<table id="example" class="display nowrap table" style="width:100%">
						<thead>
							<tr>
								 <th>S.No.</th>
								 <th>SAP ID</th>
								 <th>Hostname</th>
								 <th>Loop back</th>
								 <th>MAC Address</th>
								 <th>IP Address</th>
								 <th>Price</th>
								 <th>Router type</th>
								 <th>Status</th>
								 <th>Action</th>
							 </tr>
						</thead>
						<tbody>
							<?php if(!empty($values)){  					 
									$counter = 1;                      
									foreach($values as $val){ ?>
										<tr>
											 <td><?php echo $counter;?></td>
											 <td><?php echo $val['SAP_ID'];?></td>
											 <td><?php echo $val['hostname'];?></td>
											 <td><?php echo $val['loopback'];?></td>
											 <td><?php echo $val['mac_address'];?></td>
											 <td><?php echo $val['ip_address'];?></td>
											 <td><?php echo $val['router_type'];?></td>
											 <td><?php echo $val['price'];?></td>
											 <td><?php if ($val['status'] == 1) echo "Active"; else echo "Inactive";?></td>                                          
											 <td>
												 <a class="btn btn-success btn-xs" href="<?php echo base_url("Home/edit_router/".encryptor('encrypt',$val['ID'])); ?>" title="Edit"><i class="fa fa-pencil" style="font-size: 150%;color: #fff;"></i></a>
												 <a class="btn btn-danger btn-xs" href="<?php echo base_url("Home/delete_router/".encryptor('encrypt',$val['ID'])); ?>" title="Edit"><i class="fa fa-trash" style="font-size: 150%;color: #fff;" onclick="show_alert();"></i></a>
											 </td>
										</tr>
							<?php $counter++; }
									} ?>                  
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</div>


<script>
	function show_alert(){	
		alert('Are you sure you want to delete the entry?');
	}

</script>

