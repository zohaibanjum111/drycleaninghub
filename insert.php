<?php
$server="localhost";
$username="root";
$password="";
$dbname="test2";

$conn=mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit']))
{

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['age']) && !empty($_POST['address']))
    {
     
        $name=$_POST['name'];
        $email=$_POST['email'];
        $age=$_POST['email'];
        $address=$_POST['address'];

        $query="insert into form(name, email, age, address) values('$name','$email','$age','$address')";

        $run=mysqli_query($conn,$query) or die(mysqli_error());

        if($run="true")
        {
            echo "successfully";
        }
        else
        {
            echo "sorry";

        }

    }
    else
    {
    echo "field is empty";
     }

}


?>