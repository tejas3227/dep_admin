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
    $pdf->Cell(0, 10, "Assigned Students to Teacher for Department $dept", 0, 1, 'C');

    $result = mysqli_query($conn, "SELECT * FROM teachinfo where Department = '$dept'");
    $count = mysqli_num_rows($result);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, "Total Teachers: $count", 0, 1, 'C');

    // Add a table to the PDF
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(10, 20, 'TID', 1, 0, 'C');
    $pdf->Cell(80, 20, 'Name of Teacher', 1, 0, 'C');
    $pdf->Cell(40, 20, 'Department', 1, 0, 'C');
    $pdf->MultiCell(60, 10, 'Number of' . "\n" . 'Students Assigned', 1, 'C');

    $result1 = mysqli_query($conn, "SELECT t.tid, t.tName, t.Department, COUNT(a.PRN) as num_assigned
FROM teachinfo t
LEFT JOIN assign a ON a.TID = t.tid
WHERE t.Department = '$dept'
GROUP BY t.tid") or die(mysqli_error($conn));


    $pdf->SetFont('Arial', '', 12);
    while ($row = mysqli_fetch_assoc($result1)) {
        $pdf->Cell(10, 10, $row['tid'], 1, 0, 'C');
        $pdf->Cell(80, 10, $row['tName'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['Department'], 1, 0, 'C');
        $pdf->Cell(60, 10, $row['num_assigned'], 1, 1, 'C');
    }

    mysqli_close($conn);

    // Output the PDF
    $pdf->Output($dept . '_Teacher_Assignment_Report.pdf', 'D');

}
?>