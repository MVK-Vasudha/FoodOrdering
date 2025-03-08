<?php
    $firstname=$_GET['firstName'];
    $lastname=$_GET['lastName'];
    $email=$_GET['email'];
    $phone=$_GET['phone'];
    $issue=$_GET['issue'];
    $name=$firstname." ".$lastname;

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname= "demo";
    $table ="users";
     

    $conn = new mysqli($servername,$username,$password,$dbname);
    $query1="select User_Id from $table order by User_Id desc limit 1";
    $result = $conn->query($query1);
    $row = $result->fetch_assoc();
    $index=(int)$row['User_Id'] + 1;
    
    $query="insert into $table (User_Id,User_Name,User_Mail,User_Phone,User_Issue) values ($index,'$name','$email','$phone','$issue')";

    if($conn->query($query)===TRUE){

        echo "Inserted";
    }else{
        echo "Nope";
    }
    
?>
<script>
    // function click(){
        
    //     window.location="Contact.html";
    // }
    // setTimeout("click()",2000);
</script>