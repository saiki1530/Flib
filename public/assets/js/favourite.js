function myFunction() {
    const elementBodySelec = document.getElementById('item-report-id');
    elementBodySelec.classList.remove("item-report"); // Xóa lớp CSS hiện tại
    elementBodySelec.classList.add("item-report-click");
    console.log(elementBodySelec);
  }
  const elementButtonSelectOut = document.querySelector(".background-report");
  elementButtonSelectOut.addEventListener("click",function(){
      const elementBodySelec = document.getElementById('item-report-id');
      elementBodySelec.classList.remove("item-report-click"); // Xóa lớp CSS hiện tại
      elementBodySelec.classList.add("item-report");
  })