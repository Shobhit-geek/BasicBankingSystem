<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Account</title>
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
            <h2 class="t1">View All Customers</h2>
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <?php
                include_once './dbconn.php';
                $qs="select * from users";
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
                            echo "<td><a href='./transfer.php?id=$r[0]'><button type='button' class='btn-btn-success'>Transfer Money</button></a></td>";
                        echo "</tr>";
                }
                echo "</table>";
                }
                ?>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row" style="font-family:'DM Sans', sans-serif;background-color: rgb(61, 59, 59);color: aliceblue;">
            <?php include 'footer.php'; ?>
        </div>
    </div>
</body>

</html>