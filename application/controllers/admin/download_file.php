<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Download_file extends CI_Controller
{

//╔═══╦══╦╗──╔╦════╦═══╦══╦╗──╔╗
//║╔═╗║╔╗║║──║╠═╗╔═╣╔══╣╔╗║║──║║
//║╚═╝║╚╝║╚╗╔╝║─║║─║╚══╣╚╝║╚╗╔╝║
//║╔╗╔╣╔╗║╔╗╔╗║─║║─║╔══╣╔╗║╔╗╔╗║
//║║║║║║║║║╚╝║║─║║─║╚══╣║║║║╚╝║║
//╚╝╚╝╚╝╚╩╝──╚╝─╚╝─╚═══╩╝╚╩╝──╚╝
    function __construct()
    {
        parent::__construct();
        if(!$this->auth->get_user_id()){
            redirect('/login');
        }
        if($this->auth->get_user_role() != 1) {
            redirect('/admin');
        }
    }

    public function index($file)
    {
        $path = ("/upload_files/resume/$file");
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Content-Length: " . filesize($_SERVER['DOCUMENT_ROOT'] . $path));
        header("Content-Disposition: attachment; filename=" . $file);
        readfile($_SERVER['DOCUMENT_ROOT'] . $path);
    }

}
