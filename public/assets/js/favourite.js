function myFunction() {
    const elementBodySelec = document.getElementById('item-report-id');
    const elementBodyAll = document.querySelector('.body-project-item-report');
    elementBodySelec.classList.remove("item-report"); // Xóa lớp CSS hiện tại
    elementBodySelec.classList.add("item-report-click");
    elementBodyAll.classList.remove("body-project-item-report"); // Xóa lớp CSS hiện tại
    elementBodyAll.classList.add("body-project-item-report-click");
    console.log(elementBodySelec);
  }
  const elementButtonSelectOut = document.querySelector(".background-report");
  elementButtonSelectOut.addEventListener("click",function(){
      const elementBodySelec = document.getElementById('item-report-id');
      const elementBodyAll = document.querySelector('.body-project-item-report-click');
      elementBodySelec.classList.remove("item-report-click"); // Xóa lớp CSS hiện tại
      elementBodySelec.classList.add("item-report");
      elementBodyAll.classList.remove("body-project-item-report-click"); // Xóa lớp CSS hiện tại
      elementBodyAll.classList.add("body-project-item-report");
  })