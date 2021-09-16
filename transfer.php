<?php
include_once './dbconn.php';
if(isset($_POST['sub']))
{
    $from=$_GET['id'];
    $to=$_POST['to'];
    $amount=$_POST['amount'];
    $sql1 = "SELECT * from users where SNO=$from";
    $q1 = mysqli_query($link,$sql1);
    $r1 = mysqli_fetch_array($q1); // returns array or output of user from which the amount is to be transferred.

    $sql2 = "SELECT * from users where SNO=$to";
    $q2 = mysqli_query($link,$sql2);
    $r2 = mysqli_fetch_array($q2);

    if(($amount)<0)
    {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }
    
     // constraint to check insufficient balance.
    else if($amount > $r1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("oops! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }
    
    else
    {
        $newbalance = $r1['Balance'] - $amount;
        $sql = "UPDATE users set Balance='$newbalance' where SNO=$from";
        mysqli_query($link,$sql);
        

        // adding amount to reciever's account
        $newbalance = $r2['Balance'] + $amount;
        $sql = "UPDATE users set Balance='$newbalance' where SNO=$to";
        mysqli_query($link,$sql);
        $sender = $r1['Name'];
        $receiver = $r2['Name'];
        $sac=$r1['AccountNo'];
        $rac=$r2['AccountNo'];
        $sql3 = "INSERT INTO transaction VALUES(NULL,'$sender',$sac,'$receiver',$rac,'$amount',now())";
        $query=mysqli_query($link,$sql3);
        if(mysqli_affected_rows($link)>0 or die("Something Went Wrong".mysqli_error($link)))
        {
            echo "<script> alert('Transaction Successful');
                window.location='./transhis.php';
            </script>";
        }

        $newbalance= 0;
        $amount =0;
        }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transfer</title>
    <link rel="shortcut icon" type="image/png" href="./images/logo_small.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="./index.css">
</head>
<style>
.t1 {
    background-color: black;
    color: aliceblue;
    text-align: center;
    font-weight: 800;
}
</style>

<body>
    <div class="container-fluid">
        <div class="row haa" style="font-family:'DM Sans', sans-serif;">
            <?php include 'header.php'; ?>
            <h3 class="t1">Transfer Money</h3>
            <div class="row" style="margin-top: 50px;">
                <div class="col-sm-3"></div>
                <div class="col-sm-6" style="border: 2px solid white;border-radius:5px;">
                    <?php
                    $var1=$_GET['id'];
                    include_once './dbconn.php';
                    $qs="select * from users where SNO=$var1";
                    $rs=mysqli_query($link,$qs);
                    if(mysqli_affected_rows($link)>0 )
                    {
                        echo "<table class='table table-stripped' style='color:white'>";
                            echo "<tr><th>S.NO.</th><th>Name</th><th>EmailID</th><th>Account No.</th><th>Balance</th><th></th></tr>";
                                
                        while($r=mysqli_fetch_array($rs))
                        {
                            echo "<tr>";
                                echo "<td>$r[0]</td>";
                                echo "<td>$r[1]</td>";
                                echo "<td>$r[2]</td>";
                                echo "<td>$r[3]</td>";
                                echo "<td>$r[4]</td>";
                                echo "</tr>";
                    }
                    echo "</table>";
                    }
                ?>
                    <form method="POST" class="myclass" style="color:aliceblue">
                        <label class="form-control-label">Transfer To</label>
                        <select name="to" class="form-control" required>
                            <option value="" disabled selected>Choose</option>
                            <?php
                                $sql = "SELECT * FROM users where SNO!=$var1";
                                $result=mysqli_query($link,$sql);
                                if(!$result)
                                {
                                    echo "Error ".$sql."<br>".mysqli_error($link); 
                                }
                                while($rows = mysqli_fetch_assoc($result)) {
                            ?>
                            <option class="table" value="<?php echo $rows['SNO'];?>">

                                <?php echo $rows['Name'] ;?> (Balance:
                                <?php echo $rows['Balance'] ;?> )

                            </option>
                            <?php 
                                        } 
                                    ?>
                            <div>
                        </select>
                        <br>
                        <label class="form-control-label">Amount:</label>
                        <input type="number" name="amount" required placeholder="Enter Amount" class="form-control"
                            value="" /><br><br>
                        <label class="form-control-label">
                            <input type="submit" name="sub" class="form-submit-button" value="Transfer" />
                        </label>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div class="row"
                style="margin-top: 80px;font-family:'DM Sans', sans-serif;background-color: rgb(61, 59, 59);color: aliceblue;">
                <?php include 'footer.php'; ?>
            </div>
        </div>
    </div>

</body>

</html>