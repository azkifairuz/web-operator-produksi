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
  <title>Cetak preprataion 1</title>
  <link rel="stylesheet" href="../../dist/output.css" />
</head>

<body>
  <div>
    <div class="flex">
      <div class="mainPage container mt-20 w-full ml-20 ">
        <h1 class="text-2xl text-center -ml-10 mb-5  font-bold">
          Hasil Laporan Preparation 1
        </h1>
        <div class="maincontainer">

          <div class=" shadow w-fit rounded-b-lg  flex  justify-center p-2">
          <section class="cekList">
              <div class="items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class=" p-2 border border-black">
                        <th class="p-2 border border-black">no_preparation</th>
                        <th class="p-2 border border-black">inspeksi_mesin/peralatan </th>
                        <th class="p-2 border border-black">nama_item </th>
                        <th class="p-2 border border-black">kondisi_mesin/peralatan</th>
                        <th class="p-2 border border-black">keterangan_mesin/peralatan</th>
                        <th class="p-2 border border-black">inpeksi_area</th>
                        <th class="p-2 border border-black">kondisi_area </th>
                        <th class="p-2 border border-black">keterangan_area </th>
                        <th class="p-2 border border-black">inspeksi_alat_cleaning </th>
                        <th class="p-2 border border-black">kondisi_alat_cleaning </th>
                        <th class="p-2 border border-black">keterangan_alat_cleaning</th>
                        <th class="p-2 border border-black">tanggal</th>
                        <th class="p-2 border border-black">action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getDataCekList)) {
                        ?>
                        <tr class="text-xs bg-white border border-black  ">
                            <td class=" p-2 border border-black ">
                                <?php echo $no; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['inspeksi_mesin/peralatan']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['nama_item']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kondisi_mesin/peralatan']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['keterangan_mesin/peralatan']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['inpeksi_area']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kondisi_area']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['keterangan_area']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['inspeksi_alat_cleaning']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kondisi_alat_cleaning']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['keterangan_alat_cleaning']; ?>
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
            <section class="produksi hidden  w-full">
            <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class="bg-black text-white p-2">
                        <th class="p-2">no_preparation</th>
                        <th class="p-2">kode_supplier</th>
                        <th class="p-2">raw_material </th>
                        <th class="p-2">QTY</th>
                        <th class="p-2">jam_keluar</th>
                        <th class="p-2">total_RM</th>
                        <th class="p-2">waste</th>
                        <th class="p-2">tanggal</th>
                        <th class="p-2">action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getDataProduksi)) {
                        ?>
                        <tr class="text-xs bg-white border  ">
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
                            
                            <td class="py-2 px-6 text-center">
                                <a href="./edit-preparation/edit-preparation-produksi.php?p=<?php echo $data['no_preparation']; ?>" class=" cursor-pointer text-center rounded-md  bg-blue-400 text-white p-[0.30rem] w-7 h-7">GO</a>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </table>
              </div>
            </section>
            <section class="laporanMesin hidden w-full">
            <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class="bg-black text-white p-2">
                        <th class="p-2">no_preparation</th>
                        <th class="p-2">operator</th>
                        <th class="p-2">kode_supplier</th>
                        <th class="p-2">raw_material</th>
                        <th class="p-2">QTY</th>
                        <th class="p-2">kg</th>
                        <th class="p-2">mulai</th>
                        <th class="p-2">berakhir</th>
                        <th class="p-2">jumlah</th>
                        <th class="p-2">total_RM</th>
                        <th class="p-2">waste(kg)</th>
                        <th class="p-2">tanggal</th>
                        <th class="p-2">action</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getDataMesin)) {
                        ?>
                        <tr class="text-xs bg-white border  ">
                            <td class=" p-2 border border-black ">
                                <?php echo $no; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['operator']; ?>
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
                                <?php echo $data['kg']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['mulai']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['berakhir']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jumlah']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['total_RM']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['waste(kg)'] ?> KG
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['tanggal']; ?>
                            </td>
                            <td class="py-2 px-6 text-center">
                                <a href="./edit-preparation/edit-preparation-mesin.php?p=<?php echo $data['no_preparation']; ?>" class=" cursor-pointer text-center rounded-md  bg-blue-400 text-white p-[0.30rem] w-7 h-7">GO</a>
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