<?php
/* include("../config/db.php"); */
include("../controllers/traitementconnexion.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color:  #367995;" class="d-flex justify-content-center">
  <div style="width: 1500px; height: 950px; " class="d-flex align-items-center">
    <svg width="238" height="341" margin="22" viewBox="0 0 238 341" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" clip-rule="evenodd" d="M151.95 15.6064C154.891 26.4447 158.724 50.8067 154.813 54.6282H130.068C130.066 54.5843 130.063 54.5405 130.061 54.4968C120.89 53.4819 113.756 45.7059 113.756 36.2638V18.3452C113.756 8.21344 121.97 0 132.102 0H133.808C143.009 0 150.628 6.77369 151.95 15.6064Z" fill="#191847" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M123.366 32.8423C119.435 28.2272 116.773 22.5713 117.218 16.2338C118.499 -2.02653 143.918 1.99051 148.863 11.2067C153.807 20.423 153.22 43.8007 146.829 45.4479C144.281 46.1048 138.852 44.4957 133.327 41.1652L136.795 65.7015H116.316L123.366 32.8423Z" fill="#D4A181" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M128.902 29.7575C129.845 39.8926 129.467 51.4667 126.655 54.2141H101.911C100.532 30.2598 113.856 39.536 113.856 16.9824C114.687 16.1707 115.472 15.3673 116.249 14.6745L116.221 14.0112C120.506 5.23925 125.942 0.853264 132.529 0.853264C142.41 0.853264 145.529 5.45094 148.184 9.35443C146.199 16.1678 138.493 17.1781 131.646 21.4251C130.839 20.7694 129.809 20.3763 128.688 20.3763C126.097 20.3763 123.995 22.4775 123.995 25.0693C123.995 27.6612 126.097 29.7623 128.688 29.7623C128.76 29.7623 128.831 29.7607 128.902 29.7575Z" fill="#191847" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M83.3867 220.218C103.856 225.943 121.516 228.806 136.368 228.806C151.219 228.806 165.013 224.397 177.751 215.58C157.72 209.704 141.224 206.766 128.262 206.766C115.3 206.766 100.342 211.25 83.3867 220.218V220.218Z" fill="#2D8EB8" fill-opacity="0.97" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M154.088 237.058C153.89 236.761 153.724 236.439 153.591 236.089C150.855 228.853 107.03 150.794 102.664 136.523H152.005C155.325 147.373 170.266 215.467 172.368 229.052C179.003 250.482 192.663 319.885 194.406 324.693C196.241 329.751 185.919 335.021 183.169 328.802C178.792 318.908 168.364 291.531 163.721 274.815C159.368 259.144 155.824 245.045 154.088 237.058V237.058Z" fill="#BA8B72" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M113.72 246.588C93.6834 251.652 20.3953 260.807 15.3659 262.243C10.1923 263.72 5.656 253.056 12.0509 250.746C22.2262 247.071 50.2639 238.578 67.2633 235.112C80.9366 232.325 93.4136 230.05 101.79 228.718C101.081 205.188 97.8366 148.719 99.9629 136.523H143.621C141.582 148.218 124.345 233.554 121.142 242.096C120.125 245.145 117.092 246.493 113.72 246.588Z" fill="#D4A181" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5152 247.907C9.83993 247.409 7.87932 247.27 6.63342 247.49C5.11811 247.757 2.95142 248.4 0.133327 249.417L8.49028 296.812C12.7791 297.325 14.8519 296.227 14.7087 293.516C14.5655 290.805 14.4699 288.549 14.4221 286.748L20.3583 262.988C20.4725 262.531 20.1945 262.067 19.7373 261.953C19.7295 261.951 19.7216 261.949 19.7137 261.948L16.0293 261.137C14.45 258.883 13.5249 256.988 13.2541 255.452C13.0341 254.204 13.2342 252.392 13.8544 250.016L13.8544 250.016C14.0924 249.104 13.5461 248.172 12.6341 247.933C12.5948 247.923 12.5552 247.914 12.5152 247.907V247.907Z" fill="#E4E4E4" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M180.036 327.997C179.082 330.545 178.604 332.452 178.604 333.717C178.604 335.256 178.861 337.501 179.373 340.453H227.499C228.75 336.319 228.028 334.087 225.333 333.757C222.639 333.427 220.401 333.13 218.618 332.864L196.25 322.892C195.82 322.7 195.315 322.894 195.123 323.324C195.12 323.331 195.117 323.339 195.114 323.346L193.676 326.834C191.182 327.998 189.155 328.58 187.595 328.58C186.328 328.58 184.578 328.068 182.346 327.044L182.346 327.044C181.489 326.652 180.476 327.028 180.083 327.885C180.066 327.922 180.051 327.959 180.036 327.997V327.997Z" fill="#E4E4E4" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M100.104 136.523C119.343 131.018 137.546 131.018 154.713 136.523C160.686 163.774 175.199 174.59 177.751 216.37C148.74 230.785 112.903 206.09 83.0389 220.147C74.5062 200.484 86.452 153.131 100.104 136.523Z" fill="#2D8EB8" fill-opacity="0.97" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M182.871 102.657L216.56 98.0618C223.3 94.3132 229.499 91.7756 235.16 90.4487C236.753 90.4022 239.287 90.9813 235.512 94.1282C231.737 97.2752 227.907 100.756 228.579 102.436C229.252 104.115 232.762 103.49 233.344 106.074C233.732 107.796 228.034 108.076 216.251 106.913L188.915 117.751L182.871 102.657ZM77.0402 110.455L95.7245 110.525C75.2366 156.63 64.5539 180.77 63.6764 182.945C61.702 187.838 65.8801 195.29 67.6669 199.295C61.8475 201.899 62.4676 192.255 55.1267 195.671C48.4262 198.788 43.3292 204.436 35.5878 199.659C34.6361 199.072 33.5931 196.861 36.1131 195.133C42.3912 190.828 51.4383 183.294 52.6608 180.814C54.3277 177.432 62.4542 153.979 77.0402 110.455V110.455Z" fill="#D4A181" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M128.219 51.196L142.848 52.1705C146.451 84.7663 166.075 105.355 210.014 98.385L215.852 140.361C174.784 145.669 138.768 129.227 131.387 84.711C129.476 73.1872 127.967 61.1944 128.219 51.196V51.196Z" fill="white" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M121.001 46.9432L143.166 52.0196C143.166 90.1428 155.31 114.466 161.539 142.495H101.677C100.834 152.181 100.316 162.136 100.046 172.36H55.2236C65.3807 118.317 86.8188 76.5072 119.538 46.9296H120.99L121.001 46.9432Z" fill="white" />
      <path fill-rule="evenodd" clip-rule="evenodd" d="M111.121 88.1076C109.579 111.864 110.486 129.993 113.843 142.495H101.677C103.347 123.309 106.295 105.18 111.121 88.1076V88.1076Z" fill="black" fill-opacity="0.1" />
    </svg>

    <div class="container w-50 p-3 col-md-5 mb-5 base_color ">

      <form class=" row g-5 d-flex justify-content-center" action="../controllers/traitementconnexion.php" method="POST">
        <p class="text-center text-uppercase">Connexion</p>
      
<!-- <div>
 <?php
 /* echo $message; */?></div >-->
 <p><?=$_GET["message"]?? null?></p>
        <div class="col-md-8">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input class="form-control rounded-0" type="email" name="email" id="email" style=" border: 1px solid black" required>

          <div class="valid-feedback">Email field is valid!</div>
          <div class="invalid-feedback d-none" id="champ-reqEmail">champs requis</div>
          <div class="invalid-feedback d-none" id="email-invalid">email incorrect</div>
        </div>


        <div class="col-md-8">
          <label for="exampleInputPassword1" class="form-label">mot de passe</label>
          <input class="form-control rounded-0" type="password" id="password" name="password" style=" border: 1px solid black" required>
          <div class="valid-feedback">Password field is valid!</div>
          <div class="invalid-feedback d-none" id="champ-reqPass">champs requis</div>

        </div>




        <div class="col-md-8 d-flex justify-content-center">
          <button id="submit" type="submit" name="submit" class="class=" col-md-6 rounded-0 style="background-color: #437089; color:#ffff">Se connecter</button>
        </div>

        <a href="inscription.php" class="col-md-8 d-flex justify-content-end text-decoration-none text-dark">
          S'inscrire?
        </a>

      </form>
    </div>
  </div>



















  <script src="js/connexion.js"></script>
</body>

</html>