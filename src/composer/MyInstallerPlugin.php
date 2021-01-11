<?php
namespace  MyInstaller\composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
class MyInstallerPlugin implements PluginInterface
{

    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new MyInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}