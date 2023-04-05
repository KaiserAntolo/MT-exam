<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_file";
// Create connection and Check connection
$con = mysqli_connect($server, $username, $password) or die("Error in connection!");
mysqli_select_db($con, $database ) or die("Could not select database");
?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #E89E62;
  color: white;
}
</style>
                <table id="customers" class="table-bordered" style="width:100%; margin: 0;padding: 0;color:#363636 ">
                      <thead>
                        <tr>
                          <th align="center" style="border-top: none;">Name</th>
                          <th align="center" style="border-top: none;">Email</th>
                          <th align="center" style="border-top: none;">Room type and No.</th>
                          <th align="center" style="border-top: none;text-align: center;">Acces level</th>
                          <th align="center" style="border-top: none;">Date added</th>
                        </tr>
                      </thead>
                      <tbody>
    <?php
$query = "SELECT * FROM tbl_users order by user_id";
            $result = mysqli_query($con,$query) or die(mysqli_error($con));
              while($row = mysqli_fetch_array($result))
              {   
                $user_id = $row['user_id'];
                $user_lastname = $row['user_lastname'];
                $user_firstname = $row['user_firstname'];
                $user_email = $row['user_email'];
                $room_type = $row['room_type'];
                $room_number = $row['room_number'];
                $user_password = $row['user_password'];
                $user_date_added = $row['user_date_added'];
                $user_access = $row['user_access'];
                $user_date_addeds = date( 'F d, Y h:i:s a ', strtotime( '+0 hour' , strtotime($user_date_added) ) );
     
?> 
      <tr>
        <td style="text-align: left;text-transform: uppercase;"><?php echo $user_firstname.' '.$user_lastname; ?></td>
        <td style="text-align: left;"><?php echo $user_email; ?></td>
        <td style="text-align: left;"><?php echo $room_type.' / '.$room_number; ?></td>
        <td style="text-align: center;text-transform: uppercase;"><?php echo $user_access; ?></td>
        <td style="text-align: left;"><?php echo $user_date_addeds; ?></td>
      </tr>
      <?php }?>
                 
                      </tbody>
                    </table>