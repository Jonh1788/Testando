
<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Subway Vip</title>
    <meta name="description" content="Jogo desbloqueado">
    <meta name="author" content="checkout teste">
    <link href="https://checkout.perfectpay.com.br/css/checkout.all.css?v=1.0" rel="stylesheet">
    <link href="https://checkout.perfectpay.com.br/font/css/all.css?v=1.0" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">





    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>




    <style>
        h1 {
            color: #333;
        }

        form {
            width: 90%;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            margin-top: 10px;
            border-radius: 6px;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }


        .divqr {
            align-items: center;
            padding: 30px;

            background-color: #ffffff;

        }

        #qrcode {
            margin-top: 20px;
            margin-left: 30%;


        }



        input[type="submit"] {
            width: 100%;
            border-radius: 10px;
            background-color: #71c358;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #71c358;
        }


        #qr-code-text {
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 6px;
            background-color: #e4e2e2;
            border: 2px solid #71c358;
            padding: 10px;
            word-break: break-all;
        }

        #copy-button {
            display: none;
            background-color: #71c358;
            border-radius: 6px;
            color: #fff;
            padding: 10px 80px;
            border: none;
            cursor: pointer;
            margin-top: 10px;

            animation: pulse 2s infinite;


            margin: 0 auto;
        }

        #copy-button:hover {
            background-color: #71c358;
        }





        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }








        .efeito-banner-topo {
            position: absolute;
            left: 0;
            top: 0;
            right: 0;
            z-index: -2;
            display: block;
            width: 100%;
            height: 83%;
            max-height: 680px;
            opacity: 1;
        }

        .efeito-banner-topo img {
            position: absolute;
            left: 0;
            bottom: 0;
            right: 0;
            width: 120%;
            height: 120%;
            margin-top: -5%;
            background-position: 0 0, 50% 50%;
            background-size: auto, cover;
            background-repeat: repeat, no-repeat;
            opacity: 1;
            -webkit-filter: blur(24px);
            filter: blur(24px);
        }

        .img-banner-topo {
            border-radius: 0 0 10px 10px;
            /*margin: 0 auto;*/
            /*margin-right: auto;*/
            /*width: 100%;*/
            /*max-height: 500px;*/
            max-width: 1138px;
            max-height: 487px;
        }

        /*.orderbump-percent span.stats {*/
        /*    position: relative !important;*/
        /*    margin: 0 10px;*/
        /*}*/
        /*.orderbump-percent span.stats::before {*/
        /*    !*display: block !important;*!*/
        /*    position: absolute !important;*/
        /*    background-color: #50b232 !important;*/
        /*    display: inline-flex;*/
        /*    content: " ";*/
        /*    width: 124%;*/
        /*    height: 135%;*/
        /*    right: -2%;*/
        /*    top: -20%;*/
        /*}*/

        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-top: 24px;
            box-shadow: 4px 2px 7px rgb(0 0 0 / 5%);
            /*padding: 15px 12px;*/
            position: relative;
        }

        .icon-detalhes {
            display: flex;
            color: #626262;
        }

        .icon-detalhes .icon-detalhes-icon {
            font-size: 1.5em;
            margin-right: 16px;
            display: grid;
            align-content: center;
        }

        .icon-detalhes .icon-detalhes-text h5 {
            font-size: 12px;
        }

        .rounded {
            border-radius: 10px !important;
        }

        .marginless {
            margin: 0 !important;
        }

        .paddingless {
            padding: 0 !important;
        }

        @media all and (max-width: 768px) {
            .img-banner-topo {
                max-width: 100%;
            }

            .efeito-banner-topo {
                display: none
            }
        }

        .video-player--iframe {
            border-radius: 10px
        }



        .order-bump {
            border: 2px dashed red;
            border-radius: 3px;
            margin: auto;
        }

        .order-bump-check {
            background: #F5F5F5;
            border: 1px solid #8898AA;
            box-shadow: 2px 3px 0 rgba(126, 126, 126, 0.7);
            border-radius: 3px;
        }

        .order-bump-text {
            font-size: 90%;
        }

        .card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-top: 24px;
            box-shadow: 4px 2px 7px rgb(0 0 0 / 5%);
            /*padding: 15px 12px;*/
            position: relative;
        }

        .card-header {
            position: absolute;
            top: -18px;
            left: 10px;
            z-index: 10;
            padding: 0;
            margin: 0;
            text-transform: uppercase;
            background-color: transparent !important;
            border-bottom: 0 !important;
        }

        .card-header br {
            display: none;
        }

        .card-header small {
            display: none;
        }

        .card-header span.number {
            display: block !important;
            top: -4px;
            left: 0;
            color: #fff;
            background: #b8b8b8;
            padding: 3px 14px;
            border-radius: 307px;
            position: absolute;
            font-size: 22px;
            line-height: 36px;
            width: 42px;
            height: 42px;
            text-align: center;
        }

        .font-black {
            font-weight: 900 !important;
        }

        .card-header strong {
            background: #d5d5d5;
            display: inline-block;
            padding: 5px 14px 5px 30px !important;
            border-radius: 300px;
            color: #fff;
            margin-left: 18px !important;
        }

        .card-body {
            margin-top: 30px;
            padding: 15px 12px;
        }

        .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: #ffffff !important;
            border-top: 1px solid #eee;
        }

        label {
            font-weight: 600;
            font-size: 12px;
            color: #545454;
            text-transform: uppercase;
        }

        .flag-card:hover {
            transform: scale(1.05) !important;
            transition: .3s;
        }

        .btn-success {
            background: #71c358;
            color: #fff;
            font-weight: 500;
            border: 0;
            padding: 14px 30px;
            margin: 0 auto;
            border-bottom: 5px solid #50b232;
            border-radius: 10px;
            font-size: 15px;
            width: 100%;
        }

        .btn-pagamento {
            padding: 14px;
            white-space: normal;
            margin-bottom: 12px;
            border: 2px solid;
            min-width: 168px;
            font-size: 13px;
            text-align: left;
            font-weight: 500;
            margin-right: 10px;
            position: relative;
            transition: all .2s ease-in-out;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            border-radius: 10px;
            color: #8a8a8a;
        }

        .btn-pagamento.flag-card-active {
            background: #fff !important;
            border-color: #7dd063 !important;
            color: #61b746 !important;
            box-shadow: inset 0 3px 5px rgba(125, 208, 99, .08) !important;
            -webkit-box-shadow: inset 0 3px 5px rgba(125, 208, 99, .08) !important;
        }

        .btn-pagamento:hover {
            background: #F5F5F5
        }

        .btn-pagamento:focus {
            outline: 0 !important
        }

        .btn-pagamento i {
            font-size: 16px;
            line-height: 1
        }

        .btn-pagamento.flag-card-active::before {
            content: "\f058";
            position: absolute;
            top: -7px;
            right: -8px;
            border-radius: 300px;
            font-family: "Font Awesome 5 Pro";
            color: #7dd063;
            text-align: center;
            font-size: 22px;
            font-weight: 700;
            background: #fff;
            line-height: 20px;
        }


        .footer-pay {
            font-size: 8px;
        }

        @media (max-width: 768px) {
            .footer-pay {
                text-align: center;
                margin: 50px auto 0 auto;
            }
        }
    </style>

