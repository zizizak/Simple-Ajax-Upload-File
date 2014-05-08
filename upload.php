<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<form id="file-form" action="handler.php" method="POST">
  <input type="file" id="file-select" name="photos[]" multiple/>
  <button type="submit" id="upload-button">Upload</button>
</form>
<script>
var form = document.getElementById('file-form');
var fileSelect = document.getElementById('file-select');
var uploadButton = document.getElementById('upload-button');

form.onsubmit = function(event) {
  event.preventDefault();

  // Update button text.
  uploadButton.innerHTML = 'Uploading...';

  // The rest of the code will go here...

// Get the selected files from the input.
var files = fileSelect.files;
// Create a new FormData object.
var formData = new FormData();

// Loop through each of the selected files.
for (var i = 0; i < files.length; i++) {
  var file = files[i];

  // Check the file type.
  if (!file.type.match('image.*')) {
    continue;
  }

  // Add the file to the request.
  formData.append('photos[]', file, file.name);
}

// Set up the request.
var xhr = new XMLHttpRequest();
// Open the connection.
xhr.open('POST', 'http://localhost/test2/test/handler.php', true);
// Set up a handler for when the request finishes.
xhr.onload = function () {
  if (xhr.status === 200) {
    // File(s) uploaded.
	alert(xhr.responseText);
    uploadButton.innerHTML = 'Upload';
  } else {
    alert('An error occurred!');
  }
};
// Send the Data.
xhr.send(formData);

}

jQuery(document).ready(function(){
	jQuery('#file-select').change(function(){
		jQuery('#file-form').submit();
	});
});
</script>