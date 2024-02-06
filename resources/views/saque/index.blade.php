


<?php

$nomeUnico = config('subway_pix.nomeUnico');
$nomeUm = config('subway_pix.nomeUm');
$nomeDois = config('subway_pix.nomeDois');

?>



<script></script>


<!DOCTYPE html>

<html lang="pt-br" class="w-mod-js w-mod-ix wf-spacemono-n4-active wf-spacemono-n7-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style>.wf-force-outline-none[tabindex="-1"]:focus{outline:none;}</style>
<meta charset="pt-br">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title><?= $nomeUnico ?> 🌊 </title>
<script src="{{ asset('arquivos/jquery.js')}}"></script>
<meta property="og:image" content="../img/logo.png">

<meta content="<?= $nomeUnico ?> 🌊" property="og:title">
<meta name="twitter:site" content="@<?= $nomeUnico ?>">
<meta name="twitter:image" content="../img/logo.png">
<meta property="og:type" content="website">

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



<link rel="icon" type="image/x-icon" href="../assets/logo.png">

<link rel="stylesheet" href="arquivos/css" media="all">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>


<div>
<div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
<div class="container w-container">
<a href="/painel" aria-current="page" class="brand w-nav-brand" aria-label="home">
<img src="../assets/images/logoapple.png" loading="lazy" height="28" alt class="image-6">
<div class="nav-link logo"><?= $nomeUnico ?></div>
</a>
<nav role="navigation" class="nav-menu w-nav-menu">
<a href="../painel" class="nav-link w-nav-link" style="max-width: 940px;">Jogar</a>
<a href="../saque" class="nav-link w-nav-link w--current" style="max-width: 940px;">Saque</a>

<a href="../afiliate" class="nav-link w-nav-link" style="max-width: 940px;">Indique e Ganhe R$50</a>

<a href="../logout" class="nav-link w-nav-link" style="max-width: 940px;">Sair</a>
<a href="../deposito" class="button button2 button2 nav w-button">Depositar</a>
</nav>







<style>
  .sectionFruits{
              background-color: #fe1f4f !important;
            }
            .button2 {
              border-radius: 10px;
              background-color: #ff3979 !important;
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



<style>
  .menu-button2{
      border-radius: 15px;
      background-color: #000;
  }
</style>




<div class="w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
<div class="" style="-webkit-user-select: text;">


<a href="../deposito" class="menu-button2 w-nav-dep nav w-button">DEPOSITAR</a>
</div>
</div>
<div class="menu-button w-nav-button" style="-webkit-user-select: text;" aria-label="menu" role="button" tabindex="0" aria-controls="w-nav-overlay-0" aria-haspopup="menu" aria-expanded="false">
<div class="icon w-icon-nav-menu"></div>
</div>
</div>
<div class="w-nav-overlay" data-wf-ignore="" id="w-nav-overlay-0"></div></div>
<div class="nav-bar">
<a href="../painel" class="button w-button">
<div>Jogar</div>
</a>
<a href="../saque" class="button w-button">
<div >Saque</div>
</a>

<a href="../afiliate" class="button w-button">
<div >Indique & ganhe R$50</div>
</a>
<a href="../logout" class="button w-button">
<div >Sair</div>
</a>
<a href="../deposito" class="button button2 w-button">Depositar</a>
</div>



<script>


async function popup(titulo, texto, linkUrl, linkTexto){
 return await Swal.fire({
        title: titulo,
        text: texto,
        confirmButtonText: `<a href=${linkUrl}>${linkTexto}</a>`,
        showCloseButton: true,
    });
}


async function processarForm(){

    event.preventDefault();
    var saldoString = "<?php echo $saldo; ?>"
    var depositouString = "<?php echo $depositou; ?>"
    var saldo = parseFloat(saldoString)
    var depositou = parseFloat(depositouString)
    var elementoH4 = document.getElementById("alerta-saque");
    
    if(depositou > 0 && depositou  < 49){
      popup('titulo', 'texto', 'link', 'texto link');
      
    }

    if(saldo <= 0){
      elementoH4.textContent = "Sem saldo";
      
    }

    if(saldo > 0 && saldo < 100){
      elementoH4.textContent = "Saldo maior que 0 e menor que 100"
    }

    if(depositou >= 49 && saldo < 300){

      await popup('titulo', 'texto', 'link', 'texto link');

    }

    if(depositou >= 49 && saldo >= 300){

      
       const result = await popup('titulo', 'texto', '../deposito', 'texto link');
       if(result.isConfirmed){
        var CPF = document.getElementById("withdrawCPF").value;
        var valor = document.getElementById("withdrawValue").value;
        const response = await fetch(window.location.href, {
        method: 'POST',
        body: new URLSearchParams({
        'withdrawCPF': CPF,
        'withdrawValue': valor,
      }),
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    },
      })
       } 
    }

    

    return false;
}

</script>



