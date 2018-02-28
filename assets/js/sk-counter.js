(function($){

    function leadingZero (val) {
        return (val < 10) ? '0' + val : '' + val;
    }

    function updateDisplay (diff) {
        if (diff > 0) {

            var sec = diff % 60;
            var min = Math.floor(diff / 60) % 60;
            var hrs = Math.floor(diff / 3600) % 24;
            var days = Math.floor(diff / 86400);
            var timeString =
                ((days > 0) ? days + ((days === 1) ? ' Tag und ' : ' Tage und ') : '') +
                hrs + ':' + leadingZero(min) + ':' + leadingZero(sec) +
                ((hrs === 1) ? ' Stunde' : ' Stunden');
            $('.sk-counter-display').text(timeString);
            window.setTimeout(function(){
                updateDisplay(diff-1)
            }, 1000);

        } else {

            var expireMessage = $('.sk-counter')[0].getAttribute('data-expire-message');
            $('.sk-counter-overline').text('');
            $('.sk-counter-display').text(expireMessage);
            $('.sk-counter-underline').text('');

        }
    }

    $(document).ready(function(){
        var diff = parseInt($('.sk-counter')[0].getAttribute('data-remaining'));
        updateDisplay(diff);
    });

})(jQuery);