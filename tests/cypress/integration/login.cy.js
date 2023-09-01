describe("Login test", () => {
    it("Login an existing user", () => {
        // Go to Register/Login page
        cy.visit("/register");

        cy.get(":nth-child(3) > #email").type("demetrius.vissarion@gmail.com");
        cy.get(":nth-child(4) > #password").type("password");
        cy.get("form").contains("Log In").click();

        // check if success message is running after login
        cy.contains("Welcome Back!");
    });

    it("Log out an existing user", () => {
        cy.visit("/register");
        cy.get(":nth-child(3) > #email").type("demetrius.vissarion@gmail.com");
        cy.get(":nth-child(4) > #password").type("password");
        cy.get("form").contains("Log In").click();

        // cy.window().then((win) => win.sessionStorage.clear());
        // cy.clearCookies();
        // cy.clearLocalStorage();
        cy.get("#submit").click({ force: true });
        cy.contains("a", "Log Out").click();

        cy.visit("/");
        cy.get(".ml-6").contains("Register");
    });
});
