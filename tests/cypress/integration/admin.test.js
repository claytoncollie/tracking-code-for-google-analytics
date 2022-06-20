describe("Admin can login and make sure plugin is activated", () => {
	before(() => {
		cy.login();
	});

	it("Can activate plugin if it is deactivated", () => {
		cy.activatePlugin("tracking-code-for-google-analytics");
		cy.deactivatePlugin("tracking-code-for-google-analytics");
	});
});
