<?php
    session_start();
    $userNip = $_SESSION['NIP'];
    $idPreparation = $_GET["p"];
    include("../navbar.php");
    include("../../koneksi.php");
    $queryInpeksiArea = mysqli_query($con,"SELECT * FROM `form_preparation_inspeksi_area` where `no_preparation`=$idPreparation ");
    $queryMesinBurshing = mysqli_query($con,"SELECT * FROM `form_preparation_mesin_brushing` where `no_preparation`=$idPreparation ");
    $queryProduksi = mysqli_query($con,"SELECT * FROM `form_preparation_produksi` where `no_preparation`=$idPreparation ");
    $dataInpeksi = mysqli_fetch_assoc($queryInpeksiArea);
    $dataMesin = mysqli_fetch_assoc($queryMesinBurshing);
    $dataProduksi = mysqli_fetch_assoc($queryProduksi);
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
    <div class="flex">
    <?php include("sidebar.php") ?>

      <div class="mainPage container mt-5 mx-auto w-fit  ">
        <h1 class="md:text-4xl ml-20 mb-5 text-purple-700 font-bold">
          Edit Preparation
        </h1>
        <div class="maincontainer ml-20 lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnUbah  bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Laporan produksi
              </li>
            </ul>
          </div>
          <div class="bg-pink-400  w-fit rounded-b-lg  rounded-b-g shadow lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
            <section class="produksi  w-full">
              <div class="mx-auto w-1/2">
                <form action="" method="post" class="flex flex-col gap-4">
                  <h1 class="text-white text-4xl mb-5 -mt-10 font-bold text-center capitalize "></h1>
                  <div class="flex flex-col text-white">
                    <label for="old">Kode Supplier</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="kode" value="<?php echo $dataProduksi['kode_supplier'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Raw Material</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="raw" value="<?php echo $dataProduksi['raw_material'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Qty</label>
                    <input type="number" class="py-2 px-4 text-black rounded-md" type="text" name="qty" value="<?php echo $dataProduksi['QTY'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Jam Keluar</label>
                    <input type="time" class="py-2 px-4 text-black rounded-md"  name="time" value="<?php echo $dataProduksi['jam_keluar'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Total Rm</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="totalRm" value="<?php echo $dataProduksi['total_RM'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Waste</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="waste" value="<?php echo $dataProduksi['waste'] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Tanggal</label>
                    <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="<?php echo date("Y-m-d") ?>">
                  </div>
                  <button name="btn-produksi" class=" mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                </form>
              </div>
              <?php
              if (isset($_POST['btn-produksi'])) {
                $kode = htmlspecialchars($_POST['kode']);
                $Raw = htmlspecialchars($_POST['raw']);
                $Qty = htmlspecialchars($_POST['qty']);
                $TotalRm = htmlspecialchars($_POST['totalRm']);
                $JamKeluar = htmlspecialchars($_POST['time']);
                $waste = htmlspecialchars($_POST['waste']);
                $tanggal = htmlspecialchars($_POST['tgl']);

                if ($kode === "" && $Raw === "" && $Qty === "") {

                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">tidak boleh kosong</strong>
                  </div>
                  <meta http-equiv="refresh" content="2; url=preparation.php">

                  <?php
                } else {
                  $queryUpdate = mysqli_query($con, "INSERT INTO `form_preparation_produksi`( `kode_supplier`, `raw_material`, `QTY`, `jam_keluar`, `total_RM`, `waste`, `tanggal`) VALUES ('$kode','$Raw','$Qty','$JamKeluar','$TotalRm','$waste','$tanggal') ");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> berhasil update</strong>
                  </div>
                  <meta http-equiv="refresh" content="2; url=preparation.php">
                  <?php
                }
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
    const btnPassword = document.querySelector(".btnPassword")

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
      laporanMesin.classList.add("hidden")
    })
    btnPassword.addEventListener("click", () => {
      cekList.classList.add("hidden")
      produksi.classList.add("hidden")
      laporanMesin.classList.remove("hidden")
    })
  </script>
</body>

</html>