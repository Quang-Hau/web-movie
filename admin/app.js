var uploadImg = document.querySelector("#img");
var preview = document.querySelector(".preview");
var showError = document.querySelector(".showErrorImg");
var btn = document.querySelector(".btn");

function preventDf() {
  btn.addEventListener("click", function (e) {
    e.preventDefault();
  });
}

uploadImg.addEventListener("change", function (event) {
  /// tạo một phần tử img mới
  var img = document.createElement("img");

  var file = uploadImg.files[0];

  if (file.size / (1024 * 1024) > 5) {
    showError.innerHTML = " Hình ảnh vượt quá dung lượng cho phép";

    preventDf();
  } else {
    showError.innerHTML = "";
  }

  img.src = URL.createObjectURL(file);

  preview.appendChild(img);
});
