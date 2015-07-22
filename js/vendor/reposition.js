$(document).ready(function () {
    $('#Reposition').hide();
    //Pre-Header - move below logo if smaller than 640px
    $(window).width() < 640 ? $('#Reposition').prependTo('#Mobile').show() : $('#Reposition').prependTo('#Desktop').show();
});

$(window).resize(function () {
    //Pre-Header - move above logo if larger than 640px
    $(window).width() < 640 ? $('#Reposition').prependTo('#Mobile').show() : $('#Reposition').prependTo('#Desktop').show();
});