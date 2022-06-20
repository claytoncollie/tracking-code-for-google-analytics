describe('Set tracking ID with option in admin UI', () => {
    before(() => {
        cy.login();
		cy.activatePlugin('tracking-code-for-google-analytics');
    });

    it('Can admin set tracking id?', () => {
        cy.visit('/wp-admin/options-general.php');
        cy.get('#tracking_code_for_google_analytics').clear().type('option');
		cy.get('#submit').click();

        cy.get('#tracking_code_for_google_analytics').invoke('val').should('eq', 'option');
    });
});