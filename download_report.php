<?php
include('config.php');
require('fpdf.php');
if (
    isset($_GET['dept']) && !empty($_GET['dept'])
    && isset($_GET['AY']) && !empty($_GET['AY'])
) {
    // Store the selected academic year and department values in variables
    $dept = $_GET['dept'];
    $AY = $_GET['AY'];




    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image('assets/images/kit-logo.png', 10, 3, 40, 20);

    $pdf->Ln(15);
    // Draw a line
    $pdf->SetDrawColor(0, 0, 0); // set the color to black
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());


    // Add a title to the PDF
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->Cell(0, 10, "History Of Students Meetings  $dept", 0, 1, 'C');

    $pdf->Ln(5);

    // Add a table to the PDF
    $pdf->SetFont('helvetica', 'B', 8);
    $pdf->Cell(15, 10, 'PRN', 1, 0, 'C');
    $pdf->Cell(10, 10, 'Year', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Name', 1, 0, 'C');
    $pdf->Cell(10, 10, 'Dept', 1, 0, 'C');
    $pdf->Cell(15, 10, 'Class', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Mobile No', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Secondary No', 1, 0, 'C');

    $result1 = mysqli_query($conn, "SELECT * FROM graduated_pinfo WHERE Department = '$dept' AND academic_year = '$AY'");


    $pdf->SetFont('Arial', '', 6);
    while ($row = mysqli_fetch_assoc($result1)) {
        $pdf->Cell(15, 10, $row['PRN'], 1, 0, 'C');
        $pdf->Cell(10, 10, $row['academic_year'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['Name'], 1, 0, 'C');
        $pdf->Cell(10, 10, $row['Department'], 1, 0, 'C');
        $pdf->Cell(15, 10, $row['Class'], 1, 1, 'C');
    }

    mysqli_close($conn);

    // Output the PDF
    $pdf->Output();

}
?>