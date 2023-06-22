

$(document).ready(
    function(){
        //Desplegar Menu en Mobile
        $(".hamb").click(
            function(e){
                e.preventDefault();
                $("header .container nav").toggleClass("open");

                $(".hamb i").toggleClass("fa-times");
            }
        );

        //
        $("header .container nav a").click(
            function(){
                $("header .container nav").removeClass("open");
                $(".hamb i").removeClass("fa-times");

                var dev = $(this).attr("href");

                $("html,body").animate({
                    "scrollTop": $(dev).offset().top - 76
                });
            }
        );
    }
);