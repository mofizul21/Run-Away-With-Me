/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
(function ()
{
    const siteNavigation = document.getElementById('site-navigation');

    // Return early if the navigation don't exist.
    if (!siteNavigation)
    {
        return;
    }

    const button = siteNavigation.getElementsByTagName('button')[0];

    // Return early if the button don't exist.
    if ('undefined' === typeof button)
    {
        return;
    }

    const menu = siteNavigation.getElementsByTagName('ul')[0];

    // Hide menu toggle button if menu is empty and return early.
    if ('undefined' === typeof menu)
    {
        button.style.display = 'none';
        return;
    }

    if (!menu.classList.contains('nav-menu'))
    {
        menu.classList.add('nav-menu');
    }

    // Toggle the .toggled class and the aria-expanded value each time the button is clicked.
    button.addEventListener('click', function ()
    {
        siteNavigation.classList.toggle('toggled');

        if (button.getAttribute('aria-expanded') === 'true')
        {
            button.setAttribute('aria-expanded', 'false');
        } else
        {
            button.setAttribute('aria-expanded', 'true');
        }
    });

    // Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
    document.addEventListener('click', function (event)
    {
        const isClickInside = siteNavigation.contains(event.target);

        if (!isClickInside)
        {
            siteNavigation.classList.remove('toggled');
            button.setAttribute('aria-expanded', 'false');
        }
    });

    // Get all the link elements within the menu.
    const links = menu.getElementsByTagName('a');

    // Get all the link elements with children within the menu.
    const linksWithChildren = menu.querySelectorAll('.menu-item-has-children > a, .page_item_has_children > a');

    // Toggle focus each time a menu link is focused or blurred.
    for (const link of links)
    {
        link.addEventListener('focus', toggleFocus, true);
        link.addEventListener('blur', toggleFocus, true);
    }

    // Toggle focus each time a menu link with children receive a touch event.
    for (const link of linksWithChildren)
    {
        link.addEventListener('touchstart', toggleFocus, false);
    }

    /**
     * Sets or removes .focus class on an element.
     */
    function toggleFocus()
    {
        if (event.type === 'focus' || event.type === 'blur')
        {
            let self = this;
            // Move up through the ancestors of the current link until we hit .nav-menu.
            while (!self.classList.contains('nav-menu'))
            {
                // On li elements toggle the class .focus.
                if ('li' === self.tagName.toLowerCase())
                {
                    self.classList.toggle('focus');
                }
                self = self.parentNode;
            }
        }

        if (event.type === 'touchstart')
        {
            const menuItem = this.parentNode;
            event.preventDefault();
            for (const link of menuItem.parentNode.children)
            {
                if (menuItem !== link)
                {
                    link.classList.remove('focus');
                }
            }
            menuItem.classList.toggle('focus');
        }
    }
}());

// SWITCHER
// const sunMoonContainer = document.querySelector('.sun-moon-container')
// document.querySelector('.theme-toggle-button').addEventListener('click',() =>{    
//     document.body.classList.toggle('dark');
//     const currentRotation = parseInt(getComputedStyle(sunMoonContainer).getPropertyValue('--rotation'));
//     sunMoonContainer.style.setProperty('--rotation',currentRotation+360)
// });

// POST SLIDER
var slider = document.getElementById('slider')
var sliderItem = slider.getElementsByTagName('div');
var dots = document.getElementById('dots');
var dotsChild = document.getElementById('dots').getElementsByTagName('li');
for (i = 0; i < sliderItem.length; i++)
{
    dots.appendChild(document.createElement('li'));
    dotsChild[i].classList.add('list-inline-item');
    dotsChild[i].setAttribute("id", i);
    dotsChild[i].innerHTML = i;
    dotsChild[0].classList.add('active');
    dotsChild[i].addEventListener("click", runSlider);
}
function runSlider()
{
    var dnum = this.getAttribute("id");
    for (i = 0; i < sliderItem.length; i++)
    {
        sliderItem[i].classList.remove('active');
        sliderItem[dnum].classList.add('active');
        dotsChild[i].classList.remove('active');
        dotsChild[dnum].classList.add('active');
    }
}

// BACK TO TOP
var mybutton = document.getElementById('backToTop');
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () { scrollFunction() };
function scrollFunction()
{
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
    {
        mybutton.style.display = "block";
    } else
    {
        mybutton.style.display = "none";
    }
}
// When the user clicks on the button, scroll to the top of the document
function topFunction()
{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}