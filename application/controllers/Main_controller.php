<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require 'MaClasse.php';
class Main_controller extends CI_Controller
{

    public function __construct () {

        parent::__construct();
    }

    function index(){

        $data = NULL;

        $this->load->view('mainpage', $data);
    }

    //Functions from mainpage
    function mainpage(){

        $data = NULL;

        $this->load->view('mainpage', $data);
    }
    /*
    //Functions from Page A
    function pagea(){

        $this->load->model('people_model');
        
        $data['all_people'] = $this->people_model->get_people_all();

        if($data['all_people'] === FALSE)
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger">Problème lors de la récupération des données</div>');
            $data['all_people'] = array();
        }

        $this->load->view('pagea', $data);

    }

    
    //Functions from Page B
    function pageb(){


        $data = NULL;

        $this->load->view('pageb', $data);

    }

    
    //Functions from Page C
    function pagec(){


        $data = NULL;

        $this->load->view('pagec', $data);

    }
    */
    //Functions from userlist
    function userlist(){

        $this->load->model('user_model');
        
        $data['all_user'] = $this->user_model->get_user_all();

        if($data['all_user'] === FALSE)
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger">Problème lors de la récupération des données</div>');
            $data['all_user'] = array();
        }

        $this->load->view('userlist', $data);

    }

    
    function userdel(){

        $this->load->model('user_model');
        
        
        $this->userlist();

    }
    
    //Functions from formpage

    function formpage(){

        
        $this->load->model('depar_model');

        $data['all_depar'] = $this->depar_model->get_depar_all();
        if($data['all_depar'] === FALSE)
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger">Problème lors de la récupération des données</div>');
            $data['all_depar'] = array();
        }

        $this->load->view('formpage', $data);

    }

    
    function formpageedit(){

        
        $this->load->model('depar_model');

        $data['all_depar'] = $this->depar_model->get_depar_all();

        if($data['all_depar'] === FALSE)
        {
            $this->session->set_flashdata('msg','<div class="alert alert-danger">Problème lors de la récupération des données</div>');
            $data['all_depar'] = array();
        }
        
        $this->load->view('formpage', $data);

    }

    function formpagedb(){

        $this->load->model('user_model');

        $this->load->library('form_validation');

        //Set form validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
        $this->form_validation->set_rules('depar', 'Departement', 'trim|required|max_length[200]');

        //Get the form data
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('depar');

        $user = new User_model;

        if($id != '')
        {
            $id = NULL;
        }

        $user->define_user(NULL,$name,$email,$subject);

        $user->addUser();
        
        
        redirect('/Main_controller/userlist', 'location');


    }

    /*
    //Functions from usercreate
    public function contact()
    {
        
        $this->load->library('form_validation');

        //Set form validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
        $this->form_validation->set_rules('departement', 'Departement', 'trim|required|max_length[200]');


    /*
    //Functions from contact
    public function contact()
    {
        
        $this->load->library('email');
        $this->load->library('form_validation');

        //Set form validation
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[6]|max_length[60]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[12]|max_length[200]');

        //Run form validation
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('pagec');
        } else {
            
            //Get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            //Web master email
            $to_email = 'paulferrand@hotmail.fr'; //Webmaster email, who receive mails

            //Mail settings
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_port'] = '465';
            $config['smtp_user'] = 'mail@domain.com'; // Your email address
            $config['smtp_pass'] = 'mailpassword'; // Your email account password
            $config['mailtype'] = 'html'; // or 'text'
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE; //No quotes required
            $config['newline'] = "\r\n"; //Double quotes required

            $this->email->initialize($config);                        

            //Send mail with data
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            
            if ($this->email->send())
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success">Message envoyé</div>');

                redirect('pagec');
            } else {
                $this->session->set_flashdata('msg','<div class="alert alert-danger">Problème lors de l\'envoi</div>');
                $this->load->view('pagec');
                echo $name;
                echo $from_email;
                echo $subject;
                echo $message;
            }
            

        }
    }

    /*
    function feedback_url(){
        if (isset($_SERVER['HTTP_HOST']))
        {
            $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $base_url .= '://'. $_SERVER['HTTP_HOST'];
            $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
        }
        else
        {
            $base_url = 'http://localhost/';
        }
        echo $base_url;
    }
    */
}

?>