describe('Set tracking ID with PHP filter', () => {
    before(() => {
		cy.login();
		cy.activatePlugin('filter');
    });

    it('Is input field disabled?', () => {
        cy.visit('/wp-admin/options-general.php');
        cy.get('#tracking_code_for_google_analytics').should('be.disabled');
    });

	it('Does input field contain the filtered value?', () => {
        cy.visit('/wp-admin/options-general.php');
        cy.get('#tracking_code_for_google_analytics').invoke('val').should('eq', 'filter');
    });

	it('Is tracking code printed to the head?', () => {
		cy.logout();
		cy.visit('/');
		cy.document().get('head script[src*="https://www.googletagmanager.com/gtag/js?id=filter"]');
	});

	after(() => {
		cy.login();
		cy.deactivatePlugin("filter");
	});
});