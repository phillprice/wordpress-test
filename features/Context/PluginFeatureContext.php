<?php
/**
 * @autor     Phill Price <phill@phillprice.com>
 * @copyright Copyright (c) 2015 Phill Price (http://github.com/phillprice)
 */

use \Behat\Behat\Context\SnippetAcceptingContext;
use \Behat\MinkExtension\Context\MinkContext;
use Tmf\WordPressExtension\Context\WordPressContext;
use Behat\Behat\Hook\Scope\AfterStepScope;

/**
 * Class PluginFeatureContext
 *
 * @package Tmf\PluginExample\Features\Context;
 */
class PluginFeatureContext extends WordPressContext implements SnippetAcceptingContext
{
private $screenShotPath;

    public function __construct($screen_shot_path)
    {
        $this->screenShotPath = $screen_shot_path;
    }

    /**
     * Take screen-shot when step fails. Works only with Selenium2Driver.
     *
     * @AfterStep
     * @param AfterStepScope $scope
     */
    public function takeScreenshotAfterFailedStep(AfterStepScope $scope)
    {
        if (99 === $scope->getTestResult()->getResultCode()) {
            $driver = $this->getSession()->getDriver();

            if (! $driver instanceof Selenium2Driver) {
                return;
            }

            if (! is_dir($this->screenShotPath)) {
                mkdir($this->screenShotPath, 0777, true);
            }

            $filename = sprintf(
                '%s_%s_%s.%s',
                $this->getMinkParameter('browser_name'),
                date('Ymd') . '-' . date('His'),
                uniqid('', true),
                'png'
            );

            $this->saveScreenshot($filename, $this->screenShotPath);
        }
    }
}