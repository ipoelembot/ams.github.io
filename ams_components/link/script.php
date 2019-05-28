<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo  base_url();?>ams_components/assets/respond.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo  base_url();?>ams_components/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo  base_url();?>ams_components/assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/js/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo  base_url();?>ams_components/assets/jquery-validation/js/jquery.validate.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/jquery-validation/js/additional-methods.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/select2/select2.min.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/js/jquery.dataTables.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo  base_url();?>ams_components/assets/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo  base_url();?>ams_components/assets/pages/scripts/form-wizard.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/scripts/components-pickers.js"></script>
<script src="<?php echo  base_url();?>ams_components/assets/js/js_wizard.js"></script>

<script>
	jQuery(document).ready(function() {       
	Metronic.init(); 
	Layout.init(); 
	QuickSidebar.init(); 
	Demo.init(); 
	FormWizard.init();
    ComponentsPickers.init();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $("#kategori_pengurus_saham").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".tab3function").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".tab3function").hide();
            }
        });
    }).change();
});
$(document).ready(function(){
    $("#jenis_data_fasilitas").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".tab4function").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".tab4function").hide();
            }
        });
    }).change();
});
$(document).ready(function(){
    $("#negara").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".tab2function").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".tab2function").hide();
            }
        });
    }).change();
});
</script>
<script type="text/javascript">
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }
</script>
<script type="text/javascript">
    $('input.number').keyup(function(event) {
      if(event.which >= 37 && event.which <= 40) return;

      $(this).val(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        ;
      });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#listTask').DataTable();
} );
</script>
<!--
<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function(){
            $("#listTask").load(location.href + " #listTask");
        },3000);
} );
</script>
-->