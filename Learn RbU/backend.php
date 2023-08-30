 / <?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];

//Database connection
$conn= new mysqli('localhost:8080','root','','hrtc');
if($conn->connect_error){
	die('connection failed : '$conn->connect_error);
}else{
	$stmt = $conn->prepare("inser into login{Username,Password)
	values(?,?,)");
	$stmt->bind_param("sisss",$Username,$Password);
	$stmt->exeute();
	echo "login successfully...";
	$stmt->close();
	$conn->close();
}
<!--[if lte IE 8]>
<link rel="stylesheet"  href="menuie.css" type="text/css" media="screen"/>
<link rel="stylesheet"  href="vmenuie.css" type="text/css" media="screen"/>
<![endif]-->

<!--[if IE 7]>
<style type="text/css" media="screen">
#ttr_vmenu_items  li.ttr_vmenu_items_parent {margin-left:-16px;font-size:0px;}
</style>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="html5shiv.js">
</script>
<script type="text/javascript" src="respond.min.js">
</script>
<![endif]-->

C:\xampp\htdocs\Nishant,Anil,Rohit,Simran,Shagun,Vijay Laxmi\images\image30.jpg
C:\xampp\htdocs\Nishant,Anil,Rohit,Simran,Shagun,Vijay Laxmi\images\image30.jpg