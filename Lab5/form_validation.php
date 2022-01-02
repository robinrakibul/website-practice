<!DOCTYPE html>  
<html>
<head>
<style>
.err{
  color: red;
  }
</style>
</head>

<body>  

<?php
$nameErr = $emailErr = $genderErr = $websiteErr = $passErr= $addressErr = $dateErr= $mobErr= $urlErr= $briefinfoErr= "";
$name = $email = $gender = $briefinfo = $website = $pass = $date = $address = $mob = $url = "";
    

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
   else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]{4,25}$/i",$name)) {
      $nameErr = "Name must be 4-25 charecters long"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
   else {
    $email = test_input($_POST["email"]);
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i",$email)) {
      $emailErr = "Invalid email format"; 
    }
  }

if (empty($_POST["pass"])){

    	$passErr = "Password is required!";
    }
    else{
    	$pass = test_input($_POST["pass"]);
    	
    	if (!preg_match("/^[a-zA-Z0-9]{8,20}$/i", $pass)) {
           $passErr = "Please enter password containing 8 to 20 characters";
        }
        
        else{

        	if (!preg_match("/[a-z]+/", $pass)) {
               $passErr = "Must contain a lowercase";
            }
            if (!preg_match("/[A-Z]/", $pass)) {
               $passErr = "Must contain an uppercase";
            }
            if (!preg_match("/[0-9]+/", $pass)) {
               $passErr = "Must contain a number";
            }
            
            
        }
}



if (empty($_POST["address"])) {
    $addressErr = "IP address is required";
  } 
  else {
    $address = test_input($_POST["address"]);

    if (!preg_match("/^(?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)(?:[.](?:25[0-5]|2[0-4]\d|1\d\d|[1-9]\d|\d)){3}$/",$address)) {
      $addressErr = ""; 
    }
}



if (empty($_POST["url"])) {
    $urlErr = "Url is required";
  }
   else {
    $url = test_input($_POST["url"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www|\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) 
    {
      $urlErr = "Use valid url"; 
    }
  }
  
if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } 
  else {
    $gender = test_input($_POST["gender"]);
  }

    
if (empty($_POST["mob"])) {
            $mobErr = "Enter 11 digit BD phone number without +880";
        } else {
            $mob = test_input($_POST["mob"]);
            if (!preg_match("~^\d{11}$~", $mob)) 
            {
                $mobErr = "Enter valid phone number";
            }
        }


if (empty($_POST["date"])) {
    $dateErr = "date is required";
  } 
  else {
    $date = $_POST["date"];

    $dob = new DateTime($date);
 
    $now = new DateTime();
 
    $difference = $now->diff($dob);
 
    $age = $difference->y;

    $date = $age;
 
}



 if (empty($_POST["briefinfo"])) {
    $briefinfoErr = "Brief Info";
  } 
  else {
    $briefinfo = test_input($_POST["briefinfo"]);
  }



if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["address"]) && !empty($_POST["url"]) && !empty($_POST["date"]) && !empty($_POST["gender"]) && !empty($_POST["mob"]) && !empty($_POST["briefinfo"])) 
{ 
$connect = mysqli_connect("localhost", "root", "", "fall2020");  
  
  $sql="INSERT INTO user VALUES('$name', '$email', '$pass', '$address', '$url', '$age', '$gender', '$mob', '$briefinfo')";
  
   if(mysqli_query($connect, $sql)){
    echo "Records inserted successfully.";
  } 
  else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
  } 
   
 }

} 

        
 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<h1 align="left">Form</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<table>
  <tr>
    <td>Name: </td>
    <td> <input type="text" name="name" value="<?php echo $name;?>">
    <span class="err">* <?php echo $nameErr;?></span> </td>
  </tr>

  <tr>
    <td>Email: </td> 
    <td> 
      <input type="text" name="email" value="<?php echo $email;?>">
      <span class="err">* <?php echo $emailErr;?>
      </span> 
    </td>
   </tr>

  
  <tr>
     <td>Password:  </td>
     <td> <input type="password" name="pass" value="<?php echo $pass;?>">
          <span class="err">* <?php echo $passErr;?></span> </td>
   </tr>
          
 

  <tr>
      <td>IP Address: </td> 
      <td> <input type="text" name="address" value="<?php echo $address;?>">
        <span class="err">* <?php echo $addressErr;?></span>
      </td>
  </tr>
            
 

  <tr>
      <td>Personal Web URL: </td>
      <td> <input type="text" name="url"  value="<?php echo $url;?>" >
           <span class="err">* <?php echo $urlErr;?></span> </td>
  </tr>
           
  <tr>
    <td>Date of Birth:  </td>
    <td> <input type="date" name="date" value="<?php echo $date;?>" >
          <span class="err">* <?php echo $dateErr;?></span> </td>
  </tr>
          
 
 <tr>
    <td>Gender: </td>
    <td> <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
         <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
         <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
        <span class="err">* <?php echo $genderErr;?></span> </td>
  </tr>
        

  <tr>
      <td>Mobile Number: </td>
      <td> 
        <input type="text" name="mob" value="<?php echo $mob;?>">
       <span class="err">* <?php echo $mobErr;?>
        </span> 
      </td>
  </tr>
  

  <tr>
      <td>Brief Info:</td>
      <td> 
        <textarea name = "briefinfo" rows = "6" cols = "22">
        </textarea>
      </td>
  </tr>

  <tr>
    <td> 
      <input type="submit" name="submit" value="Register"> 
    </td>
  </tr>

</table>    
</form>

</body>
</html>