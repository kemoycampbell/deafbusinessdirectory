{% extends "base.php" %}
{% block title %}Deaf Business Directory- Home{% endblock %}

{% block content %}


<div class="container">
    <div class="row">
        <div class="span3"></div>
        <div class="span3"><h1 class="center-block text-center">Discover the Best Deaf Business</h1></div>
        <div class="span3"><h4 class="text-center" style="color:white">Deaf Business Directory helps you find all top deaf businesses</h4></div>
        <div class="span3"></div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" id="google-search">Search</button>
                </span>
            </div>
        </div>
    </div>
    <br/>
    <br/>
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="eff-item">
                <i class="fa fa-search text-success fa-3x"></i>
            </div>
            <div class="eff-tt">
                <strong>Search</strong>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="eff-item">
                <i class="fa fa-bookmark-o text-danger fa-3x"></i>
            </div>
            <div class="eff-tt">
                <strong>Bookmark</strong>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="eff-item">
                <i class="fa fa-phone text-info fa-3x"></i>
            </div>
            <div class="eff-tt">
                <strong>Contact</strong>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="eff-item">
                <i class="fa fa-star-o text-warning fa-3x"></i>
            </div>
            <div class="eff-tt">
                <strong>Bookmark</strong>
            </div>
        </div>
    </div>
    <!--<div class="btn-group-wrap">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" id="google-search">Search</button>
        </div>
    </div>-->
</div>

{% endblock %}