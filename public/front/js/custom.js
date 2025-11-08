// === QTY JS === //
function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});

// wishlist script //
$(document).ready(function() {
	$('.like-icon, .like-button').on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('liked');
		$(this).children('.like-icon').toggleClass('liked');
	});
});

// menu script //
$ (document).ready(function() {
	var fixHeight = function() {
		$ (".navbar-nav").css(
			"max-height",
			document.documentElement.clientHeight - 8000
		);
	};
	
		fixHeight();
		
	$(window).resize(function() {
		fixHeight();
	});
	
	$(".navbar .navbar-toggler").on("click", function() {
		fixHeight();
	});			

	$ (".navbar-toggler, .overlay").on("click", function() {
		$ (".mobileMenu, .overlay").toggleClass("open");
		console.log("clicked");
	});
});


// === Dropdown === //

$('.ui.dropdown')
  .dropdown()
;

// === Model === //
$('.ui.modal')
  .modal({
    blurring: true
  })
  .modal('show')
;

// === Tab === //
$('.menu .item')
  .tab()
;

// === checkbox Toggle === //
$('.ui.checkbox')
  .checkbox()
;

// === Toggle === //
$('.enable.button')
  .on('click', function() {
    $(this)
      .nextAll('.checkbox')
        .checkbox('enable')
    ;
  })
 ;


// Payment Method Accordion //
$('input[name="paymentmethod"]').on('click', function () {
	var $value = $(this).attr('value');
	$('.return-departure-dts').slideUp();
	$('[data-method="' + $value + '"]').slideDown();
});



//  Countdown //
$(".product_countdown-timer").each(function(){
	var $this = $(this);
	$this.countdown($this.data('countdown'), function(event) {
	  $(this).text(
		event.strftime('%D days %H:%M:%S')
	  );
	});
});


// === Banner Home === //
$('.offers-banner').owlCarousel({
	loop:true,
    margin:30,
	nav:false,
	dots:false,
    autoplay:true,
    autoplayTimeout: 3000,
    autoplayHoverPause:true,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		800:{
			items:2
		},
		1000:{
			items:2
		},
		1200:{
			items:3
		},
		1400:{
			items:3
		},
		1600:{
			items:3
		}
	}
})

// Category Slider
$('.cate-slider').owlCarousel({
	loop:true,
	margin:30,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:2
		},
		600:{
			items:2
		},
		1000:{
			items:4
		},
		1200:{
			items:6
		},
		1400:{
			items:6
		}
	}
})

// Featured Slider
$('.featured-slider').owlCarousel({
	items: 8,
	loop:false,
	margin:10,
	nav:true,
	dots:false,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:3
		},
		1200:{
			items:4
		},
		1400:{
			items:5
		}
	}
})

// === Date Slider === //
$('.date-slider').owlCarousel({
	loop:false,
    margin:10,
	nav:false,
	dots:false,
	responsive:{
		0:{
			items:3
		},
		600:{
			items:4
		},
		1000:{
			items:5
		},
		1200:{
			items:6
		},
		1400:{
			items:7
		}
	}
})

// === Banner Home === //
$('.life-slider').owlCarousel({
	loop:true,
    margin:30,
	nav:true,
	dots:false,
    autoplay:true,
    autoplayTimeout: 3000,
    autoplayHoverPause:true,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:2
		},
		1200:{
			items:3
		},
		1400:{
			items:3
		}
	}
})

// === Testimonials Slider === //
$('.testimonial-slider').owlCarousel({
	loop:true,
    margin:30,
	nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout: 3000,
    autoplayHoverPause:true,
	navText: ["<i class='uil uil-angle-left'></i>", "<i class='uil uil-angle-right'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:2
		},
		1200:{
			items:3
		},
		1400:{
			items:3
		}
	}
})

// Category Slider
$('.team-slider').owlCarousel({
	loop:true,
	margin:30,
	nav:false,
	dots:false,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:3
		},
		1200:{
			items:4
		},
		1400:{
			items:4
		}
	}
})


$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click', '.like-icon', function(e) {
    e.preventDefault();
    let productId = $(this).data('id');
    let icon = $(this);

    $.ajax({
        url: '/user/wishlist/toggle/' + productId,
        type: 'POST',
		xhrFields: {
			withCredentials: true
		},
		cache: false,
        success: function(response) {
            if (response.status === 'added') {
                icon.addClass('active'); // add red heart
            } else {
                icon.removeClass('active'); // remove red heart
            }
        },
        error: function(xhr) {
			if (xhr.status === 419) {
                alert('CSRF token expired! Please refresh the page.');
            } else if (xhr.status === 401) {
                alert('Please login to use wishlist!');
            } else {
                alert('Something went wrong! (' + xhr.status + ')');
            }
		}
    });
});

