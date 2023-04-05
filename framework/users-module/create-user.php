<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_file";
// Create connection and Check connection
$con = mysqli_connect($server, $username, $password) or die("Error in connection!");
mysqli_select_db($con, $database ) or die("Could not select database");




?>


<h3>Provide the Required Information</h3>
<div id="form-block">
<form action="http://localhost/dorm/framework/index.php?page=settings&subpage=users&action=create" method="post" enctype="multipart/form-data">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="user_firstname" placeholder="Your name.." required="">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="user_lastname" placeholder="Your last name.." required="">

            <label for="access">Access Level</label>
            <select id="access" name="user_access">
              <option value="Tenant">Tenant</option>
              <option value="supervisor">Supervisor</option>
              <option value="Manager">Manager</option>
            </select>

            <label for="access">Room Type</label>
            <select id="access" name="room_type">
              <option value="Bedspace">Bedspace</option>
              <option value="Private">Private</option>
            </select> 
        </div>
        <div id="form-block-half">

          <label for="access">Room number</label>
            <input type="number" id="lname" class="input" name="room_number" placeholder="Room number" value="1" min="1" required="">

            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="user_email" placeholder="Your email.." required="">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="user_password" placeholder="Enter password.." required="">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." required="">
            
        </div>
        <div id="button-block">

        <input onclick=" return btnClick(this)" name="insert_btn" class="btn btn-primary" id="save_btn" type="submit" value="SAVE"/>

        <button type="reset" style="background: red;border:none;padding: 14px 20px 14px 20px;border-radius: 5px;color: white">RESET</button>


        </div>
  </form>
</div>

<script>
 function btnClick(btn){ 
  var getText = document.getElementById('password').value;
  var getText2 = document.getElementById('confirmpassword').value;
  var a = parseFloat(getText) + parseFloat(getText2);
if (getText != getText2) {
     return confirm("Password does not match! Please select CANCEL and retype your password?");
    }
}  
</script>




<?php
if (isset($_POST['insert_btn'])) 
{


  $user_lastname = $_POST['user_lastname'];
  $user_firstname = $_POST['user_firstname'];
  $user_email = $_POST['user_email'];
  $room_type = $_POST['room_type'];
  $room_number = $_POST['room_number'];
  $user_password = $_POST['user_password'];
  $user_access = $_POST['user_access'];

    $query = "INSERT INTO `tbl_users` (`user_lastname`, `user_firstname`, `room_type`, `room_number`, `user_email`, `user_password`, `user_access`) 
                       VALUES ('$user_lastname', 
                               '$user_firstname', 
                               '$room_type', 
                               '$room_number', 
                               '$user_email', 
                               '$user_password', 
                               '$user_access');";



        if (mysqli_query($con, $query)) {
        
              ?>   
              <script type="text/javascript">
                alert("New user successfully added!")
                window.location = "http://localhost/dorm/framework/index.php?page=settings&subpage=users";
              </script>
              <?php 



        } else {

                ?>   
              <script type="text/javascript">
                alert("Error adding!")
                window.location = "http://localhost/dorm/framework/index.php?page=settings&subpage=users&action=create";
              </script>
              <?php 

        }


}
?>            </div>