/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});



$(document).ready(function(){

	// Change Price with Size
	$("#selSize").change(function(){
		var idsize = $(this).val();
		if(idsize==""){
			return false;
		}
		$.ajax({
			type:'get',
			url:'/get-product-price',
			data:{idsize:idsize},
			success:function(resp){
				var arr = resp.split('#');
				$("#getPrice").html("INR "+arr[0]);
				$("#price").val(arr[0]);
				if(arr[1]==0){
					$("#cartButton").hide();
					$("#Availability").text("Out Of Stock");
				}else{
					$("#cartButton").show();
					$("#Availability").text("In Stock");
				}
				
				
			},error:function(){
				alert("Error");
			}
		});
	});

	// Change Image
	$(".changeImage").click(function(){
		var image = $(this).attr('src');
		$("#mainImg").attr("src", image);
		/*$("#mainImgLarge").attr("href", image);*/
	});

	// Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });

});


$().ready(function(){
	//validate Register form on keyup and submit
	$('#registerForm').validate({
		rules:{
			name:{
				required:true,
				minlength:2,
				accept:"[a-zA-Z]+" 
			},
			password:{
				required:true,
				minlength:6
			},
			email:{
				required:true,
				email:true,
				remote:"/check-email"
				}
			},
		messages:{
			name:{
				required:"Please enter your Name",
				minlength: "Your Name must be atleast 2 characters long",
				accept:"Your Name must contain only letters"
			},
			password:{
				required: "Please provide your password",
				minlength: "Your password must be atleast 6 characters long"
			},
			email:{
				required: "Please enter your email",
				email: "Please enter valid email",
				remote: "Email already exist"
			}
		}
	});

	//validate Update User Account form on keyup and submit
	$('#accountForm').validate({
		rules:{
			name:{
				required:true,
				accept:"[a-zA-Z]+" 
			},
			address:{
				required:true
			},
			city:{
				required:true
				},
			state:{
				required:true
				},
			country:{
				required:true
				},
			pincode:{
				required:true
				},
			mobile:{
				required:true
				},
			
			},
		messages:{
			name:{
				required:"Please enter your Name",
				accept:"Your Name must contain only letters"
			},
			address:{
				required: "Please provide your address"
			},
			city:{
				required: "Please enter your city"
			},
			state:{
				required: "Please enter your state"
			},
			country:{
				required: "Please enter your country",
			},
			pincode:{
				required: "Please enter your pincode",
			},
			mobile:{
				required: "Please enter your mobile",
			},
			
		}
	});

		//validate Register form on keyup and submit
		$('#loginForm').validate({
			rules:{
				email:{
					required:true,
					email:true
					},

				password:{
					required:true,
				}
	
			},
			messages:{
		
				email:{
					required: "Please enter your email",
					email: "Please enter valid email",
				},
				password:{
					required: "Please provide your password",
				}
			}
		});

	//Check current user password
	$("#current_pwd").keyup(function(){
		var current_pwd = $(this).val();
		$.ajax({
			type: 'get',
			url: '/check-user-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if(resp=="false"){
					$("#chkPwd").html("<font color='red'>Current Password is incorrect</font>");
				}else if(resp=="true"){
					$("#chkPwd").html("<font color='green'>Current Password is correct</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	//check password user validate
	$("#passwordForm").validate({
		rules:{
			/*name:{
				required:true
			},*/
			/*email:{
				required:true,
				email: true
			},*/
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	

	//password strength script
	$('#myPassword').passtrength({
		minChars: 4,
		passwordToggle: true,
		tooltip: true,
		eyeImg: "/images/frontend_images/eye.svg"
	  });

	$("#copyAddress").click(function(){
		if(this.checked){
			$("#shipping_name").val($("#billing_name").val());
			$("#shipping_address").val($("#billing_address").val());
			$("#shipping_city").val($("#billing_city").val());
			$("#shipping_state").val($("#billing_state").val());
			$("#shipping_pincode").val($("#billing_pincode").val());
			$("#shipping_mobile").val($("#billing_mobile").val());
			$("#shipping_country").val($("#billing_country").val());
		}else{
			$("#shipping_name").val($('').val());
			$("#shipping_address").val($('').val());
			$("#shipping_city").val($('').val());
			$("#shipping_state").val($('').val());
			$("#shipping_pincode").val($('').val());
			$("#shipping_mobile").val($('').val());
			$("#shipping_country").val($('').val());
		}
	});
});

function selectPaymentMethod(){
	if($('#paypal').is(':checked') || $('#COD').is(':checked')){
		/*alert("THIS MODE IS UNDER DEVELPOMENT :)");*/
	}else{
		alert("Please select Payment Method");
		return false;
	}
}


