<?php
session_start();
//the isset function to check username is already loged in and stored on the session
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');

}
?>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<!-- <form action="complete2.php" method="POST"> -->
<?php include 'includes/topheader.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gym System Admin</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/fullcalendar.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../font-awesome/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<div class="content">
    <div class="wrap">
        <div class="content-top">
            <h3>Payment</h3>

            <div class="col-md-4 col-md-offset-4" style="margin-bottom:50px">
                <div class="form-group">
                    <center><label class="control-label">Name</label>
                        <center><input type="text" class="form-control" name="name" required></center>
                </div>
                <!-- <div>
<label class="control-label">Amount</label>
    <input type="text" class="form-control" name="amount " id="amount" required  >
</div> -->


                <div class="form-group">
                    <br>
                    <center><input type="button" name="button" value="Pay Now" class="btn btn-danger"
                            onclick="MakePayment()"><br><br></center>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="clear"></div>

</div>



</div>

</div>


<!-- <form action="complete2.php" method="POST" > -->
<!-- <input type="text" name="name" placeholder="Enter Name" id="name"><br><br> -->
<!-- <input type="text" name="amount" placeholder="Enter Amount" id="amount"><br><br>
    <center><input type="button" name="button" value="Pay Now" onclick="MakePayment()"></center> -->
</form>

<script>
    function MakePayment() {
        var name = $("#name").val();
        // var amount = $("#amount").val();

        var options = {
            "key": "NRc9n28NJPCne2",
            "amount": "<?php echo $_POST['amount'] * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 rupees
            "currency": "INR",
            "name": name, //your business name
            "description": "Transaction",
            "image": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrDiwFlXX3xOvgGw3FibMhmI7AChi5pwvIIQ&usqp=CAU",
            "handler": function (response) {
                jQuery.ajax(
                    {
                        success: function (result) {
                            window.location.href = "orders.php";
                        }
                    });
            }
            //"order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the id obtained in the response of Step 1

        };
        var rzp1 = new Razorpay(options);

        rzp1.open();

    }


</script>


</div>