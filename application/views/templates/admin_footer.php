<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2021 &copy;</p>
                    </div>
                   
                </div>
            </footer>
        </div>
    </div>
    <script src="<?=base_url('assets/admin/js/feather-icons/feather.min.js')?>"></script>

    <script src="<?=base_url('assets/admin/js/app.js')?>"></script>
    
    <script src="<?=base_url('assets/admin/js/main.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
$(".required").siblings('label').after('<span style="color:Red; font-size: 19px;"  >*</span>');
    $('#example').DataTable( {
        "scrollY": 300,
        "scrollX": true
    } );
} );
	
</script>
</body>
</html>