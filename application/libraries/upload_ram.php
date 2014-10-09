<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload_ram
{

//╔═══╦══╦╗──╔╦════╦═══╦══╦╗──╔╗
//║╔═╗║╔╗║║──║╠═╗╔═╣╔══╣╔╗║║──║║
//║╚═╝║╚╝║╚╗╔╝║─║║─║╚══╣╚╝║╚╗╔╝║
//║╔╗╔╣╔╗║╔╗╔╗║─║║─║╔══╣╔╗║╔╗╔╗║
//║║║║║║║║║╚╝║║─║║─║╚══╣║║║║╚╝║║
//╚╝╚╝╚╝╚╩╝──╚╝─╚╝─╚═══╩╝╚╩╝──╚╝

    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('casual_func');
    }

    function index()
    {
    }

    function upload_image($WhereAndWhat)
    {
        $config['upload_path'] = $this->CI->input->server('DOCUMENT_ROOT') . '/upload_files/' . $WhereAndWhat . '/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $nameEx = explode(".", $_FILES['cover']['name']);
        $result_name = $nameEx[0] . '_' . time() . '.' . $nameEx[1];
        $result_name = $this->CI->casual_func->rus2translit($result_name);
        $config['file_name'] = $result_name;
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        if ($this->CI->upload->do_upload('cover')) {
            $data = $this->CI->upload->data();
        } else {
//               $error = array('error' => $this->CI->upload->display_errors());
//               $this->load->view('upload_form', $error);
        }
        return (isset($data)) ? $data : false;
    }

    function upload_image_partner($WhereAndWhat)
    {

        $config['upload_path'] = $this->CI->input->server('DOCUMENT_ROOT') . '/upload_files/' . $WhereAndWhat . '/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $nameEx = explode(".", $_FILES['img']['name']);
        $result_name = $nameEx[0] . '_' . time() . '.' . $nameEx[1];
        $result_name = $this->CI->casual_func->rus2translit($result_name);
        $config['file_name'] = $result_name;
        $this->CI->load->library('upload', $config);
        if ($this->CI->upload->do_upload('img')) {
            $data = $this->CI->upload->data();
        } else {
            //      $error = array('error' => $this->upload->display_errors());
            //           $this->load->view('upload_form', $error);
        }

        return (isset($data)) ? $data : false;
    }

    function multiupload_image($WhereAndWhat)
    {
        $config['upload_path'] = $this->CI->input->server('DOCUMENT_ROOT') . '/upload_files/' . $WhereAndWhat . '/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $this->CI->load->library('upload', $config);
        $this->CI->upload->initialize($config);
        $temp_files = $_FILES;
        $count = count($_FILES['file']['name']);
        for ($i = 0; $i <= $count - 1; $i++) {
            $nameEx = explode(".", $temp_files['file']['name'][$i]);
            $result_name = $nameEx[0] . '_' . time() . '.' . $nameEx[1];
            $result_name = $this->CI->casual_func->rus2translit($result_name);
            $_FILES['file'] = array(
                'name' => $result_name,
                'type' => $temp_files['file']['type'][$i],
                'tmp_name' => $temp_files['file']['tmp_name'][$i],
                'error' => $temp_files['file']['error'][$i],
                'size' => $temp_files['file']['size'][$i]);
            $this->CI->upload->do_upload('file');
            $tmp_data = $this->CI->upload->data();
            $files_data[$i]['data'] = $tmp_data['file_name'];
        }
        return $files_data;
    }
}