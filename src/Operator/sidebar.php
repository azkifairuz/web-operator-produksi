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
                class="btnMain bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2  cursor-pointer">
                Halaman Utama
            </button>
            <div class="w-full">
                <div
                    class=" laporan bg-[#bd68ee] w-full  p-4 focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white   cursor-pointer px-4 items-center justify-center flex">
                    <button type="button" class="text-sm   ">
                        Laporan Departemen
                    </button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 arrowClose">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 arrowOpen hidden">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>

                </div>
                <div class=" hidden listLaporan w-fit bg-[#bd68ee] text-white">
                    <ul class=" border border-purple-900">
                        <li class="py-1 hover:bg-[#8338EC] px-4 preparation">preparation</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 washing">washing</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 weighing">weighing</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 kupas">kupas</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 pressing">pressing</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 angel">angel</li>
                        <li class="py-1 hover:bg-[#8338EC] px-4 filling">filling</li>
                    </ul>
                </div>
            </div>
            <button class="hasilLaporan1 mt-20 bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2  cursor-pointer">
                Hasil Laporan Preparation
            </button>
            <button class="hasilLaporan2  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2  cursor-pointer">
                Hasil Laporan washing
            </button>
            <button class="hasilLaporan3  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
                Hasil Laporan weighing
            </button>
            <button class="hasilLaporan4  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
                Hasil Laporan kupas
            </button>
            <button class="hasilLaporan5  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
                Hasil Laporan pressing
            </button>
            <button class="hasilLaporan6  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
                Hasil Laporan angel
            </button>
            <button class="hasilLaporan7  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
                Hasil Laporan filling
            </button>
            <button class="tentang  bg-[#bd68ee] w-full focus:bg-purple-600 active:bg-purple-600    hover:bg-purple-600 hover:shadow-sm hover:shadow-black rounded-md text-white py-2 cursor-pointer">
              Tentang
            </button>
          
        </div>
    </div>
    <script>
        const arrowClose = document.querySelector(".arrowClose")
        const arrowOpen = document.querySelector(".arrowOpen")
        const laporan = document.querySelector(".laporan")
        const listLaporan = document.querySelector(".listLaporan")
        const halaman = document.querySelector(".btnMain")
        const preparation = document.querySelector(".preparation")
        const washing = document.querySelector(".washing")
        const weighing = document.querySelector(".weighing")
        const kupas = document.querySelector(".kupas")
        const pressing = document.querySelector(".pressing")
        const angel = document.querySelector(".angel")
        const filling = document.querySelector(".filling")
        const hasilLaporan1 = document.querySelector(".hasilLaporan1")
        const hasilLaporan2 = document.querySelector(".hasilLaporan2")
        const hasilLaporan3 = document.querySelector(".hasilLaporan3")
        const hasilLaporan4 = document.querySelector(".hasilLaporan4")
        const hasilLaporan5 = document.querySelector(".hasilLaporan5")
        const hasilLaporan6 = document.querySelector(".hasilLaporan6")
        const hasilLaporan7 = document.querySelector(".hasilLaporan7")
        const tentang = document.querySelector(".tentang")
        function changeLocation(url) {
            window.location.href = `http://localhost/web-operator-produksi/src/${url}`;
        }
        laporan.addEventListener("click", () => {
            arrowOpen.classList.toggle("hidden")
            arrowClose.classList.toggle("hidden")
            listLaporan.classList.toggle("hidden")
        })

        halaman.addEventListener("click",()=>{
            changeLocation("Operator/index.php")
        })
        preparation.addEventListener("click",()=>{
            changeLocation("Operator/preparation.php")
        })
        washing.addEventListener("click",()=>{
            changeLocation("Operator/washing.php")
        })
        weighing.addEventListener("click",()=>{
            changeLocation("Operator/weighing.php")
        })
        kupas.addEventListener("click",()=>{
            changeLocation("Operator/kupas.php")
        })
        pressing.addEventListener("click",()=>{
            changeLocation("Operator/pressing.php")
        })
        angel.addEventListener("click",()=>{
            changeLocation("Operator/angel.php")
        })
        filling.addEventListener("click",()=>{
            changeLocation("Operator/filling.php")
        })
        hasilLaporan1.addEventListener("click",()=>{
            changeLocation("Operator/laporanPreparation.php")
        })
        hasilLaporan2.addEventListener("click",()=>{
            changeLocation("Operator/laporanWashing.php")
        })
        hasilLaporan3.addEventListener("click",()=>{
            changeLocation("Operator/laporanWeighing.php")
        })
        hasilLaporan4.addEventListener("click",()=>{
            changeLocation("Operator/laporanKupas.php")
        })
        hasilLaporan5.addEventListener("click",()=>{
            changeLocation("Operator/laporanPressing.php")
        })
        hasilLaporan6.addEventListener("click",()=>{
            changeLocation("Operator/laporanAngel.php")
        })
        hasilLaporan7.addEventListener("click",()=>{
            changeLocation("Operator/laporanFilling.php")
        })
        tentang.addEventListener("click",()=>{
            alert("tes")
            changeLocation("Operator/tentang.php")
        })
        
        
    </script>
</body>

</html>