(function ( $ ) {

    $.fn.philcontact = function( options ) {

        var elem = $(this);

        var settings = $.extend({

            countryCode : "+63",
            areaCode    : "",
            maxNumber   : 10,
            minNumber   : 7,
            inputClass  : "philcontact-input",
            customClass : ""

        }, options );

        var countryCode = settings.countryCode;
            countryCodeDiv = $("<div>").addClass("philcontact-country-code");

        countryCodeDiv.html(countryCode);

        var newElem = $("<div/>");
        newElem.append(countryCodeDiv);
        newElem.addClass("philcontact-wrapper");

        var inputNumber = $('<input type="number">');

        if ( settings.inputClass != "" )
        {
            inputNumber.addClass(settings.inputClass);
        }


        var inputNumber   = document.createElement("input");

        inputNumber.type  = "number";
        inputNumber.value = elem.val().replace("+63","");
        inputNumber.className = settings.inputClass;

        $(inputNumber).attr("maxlength",settings.maxNumber);
        $(inputNumber).attr("minlength",settings.minNumber);
        $(inputNumber).css({
            width: parseFloat(elem.width()) - (parseFloat(34) + 10)
        });

        newElem.append($(inputNumber));

        var philcontDiv = $("<div/>").append(newElem).addClass("philcontact");

        philcontDiv.css({
            width: elem.width() + 15
        });

        if (settings.customClass != "") {
            philcontDiv.addClass(settings.customClass);
        }

        philcontDiv.insertAfter($(this));
        $(this).prop("type","hidden");

        $(inputNumber).on('keyup keypress paste',function(){
            var contact = settings.countryCode + $(this).val();
            if (contact.length > parseInt(settings.maxNumber) + 2) {
                elem.val(contact);
                return false;
            }else{
                elem.val(contact);
            }
        });

    };

}( jQuery ));
