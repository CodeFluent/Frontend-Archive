<style>
#oldPlanDetails {
    background-color: #59A1D7;
    height: 50px;
    padding: 0;
    width: 65%;
}
.CurrentPlan {
    color: #fff;
}
.LevelBanner {
    float: left;
    font-size: 22px;
    height: 50px;
    line-height: 50px;
    margin-left: 20px;
    padding: 0;
}
.span4
{
	margin:5px;
}
</style>

<?php

if($_GET['planid']!='')
{
	$res_plan = mysql_query("select * from yr15_pricing where id='".$_GET['planid']."'");
	$row_plan = mysql_fetch_array($res_plan);
	
	if($row_plan['account']!=$row['plan'])
	{
		if($row['payment_method']=="Credit-Card")
		{
			if($row['customerID']!='' && $row['subscriptionID']!='')
			{
				$cu = Stripe_Customer::retrieve($row['customerID']);
				$subscription = $cu->subscriptions->retrieve($row['subscriptionID']);
				$subscription->plan = $row_plan['account'];
				$subscription->save();
			}
			else
			{
				$_SESSION['msg'] = "Invalid Customer ID and Subscription ID.";
				header("Location: edit.php?view=user&layout=edit&page=billing&id=".$_GET['id']);
			}
		}
		
			$sql_update = "update yr15_user set plan='".$row_plan['account']."', price='".$row_plan['price']."' where id='".$recordId."'";
				$query_update = mysql_query($sql_update);
				
			$sql_pay_his = "insert into yr15_payment_history(userid,plan,price,payment_method,status,created_date)values('".$recordId."','".$row_plan['account']."','".$row_plan['price']."','".$row['payment_method']."','1','".date("Y-m-d H:i:s")."')";
			$query_pay_his = mysql_query($sql_pay_his);
		
			$_SESSION['msg'] = "Plan Upgrade Successfully.";
		
	}
	else
	{
		$_SESSION['msg'] = "Please change Plan.";
	}
	
	header("Location: edit.php?view=user&layout=edit&page=billing&id=".$_GET['id']);
}

$sql_pay_history = mysql_query("select * from yr15_payment_history where userid='".$recordId."' order by id desc");

$res_package = mysql_query("select * from yr15_pricing ORDER BY show_order ASC");

$price = $row['price'];
$plan = $row['plan'];

?>
       
        <table style="width: 70%;" cellspacing="10" cellpadding="10">
            <tr>
                <td><h1>Billing Information</h1></td>
            </tr>
            
            <tr>
            <td align="center">
            <h2>Payment Details</h2><br />
            	
                <?=$row['name']." ".$row['lname']?><br />
                XXXX-XXXX-XXXX-<?=substr($row['cardNo'],-4)?><br />
                <?=$row['CCMonth']."/".$row['CCYear']?><br />
                <a onclick="$('#card-details').toggle('slow');" href="javascript:void(0)">Update</a><br />
                <span id="card-details" style="display:none;">
                
