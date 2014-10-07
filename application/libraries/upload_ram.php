<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_ram{

//╔═══╦══╦╗──╔╦════╦═══╦══╦╗──╔╗
//║╔═╗║╔╗║║──║╠═╗╔═╣╔══╣╔╗║║──║║
//║╚═╝║╚╝║╚╗╔╝║─║║─║╚══╣╚╝║╚╗╔╝║
//║╔╗╔╣╔╗║╔╗╔╗║─║║─║╔══╣╔╗║╔╗╔╗║
//║║║║║║║║║╚╝║║─║║─║╚══╣║║║║╚╝║║
//╚╝╚╝╚╝╚╩╝──╚╝─╚╝─╚═══╩╝╚╩╝──╚╝

    function __construct(){
        $this->CI = &get_instance();
        $this->CI->load->library('casual_func');
    }
    function index(){}
    function upload_image($WhereAndWhat) {
            $config['upload_path'] = $this->CI->input->server('DOCUMENT_ROOT') . '/upload_files/' . $WhereAndWhat . '/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size']	= '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            $nameEx = explode(".", $_FILES['cover']['name']);
            $result_name = $nameEx[0] . '_' . time() . '.' . $nameEx[1];
            $result_name = $this->CI->casual_func->rus2translit($result_name);
            $config['file_name'] = $result_name;
            $this->CI->load->library('upload', $config);
            $this->CI->upload->initialize($config);
            if ($this->CI->upload->do_upload('cover'))
            {
                $data =  $this->CI->upload->data();
            }
            else
            {
//               $error = array('error' => $this->CI->upload->display_errors());
//               $this->load->view('upload_form', $error);
            }
        return (isset($data))? $data : false;
    }

    function upload_image_partner($WhereAndWhat) {

        $config['upload_path'] = $this->CI->input->server('DOCUMENT_ROOT') . '/upload_files/' . $WhereAndWhat . '/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']	= '0';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $nameEx = explode(".", $_FILES['img']['name']);
        $result_name = $nameEx[0] . '_' . time() . '.' . $nameEx[1];
        $result_name = $this->CI->casual_func->rus2translit($result_name);
        $config['file_name'] = $result_name;
        $this->CI->load->library('upload', $config);
        if ($this->CI->upload->do_upload('img'))
        {
            $data =  $this->CI->upload->data();
        }
        else
        {
                 //      $error = array('error' => $this->upload->display_errors());
                     //           $this->load->view('upload_form', $error);
        }

        return (isset($data))? $data : false;
    }





}