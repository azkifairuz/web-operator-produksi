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
      <div class="mainPage container mt-20 mx-auto w-fit  ">
        <h1 class="md:text-2xl ml-20 mb-5 text-purple-700 font-bold">
          Edit Preparation Mesin
        </h1>
        <div class="maincontainer ml-20 lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnPassword  bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                Edit Laporan mesin brushing
              </li>
            </ul>
          </div>
          <div class="bg-pink-400  w-fit rounded-b-lg  rounded-b-g shadow lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
            <section class="laporanMesin  w-full">
              <div class="mx-auto w-1/2">
                <form action="" method="post" class="flex flex-col gap-4">
                  <div class="flex flex-row gap-4">
                  <div>
                  <div class="flex flex-col text-white">
                    <label for="old">Operator</label>
                    <input readonly class="py-2 px-4 text-black rounded-md" type="text" name="operator" value="<?php echo $data["nama"] ?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">kode suplier</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="kode" value="<?php echo $dataMesin['kode_supplier']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">raw material</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="raw" value="<?php echo $dataMesin['raw_material']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">QTY</label>
                    <input type="text" class="py-2 px-4 text-black rounded-md"  name="qty" value="<?php echo $dataMesin['QTY']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">kg</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="kg" value="<?php echo $dataMesin['kg']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">mulai</label>
                    <input class="py-2 px-4 text-black rounded-md" type="time" name="mulai" value="<?php echo $dataMesin['mulai']?>">
                  </div>
                  </div>
                  <div>
                  <div class="flex flex-col text-white">
                    <label for="old">berakhir</label>
                    <input class="py-2 px-4 text-black rounded-md" type="time" name="berakhir" value="<?php echo $dataMesin['berakhir']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">durasi</label>
                    <input class="py-2 px-4 text-black rounded-md" type="number" name="durasi" value="<?php echo $dataMesin['durasi']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">jumlah</label>
                    <input type="number" class="py-2 px-4 text-black rounded-md" type="text" name="jumlah" value="<?php echo $dataMesin['jumlah']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">total_RM</label>
                    <input type="number" class="py-2 px-4 text-black rounded-md"  name="totalRm" value="<?php echo $dataMesin['total_RM']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">waste(kg)</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="waste" value="<?php echo $dataMesin['waste(kg)']?>">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">tanggal</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="tgl" value="<?php echo date("Y-m-d") ?>">
                  </div>
                </div>
                  </div>
                <button name="btn-mesin" class=" w-full mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                <button name="btn-delete" class=" w-full mt-2 py-2 px-4 text-white bg-red-500">delete</button>
                </form>
              </div>
              <?php
              if (isset($_POST['btn-mesin'])) {
                $kode = htmlspecialchars($_POST['kode']);
                $Raw = htmlspecialchars($_POST['raw']);
                $Qty = htmlspecialchars($_POST['qty']);
                $TotalRm = htmlspecialchars($_POST['totalRm']);
                $Operator = htmlspecialchars($_POST['operator']);
                $waste = htmlspecialchars($_POST['waste']);
                $tanggal = htmlspecialchars($_POST['tgl']);
                $kg = htmlspecialchars($_POST['kg']);
                $mulai = htmlspecialchars($_POST['mulai']);
                $berakhir = htmlspecialchars($_POST['berakhir']);
                $durasi = htmlspecialchars($_POST['durasi']);
                $jumlah = htmlspecialchars($_POST['jumlah']);

                if ($kode === "" && $Raw === "" && $Qty === "") {

                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">tidak boleh sama seperti sebelumnya</strong>
                  </div>

                  <?php
                } else {
                  $queryUpdate = mysqli_query($con, "UPDATE `form_preparation_mesin_brushing` SET `operator`='$Operator',`kode_supplier`='$kode',`raw_material`='$Raw',`QTY`='$Qty',`kg`='$kg',`mulai`='$mulai',`berakhir`='$berakhir',`durasi`='$durasi',`jumlah`='$jumlah',`total_RM`='$TotalRm',`waste(kg)`='$$waste',`tanggal`='$tanggal' WHERE `no_preparation` = $idPreparation ");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> berhasil Update</strong>
                    <meta http-equiv="refresh" content="2; url=../LaporanPreparation.php">
                  </div>
                  <?php
                }
              }
              if (isset($_POST['btn-delete'])) {
                $deleteLaporan = mysqli_query($con ,"DELETE FROM `form_preparation_mesin_brushing` WHERE `no_preparation`=$idPreparation")
                ?>
                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold"> berhasil Delete </strong>
                        <meta http-equiv="refresh" content="2; url=../laporanPreparation.php" />
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