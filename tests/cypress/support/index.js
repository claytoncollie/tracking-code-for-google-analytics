// ***********************************************************
// This example support/index.js is processed and
// loaded automatically before your test files.
//
// This is a great place to put global configuration and
// behavior that modifies Cypress.
//
// You can change the location of this file or turn off
// automatically serving support files with the
// 'supportFile' configuration option.
//
// You can read more here:
// https://on.cypress.io/configuration
// ***********************************************************

import "@10up/cypress-wp-utils";

// Override wpCli to work with wp-env 10.x which no longer auto-prefixes "wp"
Cypress.Commands.overwrite("wpCli", (originalFn, command, options = {}) => {
  return cy.exec(`npx wp-env run tests-cli -- wp ${command}`, options);
});

// Ignore uncaught exceptions from WordPress admin JS (e.g. user-profile.min.js)
Cypress.on("uncaught:exception", () => false);

beforeEach(() => {
  Cypress.Cookies.defaults({
    preserve: /^wordpress.*?/,
  });
});