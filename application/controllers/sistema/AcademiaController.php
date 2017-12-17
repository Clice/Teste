<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AcademiaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AcademiaModel');
        // $this->categorias = $this->modelcategorias->listarCategorias();
    }

    // FUNÇÃO DE CARREGAMENTO DA VIEW LISTA-ACADEMIAS.PHP
    public function index() {
        $dados['nomePagina'] = 'Lista de Academias';
        $this->load->view('sistema/templates/html-header', $dados);
        $this->load->view('sistema/templates/header');
        $this->load->view('sistema/templates/side-menu');
        $this->load->view('sistema/telas/listas/lista-academias');
        $this->load->view('sistema/templates/footer');
        $this->load->view('sistema/templates/html-footer');
    }

    // FUNÇÃO DE CARREGAMENTO DA VIEW CADASTRAR-EDITAR-ACADEMIA.PHP
    public function viewCadastrarEditarAcademia() {
        $dados['nomePagina'] = 'Cadastrar Academia';

        // SE UM ID ACADEMIA FOI PASSADO OU NÃO
        // PARA REALIZAR A EDIÇÃO OU O CADASTRO DE UMA ACADEMIA
        if (isset($idAcademia)) {
            $dados['idPlano'] = $idPlano;
            $dados['idPacote'] = $idPacote;
            $dados['valorPago'] = $valorPago;
            $dados['valorTotal'] = $valorTotal;
            $dados['idAcademia'] = $idAcademia;
            $dados['qtdParcelas'] = $qtdParcelas;
            $dados['statusAcademia'] = $statusAcademia;
            $dados['qtdTotalLicencas'] = $qtdTotalLicencas;
            $dados['qtdLicencasUsadas'] = $qtdLicencasUsadas;
            $dados['mensalidadeAcademia'] = $mensalidadeAcademia;
            $dados['diaPagamentoAcademia'] = $diaPagamentoAcademia;
        } else {
            $dados['idPlano'] = 0;
            $dados['idPacote'] = 0;
            $dados['valorPago'] = 0;
            $dados['valorTotal'] = 0;
            $dados['idAcademia'] = "novo";
            $dados['qtdParcelas'] = 0;
            $dados['statusAcademia'] = 0;
            $dados['qtdTotalLicencas'] = 0;
            $dados['qtdLicencasUsadas'] = 0;
            $dados['mensalidadeAcademia'] = 0;
            $dados['diaPagamentoAcademia'] = 0;
        }

        // CARREGANDO AS VIEWS PARA FORMAR A TELA DE CADASTRO/EDIÇÃO DA ACADEMIA
        $this->load->view('sistema/templates/html-header', $dados);
        $this->load->view('sistema/templates/header');
        $this->load->view('sistema/templates/side-menu');
        $this->load->view('sistema/telas/cadastros/cadastrar-editar-academia');
        $this->load->view('sistema/templates/footer');
        $this->load->view('sistema/templates/html-footer');
    }

    // FUNÇÃO DE CARREGAMENTO DA VIEW RELARORIO.PHP
    public function viewRelatorio() {
        $dados['nomePagina'] = 'Relatório';
        $this->load->view('sistema/templates/html-header', $dados);
        $this->load->view('sistema/templates/header');
        $this->load->view('sistema/templates/side-menu');
        $this->load->view('sistema/telas/relatorio');
        $this->load->view('sistema/templates/footer');
        $this->load->view('sistema/templates/html-footer');
    }

    public function cCadastrarEditarAcademia() {
        // PEGANDO OS VALORES PASSADOS PELO CADASTRAR-EDITAR-ACADEMIA.PHP     
        $dadosAcademia = array(
            'idAcademia' => $this->input->post('idAcademia'),
            'idPlano' => $this->input->post('idPlano'),
            'idPacote' => $this->input->post('idPacote'),
            'nomeAcademia' => $this->input->post('nomeAcademia'),
            'cnpjAcademia' => $this->input->post('cnpjAcademia'),
            'enderecoAcademia' => $this->input->post('enderecoAcademia'),
            'estadoAcademia' => $this->input->post('estadoAcademia'),
            'cidadeAcademia' => $this->input->post('cidadeAcademia'),
            'bairroAcademia' => $this->input->post('bairroAcademia'),
            'cepAcademia' => $this->input->post('cepAcademia'),
            'telefoneAcademia' => $this->input->post('telefoneAcademia'),
            'nomeResponsavelAcademia' => $this->input->post('nomeResponsavelAcademia'),
            'emailAcademia' => $this->input->post('emailAcademia'),
            'mensalidadeAcademia' => $this->input->post('mensalidadeAcademia'),
            'statusAcademia' => false,
            'qtdTotalLicencas' => $this->input->post('qtdTotalLicencas'),
            'qtdLicencasUsadas' => 0,
            'valorTotal' => $this->input->post('valorTotal'),
            'valorPago' => 0,
            'qtdParcelas' => 12,
            'diaPagamentoAcademia' => $this->input->post('diaPagamentoAcademia')
        );

        // SE O ID ACADEMIA FOR NOVO, CADASTRAR UMA NOVA ACADEMIA
        if ($dadosAcademia['idAcademia'] == "novo") {
            if ($this->AcademiaModel->mCadastrarAcademia($dadosAcademia)) {
                $resposta = array('success' => true);
            } else {
                $resposta = array('success' => false);
            }
        }
        // SE O ID ACADEMIA JÁ EXISTE, ALTERAR OS DADOS DA ACADEMIA
        else {
            if ($this->AcademiaModel->mEditarAcademia($dadosAcademia)) {
                $resposta = array('success' => true);
            } else {
                $resposta = array('success' => false);
            }
        }

        echo json_encode($resposta);
    }

    public function cVerificarCNPJ() {
        $cnpjAcademia = $this->input->post('cnpjAcademia');

        $dadosAcademia = $this->AcademiaModel->mVerificarCNPJ($cnpjAcademia);

        if (count($dadosAcademia) === 1) {
            $resposta = array('existe' => true);
        } else {
            $resposta = array('existe' => false);
        }

        echo json_encode($resposta);
    }

}
