
$(document).on("paste", ".only-numbers, .only-decimal-numbers", function (e){
    var $this = $(this);

    var regExpOnlyNumbers = new RegExp(/^(0|[1-9][0-9]*)$/);
    var regExpDecimalsNumbers = new RegExp(/^(0|[1-9]\d*)(\.\d+)?$/);

    var pastedText = e.originalEvent.clipboardData.getData('Text');

    var text = $this.val() + pastedText;

    if (!regExpOnlyNumbers.test(text)) {
        e.preventDefault();
    } else {
        if (!regExpDecimalsNumbers.test(text)) {
            e.preventDefault();
        }
    }

});

    document.getElementById("number").onblur =function (){
        var val = $(this).val();
        if(isNaN(val)){
            val = val.replace(/[^0-9\.]/g,'');
            if(val.split('.').length>2)
                val =val.replace(/\.+$/,"");
        }
        $(this).val(val);
    };


