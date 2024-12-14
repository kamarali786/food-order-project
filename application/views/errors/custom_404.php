<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .error-container {
            text-align: center;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 600px;
        }
        .error-code {
            font-size: 150px;
            font-weight: bold;
            color: #ff6f61;
            margin-bottom: 20px;
        }
        .error-message {
            font-size: 30px;
            font-weight: 600;
            color: #333;
        }
        .error-description {
            font-size: 18px;
            color: #555;
            margin: 15px 0 25px;
        }
        .btn-home {
            background-color: #ff6f61;
            color: white;
            font-size: 18px;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-home:hover {
            background-color: #e45544;
        }
        .error-image {
            margin-top: 30px;
        }
        .error-image img {
            width: 50%;
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Oops! Page Not Found</div>
        <div class="error-description">
            Sorry, the page you are looking for might have been moved, deleted, or is temporarily unavailable.
        </div>
        <a href="<?= base_url();?>" class="btn-home">
            <i class="fas fa-home"></i> Go to Homepage
        </a>
        <div class="error-image">
            <img src="<?= base_url('assets/frontend/img/errors/error-img.png');?>" alt="404 image">
        </div>
    </div>
</body>
</html>
