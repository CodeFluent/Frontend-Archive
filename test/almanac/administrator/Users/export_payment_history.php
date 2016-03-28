<?php
include("../../config.php");

$invoice = Stripe_Invoice::all(array( "customer" => $_GET['customerID'] ) );

$invoiceID = $invoice->data;
$count = sizeof($invoiceID);


$contents .= '"Date","Decription","Amount",';
$contents .="\n";

for($i=0;$i<$count;$i++){
$billed = "Billed From ".date("M d, Y", $invoiceID[$i]->period_start). " to ". date("M d, Y", $invoiceID[$i]->period_end);
$contents .= '"'.date("d-m-Y H:i:s",($invoiceID[$i]->date)).'","'.$billed.'","'.($invoiceID[$i]->total/100).' $",';
$contents .="\n";
} 



$listname = date("d-m-y");
$contents = strip_tags($contents);
Header("Content-Disposition: attachment; filename=$listname.csv");
print $contents;

?>