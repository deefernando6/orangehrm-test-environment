<?php  //[STAMP] 1105dd3e647181955f60c6146ed9f57a
namespace _generated;

// This class was automatically generated by build task
// You should not change it manually as it will be overwritten on next build
// @codingStandardsIgnoreFile

trait FunctionalTesterActions
{
    /**
     * @return \Codeception\Scenario
     */
    abstract protected function getScenario();

    
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Executes a shell command.
     * Fails If exit code is > 0. You can disable this by setting second parameter to false
     *
     * ```php
     * <?php
     * $I->runShellCommand('phpunit');
     *
     * // do not fail test when command fails
     * $I->runShellCommand('phpunit', false);
     * ```
     *
     * @param $command
     * @param bool $failNonZero
     * @see \Codeception\Module\Cli::runShellCommand()
     */
    public function runShellCommand($command, $failNonZero = null) {
        return $this->getScenario()->runStep(new \Codeception\Step\Action('runShellCommand', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from last executed command contains text
     *
     * @param $text
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Cli::seeInShellOutput()
     */
    public function canSeeInShellOutput($text) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeInShellOutput', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from last executed command contains text
     *
     * @param $text
     * @see \Codeception\Module\Cli::seeInShellOutput()
     */
    public function seeInShellOutput($text) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeInShellOutput', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from latest command doesn't contain text
     *
     * @param $text
     *
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Cli::dontSeeInShellOutput()
     */
    public function cantSeeInShellOutput($text) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('dontSeeInShellOutput', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks that output from latest command doesn't contain text
     *
     * @param $text
     *
     * @see \Codeception\Module\Cli::dontSeeInShellOutput()
     */
    public function dontSeeInShellOutput($text) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('dontSeeInShellOutput', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $regex
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Cli::seeShellOutputMatches()
     */
    public function canSeeShellOutputMatches($regex) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeShellOutputMatches', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * @param $regex
     * @see \Codeception\Module\Cli::seeShellOutputMatches()
     */
    public function seeShellOutputMatches($regex) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeShellOutputMatches', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIs(0);
     * ```
     *
     * @param $code
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Cli::seeResultCodeIs()
     */
    public function canSeeResultCodeIs($code) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeResultCodeIs', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIs(0);
     * ```
     *
     * @param $code
     * @see \Codeception\Module\Cli::seeResultCodeIs()
     */
    public function seeResultCodeIs($code) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeResultCodeIs', func_get_args()));
    }

 
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIsNot(0);
     * ```
     *
     * @param $code
     * Conditional Assertion: Test won't be stopped on fail
     * @see \Codeception\Module\Cli::seeResultCodeIsNot()
     */
    public function canSeeResultCodeIsNot($code) {
        return $this->getScenario()->runStep(new \Codeception\Step\ConditionalAssertion('seeResultCodeIsNot', func_get_args()));
    }
    /**
     * [!] Method is generated. Documentation taken from corresponding module.
     *
     * Checks result code
     *
     * ```php
     * <?php
     * $I->seeResultCodeIsNot(0);
     * ```
     *
     * @param $code
     * @see \Codeception\Module\Cli::seeResultCodeIsNot()
     */
    public function seeResultCodeIsNot($code) {
        return $this->getScenario()->runStep(new \Codeception\Step\Assertion('seeResultCodeIsNot', func_get_args()));
    }
}