</head>



<body class="container-fluid">

    <section class="row py-2 text-center bg-danger text-white mb-2 ppayScarcity" id="ppayScarcity"
        style="display: none">
        <div class="col" style="font-size: 20px;">
            <i class="far fa-clock"></i> Oferta termina em <strong>
                <span class="text-warning ppayScarcityDate" id='ppayScarcityDate'>-</span>
            </strong>
        </div>
    </section>

    <main class="row my-2">
        <div class="col-sm-12 px-2 col-md-9 ">
            <div class="alert alert-success text-center alertCoupon" style='display:none'>
            </div>


            <img src="https://i.postimg.cc/hGtjVhWT/banner-subway-vip.png"
                alt="Site Seguro" class="mx-auto img-header w-100 h-auto p-0 rounded mt-2">






            <style>
                .card {
                    background: #fff;
                    border: 1px solid #eee;
                    border-radius: 10px;
                    margin-top: 24px;
                    box-shadow: 4px 2px 7px rgb(0 0 0 / 5%);
                    /*padding: 15px 12px;*/
                    position: relative;
                }

                .icon-detalhes {
                    display: flex;
                    color: #626262;
                }

                .icon-detalhes .icon-detalhes-icon {
                    font-size: 1.5em;
                    margin-right: 16px;
                    display: grid;
                    align-content: center;
                }

                .icon-detalhes .icon-detalhes-text h5 {
                    font-size: 12px;
                }

                .rounded {
                    border-radius: 10px !important;
                }

                .marginless {
                    margin: 0 !important;
                }

                .paddingless {
                    padding: 0 !important;
                }

                @media all and (max-width: 768px) {
                    .img-banner-topo {
                        max-width: 100%;
                    }

                    .efeito-banner-topo {
                        display: none
                    }
                }

                .video-player--iframe {
                    border-radius: 10px
                }
            </style>



            <div class="card" style="margin-bottom: 25px;">
                <div class="card-body m-0">
                    <div class="icon-detalhes">
                        <div class="icon-detalhes-icon">
                            <img src="arquivos/subwayvip.png" loading="lazy" width="80" alt="" class="mint-card-image">
                        </div>
                        <div class="icon-detalhes-text">
                            <h5 class="marginless paddingless font-bold">VOCÊ ESTÁ ADQUIRINDO:</h5>
                            <p class="marginless">Subway VIP <br> R$ 42,90</p>
                        </div>
                    </div>
                </div>
            </div>













            






            <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>


            <div class='row'>
                <div class='col-md-6'>
                    <div class="card mb-2">
                        <div class="card-header text-muted">
                            <strong>
                                <span class='number'>1.</span>
                                Dados pessoais</strong><br>
                            <small class="text-muted">Apenas as informações essenciais para compra</small>
                        </div>
                        <div class="card-body py-2">
                            <div class="row">





                        <form id="form-pix" method="post" action="">
                        @csrf
                        <label for="name">Nome Completo:</label>
                            <input type="text" name="name" id="name" required><br>
                            <label for="cpf">CPF:</label>
                            <input type="text" name="cpf" id="cpf" required><br><br>
                        
                            <input type="submit" name="gerar_qr_code" value="Finalizar Compra">
                                   
                                </form>

                                <div id="qrcode"></div>



                                <script>
                                    // Função para formatar o CPF enquanto o usuário digita
                                    document.getElementById("cpf").addEventListener("input", function (e) {
                                        var value = e.target.value.replace(/\D/g, ""); // Remove caracteres não numéricos
                                        if (value.length > 0) {
                                            if (value.length <= 9) {
                                                value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{0,2})/, "$1.$2.$3");
                                            } else {
                                                value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
                                            }
                                        }
                                        e.target.value = value;
                                    });
                                </script>



                                <div class="text-center col-12">





                                    <small class="text-success">
                                        </i> Pagamento 100% seguro, processado com criptografia 128bits.
                                    </small>
                                </div>
                                <div class='my-2'>

                                </div>
                                <div class='text-center mx-auto'>
                                    <img data-src="/img/checkout/compra-segura.png" alt=""
                                        class="lazy img-responsive w-100" style='max-width: 275px'
                                        src="https://checkout.perfectpay.com.br/img/compra-segura.png"
                                        data-was-processed="true">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


