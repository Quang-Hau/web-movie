var darkBtn = document.querySelector(".dark-btn label");

var body = document.querySelector("body");

function init() {
  //set hành động đã lưu localStorage

  let mode = localStorage.getItem("mode") ? "dark" : "";

  body.setAttribute("class", mode);
}

init();

darkBtn.addEventListener("click", function (e) {
  body.classList.toggle("dark");

  //lưu hành động lên localStorage

  let mode = body.getAttribute("class") ? "dark" : "";

  localStorage.setItem("mode", mode);
});
