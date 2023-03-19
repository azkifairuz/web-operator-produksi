<?php
session_start();
$userNip = $_SESSION['NIP'];
include("navbar.php");
include("../koneksi.php");
$getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
$getOldPassword = mysqli_query($con, "SELECT `user_password` FROM `user` WHERE `user_nip` ='$userNip' ");
$oldPassword = mysqli_fetch_array($getOldPassword);
$cekUser = mysqli_num_rows($getDataOperator);
$data = mysqli_fetch_array($getDataOperator);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Weighing</title>
    <link rel="stylesheet" href="../../dist/output.css" />
</head>

<body>
    <div>
        <div class="flex">
            <?php
            require "sidebar.php";
            ?>

            <div class="mainPage container mt-20 w-1/2 ml-20 ">
                <h1 class="md:text-5xl -ml-10 mb-5 text-purple-700 font-bold">
                    weighing
                </h1>
                <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
                    <div class="inline">
                        <ul class="flex">
                            <li
                                class="btnProfil bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                                Cek list dan inpeksi area
                            </li>
                            <li
                                class="btnUbah bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                                Laporan produksi
                            </li>
                            <li
                                class="btnPassword bg-purple-400 h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                                Perendaman Apel
                            </li>
                        </ul>
                    </div>
                    <div class="bg-pink-400 w-fit   lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
                        <section class="cekList hidden">
                            <div class=" items-center justify-evenly m-2 gap-4 w-full">
                                <form action="" method="post" enctype="multipart/form-data" class="p-4  w-full ">
                                    <div class="p-4 mx-auto flex flex-col gap-5">
                                        <div class="flex gap-5 w-full justify-between bg ">
                                            <div class="flex flex-col gap-2">
                                                <div class="flex flex-col capitalize text-white">
                                                    <h1>Inpeksi mesin/peralatan</h1>
                                                    <select name="mesin"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        <option value="mesin">Mesin</option>
                                                        <option value="Peralatan Produksi">Peralatan Produksi</option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col capitalize text-white">
                                                    <h1>Nama Item</h1>
                                                    <select name="item"
                                                        class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                        <option>Timbangan 120 kg</option>
                                                        <option>Timbangan 50 kg</option>
                                                        <option>Conveyor</option>
                                                        <option>Container 120 L</option>
                                                        <option>Container 50 L</option>
                                                        <option>Talenan</option>
                                                        <option>Pisau</option>
                                                        <option>Asahan pisau</option>
                                                        <option>Selang air</option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col capitalize text-white">
                                                    <h1>kondisi mesin/peralatan</h1>
                                                    <select name="kondisiMesin"
                                                        class="bg-gray-50 border capitalize border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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
                                                        <option value="Tarikan air">Tarikan air</option>
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
                                                        <option>Iya</option>
                                                        <option>Tidak</option>
                                                    </select>
                                                </div>
                                                <div class="flex flex-col capitalize text-white">
                                                    <label for="date">Tanggal</label>
                                                    <input class="py-2 px-4 text-black" type="date" id="date"
                                                        name="tgl" />
                                                </div>
                                            </div>
                                        </div>
                                        <button name="btn-preparation" id="btn-preparation"
                                            class="bg-blue-500 w-full text-white px-4 py-2">
                                            Ubah</button>
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
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> tidak boleh kosong</strong>
                                    </div>

                                    <?php
                                } else {
                                    $queryUpdate = mysqli_query($con, "INSERT INTO `form_weighing_inspeksi_area`(`inspeksi_mesin/peralatan`, `nama_item`, `kondisi_mesin/peralatan`, `keterangan_mesin/peralatan`, `inpeksi_area`, `kondisi_area`, `keterangan_area`, `inspeksi_alat_cleaning`, `kondisi_alat_cleaning`, `keterangan_alat_cleaning`, `tanggal`) VALUES ('$isMesin','$namaItem','$kondisiMesin','$keteranganMesin','$inpeskiArea','$kondisiArea','$keteranganArea','$inpeksiAlat','$kondisiAlat','$ketereanganAlat','$tanggal') ");
                                    ?>
                                    <div class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Input</strong>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </section>
                        <section class="produksi  w-full">
                            <div class="mx-auto w-1/2">
                                <form action="" method="post" class="flex flex-col gap-4">
                                
                                    <div class="flex flex-col text-white">
                                        <h1>varian produk</h1>
                                        <select name="variant"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option>Asian green</option>
                                            <option>Beat that</option>
                                            <option>Classic green</option>
                                            <option>Green glory</option>
                                            <option>I glow</option>
                                            <option>Golden apple</option>
                                            <option>Golden orange</option>
                                            <option>U glow</option>
                                            <option>Glowing apple</option>
                                            <option>Minty Apple</option>
                                            <option>Firey Apple</option>
                                            <option>Crush watermelon</option>
                                            <option>Glowing Golden</option>
                                            <option>Tropic golden</option>
                                            <option>Glowing calamansi</option>
                                            <option>Tropic calamansit</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">jam mulai</label>
                                        <input type="time" class="py-2 px-4 text-black rounded-md" type="time"
                                            name="mulai" value="">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Jam Selesai</label>
                                        <input type="time" class="py-2 px-4 text-black rounded-md" name="jamSelesai" value="">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">jumlah batch</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahBatch"
                                            value="">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Keterangan</label>
                                        <textarea cols="10" rows="4" class="py-2 px-4 text-black rounded-md" type="number" name="keterangan"
                                            value=""></textarea>
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">waste</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="number" name="waste"
                                            value="">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Tanggal</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="">
                                    </div>
                                    <button name="btn-produksi"
                                        class=" mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['btn-produksi'])) {
                                $variant = htmlspecialchars($_POST['variant']);
                                $mulai = htmlspecialchars($_POST['mulai']);
                                $jamSelesai = htmlspecialchars($_POST['jamSelesai']);
                                $jumlahBatch = htmlspecialchars($_POST['jumlahBatch']);
                                $keterangan = htmlspecialchars($_POST['keterangan']);
                                $waste = htmlspecialchars($_POST['waste']);
                                $tanggal = htmlspecialchars($_POST['tgl']);

                                if ($variant === "" && $mulai === "" && $jamSelesai === "") {

                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">tidak boleh kosong</strong>
                                    </div>
                                    <meta http-equiv="refresh" content="2; url=weighing.php">

                                    <?php
                                } else {
                                    $queryUpdate = mysqli_query($con, "INSERT INTO `form_weighing_produksi`( `varian_produk`, `jam_mulai`, `jam_selesai`, `jumlah_batch`, `keterangan`, `waste`, `tanggal`) VALUES ('$variant','$mulai','$jamSelesai','$jumlahBatch','$keterangan','$waste','$tanggal')");
                                    ?>
                                    <div class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Input</strong>
                                    </div>
                                    <meta http-equiv="refresh" content="2; url=weighing.php">
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
                                                <label for="old">Nama Produk</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="namaProduk" value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Apel</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahApel"
                                                    value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Batch</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahBatch"
                                                    value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Garam</label>
                                                <input type="text" class="py-2 px-4 text-black rounded-md" name="jumlahGaram"
                                                    value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Air Ro</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahAirRo"
                                                    value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">jam Mulai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time" name="mulai"
                                                    value="">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex flex-col text-white">
                                                <label for="old">jam Selesai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time"
                                                    name="jamSelesai" value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">suhu air</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="suhuAir" value="">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="old">Operator</label>
                                                <input readonly class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="operator" value="<?php echo $data["nama"] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">tanggal</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>
                                    <button name="btn-mesin"
                                        class=" w-full mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['btn-mesin'])) {
                                $namaProduk = htmlspecialchars($_POST['namaProduk']);
                                $jumlahApel = htmlspecialchars($_POST['jumlahApel']);
                                $jumlahBatch = htmlspecialchars($_POST['jumlahBatch']);
                                $jumlahGaram = htmlspecialchars($_POST['jumlahGaram']);
                                $Operator = htmlspecialchars($_POST['operator']);
                                $jumlahAirRo = htmlspecialchars($_POST['jumlahAirRo']);
                                $tanggal = htmlspecialchars($_POST['tgl']);
                                $suhuAir = htmlspecialchars($_POST['suhuAir']);
                                $mulai = htmlspecialchars($_POST['mulai']);
                                $jamSelesai = htmlspecialchars($_POST['jamSelesai']);
                                

                                if ($kode === "" && $Raw === "" && $Qty === "") {

                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold">tidak boleh kosong</strong>
                                    </div>

                                    <?php
                                } else {
                                    $queryUpdate = mysqli_query($con, "INSERT INTO `form_weighing_perendaman_apel`(`nama_produk`, `jumlah_apel`, `jumlah_batch`, `jumlah_garam`, `jumlah_air_RO`, `jam_mulai`, `jam_selesai`, `suhu air`, `operator`, `tanggal`) VALUES ('$namaProduk','$jumlahApel','$jumlahBatch','$jumlahGaram','$jumlahAirRo','$mulai','$jamSelesai','$suhuAir','$Operator','$tanggal')");
                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Input</strong>
                                        <meta http-equiv="refresh" content="2; url=weighing.php">
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