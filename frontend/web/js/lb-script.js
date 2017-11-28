$(document).ready(function ($) {

    // delegate calls to data-toggle="lightboxgallary"
    $(document).delegate('*[data-toggle="lightboxgallary"]:not([data-gallery="navigateTo"])', 'click', function(event) {
        event.preventDefault();
        return $(this).ekkoLightbox({ });
    });

});