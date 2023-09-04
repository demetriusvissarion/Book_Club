const { defineConfig } = require("cypress");

module.exports = defineConfig({
    chromeWebSecurity: false,
    retries: 0,
    defaultCommandTimeout: 5000,
    watchForFileChanges: false,
    videosFolder: "tests/cypress/videos",
    screenshotsFolder: "tests/cypress/screenshots",
    fixturesFolder: "tests/cypress/fixture",
    includeShadowDom: true,
    e2e: {
        setupNodeEvents(on, config) {
            return require("./tests/cypress/plugins/index.js")(on, config);
        },
        baseUrl: "http://127.0.0.1:8000",
        specPattern: "tests/cypress/integration/**/*.cy.{js,jsx,ts,tsx}",
        supportFile: "tests/cypress/support/index.js",
    },
});