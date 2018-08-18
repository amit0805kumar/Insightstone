function active(){
    document.querySelector(".right__container").classList.toggle('active-form');
}


$(function(){

	$.validator.addMethod( "alphanumeric", function( value, element ) {
	return this.optional( element ) 
	|| /^\w+$/i.test( value )
	&& value.length>=3
	&& value.length<=40;
    }, "Please Enter a Valid Input" );

    $.validator.addMethod( "invalid_characters", function( value, element ) {
	return this.optional( element ) || /^[^&<>'"]+$/i.test( value );
    }, "Please Enter a Valid Input" );

    $.validator.setDefaults({
    errorClass: 'text-danger'
  });

$("#join_us_form").validate({
        rules: {
            
			name: {
                required: true,
                invalid_characters:true
             
            },
			email: {
				required:true,
				invalid_characters:true
			},
			contact_number: {
				required:true,
				invalid_characters:true,
				digits:true
			},
			college: {
                required: true,
                invalid_characters:true
            },
            profile_link: {
                required: true,
                invalid_characters:true,
                url:true
            },
            followers: {
                required: true,
                invalid_characters:true,
                digits:true
            }						
        },
        messages:{
		     name :{
				alphanumeric:'Please Enter a Valid Name'
			},
			profile_link :{
				url:'Please Enter a Valid Profile Link'
			}

		}
    });
});
     function loaderFun() {
            var test = setTimeout(loadPage, 500);
        }

        function loadPage() {
            document.getElementById("loader-c").classList.add("loaderFade");
            document.getElementById("loader").style.width="0";
        }