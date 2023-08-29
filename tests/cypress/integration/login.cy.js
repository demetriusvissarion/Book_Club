describe("Login test", () => {
    it("Login an existing user", () => {
        // cy.logout();

        // Go to Register/Login page
        cy.visit("/register");

        cy.get(":nth-child(3) > #email").type("demetrius.vissarion@gmail.com");
        cy.get(":nth-child(4) > #password").type("password");
        cy.get("form").contains("Log In").click();

        // 'Welcome Back!'
        cy.on("window:alert", (str) => {
            expect(str).to.equal("Welcome Back!");
        });
    });
});
