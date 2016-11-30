<?php
/**
 * User: Pascal Brewing
 * Date: 23.11.13
 * Time: 16:56
 * @package ${DIR}.DetectDevice
 * Class DetectDevice
 */

namespace app\helpers;

use Yii;

/**
 * Class DetectDevice
 * @package app\helpers
 */

class DetectDevice{
    const MOBILE    = 'mobile';
    const TABLET    = 'tablet';
    const DESKTOP   = 'desktop';

    /**
     * @var the MobileDetect
     */
    private $detector;

    /**
     * public function log($message, $level, $category = 'application')
     * @return string
     */
    public function getDevice(){
        $token = "StartDetector";

        if (YII_DEBUG)
            Yii::beginProfile($token, __METHOD__);

        $this->detector = new \Mobile_Detect();
        $device         = $this->returndevice();

        if (YII_DEBUG) {
            Yii::trace("device detector is called '{$device}'" . get_class($this) . "'.", __METHOD__);
        }

        if(YII_DEBUG)
            Yii::endProfile($token, __METHOD__);

        return $device;
    }

    /**
     * @return string
     */
    private function returndevice(){


        if($this->detector->isMobile())
        {
            return self::MOBILE;

        }

        if($this->detector->isTablet()){
            return self::TABLET;
        }

        if(!$this->detector->isTablet() && !$this->detector->isMobile()){
            return self::DESKTOP;
        }
    }

    /**
     * @return mixed
     */
    public function getBrowser(){
        return $this->detector->getUserAgent();
    }
}