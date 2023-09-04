describe("Example Test", () => {
    it("shows a homepage", () => {
        cy.logout();

        cy.login();

        cy.visit("/");

        cy.contains("Title");
    });
});
