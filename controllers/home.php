<?php

class homeController extends Controller {
    public function index(){

        $data = array();

        if (1) {

            $file = ArchiveApp::getConfig('file_base').'/assets/data/favs.json';
            $favsRaw = file_get_contents($file);
            $favsData = json_decode($favsRaw, true);
            $data['favorites'] = array_values($favsData['data']);
        }

        $layoutData = $this->generateGenericTitle($_SERVER["REQUEST_URI"]);
        $styles = array(
            array(
                'href' => 'simplelightbox.min.css',
                'media' => 'all'
            ),
        );

        $scripts = array(
            array(
                'src' => 'simplelightbox.min.js',
                'async' => '',
                'defer' => ''
            ),
            array(
                'src' => 'main.js',
                'async' => '',
                'defer' => ''
            )
        );
    
        return $this->render($data, $layoutData, $styles, $scripts);
    }

    public function videos(){
        $layoutData = $this->generateGenericTitle($_SERVER["REQUEST_URI"]);
        $styles = array(
            array(
                'href' => 'lity.min.css',
                'media' => 'all'
            )
        );

        $scripts = array(
            array(
                'src' => 'lity.min.js',
                'async' => '',
                'defer' => ''
            ),
        );

        return $this->render(array(), $layoutData, $styles, $scripts);
    }

    public function imagearchive(){
        $layoutData = $this->generateGenericTitle($_SERVER["REQUEST_URI"]);
        $styles = array(
            array(
                'href' => 'simplelightbox.min.css',
                'media' => 'all'
            )
        );

        $scripts = array(
            array(
                'src' => 'masonry.min.js',
                'async' => '',
                'defer' => ''
            ),
            array(
                'src' => 'simplelightbox.min.js',
                'async' => '',
                'defer' => ''
            ),
            array(
                'src' => 'archive-masonry.js',
                'async' => '',
                'defer' => ''
            )
        );

        return $this->render(array(), $layoutData, $styles, $scripts);
    }

    public function datetime(){

        $layoutData = $this->generateGenericTitle($_SERVER["REQUEST_URI"]);
        $styles = array(
            array(
                'href' => 'simplelightbox.min.css',
                'media' => 'all'
            ),
        );

        $scripts = array(
            array(
                'src' => 'simplelightbox.min.js',
                'async' => '',
                'defer' => ''
            ),
        );
    
        return $this->render(array(), $layoutData, $styles, $scripts);
    }

    public function favorites(){

        $data = array();
        $file = ArchiveApp::getConfig('file_base').'/assets/data/favs.json';
        $favsRaw = file_get_contents($file);
        $favsData = json_decode($favsRaw, true);
        $data['favorites'] = array_values($favsData['data']);

        $layoutData = array(
            'meta' => array(
                'title' => 'Favorites'
            )
        );

        $styles = array(
            array(
                'href' => 'simplelightbox.min.css',
                'media' => 'all'
            ),
        );

        $scripts = array(
            array(
                'src' => 'simplelightbox.min.js',
                'async' => '',
                'defer' => ''
            ),
        );
    
        return $this->render($data, $layoutData, $styles, $scripts);
    }

    public function error404(){
        return $this->render();
    }

    private function generateGenericTitle($request_uri)
    {
        $uri =  trim($request_uri, '/');
        $parts = array_reverse(explode('/', $uri));
        $title = ucwords(str_replace('-', ' ', $parts[0]));
        $baseUrl = ArchiveApp::getConfig('redirect_base');

        if ( $title === trim($baseUrl, '/') ) {
            $title = 'Devotions';
        }

        $layoutData = array(
            'meta' => array(
                'title' => $title
            )
        );

        return $layoutData;
    }
}