<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
  public function registerBundles()
  {
    $bundles = [
      new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
      new Symfony\Bundle\SecurityBundle\SecurityBundle(),
      new Symfony\Bundle\TwigBundle\TwigBundle(),
      new Symfony\Bundle\MonologBundle\MonologBundle(),
      new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
      new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
      new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
      new Symfony\Bundle\AsseticBundle\AsseticBundle(),
      new AppBundle\AppBundle(),
      new Knp\Bundle\MenuBundle\KnpMenuBundle(),
      new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
      new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
      new EWZ\Bundle\RecaptchaBundle\EWZRecaptchaBundle(),
      new Gregwar\ImageBundle\GregwarImageBundle(),
    ];

    if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
      $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
      $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
      $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
      $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
      $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
    }

    return $bundles;
  }

  public function getRootDir()
  {
    return __DIR__;
  }

  public function getCacheDir()
  {
    if (in_array($this->environment, array('dev', 'test'))) {
      return dirname(__DIR__) . '/var/cache/' .  $this->environment;
    }

    return parent::getCacheDir();
  }

  public function getLogDir()
  {
    if (in_array($this->environment, array('dev', 'test'))) {
      return dirname(__DIR__) . '/var/logs';
    }

    return parent::getLogDir();
  }

  public function registerContainerConfiguration(LoaderInterface $loader)
  {
    $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
  }
}
