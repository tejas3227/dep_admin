<?php
require('fpdf.php');

include('config.php');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_GET['dept']) && !empty($_GET['dept'])) {
    $dept = $_GET['dept'];

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image('assets/images/kit-logo.png', 10, 3, 40, 20);

    $pdf->Ln(15);
    // Draw a line
    $pdf->SetDrawColor(0, 0, 0); // set the color to black
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());


    // Add a title to the PDF
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 10, "History Of Students Meetings  $dept", 0, 1, 'C');

    $pdf->Ln(5);

    // Add a table to the PDF
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(25, 10, 'PRN', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Class', 1, 0, 'C');
    $pdf->Cell(10, 10, 'TID', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Subject', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Location', 1, 0, 'C');
    $pdf->Cell(22, 10, 'Date', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Status', 1, 0, 'C');
    $pdf->MultiCell(30, 10, 'Response', 1, 'C');

    $result1 = mysqli_query($conn, "SELECT * FROM meetings WHERE Department = '$dept'");


    $pdf->SetFont('Arial', '', 10);
    while ($row = mysqli_fetch_assoc($result1)) {
        $pdf->Cell(25, 10, $row['PRN'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['Class'], 1, 0, 'C');
        $pdf->Cell(10, 10, $row['TID'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['Subject'], 1, 0, 'C');
        $pdf->Cell(25, 10, $row['Location'], 1, 0, 'C');
        $pdf->Cell(22, 10, $row['Date'], 1, 0, 'C');
        $pdf->Cell(20, 10, $row['Status'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['Response'], 1, 1, 'C');
    }

    mysqli_close($conn);

    // Output the PDF
    $pdf->Output($dept . '_Meetings_History.pdf', 'D');

}
?>