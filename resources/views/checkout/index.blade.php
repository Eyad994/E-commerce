<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Checkout Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_z3sK8AI3CVhGQmotVfvN5Ggv00pUx5Cx25');
        var elements = stripe.elements();
    </script>
    <style type="text/css">

        html, body {
            width: 890px;
            margin: 0 auto;
        }
        .spacer {
            margin-bottom: 24px;
        }
        /**
         * The CSS shown here will not be introduced in the Quickstart guide, but shows
         * how you can use CSS to style your Element's container.
         */
        .StripeElement {
            background-color: white;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid #ccd0d2;
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
        #card-errors {
            color: #fa755a;
        }
        /*.StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }*/

    </style>
</head>
<body>

<h1>Billing Details</h1>
<hr>

<div class="container" style="margin-top: 5px;">
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-4">

            <form action="{{ route('checkout.store') }}" method="post" id="payment-form">
                @csrf

                <div class="form-group">
                    <input type="text" name="name" value="{{ $customer->customer_name }}" class="form-control" placeholder="Name">
                </div>

                <div class="form-group">
                    <input type="text" name="email" value="{{ $customer->email }}" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="text" name="phone" value="{{ $customer->phone }}" class="form-control" placeholder="Phone">
                </div>

                <div class="form-group">
                    <input type="text" name="city" value="{{ $customer->city }}" class="form-control" placeholder="City">
                </div>

                <div class="form-group">
                    <input type="text" name="district" value="{{ $customer->district }}" class="form-control" placeholder="District">
                </div>

                <div class="form-group">
                    <input type="text" name="commune" value="{{ $customer->commune }}" class="form-control" placeholder="Commune">
                </div>

                <div class="form-group">
                    <input type="text" name="village" value="{{ $customer->village }}" class="form-control" placeholder="Village">
                </div>

                <div class="form-group">

                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors. -->
                    <div id="card-errors" role="alert"></div>

                </div>

                <div class="form-group">

                    <button class="btn btn-success btn-md">Complete Order</button>
                </div>

            </form>
        </div>

        <div class="col-lg-44 col-md-4 col-sm-4">

            <div class="form-group">


                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Subtotal
                        <span class="badge badge-primary badge-pill">{{ Cart::subtotal() }}</span>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tax
                        <span class="badge badge-primary badge-pill">{{ Cart::tax() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total
                        <span class="badge badge-primary badge-pill">{{ Cart::total() }}</span>
                    </li>
                </ul>
            </div>

        </div>


    </div>

</div>

<script>

    // Custom styling can be passed to options when creating an Element.
    var style = {
        base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: "#32325d",
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the customer that there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }

            stripeTokenHandler(result.token);
        });
    });

    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
</body>
</html>
