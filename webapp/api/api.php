<?php

if(isset($_REQUEST["Body"])){
  	//try to catch details sent from SMS requests
	if(isset($_REQUEST["From"])){
		$from = $_REQUEST["From"];
	}else{
		$from = "Unknown";
	}
	if(isset($_REQUEST["Body"])){
		$requestCode = strtoupper(trim($_REQUEST["Body"])); //Required parameter - Code
	}
	if(isset($_REQUEST["SmsSid"])){
		$requestSid = $_REQUEST["SmsSid"];
	}
	if(isset($_REQUEST["FromCountry"])){
		$requestCountry = $_REQUEST["FromCountry"];
	}
	if(isset($_REQUEST["FromCity"])){
		$requestCity = $_REQUEST["FromCity"];
	}
	if(isset($_REQUEST["FromState"])){
		$requestState = $_REQUEST["FromState"];
	}
	if(isset($_REQUEST["FromZip"])){
		$requestZip = $_REQUEST["FromZip"];
	}	
	
	header("content-type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";		
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