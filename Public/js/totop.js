/**
 * Created by hadoop on 14-10-18.
 */
$(window).scroll(function () {
    if($(window).scrollTop()>=100) {
        $(".backtop").fadeIn();
    }else {

        $(".backtop").fadeOut();
    }
});
$(".backtop").click(function(event){
    $('html,body').animate({scrollTop:0}, 500);
    return false;
});
