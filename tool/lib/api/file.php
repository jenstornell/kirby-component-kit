<?php
namespace JensTornell\ComponentKit;
use f;
use ckit;
use yaml;

class FileAPI {
    public function set($template, $view, $uid, $globals, $flat) {
        $filename = basename($uid);
        $current = $this->current(dirname($uid), $flat);
        $filepath = $current['path'] . DS . $filename;
        $pathinfo = pathinfo($filename);
        $extension = (isset($pathinfo['extension'])) ? $pathinfo['extension'] : '';
        $group = $this->group($globals, $extension);
        $filesize = $this->filesize($filepath);
        $template_root = $globals->roots->tool_components . DS . '--' . $template . DS . 'component.php';

        $result = (object)[
            'content_type' => $this->ctype($extension),
            'id' => $current['id'],
            'filecount' => $current['count'],
            'filegroup' => $group,
            'filename' => $filename,
            'filename_first' => $current['first'],
            'filepath' => $filepath,
            'filetype' => $this->filetype($extension),
            'extension' => $extension,
            'raw' => $current['raw'],
            'view' => $view,
            'template' => $template,
            'component_root' => $current['path'],
            'templatepath' => $template_root,
            'type' => $current['type'],
            'filesize' => $filesize,
            'filesize_human' => $this->humanFilesize($filesize),
            'modified' => $this->modified($filepath),
            'raw_url' => $globals->urls->home  . '/render/raw/' . $current['id'] . '/' . $filename,
            'iframe_url' => $globals->urls->home . '/render/raw/' . $current['id'] . '/' . $filename,
            'config' => $this->config($current['path']),
        ];
        return $result;
    }

    private function config($path) {
        $filepath = $path . DS . 'config.yml';
        if(file_exists($filepath)) {
            $data = file_get_contents($filepath);
            $config = yaml::decode($data);
        } else {
            $config = [
                'preview.background' => ckit::get('preview.background'),
                'preview.margin' => ckit::get('preview.margin'),                
                'preview.outline' => ckit::get('preview.outline'),
            ];
        }
        return $config;
    }

    private function modified($filepath) {
        global $kirby;
        $format = $kirby->option('date.handler') == 'strftime' ? '%Y/%m/%d' : 'Y/m/d';
        return f::modified($filepath, $format, $kirby->options['date.handler']);
    }

    private function filesize($filepath) {
        if(!file_exists($filepath)) return;

        return filesize($filepath);
    }

    private function humanFilesize($bytes) {
        if($bytes == 0) {
            return "0 byte";
        }
    
        $s = array('byte', 'kB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes, 1024));
    
        return round($bytes/pow(1024, $e), 2). ' ' . $s[$e];
    }

    protected function current($name, $flat) {
        foreach($flat as $item) {
            if($item['id'] == $name) {
                return $item;
            }
        }
    }

    protected function group($globals, $extension) {
        foreach($globals->whitelists as $group => $collections) {
            if(in_array($extension, $collections)) {
                return $group;
            }
        }
    }

    protected function filetype($language) {
        switch($language) {
            case 'yml':
                $language = 'yaml';
                break;
            case 'scss':
                $language = 'sass';
                break;
        }
        return $language;
    }

    protected function ctype($extension) {
        switch($extension) {
            case 'gif':
                $ctype = 'image/gif';
                break;
            case 'png':
                $ctype = 'image/png';
                break;
            case 'jpeg':
            case 'jpg':
                $ctype = 'image/jpeg';
                break;
            case 'svg':
                $ctype = 'image/svg+xml';
                break;
            default:
                $ctype = 'text/html';
        }
        return $ctype;
    }
}