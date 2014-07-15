Feature: Pass parameters between contexts
    In order to pass parameters between contexts
    As a feature writer 
    I need an ability to write/read to/from parameter bag

    Background:
        Given a file named "behat.yml" with:
        """
        default:
            formatters:
                pretty:
                    verbose: true
                    paths: false
                    snippets: false
            translation:
                locale: en


            suites:
                simple:
                    contexts:
                        - FeatureContext
                        - AnotherFeatureContext
            extensions:
                Codifico\ParameterBagExtension\ServiceContainer\ParameterBagExtension: ~
        """
        And a file named "features/bootstrap/FeatureContext.php" with:
        """
        <?php
        
        use Behat\Behat\Context\SnippetAcceptingContext;
        use Behat\Gherkin\Node\PyStringNode;
        use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;

        class FeatureContext implements SnippetAcceptingContext
        {
            use ParameterBagDictionary;

            /**
             * @When I set parameter :name to :value 
             */
            public function iSetParameterTo($name, $value)
            {
                $this->getParameterBag()->set($name, $value);
            }
        }
        """

        And a file named "features/bootstrap/AnotherFeatureContext.php" with:
        """
        <?php
        
        use Behat\Behat\Context\SnippetAcceptingContext;
        use Behat\Gherkin\Node\PyStringNode;
        use Codifico\ParameterBagExtension\Context\ParameterBagDictionary;

        class AnotherFeatureContext implements SnippetAcceptingContext
        {
            use ParameterBagDictionary;
            
            protected $value;

            /**
             * @When I access to parameter :name
             */
            public function iAccessToParameter($name)
            {
                $this->value = $this->getParameterBag()->get($name);
            }

            /**
             * @Then I should get :value 
             */
            public function iShouldGet($value)
            {
                PHPUnit_Framework_Assert::assertEquals($value, $this->value);
            }
        }
        """

    Scenario: Pass parameters
        Given a file named "features/parameters.feature" with:
        """
        Feature: Pass parameters
            In order to test the ParameterBagExtension
            as a developer
            I need to have contexts with parameter bag

            Scenario: access to parameters
                When I set parameter "test" to "1"
                And I access to parameter "test"
                Then I should get "1"
        """
        When I run "behat --no-colors -f progress features/parameters.feature"
        Then it should pass with:
        """
        ..

        1 scenario (1 passed)
        3 steps (3 passed)
        """
    Scenario: Read non existing parameter
        Given a file named "features/no_parameters.feature" with:
        """
        Feature: Not passing parameters
            In order to test the ParameterBagExtension
            as a developer
            I need to have information about reading not existing parameter

            Scenario: access to parameters
                And I access to parameter "test2"
                Then I should get "1"
        """
        When I run "behat --no-colors -f progress features/no_parameters.feature"
        Then it should fail
        And the output should contain:
        """
        F-

        --- Failed steps:

            And I access to parameter "test2" # features/no_parameters.feature:7
              Parameter test2 not set (Exception)

        1 scenario (1 failed)
        2 steps (1 failed, 1 skipped)
        """
