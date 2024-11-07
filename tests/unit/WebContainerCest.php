<?php


class WebContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify centos container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} test_web_ubuntu");
        $I->seeInShellOutput("true");
    }


    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 7.4 is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu php --version");
        $I->seeInShellOutput('PHP 7.4');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit 5 library is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu phpunit --version");
        $I->seeInShellOutput('PHPUnit 5.7.21');
    }

    public function checkPHPUnit3Version(UnitTester $I){
        $I->wantTo("verify phpunit 3 library is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu phpunit3 --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkPHPUnit7Version(UnitTester $I){
        $I->wantTo("verify phpunit 7 library is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu phpunit7 --version");
        $I->seeInShellOutput('PHPUnit 7.5.14');
    }

    public function checkPHPUnit8Version(UnitTester $I){
        $I->wantTo("verify phpunit 8 library is installed in the scontainer");
        $I->runShellCommand("docker exec test_web_ubuntu phpunit8 --version");
        $I->seeInShellOutput('PHPUnit 8.2.5');
    }

    public function checkNcCommand(UnitTester $I){
        $I->wantTo("verify nc command is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu bash -c 'apt info netcat | grep Version'");
        $I->seeInShellOutput('1.206');

    }

    public function checkXdebugVersion(AcceptanceTester $I){
        $I->wantTo("verify xdebug is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu bash -c 'pecl list | grep xdebug'");
        $I->seeInShellOutput('xdebug    3.1.4');
    }

    public function checkGitVersion(AcceptanceTester $I){
        $I->wantTo("verify git is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu git --version");
        $I->seeInShellOutput('git version 2.25.1');
    }


    public function checkNMAPIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify nmap is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu nmap -V");
        $I->seeInShellOutput('version 7.80');
    }


    public function checkNodeIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify node is installed in the image");
        $I->runShellCommand('docker exec test_web_ubuntu bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh";node -v;\'');
        $I->seeInShellOutput('v6.17.1');
    }


    public function checkSendMailIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify sendmail is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu which sendmail");
        $I->seeInShellOutput('/usr/sbin/sendmail');
    }

    public function checkSVNIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify SVN is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu svn --version");
        $I->seeInShellOutput('version 1');
    }

    public function checkBowerIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify bower is installed in the image");
        $I->runShellCommand('docker exec test_web_ubuntu bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh";bower --version;\'');
        $I->seeInShellOutput('1.8');
    }

    public function checkGulpIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify Gulp is installed in the image");
        $I->runShellCommand('docker exec test_web_ubuntu bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh";gulp --version;\'');
        $I->seeInShellOutput('version: 2');
    }

    public function checkASTIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify ast module is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu php -m | grep ast");
        $I->seeInShellOutput('ast');
    }

    public function checkStatsIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify stats module is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu php -m | grep stats");
        $I->seeInShellOutput('stats');
    }

    public function checkVIMIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify vim editor is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu vim --version");
        $I->seeInShellOutput('Vi IMproved 8.1');
    }

    public function checkComposerIsInstalled(AcceptanceTester $I){
        $I->wantTo("verify composer is installed in the image");
        $I->runShellCommand("docker exec test_web_ubuntu composer --version");
        $I->seeInShellOutput('Composer version 1');
    }

    // public function checkComposer2IsInstalled(AcceptanceTester $I){
    //     $I->wantTo("verify composer2 is installed in the image");
    //     $I->runShellCommand("docker exec test_web_ubuntu composer2 --version");
    //     $I->seeInShellOutput('Composer version ');
    // }

    public function checkOslonDBInstallation(UnitTester $I){
        $I->wantTo("verify Oslon DB is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu php -i | grep -i timezone");
        $I->seeInShellOutput('Timezone Database Version => 0.system');
    }

    public function checkwkhtmltopdfInstallation(UnitTester $I){
        $I->wantTo("verify wkhtmltopdf is installed in the container");
        $I->runShellCommand("docker exec test_web_ubuntu wkhtmltopdf --version");
        $I->seeInShellOutput('wkhtmltopdf 0.12');
    }

}
