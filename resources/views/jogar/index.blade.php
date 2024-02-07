
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="A simple HTML5 Template">
    <meta name="author" content="dron">
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="https://i.ibb.co/xzbXHQr/Favicon-Fruit-Pix.png">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="images/index.css">
    
    <title>Fruit Ninja 🍓 | Jogo da Frutinha</title>
</head>
<body>
    <div id="extra"></div>
    <div id="desc">
        <div>Jogo da Frutinha<a href="http://jogodasfrutinha.com/" target="_blank"></a></div>
        <div id="browser"></div>
    </div>
    <div id="sair" onclick="gameEnd()" style="z-index: 9999; cursor: pointer;">
        ENCERRAR APOSTA
    </div>
    
        
    <script>
        var aposta = @json($aposta);
        var token = @json($token);
        var vst = @json($saldo);
        var multiplicador = @json($multiplicador);
        if(!multiplicador){
            multiplicador = 1
        }
        
        multiplicador = parseInt(multiplicador);
        vst = parseInt(vst);

        if(vst <= 0){
            location.href = "../painel"
        }

    </script>

    
    <script src="../scripts/all.js"></script>
    

    
</body>
</html>