const arrowClose = document.querySelector(".arrowClose")
const arrowOpen = document.querySelector(".arrowOpen")
const laporan = document.querySelector(".laporan")
const listLaporan = document.querySelector(".listLaporan")

laporan.addEventListener("click",()=>{

    window.location = "http://localhost/web-operator-produksi/src/Operator/laporanPage.php";
    arrowOpen.classList.toggle("hidden")
    arrowClose.classList.toggle("hidden")
    
})