function delete_car(x){
    $("body").css("overflow","hidden");
    $(".alert").replaceWith('<div style="position:absolute;height:100%;width:100%;left:0;right:0;top:'+$(window).scrollTop()+'px;background:rgba(128,128,128,0.5);z-index:1500"><div style="border-radius:35px;height:300px;width:600px; background-color:white;margin-left:auto;margin-right:auto;margin-top:100px"><h3 style="margin-bottom:100px;text-align: center;padding-top:40px">Do you realy want to delete this car?</h3><a href="/sola-avto-stran/yii-appli/frontend/web/index.php?r=site%2Fdelete_car&param1='+x+'" style="background-color: red;color: white;padding: 1em 1.5em;text-decoration: none;text-transform: uppercase;border-radius:10px;margin-left: 134px; float:left">yes</a><a href="/sola-avto-stran/yii-appli/frontend/web/index.php?r=site%2Fyour_cars" style="float:right;border-radius:10px;margin-right:150px; background-color: red;color: white;padding: 1em 1.5em;text-decoration: none;text-transform: uppercase;">no</a></div></div>')
}