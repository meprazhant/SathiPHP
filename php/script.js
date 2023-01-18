function changepp() {
    var e = document.getElementById("file");
    var file = e.files[0];
    if (file) {
        if (file.type == "image/jpeg" || file.type == "image/png") {
            var reader = new FileReader()
            reader.onloadend = function () {
                var base = document.getElementById("binary");
                base.innerText = reader.result;
            }
            reader.readAsDataURL(file);
        } else {
            alert("Supports only jpeg and png files");
            return;
        }
    }
    else {
        alert("Please select a file");
        return;
    }
}
console.log("Loaded")