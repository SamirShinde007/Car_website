    // JavaScript for Razorpay Payment
    document.getElementById('payButton').onclick = function(e) {
        e.preventDefault();

        var options = {
            "key": "YOUR_RAZORPAY_KEY_ID", // Replace with your Razorpay Key ID
            "amount": 50000, // Amount in paise (50000 = 500 INR)
            "currency": "INR",
            "name": "Your Company Name",
            "description": "Purchase Description",
            "image": "https://your-company-logo-url", // Optional company logo
            "order_id": "ORDER_ID_FROM_BACKEND", // Replace with generated order ID
            "handler": function (response) {
                // Success handler
                alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                // Optionally send the payment response to your server
            },
            "prefill": {
                "name": "John Doe",
                "email": "john.doe@example.com",
                "contact": "9999999999"
            },
            "theme": {
                "color": "#F37254"
            },
            "modal": {
                "ondismiss": function() {
                    alert('Payment process cancelled.');
                }
            }
        };

        var rzp = new Razorpay(options);

        // Payment failed handler
        rzp.on('payment.failed', function (response) {
            alert("Payment failed! Error: " + response.error.description);
        });

        rzp.open(); // Open Razorpay Checkout
    }