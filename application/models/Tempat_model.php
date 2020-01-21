<?php

class Tempat_model extends CI_Model
{
    // function getProvinsi()
    // {
    //     $json = file_get_contents('http://dev.farizdotid.com/api/daerahindonesia/provinsi');
    //     $json = json_decode($json, true);
    //     return $json;
    // }

    // function getKota($id)
    // {
    //     $json = file_get_contents("http://dev.farizdotid.com/api/daerahindonesia/provinsi/" . $id . "/kabupaten");
    //     $json = json_decode($json, true);
    //     $json = $json['kabupatens'];
    //     return $json;
    // }

    // function getKecamatan($id)
    // {
    //     $json = file_get_contents("http://dev.farizdotid.com/api/daerahindonesia/provinsi/kabupaten/" . $id . "/kecamatan");
    //     $json = json_decode($json, true);
    //     $json = $json['kecamatans'];
    //     return $json;
    // }

    // function getToken()
    // {
    //     $json = file_get_contents('https://x.rajaapi.com/poe');
    //     $json = json_decode($json, true);
    //     $token = $json['token'];
    //     return $token;
    // }

    function getProvinsi()
    {
        // $token = $this->getToken();   
        $token = $this->session->userdata('token');
        $json = file_get_contents('https://x.rajaapi.com/MeP7c5ne' . $token . '/m/wilayah/provinsi');
        $json = json_decode($json, true);
        $json = $json['data'];
        return $json;
    }

    function getKota($id)
    {
        // $token = $this->getToken();
        $token = $this->session->userdata('token');
        $json = file_get_contents('https://x.rajaapi.com/MeP7c5ne' . $token . '/m/wilayah/kabupaten?idpropinsi=' . $id);
        $json = json_decode($json, true);

        $json = $json['data'];
        return $json;
    }

    function getKecamatan($id)
    {
        // $token = $this->getToken();
        $token = $this->session->userdata('token');
        $json = file_get_contents('https://x.rajaapi.com/MeP7c5ne' . $token . '/m/wilayah/kecamatan?idkabupaten=' . $id);
        $json = json_decode($json, true);
        $json = $json['data'];
        return $json;
    }
}
