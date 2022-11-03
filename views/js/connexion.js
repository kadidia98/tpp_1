let champreqEmail= document.getElementById("champ-reqEmail")
let emailInvalid= document.getElementById("email-invalid")
let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
let submit = document.getElementById("submit")
let champreqPass = document.getElementById("champ-reqPass")
let password = document.getElementById("password")
let email = document.getElementById("email")
  const checkEmail = () =>{
    reset ()
    if(email.value === ""){
        champreqEmail.classList.remove("d-none")
        champreqEmail.classList.add("d-flex")
        email.style.border= "1px solid red"
        return false;
    }
    if(!regex.test(email.value.trim())){
        emailInvalid.classList.remove("d-none")
        emailInvalid.classList.add("d-flex")
        email.style.border= "1px solid red"
        
return false;
    }
   
    reset()
    return true;
  
  }
  const reset = () =>{
    champreqEmail.classList.remove("d-flex")
    champreqEmail.classList.remove("d-none")
    emailInvalid.classList.remove("d-flex")
    emailInvalid.classList.remove("d-none")
    email.style.border= "1px solid black"
  }
  const resetPass = () =>{
    champreqPass.classList.remove("d-flex")
    champreqPass.classList.remove("d-none")
    
  }

  const checkmdp = () =>{
    resetPass()
    if(password.value === ""){
        champreqPass.classList.remove("d-none")
        champreqPass.classList.add("d-flex")
        password.style.border= "1px solid red"
        return false;
    }
    resetPass()
    return true;
  }  
  submit.addEventListener("click",(e) => {
    console.log("clicked");
  if((!checkEmail() && !checkmdp()) || !checkEmail() || !checkmdp()){
    e.preventDefault()
  }

  })