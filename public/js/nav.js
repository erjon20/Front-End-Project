// const { forEach } = require("lodash");

const navMobile = () => {
    const mobile_nav = document.querySelector(".mobile-nav");
    const nav = document.querySelector(".nav-links");
    const navLinks = document.querySelectorAll(".nav-links li");
    const mobile_socialMedia = document.querySelectorAll(
        ".nav-links .mobile-socialMedia"
    );

    // Mobile menu on/off
    mobile_nav.addEventListener("click", () => {
        nav.classList.toggle("nav-on");

        // social medias to mobile menu
        mobile_socialMedia.forEach((sMedia) => {
            sMedia.classList.toggle("mobile-mediaOn");
        });

        // Links appearing from right to left
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = "";
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${
                    index / 5 + 0.5
                }s`;
            }
        });

        mobile_nav.classList.toggle("close");
    });
};


navMobile();

$(document).ready(function () {
    $("a").on("click", function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $("html, body").animate(
                {
                    scrollTop: $(hash).offset().top,
                },
                100,
                function () {
                    window.location.hash = hash;
                }
            );
        }
    });

    $(".user_icon").click(function (e) {
        if ($(".user_dropdown").hasClass("active_user_sub")) {
            $(".user_dropdown").removeClass("active_user_sub");
            $("#user_btn").removeClass("active_user_sub");
            $(".user_dropdown")
                .find("ul")
                .find("li")
                .removeClass("active_user_sub");
        } else {
            $(".user_dropdown").addClass("active_user_sub");
            $("#user_btn").addClass("active_user_sub");
            $(".user_dropdown")
                .find("ul")
                .find("li")
                .addClass("active_user_sub");
            e.preventDefault();
        }
    });

    $(document).click(function () {
        $(".user_dropdown").removeClass("active_user_sub");
        $("#user_btn").removeClass("active_user_sub");
        $(".user_dropdown")
            .find("ul")
            .find("li")
            .removeClass("active_user_sub");
    });

    $(".user_icon").click(function (e) {
        e.stopPropagation();
    });
});

const changeUrlTeam = () => {
    window.location.replace('http://127.0.0.1:8000/#ourTeam');
}
const changeUrlGoal = () => {
    window.location.replace('http://127.0.0.1:8000/#ourGoal');
}
const changeUrlJoin = () => {
    window.location.replace('http://127.0.0.1:8000/#joinUs');
}
const changeUrlNews = () => {
    window.location.replace('http://127.0.0.1:8000/#news');
}


const temp1 = document.querySelector(".header-submenu");
const temp2 = document.querySelector(".after_arrow");

temp1.addEventListener('mouseover', () => {
    temp2.style.transform = "rotate(180deg)";
})

temp1.addEventListener('mouseleave', () => {
    temp2.style.transform = "rotate(0deg)";
})