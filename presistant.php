<?php
$servername="localhost";
$username="root";
$password="";
$dbname="xss";

$connection = mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST["clear"])){
    $sql="TRUNCATE TABLE COMMENT";
    if(mysqli_query($connection,$sql)==TRUE){
        echo "Table is deleted";
    }else{
        echo "Table cannot be removed";
    }
}

if(isset($_POST["comment"])){
    $comm = $_POST["comment"];
    $sql = "INSERT INTO comment (Comment) VALUES ('$comm')";
    if(mysqli_query($connection,$sql)==TRUE){
        echo "";
    }else{
        echo "Comment cannot be Inserted";
    }
}
$sql ="SELECT ID,COMMENT from comment";
$result = mysqli_query($connection, $sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo " Comment number ".$row['ID']."<br><hr>".$row['COMMENT']."<br><hr>";
    }
}else{
    echo "";
}
?>