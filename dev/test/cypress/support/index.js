'use strict';

require('./commands');

before(()=> {
});

afterEach(() => {
  cy.task('clearEvents');
});

// Cypress.on('uncaught:exception', (err, runnable) => { // eslint-disable-line no-unused-vars
//   cy.task('log', err.toString());
//   return false;
// });
