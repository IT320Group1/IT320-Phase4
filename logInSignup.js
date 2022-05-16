/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
function validationLogIn(){
	var f = document.formEmpLog;
	
	if(formEmpLog.ID.value == "" || formEmpLog.pass.value == ""){
	alert("please fill in all the fields");
	formEmpLog.reset();	
	return false;
	
	}
	
		
		
	return true;

}




function validationSignup(){
	
	
	if(formSign.ID.value == "" || formSign.pass.value == "" || formSign.firstName.value == "" || formSign.lastName.value == "" ){
	alert("please fill in all the fields");	
	return false;
	
	}
	

		
	if(formSign.pass.value.length < 8){
		alert("please make your password longer");
		formSign.pass.focus();	
			return false;
	}	
        

		
		
		
	return true;
}

  function validationRequestUpdate(){
	
	
      if(form.Wname.value == "" || form.description.value == "" || form.brand.value == ""){
	alert("please fill in all the fields");
	return false;
    }


      return true;

}
  function validationRequestAdd(){
	
		if(form.Wname.value == ""||document.getElementById("image").value == ""|| form.brand.value == ""|| form.description.value == ""){
	alert("please fill in all the fields");
	return false;
    }

 
      return true;
	  
	

}


function validationImage(){

var fileInput = 
                document.getElementById('image');
              
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