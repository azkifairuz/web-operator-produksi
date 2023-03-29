<?php
session_start();
$userNip = $_SESSION['NIP'];
$idWeighing = $_GET['p'];
include("../navbar.php");
include("../../koneksi.php");
$getDataWeighing = mysqli_query($con,"SELECT * FROM `form_weighing_perendaman_apel` where `no_weighing` = $idWeighing ");
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
                                class="btnPassword bg-[#8338EC] hover:bg-purple-400 hover:text-black text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center text-sm flex justify-center cursor-pointer">
                                Perendaman Apel
                            </li>
                        </ul>
                    </div>
                    <div class="bg-pink-400 w-fit   lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
                        <section class="laporanMesin w-full">
                            <div class="mx-auto w-1/2">
                                <form action="" method="post" class="flex flex-col gap-4">
                                    <div class="flex flex-row gap-4">
                                        <div>
                                            <div class="flex flex-col text-white">
                                                <label for="old">Nama Produk</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="namaProduk" value="<?php echo $dataWeighing['nama_produk'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Apel</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahApel"
                                                    value="<?php echo $dataWeighing['jumlah_apel'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Batch</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahBatch"
                                                    value="<?php echo $dataWeighing['jumlah_batch'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Garam</label>
                                                <input type="text" class="py-2 px-4 text-black rounded-md" name="jumlahGaram"
                                                    value="<?php echo $dataWeighing['jumlah_garam'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jumlah Air Ro</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number" name="jumlahAirRo"
                                                    value="<?php echo $dataWeighing['jumlah_air_RO'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">jam Mulai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time" name="mulai"
                                                    value="<?php echo $dataWeighing['jam_mulai'] ?>">
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex flex-col text-white">
                                                <label for="old">jam Selesai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time"
                                                    name="jamSelesai" value="<?php echo $dataWeighing['jam_selesai'] ?>">
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
                                                    value="<?php echo date("Y-m-d") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button name="btn-mesin"
                                        class=" w-full mt-2 py-2 px-4 text-white bg-blue-500">Ubah</button>
                                    <button name="btn-mesin"
                                        class=" w-full mt-2 py-2 px-4 text-white bg-red-500">Hapus</button>
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
                                
                                    $queryUpdate = mysqli_query($con, "UPDATE `form_weighing_perendaman_apel` SET `nama_produk`='$namaProduk',`jumlah_apel`='$jumlahApel',`jumlah_batch`='$jumlahBatch',`jumlah_garam`='$jumlahGaram',`jumlah_air_RO`='$jumlahAirRo',`jam_mulai`='$mulai',`jam_selesai`='$jamSelesai',`suhu air`='$suhuAir',`operator`='$Operator',`tanggal`='$tanggal' WHERE `no_weighing` = $idWeighing ");
                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Update</strong>
                                        <meta http-equiv="refresh" content="2; url=../laporanWeighing.php">
                                    </div>
                                    <?php
                                
                            }
                            if(isset($_POST['btn-delete'])){
                                $queryDelete = mysqli_query($con,"DELETE FROM `form_weighing_perendaman_apel` WHERE `no_weighing` =$idWeighing ");
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