<?php

/**
 * Class of Framework : FileManager for management differents files.
 *
 * FileManager it's a class for management of differents files for the applications.
 * Management of css, js files.
 *
 * @category Manager
 * @package  None
 * @author   Damien Gobert <contact@damiengobert.fr>
 */
class FileManager
{
    /*** $listJsFile contains an array in method construct this contains the differents files js */
    private $listJsFile;
    /*** $listCssFile contains an array in method construct this contains the differents files css */
    private $listCssFile;

    /**
     * Method construct for initialization of propertys $listJsFile and $listCssFile
     * 
     * Modification propertys for an array, if multiple js and css files
     * @param void
     * @return array|array $listJsFile, $listCssFile
     */
    public function __construct()
    {

        $this->listJsFile = array();
        $this->listCssFile = array();
    }

    /**
     * Saves a file js that should be loaded into the view.
     * @param string $file, the file at load in view.
     * @return void
     */
    public function addJsFile($file)
    {

        $this->listJsFile[] = $file;
    }
    
    /**
     * Saves a file css that should be loaded into the view.
     * @param string $file, the file at load in view
     * @return void
     */
    public function addCssFile($file)
    {

        $this->listCssFile[] = $file;
    }

    /**
     * Generates a variable that contains the script "javascript" to integrate into the view
     * @param void
     * @return string $jsContent, the script js to integrate into the view
     */
    public function generateJs()
    {

        $jsContent = '';
        foreach ($this->listJsFile as $jsFile) {
            $jsContent = '<script language ="javascript" src ="' . $jsFile . '"></script>';
        }
        return $jsContent;
    }

    /**
     * Generates a variable that contains the script "css" to integrate into the view
     * @param void
     * @return string $cssContent, the script css to integrate into the view
     */
    public function generateCss()
    {

        $cssContent = '';
        foreach ($this->_listCssFile as $cssFile) {
            $cssContent = '<link rel="stylesheet" type="text/css" href="' . $cssFile . '"/>';
        }
        return $cssContent;
    }
}
