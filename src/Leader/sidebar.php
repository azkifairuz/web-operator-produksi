<?php
$userNip = $_SESSION['NIP'];
 include("../koneksi.php");
 $getDataOperator = mysqli_query($con, "SELECT * FROM `data_operator_produksi` WHERE NIP ='$userNip' ");
 $data = mysqli_fetch_array($getDataOperator);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
</head>

<body >
    <div class="sidebar  h-[3000px] mt-10 bottom-0 top-0 w-[250px] flex flex-col  p-5 gap-5 bg-[#8338EC] pt-10">
        <div class="p-2 -mt-4 box-border flex gap-4 items-center">
            <img src="../../item/<?php echo $data['gambar']?>"
                class="block center w-20 bg-center h-20 bg-slate-400" alt="profil" />
            <div class="text-white">
                <h1 class="text-xl font-bold"><?php echo $data["nama"] ?></h1>
                <p class="text-lg"><?php echo $data["NIP"] ?></p>
            </div>
        </div>
        <div class="w-11/12 flex flex-col gap-5 items-center justify-center  cursor-pointer">
            <button
                class="btnMain bg-purple-900 w-full hover:shadow-sm rounded-md focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 text-white py-2 px-4 cursor-pointer">
                Halaman Utama
            </button>
            <button class="kelola mt-20 bg-purple-900 w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2  cursor-pointer">
                Kelola Laporan Departemen
            </button>
            <button class="hasilLaporan  bg-purple-900 w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2  cursor-pointer">
                Hasil Laporan
            </button>
           
        </div>
    </div>
    <script>
        const kelola = document.querySelector(".kelola")
        const halaman = document.querySelector(".btnMain")
        const hasilLaporan = document.querySelector(".hasilLaporan")
        function changeLocation(url) {
            window.location.href = `http://localhost/web-operator-produksi/src/${url}`;
        }

        halaman.addEventListener("click",()=>{
            changeLocation("Leader/index.php")
        })
        kelola.addEventListener("click",()=>{
            changeLocation("Leader/kelolaLaporan.php")
        })
        hasilLaporan.addEventListener("click",()=>{
            changeLocation("Leader/hasilLaporan.php")
        })
        
        
    </script>
</body>

</html>