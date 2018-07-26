<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 3/3/2018
 * Time: 4:43 PM
 */

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->helper('cookie');
        $this->load->model('m_login', 'main_model');
    }

    public function index(){
        #======================== TEMPLATE ==========================#
        $this->data['view_content'] = 'v_base';
        $this->data['script_content'] = 'v_script';

        $this->data['css_templates'] =  $this->tampilan->validation()['css'] .
                                        $this->tampilan->froala()['css'];
        $this->data['js_templates'] =   $this->tampilan->validation()['js'] .
                                        $this->tampilan->froala()['js'];
        $this->load->view('template/v_blank_template', $this->data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

    public function process(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');

        $data_users = $this->main_model->get_login_info($username);

        foreach ($data_users as $value) {
            $data_password = $this->encryption->decrypt($value->password);
            $data_pin = $this->encryption->decrypt($value->pin);

            if($username == $value->username && ($password == $data_password || $password == $data_pin)){

                $update_data = array('last_login' => date('Y-m-d H:i:s'), 'ip_address' => $this->input->ip_address());
                $this->main_model->set_session($value);
                if($remember == '1') {
                    $this->main_model->set_cookie_account($username, $password);
                }

                $this->main_model->save($update_data, $value->id);
                $this->session->set_flashdata('first_login', TRUE);
                redirect('dashboard','refresh');
            }
        }

        $this->session->set_flashdata('error', "<div class=\"alert alert-error alert-dismissible\" role=\"alert\">" .$this->lang->line('login_m_failed'). "</div>");
        redirect('login','refresh');
    }

    function send_help(){
        $this->data['judul'] = $this->input->post('judul');
        $this->data['masalah'] = $this->input->post('masalah');

        //Load email library
        $this->load->library('email');

        //SMTP & mail configuration
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hidayatpey@mail.unpas.ac.id',
            'smtp_pass' => 'function',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        //Email content
        $htmlContent = $this->load->view('login/cv_content_helpme', $this->data, TRUE);

        $this->email->to('hidayat.zonk@gmail.com');
        $this->email->from('hidayatpey@mail.unpas.ac.id','FNS Application');
        $this->email->subject('Help Me!!!');
        $this->email->message($htmlContent);

        //Send email
        $this->email->send();

        $this->session->set_flashdata('error', "<div class=\"alert alert-warning alert-dismissible\" role=\"alert\">Pesan anda sedang di proses tunggu hinga ada respon yang masuk ke email anda</div>");
        redirect('login','refresh');
    }
}