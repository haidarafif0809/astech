<?php session_start();

include 'db.php';
include 'sanitasi.php';

$no_faktur = stringdoang($_GET['no_faktur']);


 ?>
 <select style="font-size:15px; height:35px" name="hapus_order" id="hapus_order" class="form-control gg" required="" >
          <?php 
          
          // menampilkan seluruh data yang ada pada tabel suplier
          $query = $db->query("SELECT no_faktur_order FROM tbs_penjualan WHERE no_faktur = '$no_faktur' AND no_faktur_order IS NOT NULL GROUP BY no_faktur_order");
          
          // menyimpan data sementara yang ada pada $query
          while($data = mysqli_fetch_array($query))
          {
        
                echo "<option value='".$data['no_faktur_order'] ."'>".$data['no_faktur_order'] ."</option>";
          
          }
          
          
          ?>

  </select>


 <input type="hidden" class="form-control" name="total_perorder" id="total_perorder">





  <script type="text/javascript">
$(document).ready(function(){

 var hapus_order = $("#hapus_order").val();

//cek subtotal saat dihapus 
  $.post("cek_hapus_order.php",
        {hapus_order:hapus_order},function(data){

          $("#total_perorder").val(data);
        });
//cek subtotal saat dihapus 



  //end cek level harga
  $("#hapus_order").change(function(){
  
  var hapus_order = $("#hapus_order").val();


  $.post("cek_hapus_order.php",
        {hapus_order:hapus_order},function(data){

          $("#total_perorder").val(data);
        });
  });
});
//end cek level harga
</script>





