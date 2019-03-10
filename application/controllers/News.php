<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * News from RSS and/or DB
 *
 * @author rolandinsh
 */
class News extends CI_Controller
{

    var $usertype;
    var $isuauth;

    public function __construct()
    {
        parent::__construct();
//        $this->usertype = get_th_user('usertype');
//        $this->isuauth  = get_th_isauth();
        $this->load->model('rssnews_model');
    }


    /**
     * Latest X news
     */
    public function index()
    {
//        $isuauth = $this->isuauth;
//        if ($isuauth) {
            try {
                $news = $this->rssnews_model->tvnetlvRss();
            } catch (Exception $e) {
                $news = false;
            } 
            $data['news']       = $news;
            $data['page_title'] = 'Jaunumi'; // ignoring lang() for this task
            $this->load->view('templates/header', $data);
            $this->load->view('news/news', $data);
            $this->load->view('templates/footer', $data);
//        }
//        else {
//            redirect('/', 'refresh');
//        }
    }

}
