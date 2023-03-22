<?php
session_start();
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getAbout = mysqli_query($con ,"SELECT * FROM `tentang_aplikasi` ");
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
          Tentang
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil bg-purple-400 hover:bg-purple-600 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                Tentang
              </li>
            </ul>
          </div>
          <div class="bg-pink-400 shadow w-fit h-5/6 rounded-b-lg  flex  justify-center p-2">
          <section class="cekList">
              <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr rowspan=5 class="bg-black text-white p-2">
                        <th colspan=5 class="p-2">about</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getAbout)) {
                        ?>
                        <tr rowspan=5 class="text-xs bg-white border  ">
                            <td colspan=5 class=" p-2 border border-black ">
                                <?php echo $data['tentang']; ?>
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
                        <th class="p-2">no_pressing</th>
                        <th class="p-2">kode_mesin</th>
                        <th class="p-2">nama_produk</th>
                        <th class="p-2">batch</th>
                        <th class="p-2">jam_mulai</th>
                        <th class="p-2">jam_keluar</th>
                        <th class="p-2">berat_juice_kg</th>
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
                                <?php echo $data['nama_produk']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['batch']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jam_mulai']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jam_keluar']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['berat_juice_kg']; ?>
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