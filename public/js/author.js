$(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        // $('#load a').css('color', '#dfecf6');
        // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');  
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.authors').html(data);  
        }).fail(function () {
            alert('Authors could not be loaded.');
        });
    }
});