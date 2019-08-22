$(function() {

    // Only do this to the "Lighting Basics Trade Allies" results.
    var readMoreSelectors = ['#search-filter-results-1347 .list__item .allied-network-address'];

    // Pre-compile the list of selectors.
    readMoreSelectors = $.map(readMoreSelectors, function(selector) {
                                return selector + ':not(.popup-map-processed)';
                            }).join(', ');

    // 'sf:init' is fired when the page loads and after ajax search/pagination.
    var $window = $(window);
    $window.on('sf:init', addPopupMaps);

    function addPopupMaps() {
        $(readMoreSelectors)
            .addClass('popup-map-processed')
            .each(function(i, el) {
                var $address = $(el);
                $address
                    .find('a')
                    .on('click', $.proxy(addressClick, null, $address));

                $address
                    .find('.close')
                    .on('click', $.proxy(closeClick, null, $address));
            });
    }

    function addressClick($address, e) {
        if (isMobile()) {
            if (!$address.hasClass('open-map')) {
                e.preventDefault();
                $address.addClass('open-map');
            }
        }
    }

    function closeClick($address, e) {
        $address.removeClass('open-map');
    }

    function isMobile() {
        return $window.width() <= 568;
    }



});
