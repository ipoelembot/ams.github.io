<script>
  $(document).ready(function()
  {
    $("#tujuan_penggunaan").change(function()
    {
      $("#kode_produk").hide();

      $.ajax({
        type: "POST", 
        url: "<?php echo base_url('form/kode_produk'); ?>", 
        data: {jenis : $("#tujuan_penggunaan").val(), segment : $("#segment").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#kode_produk").html(response.list_kode).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
</script>

  <script>
    $(function () {
      $('#report_tables').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })

  </script>
<script>
    <?php 
      foreach ($list_tgl as $list_tgl) {
      echo "
      $('#'".$list_tgl->id_list."').datepicker({
      autoclose: true
      })
      ";
      }
    ?>
  </script>
  <script>
    <?php
      foreach ($list_tgl as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
  </script>
  <script>
    <?php
      foreach ($list2 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list3 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list4 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list5 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list6 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    <script>
    <?php
      foreach ($list7 as $list) {
        if ($list->type == 'date') 
          {
            echo "
             $('#".$list->id_list."').datepicker({
                autoclose: true
                })
            ";
          }
        
      }
    ?>
    </script>
    
<script>
  function isNumberKey(event){
    var charCode = (event.which) ? event.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>
<script type="text/javascript">
        $(document).ready(function () {

            $('[name=currency-default]').maskNumber();
            $('[name=currency-data-attributes]').maskNumber();
            $('[name=currency-configuration]').maskNumber({decimal: '_', thousands: '*'});
            $('[name=integer-default]').maskNumber({integer: true});
            $('[name=integer-data-attribute]').maskNumber({integer: true});
            $('[name=integer-configuration]').maskNumber({integer: true, thousands: '_'});
        });
    </script>
