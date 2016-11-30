<?php
/**
 * Feb 2014
 * @author Pascal Brewing
 * @email <pascalbrewing@gmail.com>
 * @package common\helpers
 * Class MediaContentHelper
 */

namespace app\helpers;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;

class MediaContentHelper
{

    public $upPath = false;

    /**
     * create Upload Path for Contentfiles
     * @return string
     */
    public function getContentFolder()
    {
        $sl = DIRECTORY_SEPARATOR;
        $year = date('Y');
        $month = date('m');

        $this->setUpDefaultPath();
        $upPath = $this->upPath . $sl . $year . $sl . $month;

        if (is_dir($upPath)) {
            return $this->returnPathArray($month, $year, $upPath);
        } else {
            $yearfolder = $this->upPath . $sl . $year;
            $monthfolder = $this->upPath . $sl . $year . $sl . $month;

            if (!is_dir($yearfolder)) {

                if (FileHelper::createDirectory($monthfolder)) {
                    return $this->returnPathArray($month, $year, $upPath);
                }

            } else if (is_dir($yearfolder)) {

                if (is_dir($monthfolder)) {
                    return $this->returnPathArray($month, $year, $upPath);
                } else {
                    FileHelper::createDirectory($monthfolder);
                    return $this->returnPathArray($month, $year, $upPath);
                }

            }
        }
    }

    /**
     * @return \stdClass
     */
    public function getFolderAsObject()
    {
        $path = $this->getContentFolder();
        $object = new \stdClass();
        //and loop through your array while re-assigning the values

        foreach ($path as $key => $value) {
            $object->$key = $value;
        }
        return $object;
    }

    /**
     * @param $month
     * @param $year
     * @param $upPath
     * @return array
     */
    private function returnPathArray($month, $year, $upPath)
    {
        return [
            'month' => $month,
            'year' => $year,
            'upPath' => $upPath,
            'urlConcat' => Yii::$app->urlManager->baseUrl . '/uploads/media/' . $year . '/' . $month . '/',
            'urlRaw' => '/uploads/media/' . $year . '/' . $month . '/'
        ];
    }

    /**
     * @return bool|string
     */
    private function setUpDefaultPath()
    {

        if (!$this->upPath) {
            $this->upPath = $this->upPath = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'media';
            $this->checkDefaultDir();
        }

        return $this->upPath;
    }

    /**
     * @return bool
     */
    private function checkDefaultDir()
    {
        $uploads = Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'uploads';
        $content = $this->upPath;
        if (!is_dir($content)) {
            return FileHelper::createDirectory($content);
        }
        return true;
    }

    /**
     * @param $path
     * @return bool
     */
    private function  createFolder($path)
    {
        if (FileHelper::createDirectory($path)) {
            return true;
        }
        return false;
    }
} 