<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apresentacao extends CI_Controller {

    public function index() {
        $this->load->view('apresentacao/index');
    }

    public function viewLogin() {
        $this->load->view('apresentacao/login');
    }

    public function viewQuemSomos() {
        $this->load->view('apresentacao/quem-somos');
    }

    public function cLogarUsuario() {
        $this->load->library('form_validation');

        // PEGANDO DADOS DO USUÁRIO - LOGIN E SENHA
        $this->form_validation->set_rules('loginUsuario', 'login', 'required|is_unique[usuarios.loginUsuario]');
        $this->form_validation->set_rules('senhaUsuario', 'senha', 'required|min_length[6]|is_unique[usuarios.senhaUsuario]');

        // 
        if ($this->form_validation->run() == false) {
            $this->viewLogin();
        } else {
            $loginUsuario = $this->input->post('loginUsuario');
            $senhaUsuario = $this->input->post('senhaUsuario');

            $this->db->where('loginUsuario', $loginUsuario);
            $this->db->where('senhaUsuario', $senhaUsuario);
            $usuarioLogado = $this->db->get('usuarios')->result();

            // SE EXISTE UM USUÁRIO COM O LOGIN E SENHA INFORMADOS IRÁ PARA 
            // A TELA PRINCIPAL
            if (count($usuarioLogado) == 1) {
                $dadosSessao['usuarioLogado'] = $usuarioLogado[0];
                $dadosSessao['estaLogado'] = true;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('sistema/pagina-principal'));
            } 
            // SE NÃO EXISTIR RETORNARÁ PARA A TELA DE LOGIN
            else {
                $dadosSessao['usuarioLogado'] = NULL;
                $dadosSessao['estaLogado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('apresentacao/viewLogin'));
            }
        }
    }

}
