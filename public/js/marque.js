
$(document).ready(function() {
    console.log("ready");

    $('#marque').change(function () {
        console.log("change");
        if (($(this).val() != '')) {
            console.log("inif");
            var value = $(this).val();
            console.log(value);
            $.ajax({
                type: 'POST',
                url: '/projetLaravel/public/getModeles',
                data: {value: value, _token: token},
                success: function (result) {
                    console.log("success");
                    $('#modele').html(result);
                }
            });
        }
    });
});