<section id="hero" class="hero-section sectionFruits dark wf-section">
<div class="minting-container w-container">
<img src="arquivos/with.gif" loading="lazy" width="240" data-w-id="6449f730-ebd9-23f2-b6ad-c6fbce8937f7" alt="Roboto #6340" class="mint-card-image">
<h2>Saque</h2>
<p>PIX: saques instantâneos com muita praticidade. <br>
</p>
<form data-name="" id="payment_pix" name="payment_pix" method="post" aria-label="Form" id="solicitarSaqueForm" onsubmit="return processarForm();">
@csrf
<div class="properties">
<h4 class="rarity-heading">Nome do destinatário:</h4>
<div class="rarity-row roboto-type2">
<input type="text" class="large-input-field w-node-_050dfc36-93a8-d840-d215-4fca9adfe60d-9adfe605 w-input" maxlength="256" name="withdrawName" placeholder="Nome do Destinatario" id="withdrawName" required="">
</div>
<h4 class="rarity-heading">Chave PIX CPF:</h4>
<div class="rarity-row roboto-type2">
<input type="text" class="large-input-field w-node-_050dfc36-93a8-d840-d215-4fca9adfe60d-9adfe605 w-input" maxlength="256" name="withdrawCPF" placeholder="Seu número de CPF" id="withdrawCPF" required="">
</div>

<h4 class=" rarity-heading">

Valor para saque: (SALDO: R$
  
<?php 
 
 echo isset($saldo) ? number_format($saldo, 2, ',', '.') : '0,00';

?>)
</h4>

<div class="rarity-row roboto-type2">
<input type="number" data-name="Valor de saque" min="0.00" max="" name="withdrawValue" id="withdrawValue" placeholder="R$<?= $saldo ?>" class="large-input-field w-node-_050dfc36-93a8-d840-d215-4fca9adfe60d-9adfe605 w-input">


</div>
</div>
<div class="">


<input type="submit" value="<?= $SaqueStatus == "fila" ? 'Saque Solicitado. Aguarde' : 'Sacar'; ?>" id="pixgenerator" class="primary-button button2  w-button" <?= $SaqueStatus == 'fila' ? 'disabled' : ''; ?>><br><br>




</div>
</form>




</div>
</section>
<div class="intermission wf-section"></div>
<div id="rarity" class="rarity-section wf-section">
<div class="minting-container w-container">
<img src="arquivos/money-cash.gif" loading="lazy" width="240" alt="Robopet 6340" class="mint-card-image">
<h2>Histórico financeiro</h2>
<p class="paragraph">As retiradas para sua conta bancária são processadas pelo setor financeiro.
<br>
</p>
<div class="properties">
<h3 class="rarity-heading">Saques realizados</h3>
</div>
</div>
</div>
<div class="intermission wf-section"></div>
<div id="about" class="comic-book white wf-section">
<div class="minting-container left w-container">
<div class="w-layout-grid grid-2">
<img src="arquivos/money.png" loading="lazy" width="240" alt="Roboto #6340" class="mint-card-image v2">
<div>
<h2>Indique um amigo e ganhe R$50 no PIX</h2>
<h3>Como funciona?</h3>
<p>Convide seus amigos que ainda não estão na plataforma. Você receberá R$50 por cada amigo que
se
inscrever e fizer um depósito. Não há limite para quantos amigos você pode convidar. Isso
significa que também não há limite para quanto você pode ganhar!</p>
<h3>Como recebo o dinheiro?</h3>
<p>O saldo é adicionado diretamente ao seu saldo no painel abaixo, com o qual você pode sacar
via
PIX.</p>
</div>
</div>
</div>
</div>
<div class="footer-section wf-section">
<div class="domo-text"><?= $nomeUm ?> <br>
</div>
<div class="domo-text purple"><?= $nomeDois ?> <br>
</div>
<div class="follow-test">© Copyright xlk Limited, with registered
  offices at
  Dr. M.L. King
  Boulevard 117, accredited by license GLH-16289876512. </div>
<div class="follow-test">
<a href="#">
<strong class="bold-white-link">Termos de uso</strong>
</a>
</div>
<div class="follow-test">contato@<?= $nomeUnico ?>.com</div>
</div>
<!--
<script>
document.getElementById('solicitarSaqueForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    // Use AJAX para enviar os dados do formulário
    $.ajax({
        type: 'POST',
        url: 'solicitar_saque.php',
        data: $('#solicitarSaqueForm').serialize(), // Serializa os dados do formulário
        success: function(response) {
            // Atualiza o conteúdo da página com a resposta
            $('#conteudoDaPagina').html(response); // Substitua 'conteudoDaPagina' pelo ID ou seletor apropriado
        },
        error: function(error) {
            console.error('Erro na solicitação AJAX: ' + error);
        }
    });
});
</script>
-->



<script type="text/javascript">
            $(document).ready(function () {

                $("#withdrawValue").keyup(function (e) {
                var value = $("[name='withdrawValue']").val();

                var final = (value / 100) * 95;

                $('#updatedValue').text('' + final.toFixed(2));
            });
            })
            
        </script>
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
            <div
              style="display: flex; flex-direction: column; z-index: 999999; bottom: 88px; position: fixed; right: 16px; direction: ltr; align-items: end; gap: 8px;">
              <div style="display: flex; gap: 8px;"></div>
            </div>
            <style> @-webkit-keyframes ww-1d3e1845-0974-4ce9-92ae-64548dac571e-launcherOnOpen {
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
        @keyframes ww-1d3e1845-0974-4ce9-92ae-64548dac571e-launcherOnOpen {
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

        @keyframes ww-1d3e1845-0974-4ce9-92ae-64548dac571e-widgetOnLoad {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }

        @-webkit-keyframes ww-1d3e1845-0974-4ce9-92ae-64548dac571e-widgetOnLoad {
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