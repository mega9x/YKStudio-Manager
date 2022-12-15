$(function () {

    var left = $('.left');
    var right = $('.right');
    var down = $('.down');
    var up = $('.up');
    var bg = $('.bgDiv');
    var leftNav = $('.leftNav');
    var rightNav = $('.rightNav');
    var downNav = $('.downNav');
    var upNav = $('.upNav');

    showNav(left, leftNav, "left");
    showNav(right, rightNav, "right");
    showNav(up, upNav, "up");
    showNav(down, downNav, "down");


    function showNav(btn, navDiv, direction) {
        btn.on('click', function () {
            bg.css({
                display: "block",
                transition: "opacity .3s"
            });
            if (direction == "right") {
                navDiv.css({
                    right: "0px",
                    transition: "right .3s"
                });
            } else if (direction == "left") {
                navDiv.css({
                    left: "0px",
                    transition: "left .3s"
                });
            } else if (direction == "up") {
                navDiv.css({
                    top: "0px",
                    transition: "top .3s"
                });
            } else if (direction == "down") {
                navDiv.css({
                    bottom: "0px",
                    transition: "bottom 1s"
                });
            }


        });
    }

/*    $('span').each(function () {
        var dom = $(this);
        dom.on('click', function () {
            hideNav();
            alert(dom.text())
        });
    });*/


    bg.on('click', function () {
        hideNav();
    });

    function hideNav() {
        leftNav.css({
            left: "-80%",
            transition: "left .3s"
        });
        rightNav.css({
            right: "-80%",
            transition: "right .3s"
        });
        upNav.css({
            top: "-40%",
            transition: "top .3s"
        });
        downNav.css({
            bottom: "-50%",
            webkitTransition:"bottom .5s",
            oTransition:"bottom .5s",
            mozTransition:"bottom .5s",
            transition: "bottom .5s"
        });
        bg.css({
            display: "none",
            transition: "display 1s"
        });
    }
});