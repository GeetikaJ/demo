<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//echo '<pre>'; print_r($data['status']); exit;
?>
            
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit entry</h3>
                <p class="text-subtitle text-muted"></p>
            </div>
           
        </div>
	<?php if($this->session->flashdata('msg') !=''){ ?>
				<div class="alert alert-warning">
					<?php echo $this->session->flashdata('msg'); ?>
				</div>
			<?php } ?>
			
    </div>
    
    <!-- // Basic Vertical form layout section end -->


    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Router details</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            
							<?php echo form_open_multipart('Home/edit_router','class="form-horizontal"','method="post"');?>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">SAP ID</label>
                                            <input type="text" id="first-name-column" class="form-control required" placeholder="" name="SAP_ID" value="<?php echo $data['SAP_ID']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">Hostname</label>
											<input type="text" name="hostname" class="form-control required" value="<?php echo $data['hostname']; ?>" required>
                                        </div>
                                    </div>
									 <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">Loop back</label>
											<input type="text" name="loopback" class="form-control required" value="<?php echo $data['loopback']; ?>" required>
											<span class="error" id="err_loopback"></span>
                                        </div>
                                    </div>
									 <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">MAC Address</label>
											<input type="text" name="mac_address" class="form-control required" value="<?php echo $data['mac_address']; ?>" required>
                                        </div>
                                    </div>
									 <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">IP Address</label>
											<input type="text" name="ip_address" class="form-control required ip_address" value="<?php echo $data['ip_address']; ?>" required>
                                        </div>
                                    </div>
									<div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">Router type</label>
											<input type="text" name="router_type" class="form-control required" value="<?php echo $data['router_type']; ?>" required>
                                        </div>
                                    </div>
									 <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="Description">Price</label>
											<input type="text" name="price" class="form-control required" value="<?php echo $data['price']; ?>" required>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-12 col-12">
                                        <div class="form-group required">
                                            <label>Status</label>
                                            <fieldset class="form-group">
											
												<select class="form-control status" name="status" id="status" required>
													<option value="">Select Status</option>
													<option value="1" <?php if($data['status']==1) { ?> selected <?php } ?>>Active</option>
													<option value="2" <?php if($data['status']==2){ ?> selected <?php } ?>>Inactive</option>
												</select>
											</fieldset>
                                        </div>
                                    </div>                                   
                                    <div class="col-12 d-flex justify-content-end">
										<input type="hidden" value="<?php echo $data['ID']; ?>" name="id">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
<script>
//checking for unique loopback
	var csrf_token='';
	$('input[name="loopback"]').change(function (){
		var value = $(this).val(); 
		$("#loader").show(); 		
			csrf_token = $('input[name="csrf_name"]').val();		
			//alert(csrf_token);
		$.ajax({
			type:'POST',
			url:'<?php echo base_url("Home/get_unique_loopback");?>',        
			data: {'<?php echo $this->security->get_csrf_token_name(); ?>':csrf_token,'loopback':value},
			MimeType:'multipart/Form-data',// contentType:false,//cache:false,//processData:false,
			success:function(data){
				var k = JSON.parse(data);
				if(k.csrf_token){
					csrf_token = k.csrf_token;
					$('input[name="csrf_name"]').val(csrf_token); 
				}
				if(k.loopback){
					$('input[name="loopback"]').val('');
					$('input[name="loopback"]').focus();					
					document.getElementById('err_loopback').innerHTML='Loopback Number Already Exists.';
				} 
				else{
					document.getElementById('err_loopback').innerHTML = ' ';
				}
				document.getElementById("loader").style.display = "none";
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				alert(thrownError);
			}
		}); 
	});
	//end checking for unique loopback     
	
	$(".ip_address").change(function (event) {
			var valid_ip = /(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}/;
		$('.errorclass').next('.errorclass').remove();
		if(!valid_ip.test($(this).val())){ 			
			$(this).focus();
			$(this).val('');			
			alert('Invalid IP Address.');
		} 
	 });
	 	
</script>	