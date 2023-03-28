<?php
session_start();
$userNip = $_SESSION['NIP'];
include("../navbar.php");
include("../../koneksi.php");

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
            <section class="produksi  w-full">
            <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class="bg-black text-white p-2">
                        <th class="p-2">no_kupas</th>
                        <th class="p-2">nama_material</th>
                        <th class="p-2">kode_supplier</th>
                        <th class="p-2">mulai</th>
                        <th class="p-2">berakhir</th>
                        <th class="p-2">durasi</th>
                        <th class="p-2">hasil_kg</th>
                        <th class="p-2">waste_kg</th>
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
                                <?php echo $data['nama_material']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['kode_supplier']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['mulai']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['berakhir']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['durasi']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['hasil_kg']; ?>
                            </td>
                          
                            <td class=" p-2 border border-black ">
                                <?php echo $data['waste_kg']; ?>
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