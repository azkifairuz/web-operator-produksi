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
          Edit Preparation Inspeksi 
        </h1>
        <div class="maincontainer ml-20 lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil  bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                edit list dan inpeksi area
              </li>
            </ul>
          </div>
          <div class="bg-pink-400  w-fit rounded-b-lg  rounded-b-g shadow lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
            <section class="cekList">
              <div class=" items-center justify-evenly m-2 gap-4 w-full">
                <form action="" method="post" enctype="multipart/form-data" class="p-4  w-full ">
                  <div class="p-4 mx-auto flex flex-col gap-5">
                    <div class="flex gap-5 w-full justify-between bg ">
                      <div class="flex flex-col gap-2">
                        <div class="flex flex-col capitalize text-white">
                          <h1>Inpeksi mesin/peralatan</h1>
                          <select name="mesin"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["inspeksi_mesin/peralatan"] ?>" >Saat Ini - <?php echo $dataInpeksi['inspeksi_mesin/peralatan'] ?></option>
                            <option value="mesin">Mesin</option>
                            <option value="Peralatan Produksi">Peralatan Produksi</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Nama Item</h1>
                          <select name="item"
                            class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["nama_item"] ?>" >Saat Ini - <?php echo $dataInpeksi['nama_item'] ?></option>
                            <option>Brushing</option>
                            <option>Conveyor 1</option>
                            <option>Conveyor 2</option>
                            <option>Timbangan 120kg</option>
                            <option>Pisau</option>
                            <option>Talenan</option>
                            <option>Slat</option>
                            <option>Keranjang</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>kondisi mesin/peralatan</h1>
                          <select name="kondisiMesin"
                            class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["kondisi_mesin/peralatan"] ?>" >Saat Ini - <?php echo $dataInpeksi['kondisi_mesin/peralatan'] ?></option>
                            <option>Apakah Tercium bau cleaner atau chemical?</option>
                            <option>Apakah part berfungsi dengan baik?</option>
                            <option>apakah ada bagian berjamur?</option>
                            <option>Apakah ada bagian berkarat?</option>
                            <option>apakah ada bagian yang kendor?</option>
                            <option>apakah ada bagian pecah/sobek/bocor/patah</option>
                            <option>apakah ada bagian yang hilang</option>
                          </select>
                        </div>
                      </div>
                      <div class="flex flex-col gap-2">
                        <div class="flex flex-col capitalize text-white">
                          <h1>keterangan mesin/peralatan</h1>
                          <select name="keteranganMesin"
                            class="bg-gray-50 border border-gray-300 capitalize text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["keterangan_mesin/peralatan"] ?>" >Saat Ini - <?php echo $dataInpeksi['keterangan_mesin/peralatan'] ?></option>
                            <option value="Iya">Iya</option>
                            <option value="Tidak">tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Inpeksi Area</h1>
                          <select name="area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["inpeksi_area"] ?>" >Saat Ini - <?php echo $dataInpeksi['inpeksi_area'] ?></option>
                            <option value="Lantai">Lantai</option>
                            <option value="Dinding"> Dinding</option>
                            <option value="Plafond">Plafond</option>
                            <option value="pintu">pintu</option>
                            <option value="Plastic Curtain">Plastic Curtain</option>
                            <option value="Gutter">Gutter</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Kondisi Area</h1>
                          <select name="kondisiArea"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["kondisi_area"] ?>" >Saat Ini - <?php echo $dataInpeksi['kondisi_area'] ?></option>
                            <option>Apakah area bersih?</option>
                            <option> Apakah ada area yang terkelupas?</option>
                            <option>Apakah ada area yang retak?</option>
                            <option>Apakah ada area yang berjamur?</option>
                            <option>Apakah ada sisa buah atau sayur?</option>
                          </select>
                        </div>
                      </div>
                      <div class="flex flex-col gap-2">
                        <div class="flex flex-col capitalize text-white">
                          <h1>keterangan area</h1>
                          <select name="keteranganArea"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["keterangan_area"] ?>" >Saat Ini - <?php echo $dataInpeksi['keterangan_area'] ?></option>
                            <option>Iya</option>
                            <option>Tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Inpeksi alat cleaning</h1>
                          <select name="alat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["inspeksi_alat_cleaning"] ?>" >Saat Ini - <?php echo $dataInpeksi['inspeksi_alat_cleaning'] ?></option>
                            <option value="Alat pel">Alat pel</option>
                            <option value="Tarikan air"> Tarikan air</option>
                            <option value="Kuraray">Kuraray</option>
                            <option value="Sikat">Sikat</option>
                            <option value="Sikat gagang">Sikat gagang</option>
                            <option value="Sponges">Sponges</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>kondisi alat cleaning</h1>
                          <select name="kondisiAlat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["kondisi_alat_cleaning"] ?>" >Saat Ini - <?php echo $dataInpeksi['kondisi_alat_cleaning'] ?></option>
                            <option>Apakah alat bersih?</option>
                            <option> Apakah alat berfungsi normal?</option>
                            <option>Apakah alat ada identitas?</option>
                            <option>Apakah alat bebas dari jamur?</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>keterangan Alat cleaning</h1>
                          <select name="keteranganAlat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option class="lowercase" value="<?php $dataInpeksi["keterangan_alat_cleaning"] ?>" >Saat Ini - <?php echo $dataInpeksi['keterangan_alat_cleaning'] ?></option>
                            <option>Iya</option>
                            <option>Tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <label for="date">Tanggal</label>
                          <input class="py-2 px-4 text-black" type="text" readonly id="date" name="tgl" value="<?php echo date("Y-m-d") ?>" />
                        </div>
                      </div>
                    </div>
                    <button name="btn-preparation" id="btn-preparation" class="bg-blue-500 w-full text-white px-4 py-2">
                      Ubah</button>
                    <button name="btn-delete" id="btn-preparation" class="bg-blue-500 w-full text-white px-4 py-2">
                      delete</button>
                  </div>
                </form>
              </div>
              <?php
              if (isset($_POST['btn-preparation'])) {
                $isMesin = htmlspecialchars($_POST['mesin']);
                $namaItem = htmlspecialchars($_POST['item']);
                $kondisiMesin = htmlspecialchars($_POST['kondisiMesin']);
                $keteranganMesin = htmlspecialchars($_POST['keteranganMesin']);
                $inpeskiArea = htmlspecialchars($_POST['area']);
                $kondisiArea = htmlspecialchars($_POST['kondisiArea']);
                $keteranganArea = htmlspecialchars($_POST['keteranganArea']);
                $inpeksiAlat = htmlspecialchars($_POST['alat']);
                $kondisiAlat = htmlspecialchars($_POST['kondisiAlat']);
                $ketereanganAlat = htmlspecialchars($_POST['keteranganAlat']);
                $tanggal = htmlspecialchars($_POST['tgl']);

                if ($isMesin === "" && $namaItem === "" && $kondisiMesin === "") {

                  ?>
                  <div
                    class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> tidak boleh sama seperti sebelumnya</strong>
                  </div>

                  <?php
                } else {
                  $queryUpdate = mysqli_query($con, "UPDATE `form_preparation_inspeksi_area` SET `inspeksi_mesin/peralatan`='$isMesin',`nama_item`='$namaItem',`kondisi_mesin/peralatan`='$kondisiMesin',`keterangan_mesin/peralatan`='$keteranganMesin',`inpeksi_area`='$inpeskiArea',`kondisi_area`='$kondisiArea',`keterangan_area`='$ketereanganAlat',`inspeksi_alat_cleaning`='$inpeksiAlat',`kondisi_alat_cleaning`='$kondisiAlat',`keterangan_alat_cleaning`='$ketereanganAlat',`tanggal`='$tanggal' WHERE `no_preparation`=$idPreparation ");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold"> berhasil Update</strong>
                    <meta http-equiv="refresh" content="2; url=./laporanPreparation.php" />
                  </div>
                  <?php
                }
              }
              if (isset($_POST['btn-delete'])) {
                $deleteLaporan = mysqli_query($con ,"DELETE FROM `form_preparation_inspeksi_area` WHERE `no_preparation`=$idPreparation")
                ?>
                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold"> berhasil Delete </strong>
                        <meta http-equiv="refresh" content="2; url=./laporanPreparation.php" />
                    </div>

                <?php
            }
              ?>
            </section>
            <section class="produksi hidden w-full">
              <div class="mx-auto w-1/2">
                <form action="" method="post" class="flex flex-col gap-4">
                  <h1 class="text-white text-4xl mb-5 -mt-10 font-bold text-center capitalize "></h1>
                  <div class="flex flex-col text-white">
                    <label for="old">Kode Supplier</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="kode" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Raw Material</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="raw" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Qty</label>
                    <input type="number" class="py-2 px-4 text-black rounded-md" type="text" name="qty" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Jam Keluar</label>
                    <input type="time" class="py-2 px-4 text-black rounded-md"  name="time" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Total Rm</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="totalRm" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Waste</label>
                    <input class="py-2 px-4 text-black rounded-md" type="text" name="waste" value="">
                  </div>
                  <div class="flex flex-col text-white">
                    <label for="new">Tanggal</label>
                    <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="">
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
            <section class="laporanMesin hidden w-full">
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
                    <meta http-equiv="refresh" content="2; url=./LaporanPreparation.php">
                  </div>
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