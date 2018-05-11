$(document).ready(function()
{
	// Variable que almacene la altura entre el nav y el top del body
	// var altura = $('.menu').offset().top;
	// var altura = $('.menu').offset().top;
	var altura = 100;
	
	// En caso de que el scroll sea F/V agregar la siguiente funcion
	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura ){
			// Agregar clase
			$('.menu').addClass('menu-fixed');
		} else{
			// Quitar clase
			$('.menu').removeClass('menu-fixed');
		} 
	});

	$(window).on('scroll', function(){

		if ( $(window).scrollTop() > altura ){
			// Agregar clase
		$('.home').addClass('home2');
		} else {
			// Quitar clase
		$('.home').removeClass('home2');
		}

	})

		$(window).on('scroll', function(){

		if ( $(window).scrollTop() > altura ){
			// Agregar clase
		$('.Categorias').addClass('Categorias2');
		} else {
			// Quitar clase
		$('.Categorias').removeClass('Categorias2');
		}

	})

		$(window).on('scroll', function(){

		if ( $(window).scrollTop() > altura ){
			// Agregar clase
		$('.Nosotros').addClass('Nosotros2');
		} else {
			// Quitar clase
		$('.Nosotros').removeClass('Nosotros2');
		}

	})
 		$(window).on('scroll', function(){

		if ( $(window).scrollTop() > altura ){
			// Agregar clase
		$('.Contacto').addClass('Contacto2');
		} else {
			// Quitar clase
		$('.Contacto').removeClass('Contacto2');
		}

	})
 
  		$(window).on('scroll', function(){

		if ( $(window).scrollTop() > altura ){
			// Agregar clase
		$('.LogoNombre').addClass('LogoNombre2');
		} else {
			// Quitar clase
		$('.LogoNombre').removeClass('LogoNombre2');
		}

	})
});