<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$logged_in = $session->get('admin_logged_in');
		if ($logged_in) {
			return redirect()->to(base_url('dashboard'));
		} else {
			echo view('login');
		}
	}

	public function auth()
	{
		$session = session();
		$uname = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$year = $this->request->getPost('year');

		if ($uname == 'phfogun' && $password == 'pmc2022') {
			$newdata = array(
				'admin' => $uname,
				'year' => $year,
				'admin_logged_in' => TRUE
			);
			$session->set($newdata);
			return redirect()->to(base_url('dashboard'));
		} else {
			return redirect()->to(base_url('/'));
		}
	}

	public function logout()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {
			session()->destroy();
			return redirect()->to(base_url('/'));
		} else {
			echo view('login');
		}
	}

	public function dashboard()
	{
		// echo('dashboard');	
		$logged_in = session()->get('admin_logged_in');
		
		$ManualDel = new \App\Models\ManualDel();
		if ($logged_in) {
			$year = session()->get('year');
			if($year == 'current'){
				$Delegates = new \App\Models\Delegates();
			}else{
				$Delegates = new \App\Models\DelegatesOld();
			}

			$data = [
				'total_del' => $Delegates->whereNotIn('ref',['m'])->countAllResults(),
				'remo' => $Delegates->whereNotIn('ref',['m'])->where('lb', 'Remo')->countAllResults(),
				'egba' => $Delegates->whereNotIn('ref',['m'])->where('lb', 'Egba')->countAllResults(),
				'ijebu' => $Delegates->whereNotIn('ref',['m'])->where('lb', 'Ijebu')->countAllResults(),
				'aoo' => $Delegates->whereNotIn('ref',['m'])->where('lb', 'Adoodo')->countAllResults(),
				'others' => $Delegates->whereNotIn('ref',['m'])->where('lb', 'others')->countAllResults(),
				'male' => $Delegates->whereNotIn('ref',['m'])->where('gender', 'male')->countAllResults(),
				'female' => $Delegates->whereNotIn('ref',['m'])->where('gender', 'female')->countAllResults(),
				'damale' => $Delegates->where(['gender'=>'male','lb'=>'Egba'])->countAllResults() + $Delegates->where(['gender'=>'male','lb'=>'Adoodo'])->countAllResults() + $Delegates->where(['gender'=>'male','lb'=>'others'])->countAllResults(),
				'dafemale' => $Delegates->where(['gender'=>'female','lb'=>'Egba'])->countAllResults() + $Delegates->where(['gender'=>'female','lb'=>'Adoodo'])->countAllResults() + $Delegates->where(['gender'=>'female','lb'=>'others'])->countAllResults(),
				'dbmale' => $Delegates->where(['gender'=>'male','lb'=>'Remo'])->countAllResults() + $Delegates->where(['gender'=>'male','lb'=>'Ijebu'])->countAllResults(),
				'dbfemale' => $Delegates->where(['gender'=>'female','lb'=>'Remo'])->countAllResults() + $Delegates->where(['gender'=>'female','lb'=>'Ijebu'])->countAllResults(),
				'psec' => $Delegates->whereNotIn('ref',['m'])->where('category', 'primary')->countAllResults(),
				'dapsec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'primary','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'primary','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'primary','lb'=>'others'])->countAllResults(),
				'dbpsec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'primary','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'primary','lb'=>'Ijebu'])->countAllResults(),
				'jsec' => $Delegates->whereNotIn('ref',['m'])->where('category', 'jsec')->countAllResults(),
				'dajsec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'jsec','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'jsec','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'jsec','lb'=>'others'])->countAllResults(),
				'dbjsec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'jsec','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'jsec','lb'=>'Ijebu'])->countAllResults(),
				'ssec' => $Delegates->whereNotIn('ref',['m'])->where('category', 'ssec')->countAllResults(),
				'dassec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'ssec','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'ssec','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'ssec','lb'=>'others'])->countAllResults(),
				'dbssec' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'ssec','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'ssec','lb'=>'Ijebu'])->countAllResults(),
				'hi' => $Delegates->whereNotIn('ref',['m'])->where('category', 'hi')->countAllResults(),
				'dahi' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'hi','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'hi','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'hi','lb'=>'others'])->countAllResults(),
				'dbhi' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'hi','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'hi','lb'=>'Ijebu'])->countAllResults(),
				'workers' => $Delegates->whereNotIn('ref',['m'])->where('category', 'Workers')->countAllResults(),
				'daworkers' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'workers','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'workers','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'workers','lb'=>'others'])->countAllResults(),
				'dbworkers' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'workers','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'workers','lb'=>'Ijebu'])->countAllResults(),
				'sch_leaver' => $Delegates->whereNotIn('ref',['m'])->where('category', 'sch_leaver')->countAllResults(),
				'dasch_leaver' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'sch_leaver','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'sch_leaver','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'sch_leaver','lb'=>'others'])->countAllResults(),
				'dbsch_leaver' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'sch_leaver','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'sch_leaver','lb'=>'Ijebu'])->countAllResults(),
				'official' => $Delegates->whereNotIn('ref',['m'])->where('category', 'Camp_Official')->countAllResults(),
				'daofficial' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'Camp_Official','lb'=>'Egba'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'Camp_Official','lb'=>'Adoodo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'Camp_Official','lb'=>'others'])->countAllResults(),
				'dbofficial' => $Delegates->whereNotIn('ref',['m'])->where(['category'=>'Camp_Official','lb'=>'Remo'])->countAllResults() + $Delegates->whereNotIn('ref',['m'])->where(['category'=>'Camp_Official','lb'=>'Ijebu'])->countAllResults(),
				'manual' => [
					'total_del' => $Delegates->where('paid', 'm')->countAllResults(),
					'remo' => $Delegates->where(['paid'=>'m','lb'=>'Remo'])->countAllResults(),
					'egba' => $Delegates->where(['paid'=>'m','lb'=>'Egba'])->countAllResults(),
					'ijebu' => $Delegates->where(['paid'=>'m','lb'=>'Ijebu'])->countAllResults(),
					'aoo' => $Delegates->where(['paid'=>'m','lb'=>'Adoodo'])->countAllResults(),
					'others' => $Delegates->where(['paid'=>'m','lb'=>'others'])->countAllResults(),
                    'male' => $Delegates->where(['paid'=>'m','gender'=>'male'])->countAllResults(),
					'female' => $Delegates->where(['paid'=>'m','gender'=>'female'])->countAllResults(),
                    'psec' => $Delegates->where(['paid'=>'m','category'=>'primary'])->countAllResults(),
                    'jsec' => $Delegates->where(['paid'=>'m','category'=>'jsec'])->countAllResults(),
                    'ssec' => $Delegates->where(['paid'=>'m','category'=>'ssec'])->countAllResults(),
                    'hi' => $Delegates->where(['paid'=>'m','category'=>'hi'])->countAllResults(),
                    'workers' => $Delegates->where(['paid'=>'m','category'=>'Workers'])->countAllResults(),
					'sch_leaver' => $Delegates->where(['paid'=>'m','category'=>'sch_leaver'])->countAllResults(),
				]
			];

			echo view('header');
			echo view('dashboard', $data);
			echo view('footer');
		} else {
			echo view('login');
		}
	}

	public function manual()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {

			echo view('header');
			echo view('manualUpload');
			echo view('footer');
		} else {
			echo view('login');
		}
	}

	public function manual1()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {

			echo view('header');
			echo view('manualUpload1', $this->request->getGet());
			echo view('footer');
		} else {
			echo view('login');
		}
	}

	public function manual2()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {

			$manual = new \App\Models\ManualDel();
			$incoming = $this->request->getPost();
			$res = $manual->insert($incoming);

			return redirect()->back();
		} else {
			echo view('login');
		}
	}


	public function printe()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {
			$year = session()->get('year');
			if($year == 'current'){
				$Delegates = new \App\Models\Delegates();
			}else{
				$Delegates = new \App\Models\DelegatesOld();
			}$Delegates = new \App\Models\Delegates();

			$data = array(
				'delegates' => $Delegates->findAll(),
				'type' => 'Electronic'
			);

			echo view('header');
			echo view('print', $data);
			echo view('footer');
		} else {
			echo view('login');
		}
	}

	public function printo()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {
			$year = session()->get('year');
			if($year == 'current'){
				$Delegates = new \App\Models\Delegates();
			}else{
				$Delegates = new \App\Models\DelegatesOld();
			}$Delegates = new \App\Models\Delegates();

			$data = array(
				'delegates' => $Delegates->where('category','Camp_Official')->find(),
				'type' => 'Electronic'
			);

			echo view('header');
			echo view('printo', $data);
			echo view('footer');
		} else {
			echo view('login');
		}
	}

	public function printm()
	{
		$logged_in = session()->get('admin_logged_in');
		if ($logged_in) {
			$Delegates = new \App\Models\ManualDel();

			$data = array(
				'delegates' => $Delegates->findAll(),
				'type' => 'Electronic'
			);

			echo view('header');
			echo view('print', $data);
			echo view('footer');
		} else {
			echo view('login');
		}
	}

    public function cert($name)
    {
        // var_dump($name);
        echo view('cert', ['name'=>$name]);
    }

	//--------------------------------------------------------------------

}
