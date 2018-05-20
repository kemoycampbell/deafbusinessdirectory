{% extends "base.php" %}
{% block title %}Deaf Business Directory- Home{% endblock %}

{% block content %}

<br/><br/><br/>
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-8 offset-md-2">
            <h1>Discover the Best Deaf Business</h1>
            <h4>Deaf Business Directory helps you find all top deaf businesses</h4>
            <br/>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> Search</button>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row text-center">
        <div class="col-md-2 offset-md-4">
            <div class="eff-item">
                <i class="fa fa-star fa-2x text-warning"></i>
            </div>
            <div class="eff-tt">
                <strong>Bookmark</strong>
            </div>
        </div>
        <div class="col-md-2">
            <div class="eff-item">
                <i class="fa fa-phone fa-2x text-primary"></i>
            </div>
            <div class="eff-tt">
                <strong>Contact</strong>
            </div>
        </div>

    </div>
</div>


{% endblock %}