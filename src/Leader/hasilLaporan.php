<?php
session_start();
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataLeader = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getLeader = mysqli_query($con ,"SELECT * FROM `leader_kelola_operator`  ");
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
          Hasil Laporan
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil bg-purple-400 hover:bg-purple-600 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                Hasil Laporan
              </li>

            </ul>
          </div>
          <div class="bg-pink-400 shadow w-full rounded-b-lg  h-5/6 flex  justify-center p-2">
          <section class="cekList">
              <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <table>
                    <tr class="bg-black text-white p-2">
                        <th class="p-2">no</th>
                        <th class="p-2">departemen</th>
                        <th class="p-2">jenis_laporan</th>
                        <th class="p-2">verifikasi</th>
                        <th class="p-2">leader</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($getLeader)) {
                        ?>
                        <tr class="text-xs bg-white border  ">
                            <td class=" p-2 border border-black ">
                                <?php echo $no; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['departemen']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['jenis_laporan']; ?>
                            </td>
                            
                            <td class=" p-2 border border-black ">
                                <?php echo $data['verifikasi']; ?>
                            </td>
                            <td class=" p-2 border border-black ">
                                <?php echo $data['leader']; ?>
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