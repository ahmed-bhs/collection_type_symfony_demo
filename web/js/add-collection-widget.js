$( document ).ready(function() {
    var $wrapper = $('.js-members-wrapper');
    $wrapper.on('click', '.js-remove-member', function(e) {
        e.preventDefault();
        $(this).closest('.js-member-item')
        .fadeOut()
        .remove();
    });
    $wrapper.on('click', '.js-member-add', function(e) {
        e.preventDefault();
                    // Get the data-prototype explained earlier
                    var prototype = $wrapper.data('prototype');
                    // get the new index
                    var index = $wrapper.data('index');
                    var newForm = prototype.replace(/__name__/g, index);
                    $wrapper.data('index', index + 1);
                    $(this).before(newForm);
                });
});