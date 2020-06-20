<?php

class serviceController extends Controller {

    public function index(){

        $message = Registry::get('service_process_return_message');

        $data = array(
            'message' => $message
        );

        $layoutData = array(
            'meta' => array(
                'title' => 'Service'
            )
        );

        return $this->render( $data, $layoutData );
    }

    public function process(){

        Registry::set('service_process_return_message', 'asdfasdff');

        $message = '';
        $i = $j = 0; 
        $dir = dirname(__FILE__);
        $nonce = filter_input(INPUT_POST, 'submit_nonce', FILTER_VALIDATE_INT);
        if ( $nonce == 998787 ) { // CREATE THUMBNAIL IN VAULT
            foreach ( $images as $src ) {
                $thm = str_replace( 'vault', 'vault/tbnl', $src );
                $i++;
                if ( !file_exists($thm) ) {
                    $img = new JWImaging;
                    $img->set_img($src);
                    $img->set_quality();
                    $img->set_size();
                    $img->save_img($thm);
                    $img->clear_cache();
                    $j++;
                }
            }
            $message = 'Checked '.$i.' images; created '. $j .' thumbnails';
        } elseif ( $nonce == 987987 ) { // MOVE IMAGES FROM CURRENT TO VAULT
            
            foreach ( $current_images as $src ) {
                $new_src = str_replace('current/','vault/', $src);
                rename($src, $new_src);
                $i++;
            }
            $message = 'Moved '.$i.' images to archive';
        } elseif ( $nonce == 998877 ) { // RENAME IMAGES TO NORMALIZE NAMES
            foreach ( $currentImages as $src ) {
                $fp = fopen($src, "r");
                $stat = fstat($fp);
                $new_src = $currentImagePath.$stat['ctime'].'-'.$stat['size'].'.jpg';
                rename($src, $new_src);
                $i++;
            }
            $message = 'Renamed '.$i.' images';
        } elseif ( $nonce == 997755 ) { // RENAME MOVIES TO NORMALIZE NAMES
            $current_images = glob( $dir.'/prev/*.mp4' );
            foreach ( $current_images as $src ) {
                $fp = fopen($src, "r");
                $stat = fstat($fp);
                $new_src = $dir.'/movies/'.$stat['ctime'].'-'.$stat['size'].'.mp4';
                rename($src, $new_src);
                $i++;
            }
            $message = 'Renamed '.$i.' movies';
        }


        ArchiveApp::redirect('service');
    }
}