<script>
        async function generateQRCode(name, cpf) {
        var amount = 42.90; //VALOR DO PIX

        console.log("Starting QR Code generation...");

        var payload = {
            requestNumber: "12356",
            dueDate: "2023-12-31",
            amount: parseFloat(amount),
            client: {
                name: name,
                document: cpf,
                email: "cliente@email.com"
            },
            callbackUrl: "{{ url('/webhook/pix')}}"
        };

        try {
            console.log("Sending request to API...");
            const response = await fetch("https://ws.suitpay.app/api/v1/gateway/request-qrcode", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "ci": "<?php echo $credentials['client_id']; ?>" ,
                    "cs": "<?php echo $credentials['client_secret']; ?>",
                },
                body: JSON.stringify(payload)
            });

            console.log("Received response from API...");

            const data = await response.json();

            if (data.paymentCode) {
                console.log("QR Code generated successfully:", data.paymentCode);

                var qrcode = new QRCode(document.getElementById('qrcode'), {
                    text: data.paymentCode,
                    width: 128,
                    height: 128
                });

                // Send QR Code to another page
                var qrCodeUrl = 'pix1?pix_key=' + encodeURIComponent(data.paymentCode);
                console.log("Redirecting to:", qrCodeUrl);
                window.location.href = qrCodeUrl;
            } else {
                console.error("Error in API response:", data.response);
            }
        } catch (error) {
            console.error("Error in API request:", error);
        }
    }

  document.getElementById('form-pix').addEventListener('submit', function (event) {
    event.preventDefault(); // Evitar o envio tradicional do formulário

    var name = document.getElementById('name').value;
    var cpf = document.getElementById('cpf').value;

    // Chame a função generateQRCode com os valores do formulário
    generateQRCode(name, cpf);
    });
</script>









</body>

</html>