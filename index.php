<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Fiscal</title>
</head>
<body>
<h1>Nota Fiscal</h1>
<?php
$nmCliente = $_POST['nmCliente'];
$nmProduto1 = $_POST['nmProduto1'];
$nmProduto2 = $_POST['nmProduto2'];
$vlProduto1 = $_POST['vlProduto1'];
$vlProduto2 = $_POST['vlProduto2'];
$vlPago = $_POST['vlPago'];

$vlGasto = "N/A";
$troco = "N/A";
$corValor = "black";

$produtosValidos = is_numeric($vlProduto1) and is_numeric($vlProduto2);
$vlPagoValido = is_numeric($vlPago);

if ($produtosValidos) {
    $vlGasto = (double)$vlProduto1 + (double)$vlProduto2;
}

if ($produtosValidos and $vlPagoValido) {
    $troco = (double)$vlPago - (double)$vlGasto;
    $corValor = $vlPago - $vlGasto < 0 ? "red" : "black";
}

$vlGastoFormatado = number_format((double)$vlGasto, 2, ',', '');
$trocoFormatado = number_format((double)$troco, 2, ',', '');

echo "<div class=\"nmCliente\">Nome do Cliente: $nmCliente</div>";
echo "<div class=\"nmCliente\">Valor Gasto: R$$vlGastoFormatado</div>";
echo "<div class=\"nmCliente\" style=\"color: $corValor\">Troco: R$$trocoFormatado</div>";
?>
</body>
</html>
