$(function() {
    //Get the button
    let scrollup = document.getElementById("scrollup");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            scrollup.style.display = "block";
        } else {
            scrollup.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    scrollup.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    $('form[name="professional_interest"]').on('submit', function(){
        console.log('professional_interest: submitted');
    });
    $('form[name="general_information"]').on('submit', function(){
        console.log('general_information: submitted');
    });
});