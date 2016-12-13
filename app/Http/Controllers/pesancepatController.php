<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\MakananMinuman;
use App\Order;
use App\RumahMakan;
use Session;

class pesancepatController extends Controller
{
	public function index()
	{
		Session::flush();
		return view('pesancepat.index');
	}
	public function create()
	{
		return view('pesancepat.createAkun');
	}
	public function store(Request $request)
	{
		Akun::create($request->all());

		return redirect('pesancepat');
	}
	public function login(Request $request)
	{
		$users = Akun::all();
		$clients = RumahMakan::all();
		$isAdmin = false;
		$isClient = false;
		$isUser = false;
		if($request->username == "admin" && $request->password == "admin123")
		{
			Session::set('usernameLogin','Admin');
			Session::set('passwordLogin','Admin123');
			$isAdmin = true;
		}
		else
		{
			foreach ($users as $key => $user) 
			{
				if($request->username == $user->username && $request->password == $user->password)
				{
					Session::set('usernameLogin',$user->username);
					Session::set('passwordLogin',$user->password);
					$isUser = true;
					break;
				}
			}
			foreach ($clients as $key => $client) 
			{
				if($request->username == $client->username && $request->password == $client->password)
				{
					Session::set('usernameLogin',$client->username);
					Session::set('passwordLogin',$client->password);
					$isClient = true;								
					break;
				}
			}
		}
		if($isAdmin)
		{
			return redirect('/pesancepat/admin/home');
		}
		if($isUser)
		{
			return redirect('/pesancepat/user/home');
		}
		if($isClient)
		{
			return redirect('/pesancepat/client/home');
		}
		else
		{
			return redirect('pesancepat');
		}
	}
	public function homeAdmin()
	{
		$clients = RumahMakan::all();
		Session::set('namaLogin','Admin');
		$namaLogin = Session::get('namaLogin');
		return view('pesancepat.admin',compact('clients','namaLogin'));
	}
	public function homeClient()
	{
		$clients = RumahMakan::all();
		$usernameLogin = Session::get('usernameLogin');
		$passwordLogin = Session::get('passwordLogin');
		$idRM;
		foreach ($clients as $key => $client) 
		{
			if($usernameLogin == $client->username && $passwordLogin == $client->password)
			{
				Session::set('namaLogin',$client->nama_rm);	
				$idRM = $client->id;
				break;
			}
		}
		$namaLogin = Session::get('namaLogin');
		$orders = Order::where('rumahmakan_id','=',$idRM)->where('status','=','belum bayar')->get();		
		return view('pesancepat.daftarPesanan',compact('orders','namaLogin','idRM'));
	}
	public function homeUser()
	{
		Session::set('order',0);
		$clients = RumahMakan::all();
		$users = Akun::all();
		$usernameLogin = Session::get('usernameLogin');
		$passwordLogin = Session::get('passwordLogin');
		foreach ($users as $key => $user) 
		{
			if($usernameLogin == $user->username && $passwordLogin == $user->password)
			{
				Session::set('namaPemesan',$user->name);
				Session::set('idPemesan',$user->id);
				break;
			}
		}
		$namaPemesan = Session::get('namaPemesan');
		$idPemesan = Session::get('idPemesan');
		return view('pesancepat.home',compact('clients','namaPemesan','idPemesan'));
	}
	
