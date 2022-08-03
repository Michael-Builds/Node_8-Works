const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit =(e)=>{
    // Prevents the default submition of the form
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    //  Ajax submit
    let xhr = new XMLHttpRequest();  
    xhr.open("POST", "Php/login.php", true);
    xhr.onload =()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data == "Successful"){
                // When everything is correctly verified, then , it should load onto the Dashboard
                location.href = "index.php";
                // redirect_to("index.php?id={$_SESSION['unique_id']}");  
            }else{
                errorText.textContent = data;
                errorText.style.display = "block";
            }
        }
      }
    }
    // Sending the data of the form to PHP through Ajax
    let formData = new FormData(form);
    xhr.send(formData);
}