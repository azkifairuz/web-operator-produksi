<?php
    session_start();
    $userNip = $_SESSION['NIP'];
    $idAngel = $_GET["p"];
    include("../navbar.php");
    include("../../koneksi.php");
    $getDataAngelProduksi = mysqli_query($con, "SELECT * FROM `form_angel_produksi` where `no_angel`=$idAngel");
    $dataAngel = mysqli_fetch_assoc($getDataAngelProduksi)
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
    <div class="flex ">
      <?php
      require "sidebar.php";
      ?>

      <div class="mainPage mt-20 container w-1/2 ml-20 ">
        <h1 class="md:text-5xl -ml-10 mb-5 text-purple-700 font-bold">
          angel
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnUbah bg-[#8338EC] hover:bg-purple-400 text-white hover:text-black h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
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
                        <h1>kode mesin</h1>
                        <select name="kodeMesin"
                          class="bg-gray-50 border border-gray-300 capitalize text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                          <option>AJ.A</option>
                          <option>AJ.B</option>
                          <option>AG.A</option>
                          <option>AG.B</option>
                        </select>
                      </div>
                      <div class="flex flex-col text-white">
                      <label for="new">Raw Material</label>
                        <input type="text" class="py-2 px-4 text-black rounded-md" name="raw" value="<?php echo $dataAngel['raw_material'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">untuk produk</label>
                        <input type="text" class="py-2 px-4 text-black rounded-md" name="untukProduk" value="<?php echo $dataAngel['untuk_produk'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">kode suplier</label>
                        <input class="py-2 px-4 text-black rounded-md" type="number" name="kodeSupplier" value="<?php echo $dataAngel['kode_supplier'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">batch</label>
                        <input class="py-2 px-4 text-black rounded-md" type="number" name="batch" value="<?php echo $dataAngel['batch'] ?>">
                      </div>
                    </div>
                    <div>
                      <div class="flex flex-col text-white">
                        <label for="new">Jam Mulai</label>
                        <input class="py-2 px-4 text-black rounded-md" type="time" name="jamMulai" value="<?php echo $dataAngel['jam_mulai'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">Jam Keluar</label>
                        <input class="py-2 px-4 text-black rounded-md" type="time" name="jamKeluar" value="<?php echo $dataAngel['jam_keluar'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="old">berat setelah angel</label>
                        <input  class="py-2 px-4 text-black rounded-md" type="number" name="beratSetelahAngel"
                          value="<?php echo $dataAngel['berat_setelah_angel'] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label cols="5" rows="10" for="new">keterangan</label>
                        <textarea class="py-2 px-4 text-black rounded-md" type="text" name="keterangan" ><?php echo $dataAngel['keterangan'] ?></textarea>
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="old">Operator</label>
                        <input readonly class="py-2 px-4 text-black rounded-md" type="text" name="operator"
                          value="<?php echo $data["nama"] ?>">
                      </div>
                      <div class="flex flex-col text-white">
                        <label for="new">tanggal</label>
                        <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="<?php echo date("Y-m-d")?>">
                      </div>
                    </div>
                  </div>
                  <button name="btn-update" class=" w-full mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                  <button name="btn-delete" class=" w-full mt-2 py-2 px-4 text-white bg-red-500">Delete</button>
                </form>
              </div>
              <?php
              if (isset($_POST['btn-update'])) {
                $kode = htmlspecialchars($_POST['kodeMesin']);
                $rawMaterial = htmlspecialchars($_POST['raw']);
                $untukProduk = htmlspecialchars($_POST['untukProduk']);
                $kodeSuplier = htmlspecialchars($_POST['kodeSupplier']);
                $batch = htmlspecialchars($_POST['batch']);
                $jamMulai = htmlspecialchars($_POST['jamMulai']);
                $jamKeluar = htmlspecialchars($_POST['jamKeluar']);
                $beratSetelahAngel = htmlspecialchars($_POST['beratSetelahAngel']);
                $keterangan = htmlspecialchars($_POST['keterangan']);
                $operator = htmlspecialchars($_POST['operator']);
                $tanggal = htmlspecialchars($_POST['tgl']);
                  $queryUpdate = mysqli_query($con, "UPDATE `form_angel_produksi` SET `kode_mesin`='$kode',`raw_material`='$rawMaterial',`untuk_produk`='$untukProduk',`kode_supplier`='$kodeSuplier',`batch`='$batch',`jam_mulai`='$jamMulai',`jam_keluar`='$jamKeluar',`berat_setelah_angel`='$beratSetelahAngel',`keterangan`='$keterangan',`operator`='$operator',`tanggal`='$tanggal' WHERE `no_angel` = $idAngel ");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> berhasil Input</strong>
                    <meta http-equiv="refresh" content="2; url=../laporanAngel.php">
                  </div>
                  <?php
                }
                if (isset($_POST['btn-delete'])) {
                  $deleteLaporan = mysqli_query($con ,"DELETE FROM `form_angel_inspeksi_area` WHERE `no_angel`=$idAngel")
                  ?>
                      <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                          role="alert">
                          <strong class="font-bold"> berhasil Delete </strong>
                          <meta http-equiv="refresh" content="2; url=../laporanAngel.php" />
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