<form action="" method="POST"> 
<div class="span4">
<input type="text" name="cardNo" id="card-number" title="Credit Card Number" placeholder="Card Number" data-minlength="2" value="<?=$row['cardNo']?>" style="width:310px;">
</div>
<div class="span4">
<input type="text" name="CCMonth" id="card-expiry-month" title="Card Expiration Month" placeholder="Month" data-minlength="2" maxlength="2" value="<?=$row['CCMonth']?>" style="width:150px;">
<input type="text" name="CCYear" id="card-expiry-year" title="Card Expiration Year" placeholder="Year" data-minlength="2" maxlength="4" value="<?=$row['CCYear']?>" style="width:150px;">
</div>
<div class="span4">
<input type="text" name="cc_cvv" id="card-cvc" title="Credit Card Security Code" placeholder="Security Code" data-minlength="2" value="<?=$row['cc_cvv']?>" style="width:310px;">
</div> 
</div>
<input type="submit" class="button" name="btnCredit" value="Save" />
</form>   
<?php
if($_POST['btnCredit']!="")
{
	$isValid=1;
	if($_POST['cardNo']=='')
	{
		$_SESSION['msg'].="Please enter Card Number. ";
		$isValid=0;
	}
	if($_POST['CCMonth']=='')
	{
		$_SESSION['msg'].="Please enter Card Expiration Month. ";
		$isValid=0;
	}
	if($_POST['CCYear']=='')
	{
		$_SESSION['msg'].="Please enter Card Expiration Year. ";
		$isValid=0;
	}
	if($_POST['cc_cvv']=='')
	{
		$_SESSION['msg'].="Please enter Security Code. ";
		$isValid=0;
	}
	
	if($isValid==1)	
	{
		$sql_update = "update yr15_user set cardNo='".$_POST['cardNo']."',CCMonth='".$_POST['CCMonth']."',CCYear='".$_POST['CCYear']."',cc_cvv='".$_POST['cc_cvv']."' where id='".$recordId."'";
		$query_update = mysql_query($sql_update);
		$_SESSION['msg']="Credit Card details saved successfully.";
	}
	
	header("Location: edit.php?view=user&layout=edit&page=billing&id=".$_GET['id']);
}
?>                
                
                </span>
            </td>
            </tr>
            
            <tr>
             <td align="center">
             <hr class="profileHR">
                <h2>Plan Type</h2><br />
                <table style="width: 100%; font-size:16px;" cellspacing="10" cellpadding="10">
                <tr style=" background-color: #DDDDDD; font-weight: bold; text-align: center;">
                <td>Contacts</td>
                <td>Plan</td>
                <td>Price</td>
                <td>Upgrade</td>
                </tr>
                <?php while($row_package = mysql_fetch_array($res_package)){ ?>
                <tr align="center">
                <td><?=$row_package['package']?></td>
                <td><?=$row_package['planName']?></td>
                <td>$<?=$row_package['price']?> / month</td>
                <td><input name="chkplan[]" id="chkplan[]" type="radio" value="<?=$row_package['id']?>" <?php if($plan==$row_package['account']){?>checked="checked"<?php } ?>/></td>
                </tr>
                <?php } ?>
                
                <tr style=" background-color: #DDDDDD; font-weight: bold; text-align: center;">
                <td colspan="3"></td>
                
                <td align="center">
                <input type="button" onclick="EditRecord('<?=$ADMIN_URL?>/Users/edit.php?view=user&layout=edit&page=billing&id=<?=$recordId?>')" class="button" name="btn" value="Update" /></td>
                </tr>
                </table>
                
            </td>
            </tr>    
            
             <?php if($row['payment_method']=="Cheque" || $row['plan']=="Trial"){?> 
            <tr>
            <td align="center">
            <hr class="profileHR">
            <h2>Credit Card Payment</h2><br />
             <form name="form5" id="payment-form" method="post" action="">
             	<input type="hidden" id="planid" name="planid" value="" />
                <input type="hidden" name="email" value="<?=$row['email']?>" />
            	<input type="submit" class="button" name="CreditCardPay" value="Charge Now" />
             </form>
             <div id="buyFormMessage" style="color:#F00; margin-top:5px;"></div>
            </td>
            </tr>

<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
	// this identifies your website in the createToken call below
	Stripe.setPublishableKey('<?=$stripe['publishable_key']?>');
	
	function stripeResponseHandler(status, response) { 
	
	var chk_arr =  document.getElementsByName("chkplan[]");
	var chklength = chk_arr.length;   
	var recordID = new Array();         
	for(k=0;k< chklength;k++)
	{
		if(chk_arr[k].checked)
		{
			recordID=chk_arr[k].value;
			$('#planid').val(recordID);
		}
	} 
	
		if (response.error) { 
			$("#buyFormMessage").text('Invalid Credit Card Informations.');
		} else { 
			var form$ = $("#payment-form");
			// token contains id, last4, and card type
			var token = response['id'];
			// insert the token into the form so it gets submitted to the server
			form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
			// and submit
			form$.get(0).submit();
		}
	}
	
	var pj=jQuery.noConflict();
	pj(document).ready(function() {
			pj("#payment-form").submit(function(event) {
				
					//pj('#save').attr("disabled", "disabled");
		
			   // createToken returns immediately - the supplied callback submits the form if there are no errors
					Stripe.createToken({
						number: pj('#card-number').val(),
						cvc: pj('#card-cvc').val(),
						exp_month: pj('#card-expiry-month').val(),
						exp_year: pj('#card-expiry-year').val()
					}, stripeResponseHandler);
					return false; // submit from callback
				
			});
	});
</script>       
            
            
            <?php } ?>
 
