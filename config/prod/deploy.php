<?php

use EasyCorp\Bundle\EasyDeployBundle\Deployer\DefaultDeployer;

return new class extends DefaultDeployer
{
    public function configure()
    {
        return $this->getConfigBuilder()
            // SSH connection string to connect to the remote server (format: user@host-or-IP:port-number)
            ->server('Cosmin@40.89.153.189')
            // the absolute path of the remote server directory where the project is deployed
            ->deployDir('/var/www/Deployment')
            // the URL of the Git repository where the project code is hosted
            ->repositoryUrl('git@github.com:CosminCiociu/Reminder.git')
            // the repository branch to deploy
            ->repositoryBranch('TEST')
            //->remoteComposerBinaryPath('composer.phar')
            ->useSshAgentForwarding(false)
        ;
    }

    // run some local or remote commands before the deployment is started
    public function beforeStartingDeploy()
    {
        // $this->runLocal('./vendor/bin/simple-phpunit');
    }

    // run some local or remote commands after the deployment is finished
    public function beforeFinishingDeploy()
    {
        // $this->runRemote('{{ console_bin }} app:my-task-name');
        // $this->runLocal('say "The deployment has finished."');
    }
};
