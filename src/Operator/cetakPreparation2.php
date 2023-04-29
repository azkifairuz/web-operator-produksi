<?php
session_start();
$userNip = $_SESSION['NIP'];
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getDataCekList = mysqli_query($con ,"SELECT * FROM `form_preparation_inspeksi_area` ");
$getDataProduksi = mysqli_query($con ,"SELECT * FROM `form_preparation_produksi`");
$getDataMesin = mysqli_query($con ,"SELECT * FROM `form_preparation_mesin_brushing` ");
$dataCeklist = mysqli_fetch_array($getDataCekList);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cetak preprataion 2</title>
  <link rel="stylesheet" href="../../dist/output.css" />
</head>

<body>
  <div>
    <div class="flex">
      <div class="mainPage container mt-20 w-full ml-20 ">
        <h1 class="text-2xl text-center  mb-5  font-bold">
          Hasil Laporan Preparation 2
        </h1>
        <div class="maincontainer">

          <div class=" shadow w-full rounded-b-lg  flex  justify-center p-2">
     
            <section class="produksi   w-fit mx-auto">
            <div class=" items-center justify-evenly m-auto gap-4 w-fit">
                <table class="border border-black ">
                    <tr class="border border-black  p-2">
                        <th class="p-2 border border-black ">no_preparation</th>
                        <th class="p-2 border border-black ">kode_supplier</th>
                        <th class="p-2 border border-black ">raw_material </th>
                        <th class="p-2 border border-black ">QTY</th>
                        <th class="p-2 border border-black ">jam_keluar</th>
                        <th class="p-2 border border-black ">total_RM</th>
                        <th class="p-2 border border-black ">waste</th>
                        <th class="p-2 border border-black ">tanggal</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getDataProduksi)) {
                        ?>
                        <tr class="text-xs bg-white border border-black  ">
                            <td class=" p-2 border border-black ">
                                <?php echo $no; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kode_supplier']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['raw_material']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['QTY']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jam_keluar']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['total_RM']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['waste']; ?>
                            </td>
                            
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['tanggal']; ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </table>
              </div>
            </section>
        
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    
    var delayInMilliseconds = 1000;
    setTimeout( window.print(), delayInMilliseconds);
  </script>
</body>

</html>