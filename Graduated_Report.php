<?php
require('fpdf.php');

include('config.php');

if (
    isset($_GET['year']) && !empty($_GET['year'])
    && (isset($_GET['dept']) && !empty($_GET['dept']))
) {
    // Store the selected academic year and department values in variables
    $year = $_GET['year'];
    $dept = $_GET['dept'];

    // Get data from the database
    $result = mysqli_query($conn, "SELECT * FROM graduated WHERE Department = '$dept' AND Class = '$year' AND Graduated_Status ='Graduated' ");

    // Initialize the PDF document
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Image('assets/images/kit-logo.png', 10, 3, 40, 20);

    $pdf->Ln(15);
    // Draw a line
    $pdf->SetDrawColor(0, 0, 0); // set the color to black
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());


    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, "Graduated Students Report $dept", 0, 1, 'C');


    // Create the table header
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(35, 10, 'Academic year', 1, 0, 'C');
    $pdf->Cell(30, 10, 'PRN', 1, 0, 'C');
    $pdf->Cell(90, 10, 'Name of Student', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Year', 1, 0, 'C');

    // Create the table rows
    $pdf->SetFont('Arial', '', 12);
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Ln();
        $pdf->Cell(35, 10, $row['academic_year'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['PRN'], 1, 0, 'C');
        $pdf->Cell(90, 10, $row['Name'], 1, 0, 'C');
        $pdf->Cell(35, 10, $row['Class'], 1, 0, 'C');
    }

    // Output the PDF
    $pdf->Output($dept . '_' . $year . '_Graduated_Students_Report.pdf', 'D');

    // Close the database connection
    mysqli_close($conn);
}
?>