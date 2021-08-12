<?php

class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
    }


    public function index($offset=0)//method
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = $this->Blog_model->getTotalblog();
        $config['per_page'] = 3;

        $this->pagination->initialize($config);
        
        $data['blog']=$this->Blog_model->getBlog($config['per_page'], $offset );  
        $this->load->view('blog',$data); //parameter pertama untuk memanggil file view
    } 
    
    public function detail($url)//method
    {
        // $query = $this->db->query('SELECT * FROM blog WHERE url = "'.$url.'"');
        $data['blog']=$this->Blog_model->getSingleBlog('url',$url);
        $this->load->view('detail',$data);
    }

    public function add()//method
    {

        $this->form_validation->set_rules('title','Judul Kosong','required');
        $this->form_validation->set_rules('url','URL Kosong','required|alpha_dash');
        $this->form_validation->set_rules('content','Content Kosong','required');
        // -Parameter pertama adalah nama field.
        // -Paremeter kedua adalah notifikasi atau caption yang akan ditampilkan apabila data yang diinput tidak sesuai rules.
        // -Parameter ketiga adalah rules untuk pengisian field atau data tersebut, 
        //  seperti apakah wajib diisi atau tidak, minimal karakter yang harus diisi, 
        //  maximal karakter yang harus diisi dan sebagainya. selengkapnya baca di project/asset/macam-macam rules

        if($this->form_validation->run()==TRUE){
            $data['title']=$this->input->post('title');
            $data['url']=$this->input->post('url');
            $data['content']=$this->input->post('content');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 7000;
            $config['max_width']            = 5000;
            $config['max_height']           = 7000;

            $this->load->library('upload', $config); //Kode di atas memuat library upload dengan mengirim parameter $config yang sudah dikonfigurasi.

            if ( ! $this->upload->do_upload('cover'))
                {
                        echo $this->upload->display_errors();

                }
                else
                {
                        $data['cover'] = $this->upload->data('file_name');
                }

            $id=$this->Blog_model->getInsert($data);

           if($id){
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('/');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Gagal Disimpan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
                
        }
        $this->load->view('formadd');
    }

    public function edit($id)//method
    {
        $data['blog'] = $this->Blog_model->getSingleBlog('id',$id);
        //Baris kode di atas digunakan untuk mengambil data blog dengan, 
        //kriteria field id dan nilai sesuai parameter yang dikirim.

        $this->form_validation->set_rules('title','Judul Kosong','required');
        $this->form_validation->set_rules('url','URL Kosong','required|alpha_dash');
        $this->form_validation->set_rules('content','Content Kosong','required');

        if($this->form_validation->run()==TRUE){
            $alurupdate['title']=$this->input->post('title');
            $alurupdate['url']=$this->input->post('url');
            $alurupdate['content']=$this->input->post('content');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 7000;
            $config['max_width']            = 5000;
            $config['max_height']           = 7000;

            $this->load->library('upload', $config); //Kode di atas memuat library upload dengan mengirim parameter $config yang sudah dikonfigurasi.
            $this->upload->do_upload('cover');

            if(!empty($this->upload->data('file_name'))){
                $alurupdate['cover'] = $this->upload->data('file_name');
            }
            

            $id=$this->Blog_model->updateBlog($id, $alurupdate);

            if($id){
                $this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Berhasil Update <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('/');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data Gagal Update <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
                //$this->session->set_flashdata('',''); Parameter pertama adalah index dari session, sedangkah parameter kedua adalah pesan yang ingin ditampilkan 
        }

        $this->load->view('formedit',$data);
    }

    public function delete($id)//method
    {
        $result= $this->Blog_model->deleteBlog($id);
        if($result){
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil dihapus</div>');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Data gagal dihapus</div>');
        }
        
        redirect('/');
    }

    public function login()//method
    {
        if ($this->input->post())
        {
            $username= $this->input->post('username');
            $password= $this->input->post('password');
    
            if($username=='admin'&& $password='admin'){
                $_SESSION['username'] ='admin';
                redirect('/');
            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger"> Username atau Password Salah</div>');
                redirect('blog/login');
            }
            
            //Method di atas melakukan pengecekan terlebih dahulu apakah ada data yang dikirim? apabila ada maka dilakukan validasi 
            //apakah data username yang diinput berisi admin dan password yang diinput berisi admin, apabila benar, 
            //maka data session username akan terisi dengan admin, dan otomatis akan diarahkan ke halaman utama, 
            //namun apabila data username yang diinput bukan admin dan data password yang diinput bukan admin maka 
            //akan menampilkan notifikasi gagal dan tetap berada pada form login.

            // Pada method di atas, kita masih mengisi username dan password dengan data statis,
            // suatu saat kita dapat mengembangkannya dengan menggunakan data dinamis dari database.

        } 
        $this->load->view('login');
    }

    public function logout()//method
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
