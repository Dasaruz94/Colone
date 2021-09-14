var Script = function () {


    $().ready(function() {
        // validate the comment form when it is submitted
        $("#commentForm").validate();

        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
                name: "required",
                ap: "required",
                am: "required",
                namezone: "required",
                num_place: "required",
                tel: "required",
                code: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
                name: "Queremos saber quién eres ",
                namezone: "¿Cómo se llama la zona?",
                ap: "Pero...¿Cómo te apellidas? ",
                am: "Por favor completa este campo ",
                num_place: "Completa este campo",
                tel: "Ingresa un número de contacto",
                code: "Necesitamos este código ",
                password: {
                    required: "Ingresa una contraseña  ",
                    minlength: "Debe contar con más de 6 caracteres"
                },
                confirm_password: {
                    required: "Confirma la contraseña que elegiste",
                    minlength: "Debe contar con más de 6 caracteres",
                    equalTo: "mmm...las contraseñas no son iguales"
                },
                email: "Ingresa un correo valido",
                agree: "Please accept our policy"
            }
        });


        // validate signup form on keyup and submit
        $("#adviceForm").validate({


            rules: {
                notename: "required",
                note: "required",

            },
            messages: {
                notename: "¿Cuál es el asunto?  ",
                note: "¿Qué les quieres decir? ",

            }
        });




        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();