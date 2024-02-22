<?php

$nomeUnico = config('subway_pix.nomeUnico');
$nomeUm = config('subway_pix.nomeUm');
$nomeDois = config('subway_pix.nomeDois');

?>


<!DOCTYPE html>
<html lang="pt-br">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="pt-br">
<title>
       {{ $nomeUnico }}   </title>
<meta content="Já imaginou ganhar R$1.000 com apenas R$1 único real? O jogo da frutinha vai fazer você faturar muito." name="description">
<meta property="og:image" content="../assets/images/logo.png">
<meta content="{{$nomeUnico}}" property="og:title">
<meta content="Já imaginou ganhar R$1.000 com apenas R$1 único real? O jogo da frutinha vai fazer você faturar muito." property="og:description">
<meta name="twitter:site" content="@DropFruit">
<meta name="twitter:image" content="../assets/images/logo.png">
<meta content="{{$nomeUnico}}" property="twitter:title">
<meta content="Já imaginou ganhar R$1.000 com apenas R$1 único real? O jogo da frutinha vai fazer você faturar muito." property="twitter:description">
<meta property="og:type" content="website">
<meta content="summary_large_image" name="twitter:card">
<meta content="width=device-width, initial-scale=1" name="viewport">
<link href="../assets/css/page.css" rel="stylesheet" type="text/css">
<script src="../assets/js/webfont.js" type="d004d771cdc9fb104a01c815-text/javascript"></script>
<script type="d004d771cdc9fb104a01c815-text/javascript">
    WebFont.load({
        google: {
            families: ["Space Mono:regular,700"]
        }
    });
    </script>

<link rel="apple-touch-icon" sizes="180x180" href="../assets/images/logo.png">
<link rel="icon" type="image/png" sizes="32x32" href="../assets/images/logo.png">
<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/logo.png">

<script id="ze-snippet" src="../static.zdassets.com/ekr/snippet1e8a.js?key=034b691c-1a3c-4abb-92f4-c267f791703a" type="d004d771cdc9fb104a01c815-text/javascript"> </script>
</head>
<body>
<div>
<div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="navbar w-nav">
<div class="container w-container" style="padding: 16px !important;">
<a href="../" aria-current="page" class="brand w-nav-brand w--current">
<img src="../assets/images/logoapple.png" loading="lazy" height="28" alt class="image-6">
<div class="nav-link logo">{{$nomeUnico}}</div>
</a>
<nav role="navigation" class="nav-menu w-nav-menu" style="padding: 8px !important;">
<a href="../" class="nav-link w-nav-link">Jogar</a>
<a href="../saque" class="nav-link w-nav-link">Saque</a>
<a href="../logout" class="nav-link w-nav-link">Sair</a>
<a href="../deposito" class="button nav w-button">Depositar</a>
</nav>

<style type="text/css">/* Estilos gerais do menu */
.nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333; /* Cor de fundo do menu desktop */
    padding: 10px;
}

.menu-button {
    background-color: black; /* Cor de fundo do botão */
    color: #fff; /* Cor do texto do botão */
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

.mobile-menu {
    display: none; /* O menu móvel não é exibido inicialmente */
    background-color: #333; /* Cor de fundo do menu móvel */
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 1;
    flex-direction: column;
    align-items: center;
}

.nav-link {
    color: #fff; /* Cor do texto dos links do menu móvel */
    padding: 10px 20px;
    text-decoration: none;
}
</style>
<div class="w-nav-button">
</div>
<div class="menu-button w-nav-button">
<div class="icon w-icon-nav-menu"></div>
</div>
    
</div>


</div>
  <div class="mobile-menu">
            <nav role="navigation" class="nav-menu w-nav-menu">
                <a href="../" class="nav-link w-nav-link">{{ $nomeUnico }}</a>
                <a href="../" class="nav-link w-nav-link">Jogar</a>
                <a href="../saque" class="nav-link w-nav-link">Saque</a>
                <a href="../afiliate" class="nav-link w-nav-link">Divulgue & Ganhe</a>
                <a href="../logout" class="nav-link w-nav-link">Sair</a>
                <a href="../deposito" style="margin-left: 5px !important;" class="button nav w-button"><center>DEPOSITAR</center></a>
            </nav>
        </div>
    </div>
</div>
 <script>
document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector(".menu-button");
    const mobileMenu = document.querySelector(".mobile-menu");

    menuButton.addEventListener("click", function() {
        if (mobileMenu.style.display === "none" || mobileMenu.style.display === "") {
            mobileMenu.style.display = "flex";
        } else {
            mobileMenu.style.display = "none";
        }
    });
});
</script>

