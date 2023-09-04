describe("Add a new test book as admin", () => {
    it("Login as an admin and Add a new test book", () => {
        // Go to Register/Login page
        cy.visit("/register");
        cy.get(":nth-child(3) > #email").type("demetrius.vissarion@gmail.com");
        cy.get(":nth-child(4) > #password").type("password");
        cy.get("form").contains("Log In").click();
        // check if success message is running after login
        cy.contains("Welcome Back!");

        // delete test book from DB using the model

        // click add new book button
        // fill form (cover all cases)
        // submit form
        // check for success message
        // navigate to home page and check if book is displayed as last book posted
    });
});
