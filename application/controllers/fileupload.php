<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tools
 *
 * @author raju
 */
class fileupload extends MY_Controller {

    //put your code here
            private $upload_folder, $temp_folder;

    function fileupload() {
        parent::__construct();
        // parent::MY_Controller();
        $this->load->model('fileupload_model');
        $this->load->library('upload');
        $this->temp_folder = $this->config->config["document_root"] . "temp_attach";
        $this->upload_folder = $this->config->config["document_root"] . "attach";
    }

    function index() {
        
    }

    function upload($folder = 'temp_attach') {
        //print_r($_POST);
        //print_r($_FILES);
//            print_r($this->upload->data());
        if (isset($_FILES['userfile'])) {
            $uploaddir = $folder . '/';
            $ori_name = explode(".", $_FILES['userfile']['name']);
            $timeName = time() . "." . $ori_name[count($ori_name) - 1];
            $fsize = $_FILES['userfile']['size'];
            if ($fsize > 2097152) {
                echo "error__filesize";
            } else {
                $uploadfile = $uploaddir . $timeName;
                if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
                    echo "succ" . "__" . $timeName;
                } else {
                    echo "error__upload";
                }
            }
        } else {
            echo "error__nofile";
        }
    }

    function savefile($folder = 'temp_attach') {


        $fsize = $_FILES['userfile']['size'];

        $ori_name = explode(".", $_FILES['userfile']['name']);
        $timeName = time();
        // $allowed_types=$_POST['valid_ext'];
        $config['file_name'] = $timeName; //$timeName;
        $config['upload_path'] = './' . $folder . '/';
        //echo $config['allowed_types'] = substr($allowed_types, strpos($allowed_types, substr($_FILES['userfile']['name'], -3)), 3);
        //$config['allowed_types'] ='jpg|png|gif' ;
        $config['allowed_types'] = $_POST['valid_ext'];
        $this->upload->initialize($config);
        // echo "<pre>";
        //print_r($config);
//            print_r($_FILES);
//            print_r($this->upload->data());
        if ($fsize > 2097152) {
            echo "error__filesize";
        } else if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors('<p>', '</p>'));
            //$this->load->view('error_form', $error);
            echo "<pre>";
            print_r($error);
            echo "error__upload";
        } else {
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
            echo "succ" . "__" . $timeName;
        }
    }

    function remove($folder = 'temp_attach') {
        $rm_file = $folder . '/' . $_POST['rFile'];
        if (file_exists($rm_file)) {
            unlink($rm_file);
        }
    }

    function swfupload($folder = 'temp_attach') {

        if (isset($_POST['upload_dir'])) {
            if (strlen(@$_POST['upload_dir']) > 0)
                $folder = @$_POST['upload_dir'];
        }
        if (isset($_FILES['Filedata']['name'])) {
            $file_name = explode(".", $_FILES['Filedata']['name']);
            $new_name = number_format(microtime() * 100, 6, '', '') . "." . $file_name[count($file_name) - 1];

            $file_size = $_FILES['Filedata']['size'];

            if ($file_size > 2097152)
                echo "error__filesize";
            else {
                if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $folder . '/' . $new_name))
                    echo $new_name;
                else
                    echo 1256;
            }
        }
        else
            echo 1256;
    }

    function ridfile($fn, $fnd = 'temp_attach') {
        if (file_exists($fnd . '/' . $fn)) {
            unlink($fnd . '/' . $fn);
        }
    }

    function download($folder = 'attachments', $file='') {
        $filename = document_root() . $folder . "/" . $file;
        // echo $filename; die;
        $ext = explode(".", $file);
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header('Content-disposition: attachment; filename=' . basename($filename));
        if ($ext[count($ext) - 1] == "zip")
            header("Content-Type: application/zip");
        else if ($ext[count($ext) - 1] == "xls" || $ext[count($ext) - 1] == "xlsx" || $ext[count($ext) - 1] == "csv")
            header("Content-Type: application/vnd.ms-excel");
        else if ($ext[count($ext) - 1] == "doc" || $ext[count($ext) - 1] == "docx")
            header("Content-Type: application/msword");
        else if ($ext[count($ext) - 1] == "pdf")
            header("Content-Type: application/pdf");
        else
            header("Content-type: application/octet-stream");

        header("Content-Transfer-Encoding: binary");
        header('Content-Length: ' . filesize($filename));
        readfile($filename);
    }


}

