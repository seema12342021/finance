<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MYController extends Controller
{
    public $settings;

        public $includes;

        public $theme;

        public $template;


        function __construct()
        {
            parent::__construct();

            $this->settings = new stdClass();

        }

        public function add_external_js($js_files,$path=null){

            if(!is_array($this->includes)){

                $this->includes=array();

            }

            foreach ($js_files as $key => $js) {

                $js = trim($js);

                if(empty($js)) continue;

                $this->includes['js_files'][sha1($js)]=is_null($path)?$js:$path.$js;

            }

            return $this;

        }//End Function



        //For Example

        //$js_file=array('datapicker.css','colorpicker.css');

        //$path=root path/externa_css

        public function add_external_css($css_files,$path=null){

            if(!is_array($this->includes)){

                $this->includes=array();

            }

            foreach ($css_files as $key => $css) {

                $css = trim($css);

                if(empty($css)) continue;

                $this->includes['css_files'][sha1($css)]=is_null($path)?$css:$path.$css;

            }

            return $this;

        }//End Function

 
}
 