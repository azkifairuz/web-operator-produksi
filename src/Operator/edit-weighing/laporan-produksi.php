<?php
session_start();
$userNip = $_SESSION['NIP'];
$idWeighing = $_GET['p'];
include("../navbar.php");
include("../../koneksi.php");
$getDataWeighing = mysqli_query($con,"SELECT * FROM `form_weighing_produksi` where `no_weighing` = $idWeighing ");
$dataWeighing = mysqli_fetch_assoc($getDataWeighing);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Weighing</title>
    <link rel="stylesheet" href="../../../dist/output.css" />
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
                                class="btnUbah bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                                Laporan produksi
                            </li>
                        </ul>
                    </div>
                    <div class="bg-pink-400 w-fit   lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
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
                                            name="mulai" value="<?php echo $dataWeighing['jam_mulai'] ?>">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Jam Selesai</label>
                                        <input type="time" class="py-2 px-4 text-black rounded-md" name="jamSelesai" value="<?php echo $dataWeighing['jam_selesai'] ?>">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">jumlah batch</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahBatch"
                                            value="<?php echo $dataWeighing['jumlah_batch'] ?>">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Keterangan</label>
                                        <textarea cols="10" rows="4" class="py-2 px-4 text-black rounded-md" type="number" name="keterangan"
                                            value="<?php echo $dataWeighing['keterangan'] ?>"></textarea>
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">waste</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="number" name="waste"
                                            value="<?php echo $dataWeighing['waste'] ?>">
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">Tanggal</label>
                                        <input class="py-2 px-4 text-black rounded-md" type="date" name="tgl" value="<?php echo date("Y-m-d") ?>">
                                    </div>
                                    <button name="btn-produksi"
                                        class=" mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                                    <button name="btn-delete"
                                        class=" mt-2 py-2 px-4 text-white bg-red-500">Hapus</button>
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

                                    $queryUpdate = mysqli_query($con, "UPDATE `form_weighing_produksi` SET `varian_produk`='$variant',`jam_mulai`='$mulai',`jam_selesai`='$jamSelesai',`jumlah_batch`='$jumlahBatch',`keterangan`='$keterangan',`waste`='$waste',`tanggal`='$tanggal' WHERE `no_weighing` = $idWeighing");
                                    ?>
                                    <div class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Update</strong>
                                    </div>
                                    <meta http-equiv="refresh" content="2; url=../laporanWeighing.php">
                                    <?php
                                
                            }
                            if(isset($_POST['btn-delete'])){
                                $queryDelete = mysqli_query($con,"DELETE FROM `form_weighing_produksi` WHERE `no_weighing` =$idWeighing ");
                                ?>
                                <div
                                class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                role="alert">
                                  <strong class="font-bold"> berhasil delete</strong>
                                  <meta http-equiv="refresh" content="2; url=../laporanWeighing.php">
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