<style>
    ul.playersOn {
        display: block;
        position: absolute;
        top: calc(50vh - 240px);
        left: -154px;
        width: 190px;
        height: 460px;
        padding: 0;
        margin: 0;
        background: #00BCD4;
        border: 4px solid #000;
        box-shadow: -3px 3px 0 2px #000;
        border-radius: 0 15px 15px 0;
        filter: drop-shadow(2px 2px 6px #000000cc);
        transition: 2s;
        opacity: 0;
        z-index: 100;
    }

    ul.playersOn.ativo {
        left: -5px;
    }

    ul.playersOn li {
        display: block;
        margin: 10px 5px 0 5px;
    }

    ul.playersOn li img {
        float: left;
        width: 20px;
        margin: 0 -150px 0 150px;
        filter: drop-shadow(1px 1px 3px black);
        transition: 4s;
    }

    ul.playersOn.ativo li img {
        margin: 0 8px 0 0;
    }

    ul.playersOn li span {
        display: block;
        font-size: 12px;
        line-height: 12px;
    }

    ul.playersOn li i {
        display: block;
        font-size: 10px;
        margin-top: -6px;
    }
    </style>
<ul class="playersOn"></ul>
<div style="position: absolute; top: 100px; width: 100%; line-height: 26px; color: #fff; z-index: 10; text-align: center;">
</div>
<section id="hero" class="hero-section dark wf-section">
    
    
<style>
            a.escudo {
                display: block;
                width: 247px;
                line-height: 65px;
                font-size: 12px;
                margin: -60px 0 0px 0;
                background-image: url(../assets/images/escudo-branco.png);
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                filter: drop-shadow(1px 1px 3px #00000099) hue-rotate(0deg);
            }

            a.escudo img {
                width: 50px;
                margin: -10px 0 0 0;
            }

            .containerPop {
                border-style: solid;
                border-width: 8px;
                border-color: #1f2024;
            }

            .button2 {
                background-color: #fe1f4f !important;
                border: solid !important;
                border-color: #1f2024 !important;
                box-shadow: -3px 3px 0 0 #1f2024 !important;
            }

            .button2:hover{
                box-shadow: -6px 6px 0 0 #1f2024 !important;
            }
            </style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const queryString = window.location.search;

    const urlParams = new URLSearchParams(queryString);

    window.addEventListener('load', () => {
        const saldo = @json($saldo);
        var mensagem = saldo > 0 ? " Vamos jogar!" : " Deposite com o link abaixo, e vem ganhar com a gente!";
        var mensagemBtn = saldo > 0 ? "Jogar!" : "<a href='../deposito' style='color: #fff;'>Depositar!";
        const msg = urlParams.get("msg");
        const value = parseFloat(urlParams.get("value")).toFixed(2);
        if(!isNaN(value)){
            setTimeout(() => {
                
                
                    clearTimeout(timeoutId);
                    Swal.fire({
                        title: "Uau!",
                        html: "<p>Você poderia ter ganho <span style='color: #000; font-weight:bold;'>R$" + value + "</span><br>" + mensagem + "</p>",
                        confirmButtonText: mensagemBtn,
                        customClass: {
                            confirmButton: "primary-button button2 w-button",
                            popup: "minting-container"
                        }
                    })
                    .then(() => {
                        exibirNomesAleatorios();
                    })
            
            }, 1000);
        }

        var error = @json($error);
        if(error){ 

            
            clearTimeout(timeoutId);

            setTimeout(() => {
                Swal.fire({
                    title: "Sem saldo!",
                    html: "<p>Você não possui saldo suficiente, faça um depósito!</p>",
                    confirmButtonText: "<a href='../deposito'>Depositar</a>",
                    confirmButtonTextColor: "#fff",
                    customClass: {
                        confirmButton: "primary-button button2 w-button",
                        popup: "minting-container"
                    }
                }).then(
                    (result) => {
                       if(result.isConfirmed){
                        location.href = "../deposito"
                       }
                    }
                )
            }, 1000);
        }
        
    })

</script>

@extends('layout.app')

<style>
@media screen and (max-width: 479px){
      .formUpdate {
        width: 90%;
        margin: 0 auto;
      }
    }
    .formUpdate {
        display: flex;
        flex-direction: column;
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.4);
        border-radius: 5px;
        position: relative;
    }

    .formTitle {
        background-color: #333333;
        border-radius: 5px 5px 0 0; 
        margin: 0;
        color: #fff;
        padding: 10px 5px; 
        font-size: 16px;
        font-weight: bold;
    }

    .formInput {
        border-radius: 0 0 5px 5px;
        outline: none;
        border: none;
        width: 100%;
        margin: 0;
        height: 40px;
        padding: 10px 5px;
        
    }

    .properties{
        display: flex;
        flex-direction: column;
        gap: 20px;
    
    }
.fastBet{
    font-size: 18px;
    font-weight: bold;
    font-family: 'right grotesk', sans-serif;
    letter-spacing: 1px;
    
    }
    .btnStart {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 20px;
        flex-wrap: wrap;
        border-radius: 15px;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    @keyframes rotate {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .testando{
        width: 25%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .submitBtn{
        background-color: #fe1f4f;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 24px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 15px;
        font-family: 'right grotesk', sans-serif;
        font-weight: bold;
        font-smooth: always;
        box-shadow: -15px 3px 0 3px #1f2024;
        letter-spacing: 2px;
    }
    
    .submitBtn:hover {
        transform: translate(10px, -10px);
        box-shadow: -25px 13px 0 3px #1f2024;
        background-color: #9f1331;
        
    }

    .postForm{
        display: flex;
        gap: 30px;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    .postForm > div > p {
        margin: 0;
        
    }
    
    </style>
    <div class="minting-container w-container">
    <a href="#" class="escudo">
    <img src="../trophy.gif">
    </a>
    <h2>Cortar Frutas</h2>
    <div id="saldoDiv">
            SALDO: R$<b class="saldo"> <?php echo isset($saldo) ? number_format($saldo, 2, ',', '.') : '0,00'; ?> </b>
        </div>
        <br>
            <p class="fastBet">Aposta Rápida</p>
            <p>Selecione uma aposta rápida, sem a necessidade de digitar valor!</p>

<div class="btnStart">
    <form  id="formSubtrair" method="post" aria-label="Form" action="../jogar">
        @csrf
        <input type="hidden" name="_token" value="vmYl7uSIUvRRBXLjvgIcTJVTyqm0bBfegpnjAmNU">
        <input type="submit" name="bet" value="R$1,00" class="submitBtn">
    </form>

    <form id="formSubtrair" method="post" aria-label="Form" action="../jogar">
        @csrf
        <input type="hidden" name="_token" value="vmYl7uSIUvRRBXLjvgIcTJVTyqm0bBfegpnjAmNU">
        <input type="submit" name="bet" value="R$2,00" class="submitBtn">
    </form>

    <form id="formSubtrair" method="post" aria-label="Form" action="../jogar">
    @csrf
            <input type="hidden" name="_token" value="vmYl7uSIUvRRBXLjvgIcTJVTyqm0bBfegpnjAmNU">
            <input type="submit" name="bet" value="R$5,00" class="submitBtn">
    </form>

    <form id="formSubtrair1" method="post" aria-label="Form" action="../jogar">
        @csrf
        <input type="hidden" name="_token" value="vmYl7uSIUvRRBXLjvgIcTJVTyqm0bBfegpnjAmNU">
        <input type="submit" name="bet" value="R$10,00" class="submitBtn">
    </form>
</div>
<script>
async function processarForm() {

    
    
}
</script>

<div class>
</div>
</form>
<form data-name id="play" method="post" aria-label="Form" action="../jogar" style="width:100%;">
        @csrf
        <div class="formUpdate" style="margin-bottom:10px;">
            <input type="hidden" name="_token" value="vmYl7uSIUvRRBXLjvgIcTJVTyqm0bBfegpnjAmNU">
            <h4 class="formTitle" style="text-align: left;">valor de entrada</h4>
            <div>
            <input type="number" class="formInput" max="{{ $saldo >= $apostaMax ? $apostaMax : $saldo }}" min="{{ $apostaMin }}" step="1" name="bet" id="bet" required value="5">
            </div>
        </div>
    <div class>
    <p>Valores para jogar: R${{ $apostaMin }}.00 à R${{ $saldo >= $apostaMax ? $apostaMax : $saldo }}</p>
    <input type="submit" value="Cortar" class="submitBtn"><br><br>
    </div>
</form>
<div class="postForm">

    <div>
        <p>Jogue com Dinheiro Real </p>
        <input type="submit" value="Depositar" class="primary-button w-button submitBtn" style="background-color: #00FF00;"><br><br>
    </div>

    <div>
        <p>Teste o jogo: </p>
        <input type="button" value="Testar"  id="testar" onclick="irPara('../jogar')" class="primary-button w-button submitBtn"><br><br>
    </div>

    <div>
        <p>Indique um amigo: </p>
        <input type="button" value="R$50 Grátis" id="indique" onclick="irPara('../afiliate')" class="primary-button w-button submitBtn" style="background-color: red !important;"><br><br>
    </div>

    </div>
    <i style="font-size: 10px;">Sua meta(ganho) é 5x o valor apostado!</i>
    </div>


    <script>
        function irPara(goFor){
            location.href = goFor;
        }
    </script>

    </div>
    <div id="wins" style="
                    display: block;
                    width: 240px;
                    font-size: 12px;
                    padding: 5px 0;
                    text-align: center;
                    line-height: 13px;
                    background-color: #FFC107;
                    border-radius: 10px;
                    border: 3px solid #1f2024;
                    box-shadow: -3px 3px 0 0px #1f2024;
                    margin: -24px auto 0 auto;
                    z-index: 1000;
                ">Usuários Online<br>20630</div>
</div>
</div>
</div>
    
</section> 

<section id="mint" class="mint-section wf-section">
<div class="minting-container w-container">
<img src="../assets/images/money.png" loading="lazy" width="240" alt class="mint-card-image">
<h2>{{$nomeUnico}}</h2>
<p class="paragraph">Bem-vindo ao mundo suculento e lucrativo de {{$nomeUnico}}, o joguinho que vai deixar
você com água na boca e o bolso cheio! Prepare-se para uma experiência emocionante, onde suas
habilidades de corte serão testadas e sua conta bancária pode crescer a cada fatia. </p>
<a href="../" class="primary-button w-button">JOGAR AGORA</a>
<div class="price">
<strong>Rodadas de boas vindas disponível</strong>
</div>
</div>
</section>
</div>
<div id="rarity" class="rarity-section wf-section">
<div class="rarity-chart">
<h2 class="heading-2">Raridade</h2>
<p>Cada fruta possui um valor diferente que
você
pode ganhar ao cortá-la, confira nossa tabela.</p>
<div class="div-block">
<h3 class="rarity-heading">Tipos</h3>
<div class="rarity-row">
<div class="rarity-number">Mais comum</div>
<div>Maçã</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">Menos Comum</div>
<div>Laranja</div>
</div>
<div class="rarity-row">
<div class="rarity-number">Raro</div>
<div>Kiwi</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">Super Raro</div>
<div>Dragão</div>
</div>
<img src="../assets/fonts/60f9aca9b5309615808c507e_rarity.svg" loading="lazy" alt class="rarity-image">
</div>
<div>
<h3 class="rarity-heading">Variações</h3>
<div class="rarity-row blue">
<div class="rarity-number">R$ {{ 0.05 * $multiplicador}}</div>
<div>Maçã</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 0.10 * $multiplicador}}</div>
<div>Maracuja</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 0.15 * $multiplicador}}</div>
<div>Melância</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 0.20 * $multiplicador}}</div>
<div>Manga</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 0.25 * $multiplicador}}</div>
<div>Abacate</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 0.30 * $multiplicador}}</div>
<div>Mamão</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 0.35 * $multiplicador}}</div>
<div>Banana</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 0.40 * $multiplicador}}</div>
<div>Limão</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 0.45 * $multiplicador}}</div>
<div>Romã</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 0.50 * $multiplicador}}</div>
<div>Morango</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 0.75 * $multiplicador}}</div>
<div>Laranja</div>
</div>
<div class="rarity-row">
<div class="rarity-number">R${{ 1.00 * $multiplicador}}</div>
<div>Kiwi</div>
</div>
<div class="rarity-row blue">
<div class="rarity-number">R${{ 1.00 * $multiplicador}}</div>
<div>Dragão</div>
</div>
</div>
</div>
</div>
<div id="faq" class="faq-section">
<div class="faq-container w-container">
<h2>faq</h2>
<div class="question first">
<img src="../assets/fonts/60f8d0c642c4405fe15e5ee0_80s%20Pop.svg" loading="lazy" width="110" alt>
<h3>Como funciona?</h3>
<div>{{$nomeUnico}} é o mais novo jogo divertido e lucrativo da galera! Lembra daquele joguinho de cortar
as
frutas que todo mundo era viciado? Ele voltou e agora dá para ganhar dinheiro com cada frutinha
cortada, mas cuidado com as bombas para você garantir o seu prêmio. É super simples, corte as
frutas
e a cada fruta cortada você ganhará dinheiro na hora. </div>
</div>
<div class="question">
<img src="../assets/fonts/60fa0061a0450e3b6f52e12f_Body.svg" loading="lazy" width="90" alt>
<h3>Como posso jogar?</h3>
<div class="w-richtext">
<p>Você precisa fazer um depósito inicial na plataforma para começar a jogar e faturar.
Lembrando
que você indicando amigos, você ganhará dinheiro de verdade na sua conta bancária.</p>
</div>
</div>
<div class="question">
<img src="../assets/fonts/61070a430f976c13396eee00_Gradient%20Shades.svg" loading="lazy" width="120" alt>
<h3>Como posso sacar? <br>
</h3>
<p>O saque é instantâneo. Utilizamos a sua chave PIX como CPF para enviar o pagamento, é na hora e
no
PIX. 7 dias por semana e 24 horas por dia. <br>
</p>
</div>
<div class="question">
<img src="../assets/fonts/60fa004b7690e70dded91f9a_light.svg" loading="lazy" width="80" alt>
<h3>É tipo foguetinho?</h3>
<div>
<b>Não</b>! O jogo da frutinha é totalmente diferente, basta apenas estar atento para cortar as
frutas certas. Não existe sua sorte em jogo, basta ter foco e cortar as frutas corretamente.
</div>
</div>
<div class="question">
<img src="../assets/fonts/60f8d0c69b41fe00d53e8807_Helmet.svg" loading="lazy" width="90" alt>
<h3>Existem eventos?</h3>
<div class="w-richtext">
<ul role="list">
<li>
<strong>Jogatina</strong>. A cada fruta que você acerta, você ouve o som satisfatório do
corte e, em seguida, vê o dinheiro sendo adicionado à sua conta virtual. Quanto mais
frutas
você cortar, mais dinheiro você ganha. Mas cuidado! Há bombas escondidas entre as
frutas.
</li>
<li>
<strong>Torneios</strong>. Além disso, você pode competir com outros jogadores em
torneios e
desafios diários para ver quem consegue a maior pontuação e fatura mais dinheiro. A
emoção
da competição e a chance de ganhar grandes prêmios adicionam uma camada extra de
adrenalina
ao jogo.
</li>
<li>
<strong>Desafios</strong>. À medida que você progride no jogo, desafios emocionantes
surgem.
Você será desafiado a cortar uma quantidade específica de frutas em um determinado
tempo, ou
até mesmo enfrentar frutas especiais que valem mais dinheiro. Os combos também são uma
maneira de aumentar seus ganhos, pois ao cortar várias frutas consecutivas, você
receberá
bônus multiplicadores.
</li>
</ul>
</div>
</div>
<div class="question">
<img src="../assets/fonts/60f8d0c6aa527d780201899a_Ear.svg" loading="lazy" width="72" alt>
<h3>O que são as bombinhas?</h3>
<div>Quando nosso mestre ninja lanças as frutas na tábua, existem algumas bombinhas que podem ser
lançadas junto as frutas. Caso você corte alguma bombinha, você perde a partida.</div>
</div>
<div class="question last">
<img src="../assets/fonts/60f8d0c657c9a88fe4b40335_Exploded%20Head.svg" loading="lazy" width="72" alt>
<h3>Dá para ganhar mais?</h3>
<div class="w-richtext">
<p>Chame um amigo para jogar e após o depósito e a primeira partida será creditado em sua conta 50% do valor depositado pelo usuário, o valor ganho estará disponível para sacar a qualquer momento. </p>
<ol role="list">
<li>O saldo é adicionado diretamente ao seu saldo em dinheiro, com o qual você pode jogar ou
sacar. </li>
<li>Seu amigo deve se inscrever através do seu link de convite pessoal. </li>
<li>Seu amigo deve ter depositado pelo menos R$20.00 BRL para receber o prêmio do convite.
</li>
<li>Você não pode criar novas contas na {{$nomeUnico}} e se inscrever através do seu próprio link
para receber a recompensa. O programa Indique um Amigo é feito para nossos jogadores
convidarem amigos para a plataforma {{$nomeUnico}}. Qualquer outro uso deste programa é
estritamente proibido. </li>
</ol>
<p>‍</p>
</div>
</div>
</div>
<div class="faq-left">
<img src="../assets/fonts/60f988c7c856f076b39f8fa4_head%2004.svg" loading="eager" width="238.5" alt class="faq-img">
<img src="../assets/fonts/60f988c9402afc1dd3f629fe_head%2026.svg" loading="eager" width="234" alt class="faq-img _1">
<img src="../assets/fonts/60f988c9bc584ead82ad8416_head%2029.svg" loading="lazy" width="234" alt class="faq-img _2">
<img src="../assets/fonts/60f988c913f0ba744c9aa13e_head%2027.svg" loading="lazy" width="234" alt class="faq-img _3">
<img src="../assets/fonts/60f988c9d3d37e14794eca22_head%2025.svg" loading="lazy" width="234" alt class="faq-img _1">
<img src="../assets/fonts/60f988c98b7854f0327f5394_head%2024.svg" loading="lazy" width="234" alt class="faq-img _2">
<img src="../assets/fonts/60f988c82f5c199c4d2f6b9f_head%2005.svg" loading="lazy" width="234" alt class="faq-img _3">
</div>
<div class="faq-right">
<img src="../assets/fonts/60f988c88b7854b5127f5393_head%2023.svg" loading="eager" width="238.5" alt class="faq-img">
<img src="../assets/fonts/60f988c8bf76d754b9c48573_head%2012.svg" loading="eager" width="234" alt class="faq-img _1">
<img src="../assets/fonts/60f988c8f2b58f55b60d858f_head%2021.svg" loading="lazy" width="234" alt class="faq-img _2">
<img src="../assets/fonts/60f988c8e83a994a38909bc4_head%2022.svg" loading="lazy" width="234" alt class="faq-img _3">
<img src="../assets/fonts/60f988c8a97a7c125d72046d_head%2020.svg" loading="lazy" width="234" alt class="faq-img _1">
<img src="../assets/fonts/60f988c8fbbbfe5fc68169e0_head%2014.svg" loading="lazy" width="234" alt class="faq-img _2">
<img src="../assets/fonts/60f988c88b7854b35e7f5390_head%2018.svg" loading="lazy" width="234" alt class="faq-img _3">
</div>
<div class="faq-bottom">
<img src="../assets/fonts/60f988c8ba5339712b3317c0_head%2016.svg" loading="lazy" width="234" alt class="faq-img _3">
<img src="../assets/fonts/60f988c86e8603bce1c16a98_head%2017.svg" loading="lazy" width="234" alt class="faq-img">
<img src="../assets/fonts/60f988c889b7b12755035f2f_head%2019.svg" loading="lazy" width="234" alt class="faq-img _1">
</div>
<div class="faq-top">
<img src="../assets/fonts/60f988c8a97a7ccf6f72046a_head%2011.svg" loading="eager" width="234" alt class="faq-img _3">
<img src="../assets/fonts/60f988c7fbbbfed6f88169df_head%2002.svg" loading="eager" width="234" alt class="faq-img">
<img src="../assets/images/60f8dbc385822360571c62e0_icon-256w.png" loading="eager" width="234" alt class="faq-img _1">
</div>
</div>
<div class="footer-section wf-section">
<div class="domo-text">{{$nomeUm}} <br>
</div>
<div class="domo-text purple">{{$nomeDois}} <br>
</div>
<div class="follow-test">© Copyright</div>
<div class="follow-test">
<a href="#">
<strong class="bold-white-link">Termos de uso</strong>
</a>
</div>
<div class="follow-test"><a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="c2a1adacb6a3b6ad82a4b0b7abb6b1afadaca7bbeca1adaf">[email&#160;protected]</a></div>

</div>


</html>