document.addEventListener('DOMContentLoaded', () => {

    document.getElementById('toggle-menu').addEventListener('click', function () {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    });


    const headers = document.querySelectorAll('.accordion-header');

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const body = header.nextElementSibling;

            if (body.style.maxHeight) {
                body.style.maxHeight = null;
                body.style.padding = '0 15px';
                body.querySelector('p').style.opacity = 0;
            } else {
                document.querySelectorAll('.accordion-body').forEach(item => {
                    item.style.maxHeight = null;
                    item.style.padding = '0 15px';
                    item.querySelector('p').style.opacity = 0;
                });

                body.style.maxHeight = body.scrollHeight + "px";
                body.style.padding = '0px 15px';
                body.querySelector('p').style.opacity = 1;
            }
        });
    });


    const backToTopBtn = document.getElementById("backToTopBtn");

    // When the user scrolls down 100px from the top, show the button
    window.onscroll = function () {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopBtn.style.display = "block";
        } else {
            backToTopBtn.style.display = "none";
        }
    };

    // When the user clicks on the button, scroll to the top of the document
    backToTopBtn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

});
