<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

<style type="text/css">
	.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px;
    margin: 60px 359px;
}
.logos span.logo img {
    height: 60px;
}

@media(max-width: 767px) {
.card0 {margin: 10%;}
}

</style>

<script type="text/javascript">


<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>


</script>


	<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">

    <div class="card card0 border-0">
        <div class="row d-flex">
            <!--  <div class="col-lg-6 ">
               
            </div> -->
            <div class="col-lg-12">			
                <div class="card2 card border-0 px-4 py-5">
				<!-- flash msg data -->
					<?php 
					
					if($flashmsg!=""){
						$flashmsg=$this->session->flashdata('danger');
						echo '<div class="alert alert-'.$flashmsg['reject'].'">'.$flashmsg['reject'].'</div>';
					} ?>
				<!-- flash msg data -->
                    <div class="row mb-1 px-3 text-center">
                        <h4 class="mb-0 mr-4 mt-2">Admin Login</h4>
                        
                    </div>
                    <div class="row  mb-4 px-3">
                        <div class="line"></div>
                    </div>
					
						
					<?php
					echo form_open_multipart('Home/login'); ?>	
						<div class="form form-a active">						
							<div class="row px-3"> 
								<label class="mb-1">
								<h6 class="mb-0 text-sm">Username</h6>
								</label>
								<input type="text" name="username"  class="required"  required_name="user name" maxlength="60"  placeholder="Email address " >
							</div>
							
							<div class="row px-3">
								<label class="mb-1">
								<h6 class="mb-0 text-sm">Password</h6>
								</label> 
								<input type="password" name="password" class="required"  required_name="Password" placeholder="Enter a valid password"> 
							</div>			
						</div>			
					
						<div class="row mb-3 px-3"> 
							<button type="submit" name="submit" onclick="return validate_file_requered();" class="btn btn-primary text-center">Login</button>
						</div>
					</form>					
				</div>
            </div>
        </div>
    </div>      
</div>	
