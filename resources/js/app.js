import "./bootstrap";
import Alpine from "alpinejs";
//jQuery
import $ from "jquery";
window.$ = $;
window.jQuery = $;

window.Alpine = Alpine;

Alpine.data("navbarScroll", () => ({
    showNavbar: true,
    lastScroll: 0,

    init() {
        console.log("navbar init jalan");

        window.addEventListener("scroll", () => {
            let currentScroll = window.pageYOffset;

            if (currentScroll <= 10) {
                this.showNavbar = true;
            } else if (currentScroll > this.lastScroll) {
                this.showNavbar = false;
            } else {
                this.showNavbar = true;
            }

            this.lastScroll = currentScroll;
        });
    },
}));

Alpine.data("navbarScrollDesktop", () => ({
    showNavbar: true,
    lastScroll: 0,

    init() {
        console.log("navbar init jalan");

        window.addEventListener("scroll", () => {
            let currentScroll = window.pageYOffset;

            if (currentScroll <= 10) {
                this.showNavbar = true;
            } else if (currentScroll > this.lastScroll) {
                this.showNavbar = false;
            } else {
                this.showNavbar = true;
            }

            this.lastScroll = currentScroll;
        });
    },
}));

Alpine.start();