	public function showMenuClient($id)
	{
		$makanans = MakananMinuman::where('jenis','=','Makanan')->where('rumahmakan_id','=',$id)->get();
		$minumans = MakananMinuman::where('jenis','=','Minuman')->where('rumahmakan_id','=',$id)->get();
		$idRM = $id;
		$client = RumahMakan::find($id);
		$namaRM = $client->nama_rm;
		$namaLogin = Session::get('namaLogin');
		return view('pesancepat.createMenu',compact('namaRM','idRM','makanans','minumans','namaLogin'));
	}
	public function showHomeClient($id)
	{
		$idRM = $id;
		$usernameLogin = Session::get('usernameLogin');
		$orders = Order::where('rumahmakan_id','=',$id)->get();
		return view('pesancepat.daftarPesanan',compact('orders','usernameLogin','idRM'));
	}
	public function pageCreateClient()
	{
		$usernameLogin = Session::get('usernameLogin');
		return view('pesancepat.createClient',compact('usernameLogin'));
	}
	public function createClient(Request $request)
	{
		RumahMakan::create($request->all());
		return redirect('/pesancepat/admin/home');
	}
	public function createMenu(Request $request)
	{
		MakananMinuman::create($request->all());
		$idRM = $request->rumahmakan_id;
		return redirect('/pesancepat/'.$idRM.'/client/menu');
		
	}
	public function showMenu($id)
	{
		$order = Session::get('order');
		$client = RumahMakan::find($id);
		$makanans = MakananMinuman::where('jenis','=','Makanan')->where('rumahmakan_id','=',$id)->get();
		$minumans = MakananMinuman::where('jenis','=','Minuman')->where('rumahmakan_id','=',$id)->get();
		$namaPemesan = Session::get('namaPemesan');
		$idPemesan = Session::get('idPemesan');
		date_default_timezone_set("Asia/Bangkok");
		$waktus = array();
		for($i = date('H', time())+1 ;$i<24 ; $i++)
		{
			array_push($waktus, $i);
		}		
		return view('pesancepat.menuRM',compact('client','makanans','minumans','namaPemesan','idPemesan','order','waktus'));
	}
	public function saveOrder(Request $request)
	{

		Order::create($request->all());
		$order = Session::get('order');
		$order++;
		Session::set('order',$order);
		return redirect('/pesancepat/'.$request->rumahmakan_id.'/menu');
	}
	public function history($id)
	{
		Session::set('order',0);
		$orders = Order::where('id_pemesan','=',$id)->get();
		$namaPemesan = Session::get('namaPemesan');
		return view('pesancepat.history',compact('namaPemesan','orders'));
	}
	public function about()
	{
		Session::set('order',0);
		$namaPemesan = Session::get('namaPemesan');
		$idPemesan = Session::get('idPemesan');
		return view('pesancepat.about',compact('namaPemesan','idPemesan'));
	}
	public function updateOrder($id, Request $request)
	{
		Order::find($id)->update($request->all());
		return redirect('/pesancepat/client/home');
	}
	public function deleteMenu($id,$idRM)
	{
		MakananMinuman::find($id)->delete();
		return redirect('/pesancepat/'.$idRM.'/client/menu');
	}
	public function searchPelanggan(Request $request)
	{
		if($request->ajax())
		{
			$outputHTML = "";
			$orders = Order::where('nama_pemesan','LIKE','%'.$request->search.'%')->where('rumahmakan_id','=',$request->idRM)->where('status','=','belum bayar')->get();
			if($orders)
			{
				for($i = count($orders)-1; $i >= 0 ;$i--)
				{
					$outputHTML.= '<tr style="text-align: center;">'.
					'<td style="color: #990000; font-weight: bold;">'.$orders[$i]->id.'</td>'.
					'<td style="color: #990000; font-weight: bold;">'.$orders[$i]->nama_pemesan.'</td>'.
					'<td>'.$orders[$i]->pesanan.'</td>'.
					'<td>'.$orders[$i]->jumlah.'</td>'.
					'<td style="color: #990000; font-weight: bold;">Rp '.$orders[$i]->total.',-</td>'.
					'<td>'.$orders[$i]->tanggal.'</td>'.
					'<td>'.$orders[$i]->pukul.'</td>'.
					'<td>'.$orders[$i]->status.'</td>'.
					'<td>'.
					'<form action="pesancepat/'.$orders[$i]->id.'/updateOrder" method="post">'.
					csrf_field().
					'<input type="hidden" name="status" value="sudah bayar">'.
					'<input type="submit" name="" value="Lunas" class="btn btn-success">'.
					'</form>'.
					'</td>'.
					'<tr>';
				}
				return Response($outputHTML);
			}
		}
	}
}
