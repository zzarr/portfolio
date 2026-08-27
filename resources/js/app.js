import "./bootstrap";
import Alpine from "alpinejs";
//jQuery
import $ from "jquery";
window.$ = $;
window.jQuery = $;

window.Alpine = Alpine;

import "datatables.net-bs5";
import "datatables.net-responsive-bs5";
import "datatables.net-fixedheader-bs5";

import "datatables.net-bs5/css/dataTables.bootstrap5.min.css";
import "datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css";
import "datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css";

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
