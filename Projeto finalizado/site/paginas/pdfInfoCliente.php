<?php
require('fpdf/fpdf.php');

//Conecta no banco
include("conexao2.php");

//Faz o select desejado
$result=mysqli_query($conexao,"select id_cliente,nomeCliente,usuario,cep,numeroResi,tipo,cpf from cliente ORDER BY id_cliente");
$number_of_products = mysqli_num_rows($result);

//Inicializa 3 colunas e o total    
$column_id_cliente  = "";
$column_nomeCliente = "";
$column_cep         = "";
$column_numeroResi  = "";
$column_cpf         = "";

//Percorre os dados encontrados e transforma em array
while($row = mysqli_fetch_array($result))
{
	$id_cliente  = $row["id_cliente"];
	$nomeCliente = substr($row["nomeCliente"],0,100);
  $cep         = $row["cep"];
  $numeroResi  = $row["numeroResi"];
  $cpf         = $row["cpf"];

	$column_id_cliente  = $column_id_cliente.$id_cliente."\n";
	$column_nomeCliente = $column_nomeCliente.$nomeCliente."\n";
  $column_cep         = $column_cep.$cep."\n";
  $column_numeroResi  = $column_numeroResi.$numeroResi."\n";
  $column_cpf         = $column_cpf.$cpf."\n";



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
$pdf->SetX(10);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(70,6,'NOME',1,0,'C',1);
$pdf->SetX(133);
$pdf->Cell(35,6,'CEP',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(35,6,'RESIDENCIA',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(33,6,'CPF',1,0,'C',1);
$pdf->Ln();

//Agora mostra as 3 colunas
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(20,6,$column_id_cliente,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(70,6,$column_nomeCliente,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(133);
$pdf->MultiCell(32,6,$column_cep,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(35,6,$column_numeroResi,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(33,6,$column_cpf,1,'C');


//Crie linhas (caixas) para cada Produto)
//Se você não usar o código a seguir, não criará as linhas que separam cada linha
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(10);
	$pdf->MultiCell(190,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>