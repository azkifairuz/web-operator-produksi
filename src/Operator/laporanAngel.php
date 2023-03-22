<?php
session_start();
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getDataCekList = mysqli_query($con ,"SELECT * FROM `form_angel_inspeksi_area` ");
$getDataProduksi = mysqli_query($con ,"SELECT * FROM `form_angel_produksi` ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../dist/output.css" />
</head>

<body>
  <div>
    <div class="flex">
      <?php
      require "sidebar.php";
      ?>

      <div class="mainPage container mt-20 w-1/2 ml-20 ">
        <h1 class="text-2xl -ml-10 mb-5 text-purple-700 font-bold">
          Hasil Laporan Kupas
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil bg-purple-400 hover:bg-purple-600 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                Cek list dan inpeksi area
              </li>
              <li
                class="btnUbah bg-purple-400 hover:bg-purple-600  h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Laporan produksi
              </li>

            </ul>
          </div>
          <div class="bg-pink-400 shadow w-fit rounded-b-lg  flex  justify-center p-2">
          <section class="cekList">
              <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class="bg-black text-white p-2">
                        <th class="p-2">no_angel</th>
                        <th class="p-2">inspeksi_mesin/peralatan</th>
                        <th class="p-2">nama_item </th>
                        <th class="p-2">kondisi_mesin/peralatan</th>
                        <th class="p-2">keterangan_mesin/peralatan</th>
                        <th class="p-2">inpeksi_area</th>
                        <th class="p-2">kondisi_area </th>
                        <th class="p-2">keterangan_area </th>
                        <th class="p-2">inspeksi_alat_cleaning </th>
                        <th class="p-2">kondisi_alat_cleaning </th>
                        <th class="p-2">keterangan_alat_cleaning</th>
                        <th class="p-2">tanggal</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getDataCekList)) {
                        ?>
                        <tr class="text-xs bg-white border  ">
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
                        <th class="p-2">no_angel </th>
                        <th class="p-2">kode_mesin</th>
                        <th class="p-2">raw_material</th>
                        <th class="p-2">untuk_produk</th>
                        <th class="p-2">kode_supplier</th>
                        <th class="p-2">batch</th>
                        <th class="p-2">jam_mulai</th>
                        <th class="p-2">jam_keluar</th>
                        <th class="p-2">berat_setelah_angel</th>
                        <th class="p-2">keterangan</th>
                        <th class="p-2">operator</th>
                        <th class="p-2">tanggal</th>
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
                                <?php echo $data['kode_mesin']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['raw_material']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['untuk_produk']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kode_supplier ']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jam_mulai']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jam_keluar']; ?>
                            </td>
                          
                            <td class=" p-2 border border-black ">
                                <?php echo $data['berat_setelah_angel']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['keterangan']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['operator']; ?>
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

    const btnProfil = document.querySelector(".btnProfil")
    const btnUbah = document.querySelector(".btnUbah")
    const btnPassword = document.querySelector(".btnPassword")

    const cekList = document.querySelector(".cekList")
    const produksi = document.querySelector(".produksi")
    const laporanMesin = document.querySelector(".laporanMesin")

    btnProfil.addEventListener("click", () => {
      cekList.classList.remove("hidden")
      produksi.classList.add("hidden")
      
    })
    btnUbah.addEventListener("click", () => {
      cekList.classList.add("hidden")
      produksi.classList.remove("hidden")
    })

    
  </script>
</body>

</html>