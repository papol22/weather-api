<?php
class People extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('people_model');
        }

        public function index()
		{
        $data['people'] = $this->people_model->get_people();
        $data['title'] = 'People archive';

        $this->load->view('templates/header', $data);
        $this->load->view('people/index', $data);
        $this->load->view('templates/footer');
		}

	
        public function view($id = NULL)
		{

        $data['poeple_list'] = $this->people_model->get_people($id);
 
        if (empty($data['people_list']))
        {
                show_404();
        }

        $data['title'] = $data['people_list']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('people/view', $data);
        $this->load->view('templates/footer');
		}
		
		
		
		
		public function create()
		{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
        $this->load->view('templates/header', $data);
        $this->load->view('news/create');
        $this->load->view('templates/footer');

			}
		else
		{
			$this->news_model->set_news();
			$this->load->view('news/success');
		}
	}
}