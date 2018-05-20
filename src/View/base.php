<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />

    <title>
        {% block title %}TITLE NAME GOES HERE{% endblock %}
    </title>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow p-3 mb-3">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#"><i class="fa fa-user"></i> Hello, Username</a>
                <a class="nav-item nav-link" href="#"><i class="fa fa-sign-out"></i> Logout</a>
                <a class="nav-item nav-link" href="#"><i class="fa fa-phone"></i> Contact</a>
                <a class="nav-item nav-link" href="#"><i class="fa fa-sign-in"></i> Login</a>
                <a class="nav-item nav-link" href="#"><i class="fa fa-user-plus"></i> Register</a>
            </div>
        </div>
    </div>
</nav>

{% block content %}

content goes here...

{% endblock %}

<footer class="footer text-muted text-center text-small">
    <p class="mb-0">© 2017 - 2018 - Deaf Business Directory - All Rights Reserved </p>
    <ul class="list-inline">
        <li class="list-inline-item pr-3"><a href="#">Privacy</a></li>
        <li class="list-inline-item pr-3"><a href="#">Terms</a></li>
        <li class="list-inline-item pr-3"><a href="#">Support</a></li>
        <li class="list-inline-item pr-3"><a href="#">FAQ</a></li>
    </ul>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

{% block javascript %}{% endblock %}


</body>
</html>