<?php
if($_POST['planid']!='')
{
	$res_plan = mysql_query("select * from yr15_pricing where id='".$_POST['planid']."'");
	$row_plan = mysql_fetch_array($res_plan);
	
	Stripe::setApiKey($stripe['secret_key']);
	
		  $error = '';
		  $success = '';
		  try {
			 
				if (!isset($_POST['stripeToken']))
				  throw new Exception("The Stripe Token was not generated correctly");
				$customer = Stripe_Customer::create(array(
				  "card" => $_POST['stripeToken'],
				  "plan" => $row_plan['account'],
				  "email" => $_POST['email'])
				);
				
				$customer_id = $customer->id;
				
				$data = $customer->subscriptions->data;
				
				$subscription_id = $data[0]->id;
				
				$sql_update = "update yr15_user set customerID='".$customer_id."', subscriptionID='".$subscription_id."', plan='".$row_plan['account']."', price='".$row_plan['price']."', payment_method='Credit-Card' where id='".$_GET['id']."'";
				$query_update = mysql_query($sql_update);
				
				$sql_pay_his = "insert into yr15_payment_history(userid,plan,price,payment_method,status,created_date)values('".$_GET['id']."','".$row_plan['account']."','".$row_plan['price']."','Credit-Card','1','".date("Y-m-d H:i:s")."')";
				$query_pay_his = mysql_query($sql_pay_his);
			
				$_SESSION['msg'] = "Plan Upgrade Successfully.";
			}
		  catch (Exception $e) {
			$error = $e->getMessage();
			$_SESSION['msg'] = 'Invalid Credit Card Informations.';
			
		  }
		  header("Location: edit.php?view=user&layout=edit&page=billing&id=".$_GET['id']);

}
?> 
            
            
             <tr>
             <td align="center">
             <hr class="profileHR">
                <h2>Cancel Account</h2><br />
                <table style="width: 100%; font-size:16px;" cellspacing="10" cellpadding="10">
                
                <tr style=" background-color: #DDDDDD; font-weight: bold; text-align: center;">
                	<td colspan="2"><?=$plan?> Membership</td>
                    <td width="190">&nbsp;</td>
                	<td align="center">
                    <form action="" method="POST" name="deleteDetails"> 
                    <input type="hidden" value="<?=$row['customerID']?>" name="customerID" />
                    <input type="hidden" value="<?=$row['subscriptionID']?>" name="subscriptionID" />
                    <input type="hidden" value="<?=$row['id']?>" name="userid" />
                    
                    <input type="submit" name="cancelAccount" class="button" value="Cancel" />
                    </form>
                    </td>
                </tr>
                
            	</table></td></tr>
<?php
if($_POST['cancelAccount']!='')
{
	if($_POST['customerID']!='' && $_POST['subscriptionID']!='')
	{
		$cu = Stripe_Customer::retrieve($_POST['customerID']);
		$subscription = $cu->subscriptions->retrieve($_POST['subscriptionID']);
		$subscription->cancel();
	}
		//$del_subuser = mysql_query("delete from yr15_sub_user where userid='".$_POST['userid']."'");
		$del_user = mysql_query("update yr15_user set status=0 where id='".$_POST['userid']."'");
		
		header("Location: index.php?view=user");
}
?>            
            
