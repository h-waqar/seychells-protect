<?php

class SwiftPdfSy
{

    public $uploads_dir = SP_PLUGIN_BASEPATH  . "source/uploads/";

    public function __construct()
    {
    }



    public function convert_and_save_images_from_pdf_selfie($attachment_id)
    {



        // $uploadfile = $_FILES["selfieImg"]["tmp_name"];
        // Get the file path of the attachment
        $uploadfile = get_attached_file($attachment_id);

        // // return;
        // echo "<pre>";
        // print_r($uploadfile);
        // print_r($_FILES);
        // echo "</pre>";

        $im = new imagick($uploadfile);

        $pages = $im->getNumberImages();

        $imagick = new imagick();
        $resolution = 300;
        $imagick->setResolution($resolution, $resolution);
        $imagick->readImage($uploadfile);
        $imagick->setImageFormat('jpg');
        $y = 0;



        $images_set = [];
        // Images Created and Saved
        foreach ($imagick as $i => $imagick) {
            $unique_id = uniqid();
            $image_name =  $unique_id . "_selfie.jpg";
            // $imagick->writeImage($this->uploads_dir . "my_converted$y.jpg");
            $images_set[$y] = $image_name;
            $imagick->writeImage($this->uploads_dir . $image_name);
            $y++;
        }
        $imagick->clear();
        $_POST['images_set'] = $images_set;
        return $pages;
    }


    public function  convert_and_save_images_from_pdf()
    {
        $uploadfile = $_FILES["passportImg"]["tmp_name"];
        $im = new imagick($uploadfile);
        $pages = $im->getNumberImages();

        $imagick = new imagick();
        $resolution = 300;
        $imagick->setResolution($resolution, $resolution);
        $imagick->readImage($uploadfile);
        $imagick->setImageFormat('jpg');
        $y = 0;


        $images_set = [];
        // Images Created and Saved
        foreach ($imagick as $i => $imagick) {
            $unique_id = uniqid();
            $image_name =  $unique_id . "_passport.jpg";
            // $imagick->writeImage($this->uploads_dir . "my_converted$y.jpg");
            $images_set[$y] = $image_name;
            $imagick->writeImage($this->uploads_dir . $image_name);
            $y++;
        }
        $imagick->clear();
        $_POST['images_set'] = $images_set;
        return $pages;
    }


    public function handle_pdf_selfie($attachment_id)
    {


        $response = [
            'error' => false
        ];


        $pages = $this->convert_and_save_images_from_pdf_selfie($attachment_id);

        /**
         * Images are converted Successfully from pdf to jpg
         */

        $images_set = $_POST["images_set"];

        for ($i = 0; $i < $pages; $i++) {

            $image_name = $images_set[$i];

            $selfieURL = PLUGIN_BASEURL_SY . "source/uploads/$image_name";


            require_once SP_PLUGIN_BASEPATH . "source/php/pixlab.php";
            // Your API processing code here
            $key = SP_PIXLAB_API_KEY;
            /* Process */
            $pix = new Pixlab($key);
            $r =  $pix->get('facedetect', [
                'img' => $selfieURL,  // URL or base64-encoded image data
            ]);

            if (count($pix->json->faces)) {
                $response['faces'][$selfieURL] = $pix->json->faces;
            }
        } // Loop Ends
        return $response;
    }



    public function handle_pdf_passport()
    {


        $response = [];
        $response['error'] = null;
        $_POST['passport_error'] = null;
        $pages = $this->convert_and_save_images_from_pdf();
        $images_set = $_POST["images_set"];

        for ($i = 0; $i < $pages; $i++) {

            $image_name = $images_set[$i];

            $passport = PLUGIN_BASEURL_SY . "source/uploads/$image_name";

            // echo $passport;
            require_once SP_PLUGIN_BASEPATH . "source/php/pixlab.php";
            // Your API processing code here
            $key = SP_PIXLAB_API_KEY;

            /* Process */
            $pix = new Pixlab($key);
            if (!$pix->get('docscan', [
                'img' => $passport,  /* Passport scanned image */
                'type' => 'passport' /* Type of document we are going to scan */
            ])) {
                $response['error'] = $pix->get_error_message() . "\n";
                $_POST['passport_error'] = $pix->get_error_message() . "\n";
            }

            if (isset($pix->status) && $pix->status == 200) {
                $response['passport_data'] = $pix->json;
                $response['passport_url'] = $passport;



                return $response;
                break;
            }
        } // Loop Ends

        return false;
    } // funEnds



} // Class Ends

$swift_pdf_sy = new SwiftPdfSy();
