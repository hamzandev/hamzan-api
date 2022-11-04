<?php

class Api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('api_model', 'api');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
    }
    
    public function index()
    {
        $this->load->view('home/index');
    }
    
    // =============================
    
    public function barang($id = null)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        $method = $_SERVER['REQUEST_METHOD'];
        $response = [];
        // ========== METHOD GET =========== //
        if ($method == 'GET') {
            // cek apakah ada parameter di URL
            if ($id == null) {
                // jika id nya tidak ada : maka ambil semua data data
                $response['status'] = true;
                $response['data'] = $this->api->getAllBarang(); 
            } else {
                // jika ada parameter id di URL
                $fetchAll = $this->api->getBarangById($id);
                if ($fetchAll) {
                    $response["status"] = true;
                    $response["data"] = $fetchAll;
                } else {
                    $res = [
                        "status" => false,
                        "message" => "Barang tidak ditemukan!"
                    ];
                    $response[] = $res;
                    header('Status: 403 Forbidden');
                }
                
            }
        } 
        
        // ========== METHOD POST ============ //
        else if ($method == 'POST') {
            $idInput = $this->input->post('id_barang');
            if ($this->api->getBarangById($idInput)) {
                $res = [
                        "status" => false,
                        "message" => "Barang dengan id $idInput sudah ada!"
                    ];
                    $response[] = $res;
                    header('Status: 403 Forbidden');
            } else {
                $dataPost = [
                    'id_barang' => $this->input->post('id_barang'),
                    'nama_barang' => $this->input->post('nama_barang'),
                    'spesifikasi_barang' => $this->input->post('spesifikasi_barang'),
                    'lokasi_barang' => $this->input->post('lokasi_barang'),
                    'kondisi_barang' => $this->input->post('kondisi_barang'),
                    'jumlah_barang' => $this->input->post('jumlah_barang'),
                    'sumber_dana' => $this->input->post('sumber_dana'),
                    'jenis_barang' => $this->input->post('jenis_barang'),
                    'keterangan' => $this->input->post('keterangan'),
                ];
                
                $this->api->insertBarang($dataPost);
                
                $res = [
                    'status' => true,
                    'message' => "Barang berhasil di tambahkan!"
                ];
                $response[] = $res;
                header('Status: 201 Modified');
            }
            
        }
        
        // =========== METHOD PUT ============ //
        else if ($method == 'PUT') {
            parse_str(file_get_contents("php://input"), $dataPut);
            // $dataPut = json_decode(file_get_contents("php://input"), true);
            
            // var_dump($dataPut); die;
            // cek apakah id barang ada di database
            if ($this->api->getBarangById($id)) {
                $this->api->updateBarang($dataPut, $id);
                // buat respone status & message
                $res = [
                    'status' => true,
                    'message' => 'Barang berhasil di update!'
                ];
                $response[] = $res;
                header('Status: 200 Ok');
            } else {
                // jika id_barang tidak ada di database
                $res = [
                  'status' => false,
                  'message' => "Barang dengan id ".$id." tidak ditemukan!"
                ];
                $response[] = $res;
                header('Status: 404 Not found');
            }
        }
            
        // ========== METHOD DELETE ====== //
        else if ($method == "DELETE") {
            if ($this->api->getBarangById($id)) {
                $this->api->deleteBarang($id);
                $res = [
                    'status' => true,
                    'message' => 'Barang dengan id '.$id.' berhasil dihapus!'
                ];
                $response[] = $res;
                header('Status: 200 Ok');
            } else {
                $res = [
                    'status' => false,
                    'message' => 'Barang dengan id '.$id.' tidak ditemukan!'
                ];
                $response[] = $res;
                header('Status: 404 Not found');
            }
        }
        
        $response = json_encode($response);
        echo $response;
    }
    
    public function siswa($id = null)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $response = [];
        
        // ============= GET ============
        if ($method == 'GET') {
            if ($id == null) {
                $response = $this->api->getSiswa();
            } else {
                $result = $this->api->getSiswaById($id);
                if ($result) {
                    $response[] = $result;
                } else {
                    $res = [
                        'status' => 404,
                        'message' => 'Data siswa tidak ditemukan.'
                    ];
                    
                    $response[] = $res;
                }
            }
        }
        
        // =========== POST ============
        else if ($method == 'POST') {
            $nisnSiswaInput = $this->input->post('nisn');
            if ($this->api->getSiswaByNisn($nisnSiswaInput)) {
                $res = [
                    'status' => 403,
                    'message' => "Data siswa dengan nisn $nisnSiswaInput sudah ada."
                ];
                $response[] = $res;
            } else {
                $dataPost = [
                    'nisn' => $this->input->post('nisn'),
                    'nama' => $this->input->post('nama'),
                    'id_kelas' => $this->input->post('id_kelas'),
                    'id_jurusan' => $this->input->post('id_jurusan')
                ];
                $this->api->insertSiswa($dataPost);
                $res = [
                    'status' => 201,
                    'message' => 'Data siswa berhasil di tambah!'
                ];
                $response[] = $res;
            }
        }
        
        // =========== PUT =============
        else if ($method == 'PUT') {
            parse_str(file_get_contents("php://input"), $dataPut);
            
            // cek apakah data dengan id tersebut ada
            if ($this->api->getSiswaById($id)) {
                $this->api->updateSiswa($dataPut, $id);
                $res = [
                    'status' => 304,
                    'message' => "Data siswa dengan id $id berhasil di update."
                ];
                $response[] = $res;
            } else {
                $res = [
                    'status' => 404,
                    'message' => "Data siswa dengan id $id tidak ditemukan"
                ];
                $response[] = $res;
            }
            
        }
        
        else if ($method == 'DELETE') {
            if ($this->api->getSiswaById($id)) {
                $this->api->deleteSiswa($id);
                $res = [
                    'status' => 304,
                    'message' => "Data siswa dengan id $id berhasil di hapus."
                ];
                $response[] = $res;
            } else {
                $res = [
                  'status' => 404,
                  'message' => "Data siswa dengan id $id tidak ditemukan."
                ];
                $response[] = $res;
            }
        }
        
        $response = json_encode($response);
        echo $response;

    }

}