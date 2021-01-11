<?php


namespace  MyInstaller\composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class MyInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 11);
        if ('sox-cult/my-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, phpdocumentor templates '
                .'should always start their package name with '
                .'"sox-cult/my-"'
            );
        }

        return 'common/service/'.substr($package->getPrettyName(), 11);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'sox-cult/my-' === $packageType;
    }
}