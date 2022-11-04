<?php

class Api_model extends CI_Model {
    
    public function getAllBarang()
    {
        return $this->db->get('tb_barang')->result();
    }
    
    public function getBarangById($id)
    {
        return $this->db->get_where('tb_barang', ['id_barang' => $id])->row();
    }

    public function insertBarang($data)
    {
        $this->db->insert('tb_barang', $data);
    }
    
    public function updateBarang($data, $where)
    {
        $this->db->where('id_barang', $where);
        $this->db->update('tb_barang', $data);
    }
    
    public function deleteBarang($idBarang)
    {
        $this->db->where('id_barang', $idBarang);
        $this->db->delete('tb_barang');
    }
    
    // ============= siswa ================ 
    
    public function getSiswa()
    {
        $this->db->select('tb_siswa.id, tb_siswa.nisn, tb_siswa.nama, tb_jurusan.nama_jurusan, tb_jurusan.kepanjangan_jurusan, tb_kelas.kelas');
        $this->db->from('tb_siswa');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'inner');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'inner');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
    
    public function getSiswaById($id)
    {
        $this->db->select('tb_siswa.id, tb_siswa.nisn, tb_siswa.nama, tb_jurusan.nama_jurusan, tb_jurusan.kepanjangan_jurusan, tb_kelas.kelas');
        $this->db->from('tb_siswa');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_siswa.id_jurusan', 'inner');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_siswa.id_kelas', 'inner');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }
    
    public function getSiswaByNisn($nisn)
    {
        return $this->db->get_where('tb_siswa', ['nisn' => $nisn])->row();
    }
    
    public function insertSiswa($data)
    {
        $this->db->insert('tb_siswa', $data);
    }
    
    public function updateSiswa($data, $where)
    {
        $this->db->where('id', $where);
        $this->db->update('tb_siswa', $data);
    }
    
    public function deleteSiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_siswa');
    }
    
    
}