<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grip Bank</title>
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

<body>
    <div class="container-fluid">
        <div class="row haa" style="font-family:'DM Sans', sans-serif;">
            <?php include 'header.php'; ?>
            <div class="col-sm-12 cc" style="padding-top:60px; color:white;">
                <p class="vv" style="font-family:Gt walsheim pro;"><b>The modern banking system manufactures money out
                        of nothing. - Josiah Stamp</b>
                </p>
            </div>
            <div class="row" style="padding-top:20px;margin-bottom:20px;">
                <div class="col-sm-12 m">
                    <div class="grid-container">
                        <div class="grid-item" class="m"><a href="./viewusers" style="text-decoration: none;">
                                <table style="width: fit-content;">
                                    <tr>
                                        <th><img src="./images/user.jpg"
                                                style="max-width:100px; max-height:100px;margin-left:10px;"></img></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 25px;"><b>View All Customers</b></td>
                                    </tr>
                                </table>
                            </a>
                        </div>
                        <div class="grid-item" class="m"><a href="./viewac" style="text-decoration: none;">
                                <table style=" width: fit-content;">
                                <tr>
                                    <th>
                                        <img src="./images/tran.png"
                                            style="max-width:100px; max-height:100px;margin-left:20px;">
                                        </img>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 25px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;Transfer
                                            Money</b>
                                    </td>
                                </tr>
                                </table>
                            </a>
                        </div>
                        <div class="grid-item" class="m"><a href="./transhis" style="text-decoration: none;">
                                <table style=" width: fit-content;">
                                <tr>
                                    <th><img src="./images/bank.jpg"
                                            style="max-width:100px; max-height:100px;margin-left:10px;"></img></th>
                                    <th></th>

                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 25px;"><b>View Transaction
                                            History</b></td>
                                </tr>

                                </table>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="font-family:'DM Sans', sans-serif;background-color: rgb(15, 15, 15);color: aliceblue;">
            <?php include 'footer.php'; ?>
        </div>

    </div>

</body>

</html>