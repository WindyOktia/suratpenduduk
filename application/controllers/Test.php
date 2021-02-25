<?php

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('idmetafora_model', 'data');
    }

    public function index()
    {
        $data['getPenduduk'] = $this->data->getPenduduk();
        $data['getJenis'] = $this->data->getJenis();
        $data['getSurat'] = $this->data->getSurat();
        $this->load->view('part/header');
        $this->load->view('surat', $data);
        $this->load->view('part/footer');
    }

    public function insertSurat()
    {
        $this->data->insertSurat();
        redirect('test/');
    }

    public function deleteSurat($id)
    {
        $this->data->deleteSurat($id);
        redirect('test/');
    }

    public function updateSurat()
    {
        $this->data->updateSurat();
        redirect('test/');
    }

    public function regPenduduk()
    {
        $data['penduduk'] = $this->data->getPenduduk();
        $this->load->view('part/header');
        $this->load->view('penduduk', $data);
        $this->load->view('part/footer');
    }

    public function insertPenduduk()
    {
        $this->data->insertPenduduk();
        redirect('test/regPenduduk');
    }

    public function deletePenduduk($id)
    {
        $this->data->deletePenduduk($id);
        redirect('test/regPenduduk');
    }

    public function updatePenduduk()
    {
        $this->data->updatePenduduk();
        redirect('test/regPenduduk');
    }

    public function regKK()
    {
        $data['penduduk'] = $this->data->getPenduduk();
        $data['kk'] = $this->data->getKK();
        $this->load->view('part/header');
        $this->load->view('KK', $data);
        $this->load->view('part/footer');
    }

    public function insertKK()
    {
        $this->data->insertKK();
        redirect('test/regKK');
    }

    public function deleteKK($id)
    {
        $this->data->deleteKK($id);
        redirect('test/regKK');
    }

    public function updateKK()
    {
        $this->data->updateKK();
        redirect('test/regKK');
    }

    public function setupSurat()
    {
        $data['getJenis'] = $this->data->getJenis();
        $this->load->view('part/header');
        $this->load->view('Jenis_surat', $data);
        $this->load->view('part/footer');
    }

    public function insertJenis()
    {
        $this->data->insertJenis();
        redirect('test/setupSurat');
    }

    public function deleteJenis($id)
    {
        $this->data->deleteJenis($id);
        redirect('test/setupSurat');
    }

    public function updateJenis()
    {
        $this->data->updateJenis();
        redirect('test/setupSurat');
    }
}
