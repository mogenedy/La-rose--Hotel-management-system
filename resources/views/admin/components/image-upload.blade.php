
<script>
document.getElementById('image').addEventListener('change', function (event) {
var input = event.target;
var reader = new FileReader();

reader.onload = function () {
var dataURL = reader.result;
document.getElementById('showImage').src = dataURL;
};

reader.readAsDataURL(input.files[0]);
});
</script>
