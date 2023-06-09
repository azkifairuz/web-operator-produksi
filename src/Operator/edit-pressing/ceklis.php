<?php
session_start();
$userNip = $_SESSION['NIP'];
$idPressing = $_GET['p'];
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
          pressing
        </h1>
        <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
          <div class="inline">
            <ul class="flex">
              <li
                class="btnProfil bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                Cek list dan inpeksi area
              </li>
            </ul>
          </div>
          <div class="bg-pink-400 w-fit   lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
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
                            <option value="X6">X6</option>
                            <option value="X1">X1</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Nama Item</h1>
                          <select name="item"
                            class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">                            
                            <option>HOPPER</option>
                            <option>GRINDER</option>
                            <option>MOVING PLATE</option>
                            <option>PRESS RACK</option>
                            <option>BAG PRESS</option>
                            <option>SAFETY GUARD</option>
                            <option>JUICE TRAY</option>
                            <option>START/STOP SWITCH BOX</option>
                            <option>PRESSURE GAUGE DAN FLOW CONTROL</option>
                            <option>DIRECTIONAL CONTROL VALVE</option>
                            <option>MOTOR HYDRAULIC DAN RESERVOIR</option>
                            <option>AS MOVING PLATE</option>
                            <option>SHIMS DAN RAIL</option>
                            <option>CASTER</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>kondisi mesin/peralatan</h1>
                          <select name="kondisiMesin"
                            class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option>Apakah berbau bahan kimia?</option>
                            <option>Apakah ada berjamur dan berkarat?</option>
                            <option>Apakah sudah diberi pelumas?</option>
                            <option>Apakah ada bagian yang kendor/part hilang?</option>
                            <option>apakah ada bagian pecah/sobek/bocor/patah</option>
                            <option>Apakah part berfungsi dengan baik?</option>
                          </select>
                        </div>
                      </div>
                      <div class="flex flex-col gap-2">
                        <div class="flex flex-col capitalize text-white">
                          <h1>keterangan mesin/peralatan</h1>
                          <select name="keteranganMesin"
                            class="bg-gray-50 border border-gray-300 capitalize text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="Iya">Iya</option>
                            <option value="Tidak">tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Inpeksi Area</h1>
                          <select name="area"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="Lantai">Lantai</option>
                            <option value="Dinding">Dinding</option>
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
                            <option>Iya</option>
                            <option>Tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>Inpeksi alat cleaning</h1>
                          <select name="alat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option value="Alat pel">Alat pel</option>
                            <option value="Tarikan air"> Tarikan air</option>
                            <option value="Kuraray">Ember rendaman bag press</option>
                            <option value="Sikat">Sikat</option>
                            <option value="Sikat gagang">Sikat gagang</option>
                            <option value="Sponges">Pembersih dinding</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>kondisi alat cleaning</h1>
                          <select name="kondisiAlat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option>Apakah alat bersih?</option>
                            <option>Apakah alat berfungsi normal?</option>
                            <option>Apakah alat ada identitas?</option>
                            <option>Apakah alat bebas dari jamur?</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <h1>keterangan Alat cleaning</h1>
                          <select name="keteranganAlat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option>Iya</option>
                            <option>Tidak</option>
                          </select>
                        </div>
                        <div class="flex flex-col capitalize text-white">
                          <label for="date">Tanggal</label>
                          <input class="py-2 px-4 text-black" type="date" id="date" name="tgl" value="<?php echo date("Y-m-d") ?>" />
                        </div>
                      </div>
                    </div>
                    <button name="btn-preparation" id="btn-preparation" class="bg-blue-500 w-full text-white px-4 py-2">
                      Update</button>
                    <button name="btn-delete" id="btn-preparation" class="bg-red-500 w-full text-white px-4 py-2">
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

                  $queryUpdate = mysqli_query($con, "UPDATE `form_pressing_inspeksi_area` SET `kode_mesin`='$isMesin',`part_mesin`='$namaItem',`kondisi_mesin`='$kondisiMesin',`keterangan_mesin`='$keteranganMesin',`inpeksi_area`='$inpeskiArea',`kondisi_area`='$kondisiArea',`keterangan_area`='$keteranganArea',`inspeksi_alat_cleaning`='$inpeksiAlat',`kondisi_alat_cleaning`='$kondisiAlat',`keterangan_alat_cleaning`='$ketereanganAlat',`tanggal`='$tanggal' WHERE `no_pressing`=$idPressing ");
                  ?>
                  <div
                    class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Berhasil update</strong>
                    <meta http-equiv="refresh" content="2; url=../laporanPressing.php" />
                  </div>
                  <?php
                
              }
              if(isset($_POST['btn-delete'])){
                $queryDelete = mysqli_query($con, "DELETE FROM `form_pressing_inspeksi_area` WHERE `no_pressing` = $idPressing");
                ?>
                <div
                  class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                  role="alert">
                  <strong class="font-bold">Berhasil Delete</strong>
                  <meta http-equiv="refresh" content="2; url=../laporanPressing.php" />
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