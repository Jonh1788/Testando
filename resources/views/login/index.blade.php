

<?php

$nomeUnico = config('subway_pix.nomeUnico');
$nomeUm = config('subway_pix.nomeUm');
$nomeDois = config('subway_pix.nomeDois');

?>










<!DOCTYPE html>
<html lang="pt-br" class="w-mod-js wf-spacemono-n4-active wf-spacemono-n7-active wf-active w-mod-ix"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>.wf-force-outline-none[tabindex="-1"]:focus{outline:none;}</style>
<meta charset="pt-br">
<title><?= $nomeUnico ?> 🌊 </title>
<meta property="og:image" content="{{ asset('loginA/logo.png') }}">

<meta content="<?= $nomeUnico ?> 🌊" property="og:title">
<meta name="twitter:image" content="{{ asset('loginA/logo.png') }}">
<meta content="<?= $nomeUnico ?> 🌊" property="twitter:title">
<meta property="og:type" content="website">
<meta content="summary_large_image" name="twitter:card">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="arquivos/page.css" rel="stylesheet" type="text/css">
<script src="arquivos/webfont.js" type="text/javascript"></script>

<script type="text/javascript">
                WebFont.load({
                    google: {
                        families: ["Space Mono:regular,700"]
                    }
                });
            </script>




<script type="text/javascript">
                ! function (o, c) {
                    var n = c.documentElement,
                        t = " w-mod-";
                    n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n
                        .className += t + "touch")
                }(window, document);
            </script>


<link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">

<link rel="manifest" href="/">
<link rel="icon" type="image/x-icon" href="../assets/images/logo.png">

<link rel="stylesheet" href="{{ asset('loginA/page.css') }}" media="all">



</head>
<body>
<div>
<div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
<div class="container w-container">


<a href="/" aria-current="page" class="brand w-nav-brand" aria-label="home">

<img src="../assets/images/logoapple.png" loading="lazy" height="28" alt class="image-6">
<div class="nav-link logo"><?= $nomeUnico ?></div>
</a>
<nav role="navigation" class="nav-menu w-nav-menu">
<a href="/login" class="nav-link w-nav-link" style="max-width: 940px;">Jogar</a>
<a href="/login" class="nav-link w-nav-link w--current" style="max-width: 940px;">Login</a>
<a href="/cadastrar" class="button2 nav w-button">Cadastrar</a>
</nav>





<style>
  .sectionFruits {
    background-color: #fe1f4f !important;
  }
  .button2 {
    border-radius: 10px;
    background-color: #ff3979;
  }
  .nav-bar {
      display: none;
      background-color: #333; /* Cor de fundo do menu */
      padding: 20px; /* Espaçamento interno do menu */
      width: 90%; /* Largura total do menu */
    
      position: fixed; /* Fixa o menu na parte superior */
      top: 0;
      left: 0;
      z-index: 1000; /* Garante que o menu está acima de outros elementos */
  }

  .nav-bar a {
      color: white; /* Cor dos links no menu */
      text-decoration: none;
      padding: 10px; /* Espaçamento interno dos itens do menu */
      display: block;
      margin-bottom: 10px; /* Espaçamento entre os itens do menu */
  }

  .nav-bar a.login {
      color: white; /* Cor do texto para o botão Login */
  }
  
  .button.w-button {
  text-align: center;
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
      var menuButton = document.querySelector('.menu-button');
      var navBar = document.querySelector('.nav-bar');

      menuButton.addEventListener('click', function () {
          // Toggle the visibility of the navigation bar
          if (navBar.style.display === 'block') {
              navBar.style.display = 'none';
          } else {
              navBar.style.display = 'block';
          }
      });
  });
</script>


<div class="w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
</div>
<div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
<div class="icon w-icon-nav-menu"></div>
</div>
</div>
<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div></div>
<div class="nav-bar">
<a href="/login" class="button2 w-button">
<div>Jogar</div>
</a>
<a href="/login" class="button2 w-button">
<div>Login</div>
</a>
<a href="/cadastrar" class="button2 w-button">Cadastrar</a>
</div>
<section id="hero" class="hero-section sectionFruits dark wf-section">
<div class="minting-container w-container">
<h2>LOGIN</h2>
<a href="/cadastrar">
<p>Não possui conta? Clique aqui <br>
</p>
</a>











