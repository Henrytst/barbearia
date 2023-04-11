<?php
function head()
{
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/pages/CSS/style.css">"
<?php
}

function menu()
{
    include('\Xampp\htdocs\barbearia\pages\protect.php');
?>      <div class="container-menu">
        <a href="#" class="menu-open">Menu</a>
        </div>
    <nav>
        <div class="overlay"></div>
        <div class="menu">
        <a href="#" class="menu-close">&times;</a> 
        <ul id="ulMenu">
            <li>
                <a href="cadastro.php" class="linkMenu">Início</a>
            </li>
            <li>
                <a href="cadastro.php" class="linkMenu">Cadastro</a>
            </li>
            <li>
                <a href="estoque.php" class="linkMenu">Estoque</a>
            </li>
            <li>
                <a href="fornecedor.php" class="linkMenu">Fornecedor</a>
            </li>
            <li>
                <a href="preparo.php" class="linkMenu">Preparo</a>
            </li>
            <li>
                <a href="cliente.php" class="linkMenu">Cliente</a>
            </li>
            <!--<li>
                <a href="comercial.php" class="linkMenu">Comercial</a>
            </li>-->
            <li>
                <a href="\shakers\pages\logout.php" class="linkMenu sair">Sair</a>
            </li>

        </ul>
    </nav>

<?php
}

function rodape()
{
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="/pages/functions/js/jquerymask/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/pages/functions/js/mascaras.js"></script>
    <script src="/pages/functions/js/functions.js"></script>
<?php
}

function headFormulario()
{
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/pages/CSS/style.css">
<?php
}

function rodapeFormulario()
{
?>
    <!-- Adicionando JQuery -->
    <script src="/pages/functions/js/jquery.js"></script>
    <!-- Adicionando Javascript -->
    <script type="text/javascript" src="/pages/functions/js/jquerymask/dist/jquery.mask.min.js"></script>
    <script type="text/javascript" src="/pages/functions/js/mascaras.js"></script>
    <script type="text/javascript" src="/pages/functions/js/datatimepicker.js"></script>
    <!-- Adicionando Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/pages/functions/js/mascaras.js"></script>
<?php
}
