<?php
require_once('../Validations/session.php');
//require_once('../Validations/list_links.php');
?>
<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="../assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#btn-ajax-jquery").click(function() {
                $.ajax({
                    type: 'POST',
                    url: "../Validations/list_links.php",
                    dataType: "html",
                    beforeSend: function() {
                        $("#resposta").html("Aguarde...");
                    },
                    success: function(data) {
                        $("#resposta").html(data);
                    },
                    error: function(err) {
                        console.log("Error: " + err.status);
                        console.log("Error Message: " + err.statusText);
                    }
                });
            });
        });


        function ajaxExecute() {
            var result = document.getElementById("resposta");
            var ajax;

            // Instancia o AJAX
            if (navigator.appName == "Microsoft Internet Explorer") {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } else {
                ajax = new XMLHttpRequest();
            }

            // Faz requisição
            ajax.open("GET", "../Validations/list_links.php", true);

            ajax.onreadystatechange = function() {
                if (ajax.readyState == 1) {
                    result.innerHTML = "Aguarde...";
                }
                if (ajax.readyState == 4) {
                    // Status OK            
                    if (ajax.status == 200) {
                        // Exibe o resultado
                        result.innerHTML = ajax.responseText;
                    } else {
                        // Em caso de erro mostra a mensagem
                        result.innerHTML = ajax.statusText;
                    }
                }
            }
            ajax.send(null);
        }

        setInterval(ajaxExecute, 2000);
    </script>
    <title>Dashboard</title>
</head>

<body onload="ajaxExecute()">
    <header>
        <nav class="navbar navbar-light" style="background-color: #2c82a7;">
            <div class="">
                <a href="./home.php"><img src="../assets/img/smallLogo.png" alt="smLogo" width="40px" height="40px"></a>
            </div>
            <a class="navbar-brand">WEBTrackink</a>
            <a href="../Validations/destroy_session.php"><img src="../assets/img/logout.png" alt="Logout" width="30px" height="30px"></a>
        </nav>
    </header>
    <article>
        <div class="container">
            <div class="row row justify-content-md-center">
                <div class="col-sm-8">
                    <form action="../Validations/insert_link.php" method="POST">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Link:</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="url" name="url" required />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Status:</label>
                            <div class="col-sm-2">
                                <select class="form-control" name="status">
                                    <option value=true>Ativo</option>
                                    <option value=false>Inativo</option>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="resposta"></div>

    </article>
    <?php //require_once('../Validations/list_links.php'); 
    ?>
</body>

</html>