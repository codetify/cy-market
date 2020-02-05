<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sitemap extends CI_Controller {


    /**
     * Index Page for this controller.
     *
     */
    public function index()
    {
        $this->load->database();
        
        //Uygulamalar
        $query = $this->db->get("brkdndr_uygulamalar");
        $data['uygulama'] = $query->result();

        //Oyunlar
        $query = $this->db->get("brkdndr_oyunlar");
        $data['oyun'] = $query->result();
        
        //Sayfalar
        $query = $this->db->get("brkdndr_sayfalar");
        $data['sayfa'] = $query->result();
        
        //Kategoriler
        $query = $this->db->get("brkdndr_kategoriler");
        $data['kategori'] = $query->result();


        $this->load->view('sitemap', $data);
    }
}