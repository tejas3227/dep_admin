<?php
require('fpdf.php');

include('config.php');

// Create new PDF object
$pdf = new FPDF();

// Add new page to PDF
$pdf->AddPage();

$pdf->Image('assets/images/kit-logo.png', 10, 3, 40, 20);

$pdf->Ln(15);
// Draw a line
$pdf->SetDrawColor(0, 0, 0); // set the color to black
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

// Set font for document
$pdf->SetFont('Arial', 'B', 14);

// Add title to PDF

if (
    isset($_GET['dept']) && !empty($_GET['dept'])
    && isset($_GET['year']) && !empty($_GET['year'])
) {
    // Store the selected academic year and department values in variables
    $dept = $_GET['dept'];
    $year = $_GET['year'];

    $pdf->Cell(0, 10, "Assigned Students to Teachers $dept", 0, 1, 'C');

    // Add subtitle with total assigned students
    $result = mysqli_query($conn, "SELECT * FROM assign WHERE `Department` = '$dept' AND `Class` = '$year'");
    $count = mysqli_num_rows($result);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Total Assigned Students: ' . $count, 0, 1, 'C');

    // Add table headers to PDF
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(25, 10, 'PRN', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Name', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Assigned To', 1, 0, 'C');
    $pdf->Cell(15, 10, 'TID', 1, 0, 'C');
    $pdf->Cell(60, 10, 'TName', 1, 0, 'C');
    $pdf->Ln();



    // Add table rows to PDF
    $pdf->SetFont('Arial', '', 10);
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(25, 10, $row['PRN'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['Name'], 1, 0, 'C');
        $pdf->Cell(30, 10, 'Assigned To', 1, 0, 'C');
        $pdf->Cell(15, 10, $row['TID'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['tName'], 1, 0, 'C');
        $pdf->Ln();
    }

    // Output PDF file
    $pdf->Output($dept . '_' . $year . '_Assignment_Status_Report.pdf', 'D');

}
?>