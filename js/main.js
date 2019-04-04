document.addEventListener("swup:pageView", function () {
    //Menu
    let navbarLinks = document.querySelector(".navbar-links");
    let navbarSocial = document.querySelector(".navbar-social");


    //Contact
    let contactDiv = document.querySelector(".contact");
    //Links and Buttons
    let menu = document.getElementById("menu");
    let contact = document.querySelectorAll(".contact-btn");
    let close = document.querySelector(".close");
    //Wrapper
    let wrapper = document.getElementById("wrapper");


    //functions
    menu.addEventListener("click", function () {
        if (navbarLinks.classList) {
            navbarLinks.classList.toggle("pop-in");
            navbarSocial.classList.toggle("pop-out");
        }
    });

    for (i = 0; i < contact.length; i++) {
        contact[i].addEventListener("click", function () {
            if (contactDiv.classList) {
                contactDiv.classList.toggle("contact-in");
                wrapper.classList.toggle("blur");
            }
        });
    }


    close.addEventListener("click", function () {
        if (contactDiv.classList) {
            contactDiv.classList.toggle("contact-in");
            wrapper.classList.toggle("blur");
        }
    });
});