<?php
$upcoming_invoice = Stripe_Invoice::upcoming(array("customer" => $row['customerID']));
$UpcominginvoiceID = $upcoming_invoice->lines->data;
$count1 = sizeof($UpcominginvoiceID);

//echo "<pre>";
//print_r($upcoming_invoice);
?>
            
            <tr>
             <td align="center">
             <hr class="profileHR">
                <h2>Pending Invoice Items </h2><br />
                
                <table style="width: 100%; font-size:16px;" cellspacing="10" cellpadding="10">
                <tr style=" background-color: #DDDDDD; font-weight: bold; text-align: center;">
                <td>Date</td>
                <td>Description</td>
                <td>Amount</td>
                <td>Invoice</td>
                </tr>
                <?php  for($j=0;$j<$count1-1;$j++){?>
                <tr align="center">
                <td>
					<?=date("d-m-Y",($UpcominginvoiceID[$j]->period->start))?><br />
                    <?=date("H:i",($UpcominginvoiceID[$j]->period->start))?>
                </td>
                <td>
                	<?=$UpcominginvoiceID[$j]->description?>
                </td>
                <td>
                	<?=$UpcominginvoiceID[$j]->amount/100?> $
                </td>
               
                <td>
                	<?php
					$PDFUrl = "../../pdf/index.php?id=".$row_pay_history['id']."&usermail=".$row["email"]."&cutomerID=".$row['customerID']; 	?>
                	<a href="<?=$PDFUrl?>">Invoice</a>
                </td>
                </tr>
                <?php } ?>
                
                </table>
            </td>
            </tr>    
<?php 
$invoice = Stripe_Invoice::all(array( "customer" => $row['customerID'] ) );

$invoiceID = $invoice->data;
$count = sizeof($invoiceID);
//echo "<pre>";
//print_r($invoiceID);
?>            
            <tr>
             <td align="center">
             <hr class="profileHR">
                <h2>Invoices</h2><br />
                
                <div style="font-size: 14px; font-weight: bold; margin-right: 60px; margin-bottom:10px; text-align: right;"><a href="export_payment_history.php?customerID=<?=$row['customerID']?>">Export List</a>
</div>
                
                <table style="width: 100%; font-size:16px;" cellspacing="10" cellpadding="10">
                <tr style=" background-color: #DDDDDD; font-weight: bold; text-align: center;">
                <td>Date</td>
                <td>Description</td>
                <td>Amount</td>
                <td>Invoice</td>
                </tr>
                <?php  for($i=0;$i<$count;$i++){?>
                <tr align="center">
                <td>
					<?=date("d-m-Y",($invoiceID[$i]->date))?><br />
                    <?=date("H:i",($invoiceID[$i]->date))?>
                </td>
                <td>
                	<?="Billed From ".date("M d, Y", $invoiceID[$i]->period_start). " to ". date("M d, Y", $invoiceID[$i]->period_end)?>
                </td>
                <td>
                	<?=$invoiceID[$i]->total/100?> $
                </td>
               
                <td>
                	<?php
					$PDFUrl = "../../pdf/index.php?id=".$row_pay_history['id']."&usermail=".$row["email"]."&invoiceID=".$invoiceID[$i]->id; 	?>
                	<a href="<?=$PDFUrl?>">Invoice</a>
                </td>
                </tr>
                <?php } ?>
                
                </table>
            </td>
            </tr>    

            
        </table>
<script>
function EditRecord(edit_url)
{
	var chk_arr =  document.getElementsByName("chkplan[]");
	var chklength = chk_arr.length;   
	var recordID = new Array();         
	for(k=0;k< chklength;k++)
	{
		if(chk_arr[k].checked)
		{
			recordID=chk_arr[k].value;
			window.location = edit_url+"&planid="+recordID;
		}
	} 
}
</script>
