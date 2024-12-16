//import {Logout} from "../JS/logout.js";

export class UIGeneral {
    constructor() {
        this.initializeEvents();
      // this.logout = new Logout();
    }

    initializeEvents() {
        this.setupNavbarMenu();
        this.setupCommentSection();
    }

    setupNavbarMenu() {
        $("#open-navbar-menu").click(() => this.openNavbarMenu());
        $("#close-menu-drop").click(() => this.closeNavbarMenu());
    }

    openNavbarMenu() {
        $(".menu-components").show();
    }

    closeNavbarMenu() {
        $(".menu-components").hide();
    }

    setupCommentSection() {
        $('input[name="addComment"]').change(() => this.toggleCommentSection());
    }

    toggleCommentSection() {
        if ($('#commentYes').is(':checked')) {
            $('#comment-section').css('display', 'flex');
        } else {
            $('#comment-section').css('display', 'none');
        }
    }
}
