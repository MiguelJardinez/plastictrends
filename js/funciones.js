$(document).ready(function () {

    var dominio = 'https://desarrollo.prognosis.mx/plastictrends/';

    setTimeout(function () {
        $('body').addClass('loaded');
    }, 3000);

    var menuactivo = '';

    $('.dimmer').on('click', function (e) {
        $('.sub-menu').removeClass('activado');
        $('.OverlayMenu').removeClass('activado');
        $(this).removeClass('activado');
        $('.ConSub').removeClass('activado');

        menuactivo = '';
        $('.dimmer').css({ display: 'none' });
    });

    $('.ConSub').on('click', function (e) {

        if (menuactivo == $(this).attr('id')) {
            $('.sub-menu').removeClass('activado');
            $('.OverlayMenu').removeClass('activado');
            $(this).removeClass('activado');

            menuactivo = '';
            $('.dimmer').css({ display: 'none' });
        }
        else {
            menuactivo = $(this).attr('id');
            $('.ConSub').removeClass('activado');
            $('.sub-menu').removeClass('activado');
            $('.OverlayMenu').removeClass('activado');
            $(this).find('.sub-menu').addClass('activado');
            $(this).find('.OverlayMenu').addClass('activado');
            $(this).addClass('activado');

            $('.dimmer').css({ display: 'block' });

        }
    });


    $('.CotizaFeed').on('click', function (e) {
        // alert($(this).data().info);
        $('body').addClass('fixed');
        $('.FloatCotizar').fadeIn('slow');
        $('.Overlay').fadeIn('slow');
        document.getElementById('JsNombre').innerText = $(this).data().info;
        document.getElementById('inputNombre').setAttribute('value', $(this).data().info);
    });

    $('.CerrarCotizar').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Bolsa').fadeOut('slow');
        $('.Overlay').fadeOut('slow');
    });
    $('.Overlay').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Bolsa').fadeOut('slow');
        $('.Overlay').fadeOut('slow');
    });

    $('.AbrirBolsa').on('click', function (e) {
        $('body').addClass('fixed');
        $('.Bolsa').fadeIn('slow');
        $('.Overlay').fadeIn('slow');
        $("#AbrirBolsa").empty();
        $('#AbrirBolsa').removeClass('activo');
    });
    $('.CerrarBolsa').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Bolsa').fadeOut('slow');
        $('.Overlay').fadeOut('slow');
        $("#AbrirBolsa").empty();
        $('#AbrirBolsa').removeClass('activo');
    });
    $('.Overlay').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Bolsa').fadeOut('slow');
        $('.Overlay').fadeOut('slow');
        $("#AbrirBolsa").empty();
        $('#AbrirBolsa').removeClass('activo');
    });


    $(".Admon").on('click', function (e) {
        var selectedProducto = $("select#SelectProduct option:selected").val();
        var idPost = 1;
        $.ajax({
            type: "POST",
            url: dominio + "php/administracion.php",
            data: { producto: selectedProducto, idPost }
        }).done(function (data) {
            $('#AbrirBolsa').addClass('activo');
            $("#AbrirBolsa").empty();
            $("#AbrirBolsa").html(data);
        });
    });

    $(".Produ").on('click', function (e) {
        var selectedProducto = $("select#SelectProduct option:selected").val();
        var idPost = 1;
        $.ajax({
            type: "POST",
            url: dominio + "php/produccion.php",
            data: { producto: selectedProducto, idPost }
        }).done(function (data) {
            $('#AbrirBolsa').addClass('activo');
            $("#AbrirBolsa").empty();
            $("#AbrirBolsa").html(data);
        });
    });

    //COL TESTIMONIAL
    $('.GaleriaProyecto').owlCarousel({
        loop: true,
        nav: true,
        dots: true,
        singleItem: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplayHoverPause: true,
        autoplay: false,
        autoplayTimeout: 3000,
        dotsContainer: '#owl-thumbs',
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });


    $('.btn_movil').on('click', function (e) {
        $('.main-menu').fadeIn('slow');
        $('.OverlayMenu').fadeIn('slow');
    });

    $('.OverlayMenu').on('click', function (e) {
        $('.main-menu').fadeOut('slow');
        $('.OverlayMenu').fadeOut('slow');
    });



    $('.Movilmenu').on('click', function (e) {
        $('body').addClass('fixed');
        $('.Sidebar').fadeIn('slow');
        $('.Overlayside').fadeIn('slow');
    });

    $('.CerrarSide').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Sidebar').fadeOut('slow');
        $('.Overlayside').fadeOut('slow');
    });

    $('.Overlayside').on('click', function (e) {
        $('body').removeClass('fixed');
        $('.Sidebar').fadeOut('slow');
        $('.Overlayside').fadeOut('slow');
    });


    var menu_movil = 1;
    $('.ConSubmovil').on('click', function (e) {
        if (menu_movil == 0) {
            $('.sub-menumovil').slideUp('slow');
            $('.ConSubmovil').removeClass('activo');
            $(this).find('.sub-menumovil').slideUp('slow');
            menu_movil = 1;
        } else if (menu_movil == 1) {
            $('.ConSubmovil').removeClass('activo');
            $('.sub-menumovil').slideUp('slow');
            $(this).addClass('activo');
            $(this).find('.sub-menumovil').slideDown('slow');
            menu_movil = 0;
        }
    });

    //COL TESTIMONIAL
    $('.HomeHonores').owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        dots: true,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    //COL TESTIMONIAL
    $('.Slider').owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        nav: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1
            },
            450: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    //COL TESTIMONIAL
    $('.SliderGaleria').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        singleItem: true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        autoplayHoverPause: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            500: {
                items: 1,
                nav: false
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1
            }
        }
    });

    // VALIDA FORMULARIO DE REFERIDOS
    $('#SubmitContacto').click(function (e) {
        $("#FormContacto").validate({
            rules: {
                nombre: { required: true, minlength: 3 },
                mensaje: { required: true },
                interes: { required: true },
                correo: { required: true, minlength: 3 },
                telefono: { required: true, minlength: 3 }
            },
            submitHandler: function (form) {
                $('#SubmitContacto').attr('disabled', 'disabled');
                setTimeout(function (e) {
                    $.ajax({
                        type: "POST",
                        url: dominio + "php/valida_contacto.php",
                        data: $("#FormContacto").serialize(),
                        success: function (data) {
                            if (data == 'alta_registro') {
                                swal("Bien hecho!", "Mensaje enviado Correctamente!!", "success");

                                $("#FormContacto")[0].reset();
                            } else {
                                swal("Ooops!", "Error de envio!!", "warning");
                            }

                            $('#SubmitContacto').removeAttr('disabled');
                        }
                    });
                }, 1300)
            }
        })
    });

    //When page loads...
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content


    $(function () {
        $("#tabs").tabs();
    });


});

$(window).on('load', function () {
    //ANCLA LINK
    $('a[href*=#]').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            && location.hostname == this.hostname) {
            var $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                var targetOffset = $target.offset().top;
                $('html,body').animate({ scrollTop: targetOffset - 80 }, 1000);
                return false;
            }
        }
    });

});

$(window).scroll(function () {
    if ($(window).scrollTop() <= 100) {
        $('header').removeClass('header_chico');
        $('.menu').removeClass('menu_chico');
        $('.menu').removeClass('menu_chico2');
        $('.logo').removeClass('logo_chico');
        // $('.submenu li').removeClass('submenu_chico');
        // $('.submenu').removeClass('submenu_chico2');
    }
    if ($(window).scrollTop() >= 100) {
        $('header').addClass('header_chico');
        $('.menu menu-item').addClass('menu_chico');
        $('.menu').addClass('menu_chico2');
        $('.logo').addClass('logo_chico');
        // $('.submenu li').addClass('submenu_chico');
        // $('.submenu').addClass('submenu_chico2');
    }
});
