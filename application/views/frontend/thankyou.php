<?php $this->load->view('frontend/includes/links');?>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            text-align: center;
        }
        header {
            margin-bottom: 40px;
        }
        .header-logo {
            font-size: 32px;
            font-weight: bold;
            color: #ff6347;
            letter-spacing: 2px;
        }
        .thank-you-message {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        .thank-you-message h1 {
            font-size: 36px;
            color: #28a745;
            font-weight: 600;
        }
        .thank-you-message p {
            font-size: 18px;
            margin-top: 10px;
            color: #555;
        }
        .thank-you-message img {
            max-width: 200px;
            margin-top: 30px;
        }
        .order-details {
            font-size: 20px;
            font-weight: 600;
            margin-top: 30px;
        }
        .order-details-link {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #ff6347;
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .order-details-link:hover {
            background-color: #e94e3c;
        }
        footer {
            margin-top: 40px;
            font-size: 16px;
            color: #888;
        }
        footer a {
            color: #ff6347;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 768px) {
            .thank-you-message h1 {
                font-size: 30px;
            }
            .thank-you-message p {
                font-size: 16px;
            }
            .order-details {
                font-size: 18px;
            }
        }
    </style>
</head>

    <div class="container body">
        <!-- Header with Logo -->
        <header>
            <div class="header-logo">Foodie Delights</div>
        </header>

        <!-- Thank You Message -->
        <div class="thank-you-message">
            <h1>Thank You for Your Purchase!</h1>
            <p>Your order has been successfully placed.</p>
            <img src="<?= base_url('assets/frontend/img/thankyou.webp');?>" alt="Thank You Image">
            <p class="order-details">To view your order details, click the link below:</p>
            <a href="<?php echo base_url('order/details/'.$order_id) ?>" class="order-details-link">View Your Order</a>
            <?php $this->session->unset_userdata('order_success');?>
        </div>

        <!-- Footer Section -->
        <footer>
            <p>Have questions? <a href="<?php echo base_url('contact-us')?>">Contact us</a></p>
        </footer>
    </div>
