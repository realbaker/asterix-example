$(function() {

    // Only do this to the "Leaders of the Pack" results.
    var readMoreSelectors = ['#search-filter-results-218 .list__item'];

    // Pre-compile the list of selectors.
    readMoreSelectors = $.map(readMoreSelectors, function(selector) {
                                return selector + ':not(.read-more-processed)';
                            }).join(', ');

    // 'sf:init' is fired when the page loads and after ajax search/pagination.
    $(window).on('sf:init', addReadMoreToItems);

    function addReadMoreToItems() {
        $(readMoreSelectors)
            .addClass('read-more-processed')
            .each(function(i, el) {
                // Initialize after the first image is loaded.
                $(el)
                    .find('img:eq(0)')
                    .each(function(i, img) {
                        afterImageLoaded(img, function() {
                            addReadMoreToItem(el);
                        })
                    });
            });
    }

    function addReadMoreToItem(el) {
        var $el = $(el);
        var $img = $el.find('img:eq(0)');
        var imgHeight = $img.height()
        var $content = $el.find('> *:not(img)');
        var $afterElements = $();
        var height = 0;

        // Calculate which elements extend beyond the image height, can't
        // include the first one.
        $content.each(function(i, contentEl) {
            height += $(contentEl).height();
            if (i > 1 && height > imgHeight) {
                $afterElements = $afterElements.add(contentEl);
            }
        })

        var $readMoreWrapper = $('<div class="read-more-wrapper"></div>')
        var $readMore = $('<a href="#" class="list__item--btn read-more">Read More &nbsp;&nbsp;▾</a>');

        $readMoreWrapper.append($readMore);
        $readMoreWrapper.insertBefore($afterElements.filter(':eq(0)'));

        $afterElements.hide();

        $readMore.on('click', function(e) {
            e.preventDefault();
            $readMoreWrapper.hide();
            $afterElements.fadeIn();
        });
    }

    function afterImageLoaded(imgEl, fn) {
        if (imgEl.complete) {
            fn();
        }
        else {
            $(imgEl)
                .on('load', fn)
                .on('error', fn)
        }
    }

});
