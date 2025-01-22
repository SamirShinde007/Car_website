<?php
$apiKey = "rzp_test_HUoARU7QS4ygLG";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['name'] . "@example.com";
    $mobileno = $_POST['mobileno'];
    $amount = $_POST['total_cost'];
    $orderid = 'OID' . rand(10, 100) . 'END';
?>

<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" 
    data-amount="<?php echo $_POST['total_cost'] * 100;?>" 
    data-currency="INR"
    data-id="<?php echo 'OID'.rand(10,100).'END';?>"
    data-buttontext="Pay with Razorpay"
    data-name="CABHUB"
    data-description="CABHUB"
    data-image="https://traidev.com/img/web-desgin-development.png"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['email'];?>"
    data-prefill.contact="<?php echo $_POST['mobile'];?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>


<?php } ?>

<style>
    .razorpay-payment-button{
        display: none;
    }
</style>

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.razorpay-payment-button').click();
    });
</script> -->

<script type="text/javascript">
    document.querySelector('.razorpay-payment-button').click();
</script>