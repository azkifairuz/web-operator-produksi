<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../dist/output.css">
</head>

<body>
    <div class="sidebar h-screen top-0 bottom-0 w-[200px] flex flex-col  gap-5 bg-purple-500 pt-10">
        <div class="p-2 -mt-4 box-border flex gap-4 items-center">
            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-vector-user-profile-default-avatar-profile-vector-user-profile-profile-179376714.jpg"
                class="block center w-10 h-10 bg-slate-400" alt="profil" />
            <div class="text-white">
                <h1>Admin</h1>
                <p class="text-sm">nip Operator</p>
            </div>
        </div>
        <div class="w-full flex flex-col gap-5 items-center justify-center p-2 cursor-pointer">
            <button
                class="bg-purple-900 focus:bg-purple-600 active:bg-purple-600 w-full  hover:bg-purple-600 text-white p-2 px-4 cursor-pointer">
                Halaman Utama
            </button>
            <div>
                <div
                    class=" laporan bg-purple-900 text-white p-4 hover:bg-purple-600 px-4 items-center justify-center cursor-pointer flex">
                    <button type="button" class="text-sm ">
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
                <div class="absolute hidden listLaporan bg-purple-900 text-white">
                    <ul class="relative">
                        <li class="py-1 hover:bg-purple-500 px-4">preparation</li>
                        <li class="py-1 hover:bg-purple-500 px-4">washing</li>
                        <li class="py-1 hover:bg-purple-500 px-4">weighing</li>
                        <li class="py-1 hover:bg-purple-500 px-4">kupas</li>
                        <li class="py-1 hover:bg-purple-500 px-4">pressing</li>
                        <li class="py-1 hover:bg-purple-500 px-4">angel</li>
                        <li class="py-1 hover:bg-purple-500 px-4">filling</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        const arrowClose = document.querySelector(".arrowClose")
const arrowOpen = document.querySelector(".arrowOpen")
const laporan = document.querySelector(".laporan")
const listLaporan = document.querySelector(".listLaporan")

        laporan.addEventListener("click", () => {
            arrowOpen.classList.toggle("hidden")
            arrowClose.classList.toggle("hidden")
            listLaporan.classList.toggle("hidden")
        })

    </script>
</body>

</html>