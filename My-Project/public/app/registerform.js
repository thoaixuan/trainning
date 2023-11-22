
// add validate select
$.validator.addMethod("ForSelect", function(value, element, param){
    return value != "";
   }, "Chọn ngành học");

$("#register-form").validate({
    rules: {
        fullName: "required",
        phoneNumber: {
            required: true,
            minlength: 9,
            maxLength: 12
        },
        email: {
            required: true,
            email: true
        },
        selectMajor:{
            ForSelect: true
        }
    },
    messages: {
        fullName: "Please enter your firstname",
        phoneNumber: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
        },
        confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long",
            equalTo: "Please enter the same password as above"
        },
        email: "Please enter a valid email address",
        agree: "Please accept our policy",
        topic: "Please select at least 2 topics"
    }
});
