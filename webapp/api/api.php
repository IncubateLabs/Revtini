<?php require_once('../classes/Sql.class.php'); ?>
<?php
if(isset($_REQUEST["Body"]) || isset($_GET["testdata"])){
  	//try to catch details sent from SMS requests
	if(isset($_REQUEST["From"])){
		$from = $_REQUEST["From"];
	}else{
		$from = "Unknown";
	}
	if(isset($_REQUEST["Body"])){
		$requestCode = strtoupper(trim($_REQUEST["Body"])); //Required parameter - Code
	}
	if(isset($_GET["testdata"])){
		$requestCode = strtoupper(trim($_GET["testdata"])); //Required parameter - Code
	}
	if(isset($_REQUEST["SmsSid"])){
		$requestSid = $_REQUEST["SmsSid"];
	}else{
		$requestSid = "";
	}
	if(isset($_REQUEST["FromCountry"])){
		$requestCountry = $_REQUEST["FromCountry"];
	}else{
		$requestCountry = "";
	}
	if(isset($_REQUEST["FromCity"])){
		$requestCity = $_REQUEST["FromCity"];
	}else{
		$requestCity = "";
	}
	if(isset($_REQUEST["FromState"])){
		$requestState = $_REQUEST["FromState"];
	}else{
		$requestState = "";
	}
	if(isset($_REQUEST["FromZip"])){
		$requestZip = $_REQUEST["FromZip"];
	}else{
		$requestZip = "";
	}
	
	$query_smsLog = "INSERT INTO `sms_log` (`id`, `from`, `body`, `fromCountry`, `fromCity`, `fromState`, `fromZip`, `smsMessageSid`, `timestamp`, `mId`) VALUES (NULL, '".$from."', '".$requestCode."', '".$requestCountry."', '".$requestCity."', '".$requestState."', '".$requestZip."', '".$requestSid."', CURRENT_TIMESTAMP, '1');";
	$smsLog = new Sql;
	$smsLog_results = $smsLog->query($query_smsLog);
	
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	//print_r(array_values($smsLog_results));	
?>
	<Response>
		<Sms>
		Thank you. If you wish to do a detailed review Please visit http://textper.com/revtini/a123.
        Sent by XYZReviews.com
		</Sms>
	</Response>	
<?php
}elseif(isset($_GET["mcode"])){
	$mCode = $_GET["mcode"];
	
	if(isset($_GET["status"])){
		$reviewStatus = $_GET["status"];
	}
	if(isset($_GET["price"])){
		$reviewPrice = $_GET["price"];
	}
	if(isset($_GET["punc"])){
		$reviewPunctuality = $_GET["punc"];
	}
	if(isset($_GET["prof"])){
		$reviewProfesionalism = $_GET["prof"];
	}
	if(isset($_GET["asales"])){
		$reviewAfterSales = $_GET["asales"];
	}
	if(isset($_GET["comments"])){
		$reviewComments = $_GET["comments"];
	}
	header('Content-Type:application/json');		
	echo '{"status":"success","message":"Thank you for your review!"}';
}
?>