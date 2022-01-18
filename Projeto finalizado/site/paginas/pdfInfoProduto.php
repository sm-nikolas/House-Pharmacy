<?php
require('fpdf/fpdf.php');

//Conecta no banco
include("conexao2.php");

//Faz o select desejado
$result=mysqli_query($conexao,"select codProduto,nomeProduto,preco,estoque from produto ORDER BY codProduto");
$number_of_products = mysqli_num_rows($result);

//Inicializa 3 colunas e o total    
$column_codProduto  = "";
$column_nomeProduto = "";
$column_preco       = "";
$column_estoque     = "";



//Percorre os dados encontrados e transforma em array
while($row = mysqli_fetch_array($result))
{
	$codProduto     = $row["codProduto"];
    $nomeProduto    = substr($row["nomeProduto"],0,100);
    $preco          = $row["preco"];
    $estoque        = $row["estoque"];

	$column_codProduto  = $column_codProduto.$codProduto."\n";
    $column_nomeProduto = $column_nomeProduto.$nomeProduto."\n";
    $column_estoque     = $column_estoque.$estoque."\n";
    $column_preco       = $column_preco.$preco."\n";
    
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
$pdf->SetX(30);
$pdf->Cell(35,6,'Codigo Produto',1,0,'C',1);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(65);
$pdf->Cell(60,6,'Nome Produto',1,0,'C',1);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(125);
$pdf->Cell(30,6,'Preco(R$)',1,0,'C',1);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(155);
$pdf->Cell(25,6,'Estoque',1,0,'C',1);
$pdf->Ln();

//Agora mostra as 3 colunas
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(35,6,$column_codProduto,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(60,6,$column_nomeProduto,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(30,6,$column_preco,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(25,6,$column_estoque,1,'C');


//Crie linhas (caixas) para cada Produto)
//Se você não usar o código a seguir, não criará as linhas que separam cada linha
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(30);
	$pdf->MultiCell(150,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>