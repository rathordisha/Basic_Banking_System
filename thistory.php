<?php

include 'config.php';



session_start();


?>
<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>history</title>
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
      <a href="welcome.php">View Customers</a>
      </div>
      <div class="header-content-right">
      <a href="logout.php">Logout</a>
      </div>
    </div>
</div>

<div class="heading"><h2>&ensp;&ensp;Transaction History:</h2></div>
<div class="center">
  <table class="table table-hover table-sm">
    <tr>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount</th>
    </tr>

    <?php
        $sql = "SELECT * FROM  transaction_history";

        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

    while($row = mysqli_fetch_assoc($result)) {
        
    ?>
    <tr>
        <td><?php echo $row['sender']; ?></td>
        <td><?php echo $row['receiver']; ?></td>
        <td><?php echo $row['amount']; ?></td>
    </tr>
             
    <?php
    }
    ?>
  </table> 
  </div>

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