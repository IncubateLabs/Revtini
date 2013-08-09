<?php require_once('../Connections/revtini_db.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

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
	
	mysql_select_db($database_revtini_db, $revtini_db);
	$query_smsLog = "INSERT INTO `sms_log` (`id`, `from`, `body`, `fromCountry`, `fromCity`, `fromState`, `fromZip`, `smsMessageSid`, `timestamp`, `mId`) VALUES (NULL, '".$from."', '".$requestCode."', '".$requestCountry."', '".$requestCity."', '".$requestState."', '".$requestZip."', '".$requestSid."', CURRENT_TIMESTAMP, '1');";
	$smsLog_results = mysql_query($query_smsLog, $revtini_db) or die(mysql_error());
	
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

//mysql_free_result($rs_sms_log);
?>