<?php
$name="";
$account="";
$address="";
$message="";
//إستقبال البيانات من الحقول   
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$name=$_POST["cus_name"];
	$account=$_POST["acc_num"];
	$address=$_POST["address"];
	$message=$_POST["squander"];
}
//معلومات الإتصالبقاعدة البيانات
$server="localhost";
$username="root";
$password="";
$database="mydb";
//إنشاء الإتصال
$conn=new mysqli($server,$username,$password,$database);
//إختبار الإتصال
if($conn->connect_error){
	die("connection failed:".$conn->connect_error);
}
//إنشاء الجدول
	$sql="CREATE TABLE MobileType(id int(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY ,cus_name VARCHAR(35) NOT NULL,acc_num int(10) 
NOT NULL,address TEXT(30) NOT NULL,phone_no int(15) NOT NULL,reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
	if ($conn->query($sql)===TRUE){
		echo "TABLE Mobile Type created succesfully";
	}
	else{
		echo "Error creating Table:".$conn->error;
	}
	//إدخال البيانات
	$sql="INSERT INTO MobileType(cus_name,acc_num,address,squander) VALUES('$name','$account','$address','$message')";
if (mysqli_query($conn,$sql)) {
	echo "Information sended successfully";
}
else{
	echo "ERROR:".$sql."br".mysqli_error($conn);
}
	$conn->close();
 ?>
