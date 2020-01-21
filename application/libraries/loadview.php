<?php
class loadview
{

    function loadFront($data)
    {
        $ci = get_instance();

        $ci->load->view('frontend/templates/topbar', $data);
        $ci->load->view('frontend/templates/navbar', $data);
        $ci->load->view($data['page'], $data);
        $ci->load->view('frontend/templates/footer-v1', $data);
    }

    function ownerlogin($data)
    {
        $ci = get_instance();

        $ci->load->view('frontend/templates/topbar', $data);
        $ci->load->view($data['page'], $data);
        $ci->load->view('frontend/templates/footer-v1', $data);
    }

    function loadDashboard($data)
    {
        $ci = get_instance();

        $ci->load->view('backend/templates/topbar', $data);
        $ci->load->view('backend/templates/sidebar', $data);
        $ci->load->view('backend/templates/navbar', $data);
        $ci->load->view($data['page'], $data);
        $ci->load->view('backend/templates/footer', $data);
    }
}
