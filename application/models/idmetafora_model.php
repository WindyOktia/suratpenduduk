<?php

class idmetafora_model extends CI_Model
{

    public function getPenduduk()
    {
        return $this->db->get('penduduk')->result_array();
    }

    public function insertPenduduk()
    {
        $data = [
            'NIK' => $_POST['NIK'],
            'nama' => $_POST['nama'],
            'Jenis_kelamin' => $_POST['jenis_kelamin'],
            'alamat' => $_POST['alamat'],
            'RT' => $_POST['rt'],
            'RW' => $_POST['rw'],
            'Telp' => $_POST['no_telp']
        ];

        $this->db->insert('penduduk', $data);
    }

    public function deletePenduduk($id)
    {
        $this->db->delete('penduduk', ['id_penduduk' => $id]);
    }

    public function updatePenduduk()
    {
        $this->db->set('NIK', $_POST['NIK']);
        $this->db->set('Nama', $_POST['nama']);
        $this->db->set('Jenis_kelamin', $_POST['jenis_kelamin']);
        $this->db->set('alamat', $_POST['alamat']);
        $this->db->set('RT', $_POST['rt']);
        $this->db->set('RW', $_POST['rw']);
        $this->db->set('Telp', $_POST['no_telp']);
        $this->db->where('id_penduduk', $_POST['id_penduduk']);
        $this->db->update('penduduk');
    }

    public function insertKK()
    {
        $data = [
            'no_kk' => $_POST['no_kk'],
            'NIK' => $_POST['NIK'],
            'status' => $_POST['status']
        ];

        $this->db->insert('kk', $data);
    }

    public function getKK()
    {
        return $this->db->get('kk')->result_array();
    }

    public function deleteKK($id)
    {
        $this->db->delete('kk', ['id_kk' => $id]);
    }

    public function updateKK()
    {
        $this->db->set('no_kk', $_POST['no_kk']);
        $this->db->set('NIK', $_POST['NIK']);
        $this->db->set('status', $_POST['status']);
        $this->db->where('id_kk', $_POST['id_kk']);
        $this->db->update('kk');
    }

    public function insertJenis()
    {
        $data = [
            'nama_jenis_surat' => $_POST['jenis_surat']
        ];

        $this->db->insert('jenis_surat', $data);
    }

    public function getJenis()
    {
        return $this->db->get('jenis_surat')->result_array();
    }

    public function deleteJenis($id)
    {
        $this->db->delete('jenis_surat', ['id_jenis_surat' => $id]);
    }

    public function updateJenis()
    {
        $this->db->set('nama_jenis_surat', $_POST['jenis_surat']);
        $this->db->where('id_jenis_surat', $_POST['id_jenis_surat']);
        $this->db->update('jenis_surat');
    }

    public function insertSurat()
    {
        $data = [
            'no_surat' => $_POST['no_surat'],
            'id_jenis_surat' => $_POST['jenis_surat'],
            'NIK' => $_POST['NIK'],
            'keterangan' => $_POST['keterangan'],
            'tanggal_surat' => $_POST['tgl_surat']
        ];

        $this->db->insert('surat', $data);
    }

    public function getSurat()
    {
        return $this->db->query('select jenis_surat.*, penduduk.*, surat.* from jenis_surat, penduduk, surat WHERE jenis_surat.id_jenis_surat=surat.id_jenis_surat AND surat.NIK=penduduk.NIK')->result_array();
    }

    public function deleteSurat($id)
    {
        $this->db->delete('surat', ['id_surat' => $id]);
    }

    public function updateSurat()
    {
        $this->db->set('no_surat', $_POST['no_surat']);
        $this->db->set('id_jenis_surat', $_POST['jenis_surat']);
        $this->db->set('NIK', $_POST['NIK']);
        $this->db->set('keterangan', $_POST['keterangan']);
        $this->db->set('tanggal_surat', $_POST['tgl_surat']);
        $this->db->where('id_surat', $_POST['id_surat']);
        $this->db->update('surat');
    }
}
