<?php
    session_start();
    include("../koneksi.php");
    $idUpdate = $_GET['p'];
    $query = mysqli_query($con,"SELECT * FROM `leader_kelola_operator` where `no`='$idUpdate' ");
    $data2 = mysqli_fetch_assoc($query);
    var_dump($data2)
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
                    Kelola Laporan
                </h1>
                <div class="maincontainer lg:w-[1000px] lg:h-[400px] container h-[300px] w-[600px]">
                    <div class="inline">
                        <ul class="flex">
                            <li
                                class="btnProfil bg-purple-400 hover:bg-purple-600 hover:text-white h-12 w-fit p-2 text-md border-2 border-black text-center items-center flex justify-center cursor-pointer">
                                Kelola Laporan
                            </li>
                        </ul>
                    </div>
                    <div class="bg-pink-400 w-full lg:h-fit lg:w-full flex  gap-2 items-center h-fit p-5">
                        <section class="ubahPassword  w-full">
                            <div class="mx-auto w-1/2">
                                <form action="" method="post" class="flex flex-col gap-4">
                                    <div class="flex flex-col  text-white">
                                        <h1>departemen</h1>
                                        <select name="departement"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
 
                                            <option class="lowercase" value="<?php $data2["departemen"] ?>" >Saat Ini - <?php echo $data2['departemen'] ?></option>
                                            <option value="Preparation">Preparation</option>
                                            <option value="Washing">Washing</option>
                                            <option value="Weighing">Weighing</option>
                                            <option value="Kupas">Kupas</option>
                                            <option value="Pressing">Pressing</option>
                                            <option value="Angel">Angel</option>
                                            <option value="Filling">Filling</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col  text-white">
                                        <h1>Jenis Laporan</h1>
                                        <select name="jenisLaporan"
                                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option class="lowercase" value="<?php $data2["jenis_laporan"] ?>"> Saat Ini - <?php echo $data2['jenis_laporan'] ?></option>
                                            <option>Form inspeksi area</option>
                                            <option>Form Produksi</option>
                                            <option>Form Mesin</option>
                                            <option>Form lain - lain</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col  text-white">
                                        <h1>verifikasi</h1>
                                        <select name="verifikasi"
                                            class="bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                            <option class="normal-case" value="<?php $data2["verifikasi"] ?>">Saat Ini - <?php echo $data2['verifikasi'] ?></option>
                                            <option>Approve</option>
                                            <option>Not Approve</option>
                                        </select>
                                    </div>
                                    <div class="flex flex-col text-white">
                                        <label for="new">leader</label>
                                        <input readonly class="py-2 px-4 text-black rounded-md normal-case " type="text"
                                            name="leader" value="<?php echo $data2["leader"] ?>">
                                    </div>
                                    <button name="btnSubmit" class="py-2 px-4 text-white bg-blue-500">Submit</button>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['btnSubmit'])) {
                                $null ="";
                                $dept = htmlspecialchars($_POST['departement']);
                                $verifikasi = htmlspecialchars($_POST['verifikasi']);
                                $leader = htmlspecialchars($_POST['leader']);
                                $jenisLaporan = htmlspecialchars($_POST['jenisLaporan']);
                                if ($dept !=null && $verifikasi !=null && $jenisLaporan !=null ) {
                                    $queryUpdate = mysqli_query($con, "UPDATE `leader_kelola_operator` SET `departemen`='$dept',`jenis_laporan`='$jenisLaporan',`verifikasi`='$verifikasi' WHERE `no`=$idUpdate");
                                    ?>
                                    <div class="bg-green-100 mx-auto border text-center text-sm border-green-400 mt-5 w-60 text-green-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> berhasil update </strong>
                                        <meta http-equiv="refresh" content="2; url=./Leader/hasilLaporan.php" />
                                    </div>

                                    <?php
                                } else {
                                    ?>
                                    <div class="bg-red-100 mx-auto border text-center text-sm border-red-400 mt-5 w-60 text-red-700 px-5 py-3 rounded relative"
                                        role="alert">
                                        <strong class="font-bold"> data msih sama seperti sebelumnya</strong>
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