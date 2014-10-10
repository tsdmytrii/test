<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('datamapper');
    }

    public function index()
    {
        $this->load->view('main_page');
    }

    public function thank_page()
    {
        $this->load->view('thank_page');
    }

    public function sendMail()
    {
        $mail = new Mail();

        $this->return_result($mail->sendMail());
    }

    function return_result($result, $msg = true)
    {
        if ($msg)
        {
            $this->output->set_output(json_encode(array(
                'success' => $result['result'] ? true : false,
                'message' => $result['msg'] ? $result['msg'] : false,
                'data' => $result['result'] ? $result['result'] : false
            )));
        }
        else
        {
            $this->output->set_output(json_encode(array(
                'success' => $result ? true : false,
                'message' => false,
                'data' => $result ? $result : false
            )));
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */