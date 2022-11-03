let champreqEmail= document.getElementById("champ-reqEmail")
let emailInvalid= document.getElementById("email-invalid")
let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
let submit = document.getElementById("submit")
let champreqPass1 = document.getElementById("champ-reqPass1")
let champreqPass2 = document.getElementById("champ-reqPass2")
let champreqPrenom = document.getElementById("champ-reqPrenom")
let champreqRole = document.getElementById("champ-reqRole")
let champreqNom = document.getElementById("champ-reqNom")
let password1 = document.getElementById("password_1")
let password2 = document.getElementById("password_2")
let nom = document.getElementById("nom")
let prenom = document.getElementById("prenom")
let email = document.getElementById("email")
let roles = document.getElementById("roles")
let confirmation = document.getElementById("confirmation") 

/*  const resetConfirm = () =>{
  confirmation.classList.remove("d-flex")
  confirmation.classList.remove("d-none")
  password2.style.border= "1px solid black"
  password1.style.border= "1px solid black"
  
}


const checkconfirm = () =>{ 
  resetConfirm()  
if(password1.value !== password2.value){
        confirmation.classList.remove("d-none")
        confirmation.classList.add("d-flex")
        password1.style.border= "1px solid red"
        password2.style.border= "1px solid red"
        return false;
}
resetConfirm()
return true
}  */

  const checkEmail = () =>{
    resetEmail ()
    if(email.value.trim() === ""){
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
   
    resetEmail()
    return true;
  
  }
  const resetEmail = () =>{
    champreqEmail.classList.remove("d-flex")
    champreqEmail.classList.remove("d-none")
    emailInvalid.classList.remove("d-flex")
    emailInvalid.classList.remove("d-none")
    email.style.border= "1px solid black"
  }
  const resetPass1 = () =>{
    champreqPass1.classList.remove("d-flex")
    champreqPass1.classList.remove("d-none")
    password1.style.border= "1px solid black"
    
  }

  const checkmdp1 = () =>{
    resetPass1()
    if(password1.value === ""){
        champreqPass1.classList.remove("d-none")
        champreqPass1.classList.add("d-flex")
        password1.style.border= "1px solid red"
        return false;
    }
    resetPass1()
    return true;
  }  

  const resetPass2 = () =>{
    champreqPass2.classList.remove("d-flex")
    champreqPass2.classList.remove("d-none")
    confirmation.classList.remove("d-flex")
    confirmation.classList.remove("d-none")
    password2.style.border= "1px solid black"
    
  }

  const checkmdp2 = () =>{
    resetPass2()
    if(password2.value === ""){
        champreqPass2.classList.remove("d-none")
        champreqPass2.classList.add("d-flex")
        password2.style.border= "1px solid red"
        return false;
    }
    if(password1.value !== password2.value){
      confirmation.classList.remove("d-none")
      confirmation.classList.add("d-flex")
      password1.style.border= "1px solid red"
      password2.style.border= "1px solid red"
      return false;
}
    
    resetPass2()
    return true;
  }

  

  const resetNom = () =>{
    champreqNom.classList.remove("d-flex")
    champreqNom.classList.remove("d-none")
    nom.style.border= "1px solid black"
    
  }

  const checknom = () =>{
    resetNom()
    if(nom.value.trim() === ""){
        champreqNom.classList.remove("d-none")
        champreqNom.classList.add("d-flex")
        nom.style.border= "1px solid red"
        return false;
    }
    resetNom()
    return true;
  }

  const resetRole = () =>{
    champreqRole.classList.remove("d-flex")
    champreqRole.classList.remove("d-none")
    roles.style.border= "1px solid black"
    
  }

  const checkroles = () =>{
    resetRole()
    if(roles.value === ""){
        champreqRole.classList.remove("d-none")
        champreqRole.classList.add("d-flex")
        roles.style.border= "1px solid red"
        return false;
    }
    resetRole()
    return true;
  }

  const resetPrenom = () =>{
    champreqPrenom.classList.remove("d-flex")
    champreqPrenom.classList.remove("d-none")
    prenom.style.border= "1px solid black"    
  }

  const checkprenom = () =>{
    resetPrenom()
    if(prenom.value.trim() === ""){
        champreqPrenom.classList.remove("d-none")
        champreqPrenom.classList.add("d-flex")
        prenom.style.border= "1px solid red"
        return false;
    }
    resetPrenom()
    return true;
  }

  submit.addEventListener("click",(e) => {
    console.log("clicked");
  if((!checkEmail() && !checkmdp1() && !checkmdp2() && !checknom() && !checkprenom() && !checkroles()   ) || !checkEmail() || !checkmdp1() || !checkmdp2() || !checknom() || !checkprenom() || !checkroles() ){
    e.preventDefault()
  }

  })