$(document).ready(function(){

    $('.menu li:has(ul)').click(function(e){
        e.preventDefault;
        $('.menu li:has(ul)').children('ul').slideToggle();
        /*if ($(this).hasClass('activado')) {
            
        }else{
            $('.menu li ul').slideUp();
            $('.menu li').removeClass('activado')
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
        }*/
    })

    $('.btn-menu').click(function(){
        $('.contenedormenu .menu').slideToggle();

    })

    $('.menu li ul li a').click(function(){
        window.location.href=$(this).attr("href");
    })
})
