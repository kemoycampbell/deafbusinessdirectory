<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />

    <title>
        {% block title %}TITLE NAME GOES HERE{% endblock %}
    </title>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">username</a></li>
                <li><a href="#Mail">Contacts</a></li>
                <li><a href="#contact"><i class="fa fa-th"></i></a></li>
                <li><a href="#contact"><i class="fa fa-bell"></i></a></li>
                <!--<li><a href="#contact"><i class="fa fa-share-alt"></i></a></li>-->
                <li><a href="#"><i class="fa fa-user"></i></a></li>
            </ul>
        </div>

    </div>
</nav>


{% block content %}

content goes here...

{% endblock %}

<div id="footer">
    <div class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="container">

            <ul class="nav navbar-nav navbar-left">
                <!--<li><a href="#">Advertising</a></li>
                <li><a href="#">Business</a></li>-->
                <li><a href="#">About</a></li>
                <li><a href="#">Terms</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li><a href="#">Privacy</a></li>
                <li><a href="#">Settings</a></li>



            </ul>
        </div>
    </div>
</div>


<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{% block javascript %}{% endblock %}


</body>
</html>