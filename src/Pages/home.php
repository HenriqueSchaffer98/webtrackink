<?php
require_once('../Validations/session.php');
//require_once('../Validations/list_links.php');
require_once('../Templates/header.php');

if (isset($_GET['msg'])) {
    $confirmLink = true;
} else {
    $confirmLink = false;
}
if (isset($_GET['id'])) {
    $delLink = true;
    $id_del = $_GET['id'];
} else {
    $delLink = false;
}

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
        function reload() {
            window.location = 'home.php';
        }

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

        setInterval(ajaxExecute, 300000);

        function abreModal() {
            alert('teste');
            /* $("#myModal").modal({
                show: true
            }); */
        }

        setTimeout(abreModal, 2000);
    </script>
    <title>Dashboard</title>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
</head>

<body onload="ajaxExecute()">

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
                                <button type="" class="btn btn-success" ata-bs-toggle="modal" data-bs-target="#confirmalink">Salvar</button>
                            </div>
                        </div>
                    </form>
                    <button onclick="abreModal()">Teste</button>
                </div>
            </div>
        </div>
        <?php
        if ($confirmLink == true) {
        ?>
            <div class="container">
                <div class="row row justify-content-md-center">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <div class="alert alert-success" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                Link cadastrado com Sucesso!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                setInterval(reload, 5000);
            </script>
        <?php
        } else {
            $confirmLink = false;
        }
        ?>

        <div id="resposta"></div>

        <?php
        if ($delLink == true) {
        ?>
            <script type="text/javascript">
                abreModal();
            </script>
        <?php
        } else {
            $delLink = false;
        }
        ?>
        <!-- ================ MODAL =================== -->

        <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </article>

</body>

</html>