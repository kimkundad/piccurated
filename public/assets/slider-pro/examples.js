(function( $ ) {
	var SliderProExamples = {
		currentExample: -1,



		renderExample1: function() {
			$( '#example1' ).sliderPro({
				width: 960,
				height: 500,
				arrows: true,
				buttons: false,
				waitForLayers: true,
				thumbnailWidth: 200,
				thumbnailHeight: 100,
				thumbnailPointer: true,
				autoplay: false,
				autoScaleLayers: false,
				breakpoints: {
					500: {
						thumbnailWidth: 120,
						thumbnailHeight: 50
					}
				}
			});
		},

		renderExample2: function() {
			$( '#example2' ).sliderPro({
				width: 300,
				height: 300,
				visibleSize: '100%',
				forceSize: 'fullWidth',
				autoSlideSize: true
			});

			// instantiate fancybox when a link is clicked
			$( '#example2 .sp-image' ).parent( 'a' ).on( 'click', function( event ) {
				event.preventDefault();

				// check if the clicked link is also used in swiping the slider
				// by checking if the link has the 'sp-swiping' class attached.
				// if the slider is not being swiped, open the lightbox programmatically,
				// at the correct index
				if ( $( '#example2' ).hasClass( 'sp-swiping' ) === false ) {
					$.fancybox.open( $( '#example2 .sp-image' ).parent( 'a' ), { index: $( this ).parents( '.sp-slide' ).index() } );
				}
			});
		},

		renderExample3: function() {
			$( '#example3' ).sliderPro({
				width: 960,
				height: 500,
				fade: true,
				arrows: true,
				buttons: false,
				fullScreen: true,
				shuffle: true,
				smallSize: 500,
				mediumSize: 1000,
				largeSize: 3000,
				thumbnailArrows: true,
				autoplay: false
			});
		},

		renderExample4: function() {
			$( '#example4' ).sliderPro({
				width: 960,
				height: 400,
				autoHeight: true,
				fade: true,
				updateHash: true
			});

			// instantiate fancybox when a link is clicked
			$( '#example4 .sp-lightbox' ).on( 'click', function( event ) {
				event.preventDefault();

				// check if the clicked link is also used in swiping the slider
				// by checking if the link has the 'sp-swiping' class attached.
				// if the slider is not being swiped, open the lightbox programmatically,
				// at the correct index
				if ( $( '#example4' ).hasClass( 'sp-swiping' ) === false ) {
					$.fancybox.open( this );
				}
			});
		},

		renderExample5: function() {
			$( '#example5' ).sliderPro({
				width: 670,
				height: 500,
				orientation: 'vertical',
				loop: false,
				arrows: true,
				buttons: false,
				thumbnailsPosition: 'right',
				thumbnailPointer: true,
				thumbnailWidth: 290,
				breakpoints: {
					800: {
						thumbnailsPosition: 'bottom',
						thumbnailWidth: 270,
						thumbnailHeight: 100
					},
					500: {
						thumbnailsPosition: 'bottom',
						thumbnailWidth: 120,
						thumbnailHeight: 50
					}
				}
			});
		},

		unloadCurrentExample: function() {
			var slider = $( 'section.example' ).find( '.slider-pro' );

			slider.sliderPro( 'destroy' );
			$( 'section.example' ).empty();
		}
	};

	jQuery( document ).ready(function() {
		var exampleIndex = 1;

		if ( window.location.hash !== '' ) {
			var index = window.location.hash.slice( -1 );

			if( isNaN( index ) === false ) {
				exampleIndex = index;
			}
		}

		SliderProExamples.loadExample( exampleIndex );

		$('.slider-pro-example').hover(function() {
			$( '.example-description' ).eq( $( this ).index() ).addClass( 'hovered-example' );
		}, function() {
			$( '.hovered-example' ).removeClass( 'hovered-example' );
		});

		$('.slider-pro-example').click(function() {
			SliderProExamples.loadExample( $( this ).index() + 1 );

			$( '.clicked-example' ).removeClass( 'clicked-example' );
			$( '.example-description' ).eq( $( this ).index() ).addClass( 'clicked-example' );
		});
	});
})( jQuery );
