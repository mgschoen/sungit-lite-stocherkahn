(function($){

    function leadingZero (val) {
        return (val < 10) ? '0' + val : '' + val;
    }

    function updateDisplay (diff) {
        var sec = diff % 60;
        var min = Math.floor(diff / 60) % 60;
        var hrs = Math.floor(diff / 3600) % 24;
        var days = Math.floor(diff / 86400);
        var timeString = days + ' Tage und ' + hrs + ':' + leadingZero(min) + ':' + leadingZero(sec) + ' Stunden';
        $('.sk-counter-display').text(timeString);
        window.setTimeout(function(){
            updateDisplay(diff-1)
        }, 1000);
    }

    $(document).ready(function(){
        var diff = parseInt($('.sk-counter')[0].getAttribute('data-remaining'));
        updateDisplay(diff);
    });

})(jQuery);