$('.bgrd').mousemove(function(e)
{ 
    var moveX = (e.pageX * -1/20);
    var moveY = (e.pageY * -1/20);
    $(this).css('background-position', moveX + 'px  ' + moveY + 'px  ')
})

$('.bgrd2').mousemove(function(e)
{ 
    var moveX = (e.pageX * -1/20);
    var moveY = (e.pageY * -1/20);
    $(this).css('background-position', moveX + 'px  ' + moveY + 'px  ')
})