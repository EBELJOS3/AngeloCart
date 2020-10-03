<?php
include 'connect.php';
include 'authverify.php';
$uid=mysqli_real_escape_string($link,$_POST['uid']);
$token=mysqli_real_escape_string($link,$_POST['token']);
$case_id=$_POST["case_id"];
$a=array();
$b=array();
if(verify($uid,$token)){
        $sql=mysqli_query($link,"select * from cases where case_id='".$case_id."'");
        $row=mysqli_fetch_assoc($sql);
        $a = array();
        $b = array();
        $b["success"]=100;
        $b["case_id"]=$row["case_id"]; 
        $b["patient_name"]=$row["patient_name"]; 
        $b["age"]=$row["age"]; 
        $b["gender"]=$row["gender"]; 
        $b["address"]=$row["address"]; 
        $b["phone"]=$row["phone"]; 
        $b["primarys"]=$row["primarys"]; 
        $b["primary_name"]=$row["primary_name"]; 
        $b["hospital_name"]=$row["hospital_name"]; 
        $b["bid"]=$row["bid"]; 
        $b["pid"]=$row["pid"]; 
        $b["cid"]=$row["cid"]; 
        $b["risk"]=$row["risk"]; 
        $b["doob_start"]=$row["doob_start"]; 
        $b["doob_stop"]=$row["doob_stop"];  
        $b["approve"]=$row["approve"];
        $b["relation"]=$row["relation"];
        $b["type"]=$row["type"];
        $b["foreigns"]=$row["foreigns"];
        $b["doa"]=$row["doa"];
        $b["dod"]=$row["dod"];
        $b["doi"]=$row["doi"];
        $b["status"]=$row["status"];
        $b["children"]=$row["children"];
        $b["senior"]=$row["senior"];
        $b["sample"]=$row["sample"];
        $b["dos"]=$row["dos"];
        $b["results"]=$row["results"];
        $b["hospital"]=$row["hospital"];
        $b["discharge"]=$row["discharge"];
        $b["lat"]=$row["lat"];
        $b["lng"]=$row["lng"];
        $b["comments"]=$row["comments"];
        $b["update_date"]=$row["update_date"];
        $b["update_uid"]=$row["update_uid"];
        $query2=mysqli_query($link,"select * from centers where cid='".$row["cid"]."'") ;
        $row2=mysqli_fetch_assoc($query2);
        $cname = $row2["cname"];
        $b["cname"]=$cname;    
        $query2=mysqli_query($link,"select * from blocs where bid='".$row["bid"]."'") ;
        $row2=mysqli_fetch_assoc($query2);
        $cname = $row2["bname"];
        $b["bname"]=$cname;
        $query2=mysqli_query($link,"select * from panchayath where pid='".$row["pid"]."'") ;
        $row2=mysqli_fetch_assoc($query2);
        $cname = $row2["pname"];
        $b["pname"]=$cname;
        $query2=mysqli_query($link,"select * from centers where cid='".$row["cid"]."'") ;
        $row2=mysqli_fetch_assoc($query2);
        $uid2 = $row2["uid"];
        $query3=mysqli_query($link,"select * from users  where uid='".$uid2."'") ;
        $row3=mysqli_fetch_assoc($query3);
        $b["head_officer_name"] = $row3["officer_name"];
        $b["head_phone"] = $row3["phone"];
        array_push($a,$b);
        echo json_encode($a);
}
else{
$b["success"]=200;
$b["message"]="Invalid Credentials";
array_push($a,$b);
echo json_encode($a);
}
?>
