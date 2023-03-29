<?php
session_start();
$userNip = $_SESSION['NIP'];
$idWashing = $_GET['p'];
include("../navbar.php");
include("../../koneksi.php");
$getDataWashing = mysqli_query($con,"SELECT * FROM `form_washing_produksi`where `no_washing` = $idWashing ");
$dataWashing = mysqli_fetch_array($getDataWashing)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../../../dist/output.css" />
</head>

<body>
  <div>
    <div class="flex ">
      <?php
      require "sidebar.php";
      ?>

      <div class="mainPage mt-20 container w-1/2 ml-20 ">
        <h1 class="md:text-5xl -ml-10 mb-5 text-purple-700 font-bold">
          Washing
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnUbah bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Laporan produksi
              </li>
            </ul>
          </div>
          <div class="bg-pink-400 w-fit   lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
            <section class="produksi w-full">
              <div class="mx-auto w-1/2">
                <form action="" method="post" class="flex flex-col gap-4">
                  <div class="flex flex-row gap-4">
                    <div>
                      <div class="flex flex-col text-white">
                        <label for="new">kode suplier</label>
                        <input class="py-2 px-4 text-black rounded-md" type="text" name="kode" value="<?php echo $dataWashing['kode_supplier'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <h1>Nama Mesin</h1>
                        <select name="namaMesin"
                          class="bg-gray-50 border border-gray-300 capitalize text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                          <option>washing</option>
                          <option>spiner</option>
                        </select>
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">mulai</label>
                        <input type="time" class="py-2 px-4 text-black rounded-md" name="mulai" value="<?php echo $dataWashing['mulai'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">berakhir</label>
                        <input class="py-2 px-4 text-black rounded-md" type="time" name="berakhir" value="<?php echo $dataWashing['berakhir'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">durasi</label>
                        <input class="py-2 px-4 text-black rounded-md" type="number" name="durasi" value="<?php echo $dataWashing['durasi'] ?>">
                      </div>
                    </div>
                    <div>
                      <div class="flex flex-col text-white">
                        <label for="old">jumlah</label>
                        <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlah" value="<?php echo $dataWashing['jumlah'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">total RM</label>
                        <input class="py-2 px-4 text-black rounded-md" type="number" name="total_RM" value="<?php echo $dataWashing['total_RM'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">waste</label>
                        <input type="number" class="py-2 px-4 text-black rounded-md" type="number" name="waste"
                          value="<?php echo $dataWashing['waste'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="old">Operator</label>
                        <input readonly class="py-2 px-4 text-black rounded-md" type="text" name="operator"
                          value="<?php echo $data["nama"] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">tanggal</label>
                        <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="<?php echo  date("Y-m-d") ?>">
                      </div>
                    </div>
                  </div>
                  <button name="btn-mesin" class=" w-full mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                  <button name="btn-delete" class=" w-full mt-2 py-2 px-4 text-white bg-red-500">Hapus</button>
                </form>
              </div>
              <?php
              if (isset($_POST['btn-mesin'])) {
                $kode = htmlspecialchars($_POST['kode']);
                $TotalRm = htmlspecialchars($_POST['total_RM']);
                $Operator = htmlspecialchars($_POST['operator']);
                $waste = htmlspecialchars($_POST['waste']);
                $tanggal = htmlspecialchars($_POST['tgl']);
                $mulai = htmlspecialchars($_POST['mulai']);
                $berakhir = htmlspecialchars($_POST['berakhir']);
                $durasi = htmlspecialchars($_POST['durasi']);
                $jumlah = htmlspecialchars($_POST['jumlah']);
                $Mesin = htmlspecialchars($_POST['namaMesin']);
                  $queryUpdate = mysqli_query($con, "UPDATE `form_washing_produksi` SET `kode_supplier`='$kode',`nama_mesin`='$namaItem',`mulai`='$mulai',`berakhir`='$berakhir',`durasi`='$durasi',`jumlah`='$jumlah',`total_RM`='$TotalRm',`waste`='$waste',`operator`='$operator',`tanggal`='$tanggal' WHERE `no_washing` = $idWashing");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> berhasil Update</strong>
                    <meta http-equiv="refresh" content="2; url=../laporanWashing.php">
                  </div>
                  <?php
                
              }
              if(isset($_POST['btn-delete'])){
                $queryDelete = mysqli_query($con,"DELETE FROM `form_washing_produksi` WHERE `no_washing` =$idWashing ");
                ?>
                <div
                class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                role="alert">
                  <strong class="font-bold"> berhasil delete</strong>
                  <meta http-equiv="refresh" content="2; url=../laporanWashing.php">
                </div>
              <?php
              }
              ?>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>

    const btnProfil = document.querySelector(".btnProfil")
    const btnUbah = document.querySelector(".btnUbah")

    const cekList = document.querySelector(".cekList")
    const produksi = document.querySelector(".produksi")
    const laporanMesin = document.querySelector(".laporanMesin")

    btnProfil.addEventListener("click", () => {
      cekList.classList.remove("hidden")
      produksi.classList.add("hidden")
      laporanMesin.classList.add("hidden")
    })
    btnUbah.addEventListener("click", () => {
      cekList.classList.add("hidden")
      produksi.classList.remove("hidden")
      
    })

  </script>
</body>

</html>