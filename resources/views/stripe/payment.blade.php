{{--<form action="/session" method="POST">--}}
{{--    <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--    <button type="submit" id="checkout-live-button">Checkout</button>--}}
{{--</form>--}}


{{--<head>--}}
{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <style>--}}
{{--        /* Додаткові стилі для покращення вигляду форми */--}}
{{--        body {--}}
{{--            background-color: #f8f9fa;--}}
{{--        }--}}
{{--        .card {--}}
{{--            border: none;--}}
{{--            border-radius: 10px;--}}
{{--            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}
{{--        .card-header {--}}
{{--            background-color: black;--}}
{{--            color: #fff;--}}
{{--            border-radius: 10px 10px 0 0;--}}
{{--        }--}}
{{--        .card-body {--}}
{{--            padding: 30px;--}}
{{--        }--}}
{{--        .form-control {--}}
{{--            border-radius: 20px;--}}
{{--        }--}}
{{--        .btn-primary {--}}
{{--            border-radius: 20px;--}}
{{--            padding: 10px 30px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<div class="container mt-5">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="card-title mb-0">Введення контактних даних</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name">Ім'я:</label>--}}
{{--                            <input type="text" class="form-control" id="name" placeholder="Введіть ваше ім'я">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email">Email:</label>--}}
{{--                            <input type="email" class="form-control" id="email" placeholder="Введіть ваш email">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="phone">Телефон:</label>--}}
{{--                            <input type="tel" class="form-control" id="phone" placeholder="Введіть ваш номер телефону">--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-dark black btn-block">Надіслати</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



{{----}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!-- Підключення Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Додаткові стилі для покращення вигляду форми */
        body {
            background-color: #f8f9fa;
        }
        .card {
            width: 750px;
            margin-left: -150px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: black;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 20px;
        }
        .btn-primary {
            border-radius: 20px;
            padding: 10px 30px;
        }
        .order-summary {
            margin-left: 60px;
            width: 640px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Блок з контактними даними -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Введення контактних даних</h5>
                </div>
                <div class="card-body">
{{--                    <form action="{{ route('checkoutprice') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name">Ім'я:</label>--}}
{{--                            <input name="name" type="text" class="form-control" id="name" placeholder="Введіть ваше ім'я">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email">Email:</label>--}}
{{--                            <input name="email" type="email" class="form-control" id="email" placeholder="Введіть ваш email">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="phone">Телефон:</label>--}}
{{--                            <input name="phone" type="tel" class="form-control" id="phone" placeholder="Введіть ваш номер телефону">--}}
{{--                        </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div data-v-2a448dc0="" class="sf-radio form__radio payment-method sf-radio--is-active mt-5" data-qa-node="checkmo" style="display: flex; flex-direction: row; align-items: flex-start;">--}}
{{--                                    <div data-v-2a448dc0="" class="o-payment__label prelabeled__label" style="margin-right: 10px;">--}}
{{--                                        Спосіб оплати--}}
{{--                                    </div>--}}
{{--                                    <div style="display: flex; flex-direction: column;">--}}
{{--                                        <label class="sf-radio__container" style="margin-bottom: 10px; display: flex; align-items: center;">--}}
{{--                                            <input type="radio" name="payment-method" value="checkmo" style="outline: none; margin-right: 5px;">--}}
{{--                                            <div class="sf-radio__label">Оплата при отриманні замовлення ГОТІВКОЮ</div>--}}
{{--                                        </label>--}}
{{--                                        <label class="sf-radio__container" style="display: flex; align-items: center;">--}}
{{--                                            <input type="radio" name="payment-method" value="card" style="outline: none; margin-right: 5px;">--}}
{{--                                            <div class="sf-radio__label">Сплатити карткою зараз (VISA/Mastercard)</div>--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-dark btn-block">Оформити</button>--}}
{{--                        </form>--}}
                    <form action="{{ route('checkoutprice') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Ім'я:</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Введіть ваше ім'я" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Введіть ваш email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input name="phone" type="tel" class="form-control" id="phone" placeholder="Введіть ваш номер телефону" required>
                        </div>
                        <div class="form-group">
                            <div data-v-2a448dc0="" class="sf-radio form__radio payment-method sf-radio--is-active mt-5" data-qa-node="checkmo" style="display: flex; flex-direction: row; align-items: flex-start;">
                                <div data-v-2a448dc0="" class="o-payment__label prelabeled__label" style="margin-right: 10px;">
                                    Спосіб оплати
                                </div>
                                <div style="display: flex; flex-direction: column;">
                                    <label class="sf-radio__container" style="margin-bottom: 10px; display: flex; align-items: center;">
                                        <input type="radio" name="payment-method" value="checkmo" style="outline: none; margin-right: 5px;">
                                        <div class="sf-radio__label">Оплата при отриманні замовлення ГОТІВКОЮ</div>
                                    </label>
                                    <label class="sf-radio__container" style="display: flex; align-items: center;">
                                        <input type="radio" name="payment-method" value="card" style="outline: none; margin-right: 5px;">
                                        <div class="sf-radio__label">Сплатити карткою зараз (VISA/Mastercard)</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Оформити</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6"> <!-- Блок з сумою замовлення -->
            <div class="order-summary">
                <div class="d-flex justify-content-between">
                    <h4>Сума замовлення:</h4>
                    <h3 style="margin-right: 30px">{{ $cookieValue }}₴</h3>
                </div>
{{--                <button type="" class="btn btn-dark btn-block mt-5">Оформити</button>--}}
                <p class="mt-5">Вартість доставки узгоджується по телефону</p>
            </div>
        </div>
    </div>
</div>

<!-- Підключення Bootstrap JS (необхідно для деяких функціональних можливостей) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