<form method="POST" action="{{ url()->current() }}">
@csrf

  <div class="properties">
  <h4 class="rarity-heading">E-mail</h4>
  <div class="rarity-row roboto-type2">
  <input type="e-mail" class="large-input-field w-input" maxlength="256" name="email" placeholder="seuemail@gmail.com" id="email" required="">
  </div>
  <h4 class="rarity-heading">Senha</h4>
  <div class="rarity-row roboto-type2">
  <input type="password" class="large-input-field w-input" maxlength="256" name="senha" data-name="password" placeholder="Sua senha" id="senha" required="">
  </div><br>
  
  
  
      <input type="checkbox" onclick="mostrarSenha()"> Mostrar senha
  </div>
  
  
  <script>
      function mostrarSenha() {
          var senhaInput = document.getElementById('senha');
          if (senhaInput.type === 'password') {
              senhaInput.type = 'text';
          } else {
              senhaInput.type = 'password';
          }
      }
  </script>
  
  
  <?php
          if (!empty($errorMessage)) {
              echo '<p class="login-error" style="color: red; font-weight: normal;">' . $errorMessage . '</p>';
          }
          if (!empty($successMessage)) {
              echo '<p class="login-success">' . $successMessage . '</p>';
              
             
          }
          ?>
  
  
  <a href="recovery.php">
  <p>Esqueceu sua senha? Clique aqui <br>
  </p>
  </a>
  <div class="">
  <button class="primary-button button2 w-button">Entrar</button><br><br>
  </div>
  </form>
  
  
  
  
  
  </div>
  </section>
  <script type="text/javascript">
          function myFunction() {
              var x = document.getElementById("senha");
              if (x.type === "password") {
                  x.type = "text";
              } else {
                  x.type = "password";
              }
          }
          </script>
  
  
  
  <script>
          // Ocultar a mensagem de sucesso após 3 segundos e redirecionar
          setTimeout(function() {
              var successMessage = document.querySelector(".login-success");
              if (successMessage) {
                  successMessage.style.display = "none";
                  window.location.href = "/deposito"; // Redirecionar após 3 segundos
              }
          }, 1000);
      </script>








<div class="footer-section wf-section">
<div class="domo-text"><?= $nomeUm ?> <br>
</div>
<div class="domo-text purple"><?= $nomeDois ?> <br>
</div>
<div class="follow-test">subwaypixbet.com é um website de entretenimento online que oferece a seus usuários uma experiência única em apostas. Este website é operado por xlk Limited, with registrada
            em
            Dr. M.L. King
            Boulevard 117, devidamente autorizada e licenciada pelo Governo de Curaçao. sob o número GLH-16289876512. </div>
        <div class="follow-test">
<a href="">
<strong class="bold-white-link">Termos de uso</strong><br><br><a href="https://licensing-igaming-curacao.com/validator/3e6ea9b3c638911372d6c78c18ed6ca2domain=subwaypixbet.com/"><img src="https://i.ibb.co/XFMbv35/gaming-curacao.png"  width="234" alt="gaming-curacao" border="0"></a>
</div>
<div class="follow-test">contato@subwaypixbet.com</div>
</div>





</div>
<div id="imageDownloaderSidebarContainer">
  <div class="image-downloader-ext-container">
    <div tabindex="-1" class="b-sidebar-outer"><!---->
      <div id="image-downloader-sidebar" tabindex="-1" role="dialog" aria-modal="false" aria-hidden="true"
        class="b-sidebar shadow b-sidebar-right bg-light text-dark" style="width: 500px; display: none;"><!---->
        <div class="b-sidebar-body">
          <div></div>
        </div><!---->
      </div><!----><!---->
    </div>
  </div>
</div>
<div style="visibility: visible;">
  <div></div>
  <div>
  
    <style>      @-webkit-keyframes ww-71e31c39-4e87-4264-930a-91d2465581f0-launcherOnOpen {
          0% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }

          30% {
            -webkit-transform: translateY(-5px) rotate(2deg);
                    transform: translateY(-5px) rotate(2deg);
          }

          60% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }


          90% {
            -webkit-transform: translateY(-1px) rotate(0deg);
                    transform: translateY(-1px) rotate(0deg);

          }

          100% {
            -webkit-transform: translateY(-0px) rotate(0deg);
                    transform: translateY(-0px) rotate(0deg);
          }
        }
        @keyframes ww-71e31c39-4e87-4264-930a-91d2465581f0-launcherOnOpen {
          0% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }

          30% {
            -webkit-transform: translateY(-5px) rotate(2deg);
                    transform: translateY(-5px) rotate(2deg);
          }

          60% {
            -webkit-transform: translateY(0px) rotate(0deg);
                    transform: translateY(0px) rotate(0deg);
          }


          90% {
            -webkit-transform: translateY(-1px) rotate(0deg);
                    transform: translateY(-1px) rotate(0deg);

          }

          100% {
            -webkit-transform: translateY(-0px) rotate(0deg);
                    transform: translateY(-0px) rotate(0deg);
          }
        }

        @keyframes ww-71e31c39-4e87-4264-930a-91d2465581f0-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }

        @-webkit-keyframes ww-71e31c39-4e87-4264-930a-91d2465581f0-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }
      </style></div>
      </div>
      </body>
      
      </html>