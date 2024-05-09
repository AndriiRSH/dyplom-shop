<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Підтвердження покупки</title>
    <!-- Підключення Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Додатковий стиль */
        .confirmation-page {
            padding: 50px;
        }
    </style>
</head>
<body>

<div class="container confirmation-page">
    <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
            <h1 class="display-4">Дякуємо за вашу покупку!</h1>
            <p class="lead">Ваше замовлення успішно оброблено.</p>
{{--            <p>Номер вашого замовлення: <strong>#12345</strong></p>--}}
            <p>Очікуйте нашого оператора, який зв'яжеться з вами найближчим часом.</p>
            <a href="/" class="btn btn-primary">Повернутися до головної</a>
        </div>
    </div>
</div>

<!-- Підключення Bootstrap JS та jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
