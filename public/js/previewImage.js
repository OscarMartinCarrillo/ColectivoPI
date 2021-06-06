function previewImage() {
    var preview = document.getElementById("imgUserFoto");
    if (event.target.files[0].type.includes("image"))
        preview.src = URL.createObjectURL(event.target.files[0]);
    else
        alert("No se ha subido una foto.");
}
