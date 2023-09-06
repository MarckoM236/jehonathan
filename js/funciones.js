

$(document).ready(
    function(){
        //Display Menu in Mobile
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

        //send email
        $("#form-contact").submit(function(event) {
            
        var divAlert = document.getElementById("alert");
        var p_old =  document.getElementById('msg');

            event.preventDefault(); //prevent default action 
            let post_url = $(this).attr("action"); //get form action url
            let request_method = $(this).attr("method"); //get form GET/POST method
            let form_data = $(this).serialize(); //Encode form elements for submission	
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                dataType: "json",
                success: function(respuesta) {
                    console.log(respuesta.msg);
                    var p = document.createElement("p");
                    if(respuesta.status == 1){
                        if(p_old){
                            p_old.remove();
                        }
                        p.textContent = respuesta.msg;
                        p.id = "msg";
                        p.classList.add("msg");
                        divAlert.appendChild(p);
                        divAlert.classList.remove("oculto");
                        divAlert.classList.add("success");
                        cleanFields();
                    }
                    else{
                        if(p_old){
                            p_old.remove();
                        }
                        p.textContent = respuesta.msg;
                        p.id = "msg";
                        p.classList.add("msg");
                        divAlert.appendChild(p);
                        divAlert.classList.remove("oculto");
                        divAlert.classList.add("error");
                    }
                
                }
              })
        });

        // Request to the server to load elements in the gallery
        $('#loadGallery').click(function(event){
            event.preventDefault();
            getGallery('getMainGallery','Gallery');
            window.location.href = "#openModal";
        });
        $('#BMC').click(function(event){
            event.preventDefault();
            getGallery('getProductsBMC','Products/BMC');
            window.location.href = "#openModal";
        });
        $('#mamelucos').click(function(event){
            event.preventDefault();
            getGallery('getProductsMamelucos','Products/Mamelucos');
            window.location.href = "#openModal";
        });
        $('#busosCapucha').click(function(event){
            event.preventDefault();
            getGallery('getProductsBusosCapucha','Products/BusosCapucha');
            window.location.href = "#openModal";
        });
        $('#prendasDama').click(function(event){
            event.preventDefault();
            getGallery('getProductsPrendasDama','Products/PrendasDama');
            window.location.href = "#openModal";
        });
        $('#blusonesDama').click(function(event){
            event.preventDefault();
            getGallery('getProductsBlusonesDama','Products/BlusonesDama');
            window.location.href = "#openModal";
        });
        $('#playerasAmerica').click(function(event){
            event.preventDefault();
            getGallery('getProductsPlayerasAmerica','Products/PlayerasAmerica');
            window.location.href = "#openModal";
        });
        $('#playerasDepCali').click(function(event){
            event.preventDefault();
            getGallery('getProductsPlayerasDepCali','Products/PlayerasDepCali');
            window.location.href = "#openModal";
        });
        $('#camisetasNino').click(function(event){
            event.preventDefault();
            getGallery('getProductsCamisetasNino','Products/CamisetasNino');
            window.location.href = "#openModal";
        });
        $('#camisetasAnime').click(function(event){
            event.preventDefault();
            getGallery('getProductsCamisetasAnime','Products/CamisetasAnime');
            window.location.href = "#openModal";
        });

        //get year now
        getYear();

        //update date
        $('.date').text(dateNow());
});

//------------------------------------------------------------------------------
//Images

let images = [];
let currentIndex = 0;
const slideImg = document.getElementById("slideImg");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");


function getGallery(function_string, route) {
    images = [];
    $.ajax({
        url: "php/ajax.php",
        method: "GET",
        async: false,
        data: { function: function_string },
        dataType: "json",
        success: function(respuesta) {
            images = respuesta;
            images.splice(0, 2);
        }
    });

    prevBtn.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        slideImg.src = 'img/'+route+'/'+images[currentIndex];
    });

    nextBtn.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % images.length;
        slideImg.src = 'img/'+route+'/'+images[currentIndex];
    });

    // Show first image on page load
    slideImg.src = 'img/'+route+'/'+images[currentIndex];
}


//------------------------------------------------------------------------------

function getYear(){
    var today = new Date();
    var year = today.getFullYear();
    var cont = document.getElementById('year');
    cont.innerHTML = year;
}

//update date minus one week
function dateNow(){
    var date = new Date();
    date.setDate(date.getDate() - 7);
    var day = (date.getDate()).toString().padStart(2, '0');
    var month = (date.getMonth() + 1).toString().padStart(2, '0'); //in js months 0-11
    var year = date.getFullYear();
    var dateNow = "Ultima actualización: " + day + "/" + month + "/" + year; 
    return dateNow;
}

function cleanFields(){
    //inputs
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var message = document.getElementById('message');

    name.value = "";
    email.value = "";
    message.value = "";
}
