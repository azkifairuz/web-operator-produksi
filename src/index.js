const arrowClose = document.querySelector(".arrowClose")
const arrowOpen = document.querySelector(".arrowOpen")
const laporan = document.querySelector(".laporan")
const listLaporan = document.querySelector(".listLaporan")

laporan.addEventListener("click",()=>{

    arrowOpen.classList.toggle("hidden")
    arrowClose.classList.toggle("hidden")
    listLaporan.classList.toggle("hidden")
    
})