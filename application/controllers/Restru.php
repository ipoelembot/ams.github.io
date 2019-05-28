<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restru extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perorangan_model', 'perorangan');
		$this->load->model('Restru_corporate', 'restru_cor');
		$this->load->model('Restru_commercial', 'restru_com');
		$this->load->model('Restru_smm', 'restru_smm');
		$this->load->model('Restru_consumer', 'restru_cons');
		$this->load->model('Mds_model');
	}
	public function cariCorp()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/exist/cari_exist_corp', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	
	public function hasilCariCorp()
	{
		$data['cari'] = $this->restru_cor->getCariCorporate();
		$data['isNullCorporate'] = $this->restru_cor->isNullCorporate();
		$data['content'] = $this->load->view('form/exist/result_exist_corp', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function edit(){
		$isNull = $this->uri->segment('3');
		$id = $this->uri->segment('4');
		
		$list1 = $this->perorangan->step1();
		$list2 = $this->perorangan->step2();
		$list3 = $this->perorangan->step3();
		$list4 = $this->perorangan->step4();
		$list5 = $this->perorangan->step5();

		if ($isNull == 1){		//Jika data tidak ada di tbl_register_personal
			$data['data1'] = $this->Mds_model->getValue($list1,$id,"tbl_db_perorangan");
			$data['data2'] = $this->Mds_model->getValue($list2,$id,"tbl_db_perorangan");
			$data['data3'] = $this->Mds_model->getValue($list3,$id,"tbl_db_perorangan");
			$data['data4'] = $this->Mds_model->getValue($list4,$id,"tbl_db_perorangan");
			$data['data5'] = $this->Mds_model->getValue($list5,$id,"tbl_db_perorangan");
		}
		else {					//Jika data ada di tbl_register_personal
			$data['data1'] = $this->Mds_model->getValue($list1,$id,'tbl_register_personal');
			$data['data2'] = $this->Mds_model->getValue($list2,$id,'tbl_register_personal');
			$data['data3'] = $this->Mds_model->getValue($list3,$id,'tbl_register_personal');
			$data['data4'] = $this->Mds_model->getValue($list4,$id,'tbl_register_personal');
			$data['data5'] = $this->Mds_model->getValue($list5,$id,'tbl_register_personal');
		}

		$data['isNull']		= $isNull;
		$data['id']			= $id;
		$data['step'] 		= $this->perorangan->getStep();
		$data['list1'] 		= $this->perorangan->step1();
		$data['list2'] 		= $this->perorangan->step2();
		$data['list3'] 		= $this->perorangan->step3();
		$data['list4'] 		= $this->perorangan->step4();
		$data['list5'] 		= $this->perorangan->step5();
		$data['segment'] 	= $this->perorangan->getSegment();
		
		if ($isNull == 1){		//Jika data tidak ada di tbl_register_personal, maka masuk ke view edit_exist
			$data['content'] 	= $this->load->view('form/exist/edit_exist', $data, TRUE);
		}
		else {					//Jika data ada di tbl_register_personal, maka masuk ke view edit
			$data['content'] 	= $this->load->view('form/edit', $data, TRUE);
		}
		
		$this->load->view('template/mainwrapper', $data);
	}
}