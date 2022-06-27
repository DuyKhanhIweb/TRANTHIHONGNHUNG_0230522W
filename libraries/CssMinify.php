<?php
class CssMinify
{
    private $pathCss = array();
    private $debugCss;
    private $cacheName = '';
    private $cacheFile = 'assets/css/';
    private $cacheSize = false;
    private $cacheTimeFile = false;

    function __construct($debugCss, $func)
    {
        $this->debugCss = $debugCss;
        $this->func = $func;
    }

    public function setCss($path)
    {
        $this->pathCss[] = $path;
    }

    public function getCss()
    {
        if (empty($this->pathCss)) die("No files to optimize");
        return ($this->debugCss) ? $this->defaultCss() : $this->miniCss();
    }

    public function setCache($name)
    {
        $this->cacheName = $name;
        $this->cacheFile = $this->cacheFile . $this->cacheName . '.css';
        $this->cacheSize = (file_exists($this->cacheFile)) ? filesize($this->cacheFile) : 0;
        $this->cacheTimeFile = filemtime($this->cacheFile);
    }

    public function isFileChanged($pathCss)
    {
        foreach ($pathCss as $key => $file_path) {
            $file_path = explode('?', $file_path)[0];
            if (filemtime($file_path) > $this->cacheTimeFile) {
                return true;
            }
        }

        return false;
    }

    private function miniCss()
    {
        global $config_base;
        $strCss = '';
        $extension = '';

        if ($this->isFileChanged($this->pathCss) || !$this->cacheSize) {
            foreach ($this->pathCss as $path) {
                $path = explode('?', $path)[0];
                $path_parts = pathinfo($path);
                $extension = strtolower($path_parts['extension']);
                if ($extension != 'css') die("Invalid file");
                $myfile = fopen($path, "r") or die("Unable to open file");
                $sizefile = filesize($path);
                $fullURLPath = $config_base . $path_parts['dirname'] . '/';
                $filecontent = $this->fixUrlPath(fread($myfile, $sizefile), $fullURLPath);
                if ($sizefile) $strCss .= $this->compressCss($filecontent);
                fclose($myfile);
            }

            if ($strCss) {
                $file = fopen($this->cacheFile, "w") or die("Unable to open file");
                fwrite($file, $strCss);
                fclose($file);
            }
        }
        $version = filemtime($this->cacheFile);
        return "<link rel='stylesheet preload' href='{$this->cacheFile}?v={$version}'></link>";

        // return '<link href="' . $this->cacheFile . '" rel="stylesheet">';
    }

    private function defaultCss()
    {
        $linkCss = '';
        $extension = '';

        if ($this->cacheSize) {
            $file = fopen($this->cacheFile, "r+") or die("Unable to open file");
            ftruncate($file, 0);
            fclose($file);
        }

        foreach ($this->pathCss as $path) {
            $path_file = explode('?', $path)[0];
            $path_parts = pathinfo($path_file);
            $extension = strtolower($path_parts['extension']);
            if ($extension != 'css') die("Invalid file");
            $linkCss .= '<link href="' . $path . '" rel="stylesheet">' . PHP_EOL;
        }

        return $linkCss;
    }

    public function fixUrlPath($buffer, $fullURL)
    {
        if (!$buffer) {
            return false;
        }
        $regex = '/url\((?![\'"]?(?:data:|https?:|\/\/))([\'"]?)([^\'")]*)\1\)/';
        return $buffer = preg_replace($regex, 'url(' . $fullURL . '${2})', $buffer);
    }

    private function compressCss($buffer)
    {
        $buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
        $buffer = str_replace(': ', ':', $buffer);
        $buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
        return $buffer;
    }
}