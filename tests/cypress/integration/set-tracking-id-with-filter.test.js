describe('Set tracking ID with PHP filter', () => {
    // before(() => {
		// cy.wpCli('plugin scaffold tracking-code-for-google-analytics-id --skip-tests --activate');
		// cy.login('clayton','clayton');
		// cy.activatePlugin('tracking-code-for-google-analytics');
		// cy.activatePlugin('tracking-code-for-google-analytics-id');
	// 	cy.wpCliEval("<?php echo file_put_contents('../../mu-plugins/tracking-code-for-google-analytics-id.php', '<?php add_filter('tracking_code_for_google_analytics_id', function() { return 'filter'; }); ?>'); ?>");
    // });

    // it('Is input field disabled?', () => {
    //     cy.visit('/wp-admin/options-general.php');
    //     cy.get('#tracking_code_for_google_analytics').should('be.disabled');
    // });

	// it('Does input field contain the filtered value?', () => {
    //     cy.visit('/wp-admin/options-general.php');
    //     cy.get('#tracking_code_for_google_analytics').invoke('val').should('eq', 'filter');
    // });

	// it('Is tracking code printed to the head?', () => {
	// 	cy.logout();
	// 	cy.visit('/');
	// 	cy.document().get('head script[src*="https://www.googletagmanager.com/gtag/js?id=filter"]');
	// });
});