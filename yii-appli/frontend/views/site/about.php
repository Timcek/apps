<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';

?>
<div class="site-about">
    <h1>This is a project for my matura exam</h1>
    <p>I started this project with the idea of creating a web application, where you could upload the cars you whant to rent to other people and see which cars are uploaded
        from other users. I think I have achived this goal and on the end my website came together quite nicely. Building this webapp took me quite some time because
        I was new to Yii2 and did not have a lot of experience with php. But after building this project I became quite confident in building web apps with php and Yii2.
        I used other tools like ajax, pjax and some other too.
    </p>
</div>
<style>
    body{
        background-color: #E0E0E0;
    }

    .container{
        width: 90%;
        min-width: 700px;
        max-width: 900px;
    }

    .site-about{
        background-color: white;
        margin-top: 130px;
    }

    h1{
        margin-bottom: 40px;
        text-align: center;
        padding-top: 30px;
    }

    p{
        text-align: justify;
        font-size: 17px;
        padding: 0 45px 30px 45px;
    }
</style>