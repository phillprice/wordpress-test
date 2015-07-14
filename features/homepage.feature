Feature: As a visitor I should be able to load the home page

	Scenario: Home page Index
		Given I am on the homepage
		Then the response status code should be 404
