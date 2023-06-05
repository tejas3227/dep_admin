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
    $pdf->Cell(0, 10, "Assignment Report for Department $dept", 0, 1, 'C');


    $result = mysqli_query($conn, "SELECT * FROM assign WHERE `Department` = '$dept' ORDER BY TID");
    $count = mysqli_num_rows($result);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, "Total Assigned Students: $count", 0, 1, 'C');

    // Add a table to the PDF
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'PRN', 1, 0, 'C');
    $pdf->Cell(90, 10, 'Name', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Class', 1, 1, 'C');

    $pdf->SetFont('Arial', '', 12);
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(40, 10, $row['PRN'], 1, 0, 'C');
        $pdf->Cell(90, 10, $row['Name'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['Class'], 1, 1, 'C');
    }

    mysqli_close($conn);

    // Output the PDF
    $pdf->Output($dept . '_Assignment_Report.pdf', 'D');

}
?>