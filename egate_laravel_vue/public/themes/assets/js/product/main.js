(function() {
    "use strict";
 // Porfolio isotope and filter
    // Easy selector helper function
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
        return [...document.querySelectorAll(el)]
        } else {
        return document.querySelector(el)
        }
    }

    // Easy event listener function
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
        if (all) {
            selectEl.forEach(e => e.addEventListener(type, listener))
        } else {
            selectEl.addEventListener(type, listener)
        }
        }
    }
 
    window.addEventListener('load', () => {
        let portfolioContainer = select('#shoping-grid');
        if (portfolioContainer) {
        let portfolioIsotope = new Isotope(portfolioContainer, {
            itemSelector: '.item',
        });

        let portfolioFilters = select('#filters a', true);
    console.log(portfolioFilters)
        on('click', '#filters a', function(e) {
            e.preventDefault();
            portfolioFilters.forEach(function(el) {
            el.classList.remove('active');
            });
            this.classList.add('active');

            portfolioIsotope.arrange({
            filter: this.getAttribute('data-filter')
            });
            portfolioIsotope.on('arrangeComplete', function() {
            AOS.refresh()
            });
        }, true);
        }

    });
})()