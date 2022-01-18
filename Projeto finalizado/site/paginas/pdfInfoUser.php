<?php
require('fpdf/fpdf.php');

//Conecta no banco
include("conexao2.php");

//Faz o select desejado
$result=mysqli_query($conexao,"select id_cliente,nomeCliente,usuario,cep,numeroResi,tipo from cliente ORDER BY id_cliente");
$number_of_products = mysqli_num_rows($result);

//Inicializa 3 colunas e o total    
$column_id_cliente  = "";
$column_nomeCliente = "";
$column_usuario     = "";

$column_tipo        = "";

//Percorre os dados encontrados e transforma em array
while($row = mysqli_fetch_array($result))
{
	$id_cliente  = $row["id_cliente"];
	$nomeCliente = substr($row["nomeCliente"],0,100);
  $usuario     = $row["usuario"];

  $tipo        = $row["tipo"];


	$column_id_cliente  = $column_id_cliente.$id_cliente."\n";
	$column_nomeCliente = $column_nomeCliente.$nomeCliente."\n";
	$column_usuario     = $column_usuario.$usuario."\n";

  $column_tipo        = $column_tipo.$tipo."\n";
 



	//Soma as preços (TOTAL)

}
mysqli_close($conexao);

//Converte com milhar (.) e decimal (,).


//Cria o PDF
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('img/logoOFC.jpg',85,6,40);

//Posição do Nome dos campos
$Y_Fields_Name_position = 50;
//Posição dos campos
$Y_Table_Position = 56;

//Criando o cabeçalho dos campos preenchendo de cinza
$pdf->SetFillColor(189, 236, 182,     189, 236, 182,    189, 236, 182);
//Nome em negrito
$pdf->SetFont('Arial','B',12);
$pdf->SetDrawColor(0,128,0);
$pdf->SetTextColor(0,0,0);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(20);
$pdf->Cell(25,6,'ID',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(70,6,'NOME',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(47,6,'USUARIO',1,0,'C',1);
$pdf->SetX(162);
$pdf->Cell(25,6,'TIPO',1,0,'C',1);
$pdf->Ln();

//Agora mostra as 3 colunas
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(25,6,$column_id_cliente,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(70,6,$column_nomeCliente,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(47,6,$column_usuario,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(162);
$pdf->MultiCell(25,6,$column_tipo,1,'C');



//Crie linhas (caixas) para cada Produto)
//Se você não usar o código a seguir, não criará as linhas que separam cada linha
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(20);
	$pdf->MultiCell(167,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>