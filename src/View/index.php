<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <title>DRY Framework</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">DRY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</nav>
<h3 class="text-center">What is DRY?</h3>
<section class="col-md-12 text-center">
    {% if isGranted('anonymous',"kemoy") %}
        kemoy you are anonymous
    {% endif %}
    <p>DRY (Dont Repeat Yourself) is a powerful skeleton web framework that was built using symfony components and Twig for the template engines.
    The possibilities of what you can do with DRY is unlimited. DRY is capable of building both simple and complex websites
        or web app. DRY follows the separate of concern principle of building a software. It is laid out in a way that will
        enable you to build and deploy your app in no time. DRY also made it possible to deploy the app with little to no
        additional configuration that of that in the development environment. Lastly but not the least, DRY is built using
        symfony 4 and twig engine 2.0
    </p>
</section>

<h3 class="text-center">DRY Project Agriculture Structure</h3>
<section class="text-center">
    <img src="{{asset('images/tron3.jpg')}}"/>
</section>
<br/>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
