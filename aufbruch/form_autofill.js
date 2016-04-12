jQuery(document).ready(function() {

    var names = ['firstname', 'lastname', 'email', 'telephone-number', 'postleitzahl', 'ort', 'strasse-hausnummer'];

    names.forEach(function(name) {
        var inputField = jQuery('[name="' + name +'"]');

        inputField.val(localStorage.getItem('form-' + name));

        inputField.on('keyup', function() {
            localStorage.setItem('form-' + name, jQuery(this).val());
        });
    });

});
