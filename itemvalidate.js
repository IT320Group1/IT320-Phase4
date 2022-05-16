
    function validateForm() {
  let x = document.forms["reviewForm"]["comment"].value;
  var y=document.forms["reviewForm"]["name"].value;
  if (x == "" ) {
    alert("Review must be filled out");
    return false;
  }
  else if ( y==""){
      alert("name must be filled out");
    return false;
  }
  return true;
  
    }


function validationImage(){

var fileInput = 
                document.getElementById('img');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.gif)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload only image files');
                fileInput.value = '';
              return false;
			  }
			     else 
            {
             document.getElementById('imagePreview').style.visibility='visible';
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            'Uploaded image: <br> <br> <img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
				return true;
            }
			}