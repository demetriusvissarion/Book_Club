describe("Login test", () => {
    it("Login an existing user", () => {
        // cy.logout();

        // Go to Register/Login page
        cy.visit("/register");

        cy.get(":nth-child(3) > #email").type("demetrius.vissarion@gmail.com");
        cy.get(":nth-child(4) > #password").type("password");
        cy.get("form").contains("Log In").click();

        // check if success message is running after login
        cy.contains("Welcome Back!");
    });
});
