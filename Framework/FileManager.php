<?php

class FileManager
{

    private $_listJsFile;
    private $_listCssFile;

    public function __construct()
    {

        $this->_listJsFile = array();
        $this->_listCssFile = array();
    }

    /**
     * Enregistre un fichier js qui devrait être chargé dans la vue
     * @param string $file le fichier à charger dans la vue
     * @return void
     */
    public function addJsFile($file)
    {

        $this->_listJsFile[] = $file;
    }

    public function addCssFile($file)
    {

        $this->_listCssFile[] = $file;
    }

    public function generateJs()
    {

        $jsContent = '';
        foreach ($this->_listJsFile as $jsFile) {
            $jsContent = '<script src ="' . $jsFile . '"></script>';
        }
        return $jsContent;
    }

    public function generateCss()
    {

        $cssContent = '';
        foreach ($this->_listCssFile as $cssFile) {
            $cssContent = '<link rel="stylesheet" type="text/css" href="' . $cssFile . '"/>';
        }
        return $cssContent;
    }
}
