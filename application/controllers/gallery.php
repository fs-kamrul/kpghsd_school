<?php
class gallery extends CI_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('image_model', 'i_model', TRUE);

        
        $m_view = $this->session->userdata('user_id');
        if ($m_view == NULL) {
            redirect("admin_log", "refresh");
        }
    }
    public function view() {
        $data=array();
        $data['title'] = 'gallery';
        $data['show'] = '15'; 
        $data['view_img'] = $this->i_model->select_all_image();
        $data['maincontain'] = $this->load->view('admin/image_gallery', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function input_img() {
        $data=array();
        $data['title'] = 'input_gallery';
        $data['show'] = '14';
        $data['maincontain'] = $this->load->view('admin/input_image_gallery', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function detail_image($img_id) {
        $data=array();
        $data['title'] = 'gallery';
        $data['show'] = '15';
        $data['view_img'] = $this->i_model->select_detail_image($img_id);
        $data['maincontain'] = $this->load->view('admin/detail_image_gallery', $data, TRUE);
        $this->load->view('admin/dashboard', $data);
    }
    public function img_save() {
        $data = array();
        /*--------file---------------*/
                $config['upload_path'] = 'images/gallery/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '2024';
		$config['max_height']  = '1768';

                $error=array() ;
                $fdata=array();
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('photo'))
		{
                    $error['erroraaa']= $this->upload->display_errors();
                    $this->session->set_userdata($error);
//			$error = array('error' => $this->upload->display_errors());
//			$this->load->view('upload_form', $error);
		}
		else
		{
			$fdata = $this->upload->data();
                        $data['photo']=  $config['upload_path'].$fdata['file_name'];
			
                        //echo $data['blog_image'];
//			$fdata = array('upload_data' => $this->upload->data());
//			$this->load->view('upload_success', $data);
		}
                //exit();
        /*----------------------------*/
        
        $data['image_name'] = $this->input->post('image_name', TRUE);
        //$data['photo'] = $this->input->post('photo', TRUE);
        
        $this->i_model->save_img($data);

        $sdata = array();
        $sdata['message'] = 'Image Save Successfully';
        $this->session->set_userdata($sdata);
        redirect('gallery/input_img');
    }
}
