<?php

include 'config.php';
error_reporting(0);
session_start();


?>

<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>welcome</title>
  <link href="styles/welcome.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="header">
    <div class="inner-header">
      <div class="header-content">
        &#127974; TSF Bank 
      </div>
      <div class="header-content-right">
      <a href="logout.php">Logout</a>
      </div>
      <div class="header-content-right">
        <a href="thistory.php">View History</a>
      </div>
      <div class="header-content-right" id="popup_transfer">
        Transfer Money
      </div>
    </div>
</div>

  <?php
  echo "<h1>&ensp;&ensp;Welcome ". $_SESSION['username'] . "!". "</h1>";
  ?>

<div class="subheading"><h4>TSF Customers:</h4></div> 
  <div class="center">
    <table class="table table-hover table-sm">
      <tr>
        <th>Account No.</th>
        <th>Username</th>
        <th>Email</th>
        <th>Current Balance</th>
        <th colspan="2">Operations</th>
      </tr>

      <?php
        $sql = "SELECT * FROM  customers";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        while($row = mysqli_fetch_assoc($result)) {
        
      ?>
        <tr>
        <td><?php echo $row['account_no']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['current_balance']; ?></td>
        <td><i class="fa fa-pencil" aria-hidden="true"></i</td>
        <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
        </tr>
             
        <?php
        }
        ?>
    </table>  
  </div>

                    <!--**************** TRANSFER FORM ****************-->

  <div class="popup">
    <form action="transaction.php" method="POST" class="popup-content">
    <img src="styles/img/close big.png" class="close" alt="">
      <h1 id="h3">Transfer Money</h1>
      <div class="input">
        <input type="text" placeholder="Transfer To" name="receiver" value="<?php echo $_POST['from']; ?>" required>
      </div>
        <div class="input">
          <input type="number" placeholder="Amount" name="amount" value="" required>
        </div>
        <button type="submit" class="popupsend" name="submit">Send</button>  
    </form>
  </div>

  <script>
    document.getElementById("popup_transfer").addEventListener("click",function(){
    document.querySelector(".popup").style.display= "flex";
    })
    
    document.querySelector(".close").addEventListener("click",function(){
    document.querySelector(".popup").style.display= "none";
    })
  </script> 

  <footer>
    <div class="footer-container">
      <p>
        <center>
          Copyright <span>&copy </span> TSF | Disha Rathor | Insta id: earningblessings
        </center>
      </p>
    </div>
  </footer>


</body>
</html>
