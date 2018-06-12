$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        var url = $(this).attr('href');  
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.books').html(data);  
        }).fail(function () {
            alert('Books could not be loaded.');
        });
    }
});