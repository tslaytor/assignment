document.addEventListener("DOMContentLoaded", function (){

    // initialize the form element for Dvd
    document.getElementById('size').required = true;
    document.getElementsByClassName('weightWrap')[0].style.display = 'none';
    document.getElementsByClassName('dimensionWrap')[0].style.display = 'none';

    // select the product switcher and add listener for changes
    var dropDown = document.getElementById('productType');
    dropDown.selectedIndex = 0;

    dropDown.addEventListener('change', () => {
        var wraps = ['sizeWrap', 'weightWrap', 'dimensionWrap'];
        // on change, reset all product specific form elements
        wraps.forEach((wrap) => {
            var htmlElement = document.getElementsByClassName(wrap)[0];
            htmlElement.style.display = 'none';
            htmlElement.querySelectorAll('input').forEach((input) => {input.required = false; input.value =''});
        });
        // and set the selected form element to be visible and required
        var selectedHtmlElement = document.getElementsByClassName(wraps[dropDown.selectedIndex])[0];
        selectedHtmlElement.style.display = 'grid';
        selectedHtmlElement.querySelectorAll('input').forEach((input) => {input.required = true; });
    });
});

