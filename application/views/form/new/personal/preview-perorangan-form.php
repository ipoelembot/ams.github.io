<!--  
====================================
Author  :   Bank Muamalat Indonesia
Date    :   31 Desember 2018
Page    :   'preview-perorangan-form.php'
====================================
-->

<section>
      <h3>
<?php
        echo $nama;
        echo " ";
        echo "(".$cif.")"; 

        $isNull = 0;
?>
 
        <small><i> - Individual</i></small>
      </h3>
      <hr>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Form</li>
        <li class="active">Perorangan</li>
      </ol>
</section>

<div class="box box-warning" style="padding: 40px">
    <div class="box-body"> 
      <div class="wizard-buttons">
          <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(). 'mds/edit/' .$id.'/'.$isNull; ?>' ">Edit</button>
          <button type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url(). 'perorangan/cetak/' .$id.'/'.$nama; ?>' ">Cetak</button>
      </div>

      <!-- Step 1 -->
      <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Informasi Awal</th>
        </tr>
        <tr>
      <tbody>

        <tr>
          <td width="25%">Kepada</td>
          <td width="75%">Operasional Pembiayaan & Unit Support Pembiayaan</td>
        </tr>
        <tr>
          <td >Dari</td>
          <td >Relationship Manager</td>
        </tr>

        <?php
          $i = 0;
          foreach ($list1 as $list) {
            if ($list->type != 'sparate') {
              echo 
              "<tr>
                  <td width='25%'>".$list->list."</td>
                  <td width='75%'>".$data1[$i]."</td>
               </tr>
              ";
              $i++;
            }
          }
        ?>

      </tbody>
      </table>
      <!-- End Step 1 -->

      <!-- Step 2 -->
      <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Profil Debitur</th>
        </tr>
        <tr>
      <tbody>

        <?php
          $j = 0;
          foreach ($list2 as $list) {
            if ($list->type != 'sparate') {
              echo 
              "<tr>
                    <td width='25%'>".$list->list."</td>
                    <td width='75%'>".$data2[$j]."</td>
               </tr>
              ";
              $j++;
            }
          }
        ?>

      </tbody>
      </table>
      <!-- End Step 2 -->

      <!-- Step 3 -->
      <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Data Pembiayaan</th>
        </tr>
        <tr>
      <tbody>

        <?php
          $k = 0;
          foreach ($list3 as $list) {
            if ($list->type != 'sparate') {
              echo 
              "<tr>
                    <td width='25%'>".$list->list."</td>
                    <td width='75%'>".$data3[$k]."</td>
               </tr>
              ";
              $k++;
            }
          }
        ?>

      </tbody>
      </table>
      <!-- End Step 3 -->

      <!-- Step 4 -->
      <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Data Agunan</th>
        </tr>
        <tr>
      <tbody>

        <?php
          $l = 0;
          foreach ($list4 as $list) {
            if ($list->type != 'sparate') {
              echo 
              "<tr>
                    <td width='25%'>".$list->list."</td>
                    <td width='75%'>".$data4[$l]."</td>
               </tr>
              ";
              $l++;
            }
          }
        ?>

      </tbody>
      </table>
      <!-- End Step 4 -->

      <!-- Step 5 -->
      <table class="table table-bordered">
      <thead>
        <tr>
          <th colspan="2">Profil Penjamin</th>
        </tr>
        <tr>
      <tbody>

        <?php
          $m = 0;
          foreach ($list5 as $list) {
            if ($list->type != 'sparate') {
              echo 
              "<tr>
                    <td width='25%'>".$list->list."</td>
                    <td width='75%'>".$data5[$m]."</td>
               </tr>
              ";
              $m++;
            }
          }
        ?>

      </tbody>
      </table>
      <!-- End Step 3 -->

      <div class="wizard-buttons">
          <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url(). 'mds/edit/' .$id.'/'.$isNull; ?>' ">Edit</button>
          <button type="button" class="btn btn-warning" onclick="location.href='<?php echo base_url(). 'perorangan/cetak/' .$id.'/'.$nama; ?>' ">Cetak</button>
      </div>

    </div>
</div> 