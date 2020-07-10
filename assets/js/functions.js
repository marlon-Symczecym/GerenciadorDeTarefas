$(function() {

    let arrow = $('i#user--arrow');

    $('i.user--arrow').click(function() {
        $('.menu--wrapper .menu--user').slideToggle();
    });

})