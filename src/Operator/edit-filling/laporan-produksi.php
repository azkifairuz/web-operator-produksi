<?php
    session_start();
    $userNip = $_SESSION['NIP'];
    $idFilling = $_GET['p'];
    include("../navbar.php");
    include("../../koneksi.php");
    $getDataFilling = mysqli_query($con,"SELECT * FROM `form_filling_produksi` where `no_filling`= $idFilling");
    $dataFillingProduksi = mysqli_fetch_array($getDataFilling)
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
                    Filling
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
                                                <label for="new">Jam Mulai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time"
                                                    name="jamMulai" value="<?php echo $dataFillingProduksi['jam_mulai'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">Jam Selesai</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="time"
                                                    name="jamSelesai" value="<?php echo $dataFillingProduksi['jam_selesai'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">line</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="line" value="<?php echo $dataFillingProduksi['line'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                            <h1>plan</h1>
                                                <select name="plan"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                    <option>5000ML</option>
                                                    <option>1350ML</option>
                                                    <option>435ML</option>
                                                    <option>330ML</option>
                                                    <option>250ML</option>
                                                    <option>50ML</option>            
                                                </select>
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">no plan</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number"
                                                    name="noPlan" value="<?php echo $dataFillingProduksi['no_plan'] ?>">
                                            </div>
                                        </div>
                                        <div>
                                           
                                            <div class="flex flex-col text-white">
                                            <h1>Hasil</h1>
                                                <select name="hasil"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                                    <option>5000ML</option>
                                                    <option>1350ML</option>
                                                    <option>435ML</option>
                                                    <option>330ML</option>
                                                    <option>250ML</option>
                                                    <option>50ML</option>            
                                                </select>
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">No Hasil</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="number"
                                                    name="noHasil" value="<?php echo $dataFillingProduksi['no_hasil'] ?>">
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label cols="5" rows="10" for="new">keterangan</label>
                                                <textarea class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="keterangan" value="<?php echo $dataFillingProduksi['keterangan'] ?>"></textarea>
                                            </div>
                                            <div class="flex flex-col text-white">
                                                <label for="new">waste</label>
                                                <input class="py-2 px-4 text-black rounded-md" type="text"
                                                    name="waste" value="<?php echo $dataFillingProduksi['waste'] ?>">
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
                                        class=" w-full mt-2 py-2 px-4 rounded-sm hover:bg-blue-800 text-white bg-blue-500">upate</button>
                                    <button name="btn-mesin"
                                        class=" w-full mt-2 py-2 px-4 rounded-sm hover:bg-red-800 text-white bg-red-500">delete</button>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['btn-mesin'])) {
                                $variant = htmlspecialchars($_POST['variant']);
                                $jamMulai = htmlspecialchars($_POST['jamMulai']);
                                $jamSelesai = htmlspecialchars($_POST['jamSelesai']);
                                $line = htmlspecialchars($_POST['line']);
                                $plan = htmlspecialchars($_POST['plan']);
                                $noPlan = htmlspecialchars($_POST['noPlan']);
                                $hasil = htmlspecialchars($_POST['hasil']);
                                $noHasil = htmlspecialchars($_POST['noHasil']);
                                $waste = htmlspecialchars($_POST['waste']);
                                $keterangan = htmlspecialchars($_POST['keterangan']);
                                $operator = htmlspecialchars($_POST['operator']);
                                $tanggal = htmlspecialchars($_POST['tgl']);
                                    $queryUpdate = mysqli_query($con, "UPDATE `form_filling_produksi` SET `varian_produk`='$variant',`jam_mulai`='$jamMulai',`jam_selesai`='$jamSelesai',`line`='$jamSelesai',`plan`='$plan',`no_plan`='$noPlan',`hasil`='$hasil',`no_hasil`='$noHasil',`keterangan`='$keterangan',`waste`='$waste',`operator`='$operator',`tanggal`='$tanggal' WHERE `no_filling` =$idFilling ");
                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Input</strong>
                                        <meta http-equiv="refresh" content="2; url=../laporanFilling.php">
                                    </div>
                                    <?php
                                
                            }
                            if (isset($_POST['btn-delete'])) {
                                $deleteLaporan = mysqli_query($con ,"DELETE FROM `form_filling_produksi` WHERE `no_filling`=$idFilling")
                                ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil Delete </strong>
                                        <meta http-equiv="refresh" content="2; url=../laporanFilling.php" />
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