$(document).on('click', '.remove-wishlist', function(e) {
    e.preventDefault();
    let productId = $(this).data('id');
    let item = $('#wishlist-item-' + productId);

    $.ajax({
        url: '/user/wishlist/toggle/' + productId,
        type: 'POST',
        success: function(response) {
            if (response.status === 'removed') {
                item.fadeOut(300, function() {
                    $(this).remove();
                });
            }
        },
        error: function(xhr) {
            if (xhr.status === 401) {
                alert('Please login to manage wishlist!');
            } else {
                alert('Something went wrong!');
            }
        }
    });
});


// add to cart
    $(document).on('click', '.add-to-cart', function (e) {
		e.preventDefault();
		
        let product_id = $(this).data('id');
        let qty = $(this).closest('.qty-cart').find('.qty').val();

        $.ajax({
            url: '/user/cart/add',
            type: "POST",
            data: {
                product_id: product_id,
                quantity: qty
            },
            success: function (response) {
                if (response.success) {
                    toastr.success(response.success_msg);
					updateCartSidebar();
                } else {
                    toastr.error(response.message || 'Something went wrong');
                }
            },
            error: function () {
                toastr.error('Server error');
            }
        });
    });

	// Update quantity
    $(document).on('click', '.new-plus, .new-minus', function(e) {
		e.preventDefault(); 
		$('.bs-canvas-left').addClass('open ml-0');
        let $input = $(this).siblings('input[name="quantity"]');
        let qty = parseInt($input.val());

        let id = $(this).closest('.cart-item').data('id');
        $.ajax({
            url: "/cart/update",
            type: "POST",
            data: {
                id: id,
                quantity: qty
            },
            success: function(response) {
                updateCartSidebar(true);
				$('#cart-sidebar-container').html(response.html);
				$('.bs-canvas-left').addClass('open ml-0');
				
            }
        });
    });

    // Remove item
    $(document).on('click', '.cart-close-btn', function(e) {
		e.preventDefault();
		$('.bs-canvas-left').addClass('open ml-0');
        let id = $(this).closest('.cart-item').data('id');
        $.ajax({
            url: "/cart/remove",
            type: "POST",
            data: { id: id },
            success: function(response) {
				updateCartSidebar(true);
                $('#cart-sidebar-container').html(response.html);
				$('.bs-canvas-left').addClass('open ml-0');
            }
        });
    });

    // Refresh sidebar
    function updateCartSidebar(openSidebar = false) {
        $.ajax({
			url: "/cart/html",
			method: "GET",
			success: function(response) {
				if(response.success) {
					$('#cart-sidebar-container').html(response.html);
					$('#cartTotal').html(response.cart);
					
					if (openSidebar) {
						$('.bs-canvas-left').addClass('open ml-0');
					}
				}
			}
		});
    }
	updateCartSidebar();


	$(document).on('click', '.chck-btn[href="#otp-verifaction"]', function(e) {
		e.preventDefault();

		let phone = $('input[placeholder="Phone Number"]').val();

		$.ajax({
			url: "/user/checkout/send-otp",
			type: "POST",
			data: {
				phone: phone
			},
			success: function(res) {
				if (res.status === 'success') {
					alert('OTP sent to ' + phone);
					$('.otp-verifaction').slideDown();
				} else {
					alert('Error sending OTP');
				}
			}
		});
	});

	$(document).on('click', '.otp-verifaction .chck-btn[href="#collapseTwo"]', function(e) {
		e.preventDefault();

		let otp = '';
		$('.code-alrt-inputs input').each(function() {
			otp += $(this).val();
		});

		$.ajax({
			url: "/user/checkout/verify-otp",
			type: "POST",
			data: {
				otp: otp
			},
			success: function(res) {
				if (res.status === 'verified') {
					alert('Phone verified successfully!');
					
					toastr.success('Phone verified successfully!');
					$('#collapseTwo').collapse('show');
				} else {
					alert(res.message);
				}
			}
		});
	});

	$('.save-btn14').on('click', function(e){
		e.preventDefault();

		$.ajax({
			url: "/user/address/store",
			method: "POST",
			data: {
				type: $('input[name="address1"]:checked').next('label').text(),
				address_line: $('#flat').val() + ', ' + $('#street').val(),
				city: $('#Locality').val(),
				state: $('#state').val(),
				pincode: $('#pincode').val(),
				country: 'India'
			},
			success: function(res){
				toastr.success('Address added successfully!');
			},
			error: function(){
				alert('Something went wrong!');
			}
		});
	});
