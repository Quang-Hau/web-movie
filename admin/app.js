var uploadImg = document.querySelector('#img');
var preview = document.querySelector('.preview');

uploadImg.addEventListener('change', function(event){
    /// tạo một phần tử img mới
    var img = document.createElement('img');

    img.src = URL.createObjectURL(uploadImg.files[0]);

    preview.appendChild(img);
    
});