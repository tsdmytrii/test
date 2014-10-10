<?php

class Mail extends DataMapper {

    public $table = 'mails';
    public static $ci;
    public $validation = array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => array('required', 'max_length' => 50, 'min_length' => 2),
        ),
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => array('required', 'trim', 'email', 'max_length' => 50, 'min_length' => 2),
        ),
        array(
            'field' => 'emailText',
            'label' => 'emailText',
            'rules' => array('required', 'max_length' => 5000, 'min_length' => 2),
        )
    );

    function __construct($id = NULL)
    {
        parent::__construct($id);
        if (empty(self::$ci))
        {
            self::$ci = &get_instance();
        }
    }

    /*
     * sendMail
     * 
     * Creates email in DB. Calls send function
     * 
     * @param string name (by POST) 
     * @param string email (by POST)
     * @param string emailText (by POST)
     * 
     * @return array $result. $result['result] - status. $result['msg'] - message.
     */

    public function sendMail()
    {

        $name = self::$ci->input->post('name') ? self::$ci->input->post('name') : false;
        $email = self::$ci->input->post('email') ? self::$ci->input->post('email') : false;
        $emailText = self::$ci->input->post('emailText') ? self::$ci->input->post('emailText') : false;

        if ($name && $email && $emailText)
        {
            $mail = new Mail();
            $mail->name = $name;
            //Validation for email type is already done by 'rules' => array('required', 'trim', 'email', 'max_length' => 50, 'min_length' => 2),
            $mail->email = $email;
            $mail->emailText = addslashes($emailText);
            if (!$mail->save())
            {
                $result['result'] = false;
                $result['msg'] = $mail->error->string;
            }
            else
            {
                $result['result'] = $this->send($name, $email, $emailText);
                $result['msg'] = $result['result'] ? "Successfuly sent" : "Error. Can't send this email. Problems with mail server";
            }
        }
        else
        {
            $result['result'] = false;
            $result['msg'] = "Something is wrong. Enter all fields";
        }
        return $result;
    }

    /*
     * send
     * 
     * Sends mail
     * 
     * @param string $name
     * @param string $email
     * @param string $emailText
     * 
     * @return array $result Depends on send success or not
     */

    public function send($name, $email, $emailText)
    {
        $str = 'Dear ' . $name . ', here is the email body for you:<br>';
        $str.= wordwrap($emailText, 70, "<br>") . "<br>";
        $str .='Regards,<br>,Anonymous.';

        $headers = 'MIME-Version: 1.0' . "<br>";
        $headers .= 'Content-type: text/html; charset=utf-8' . "<br>";
        
        $result = mail($email, 'test mail', $str, $headers);
        return $result;
    }

}

?>