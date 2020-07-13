<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class UserController extends Controller
{
    public function user_reg()
    {
    	return view('user_register');
    }
    public function register(Request $req)
    {
    	 $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return redirect()->to('/login');
    }
    public function login()
    {
    	return view('login');
    }
    public function user_login(Request $req)
    {
    	$this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    	if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/dashboard');
    }
    public function dashboard()
    {
    	$blogs = DB::table('blogs')->orderby('id','desc')
    	->get();
    	foreach($blogs as $blg)
    	{
    		$cat_name=explode(',',$blg->fk_category_id);
    		foreach ($cat_name as $key) {
    			$cat_name = $key;
    			$blg->cat_name[] = DB::table('categories')->where('id',$key)->value('category_name');
    		}
    		    	$blg->cat_name = implode(',',$blg->cat_name);
    	}
    	if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            if ($_GET['start_date'] != '' && $_GET['end_date'] != '') {
                $startDate = date('Y-m-d', strtotime($_GET['start_date']));
                $endDate = date('Y-m-d', strtotime($_GET['end_date']));
			}
		}
		else
		{
			$startDate = date('Y-m-d');
            $endDate = date('Y-m-d');
		}
    	return view('dashboard',compact('blogs','startDate','endDate'));
    }
    public function add_blog()
    {
    	$cat_tbl = DB::table('categories')->get();
    	return view('add_blog',compact('cat_tbl'));
    }
    public function ins_blog(Request $req)
    {
    	$blog_name = $req->blog_name;
    	$cat_name = $req->cat_name;
    	DB::table('blogs')->insert(
		    ['fk_category_id' => $cat_name, 'blog_name' => $blog_name]
		);
		return response('1');
    }
    public function FilterDate(Request $req)
    {
    	$startDate = $req->from;
    	$endDate = $req->to;
    	$startDate=date('Y-m-d',strtotime($startDate));
    	$endDate=date('Y-m-d',strtotime($endDate));
    	$blogs = DB::table('blogs')
    	->whereBetween('date', [$startDate, $endDate])->orderby('id','desc')
    	->get();
    	foreach($blogs as $blg)
    	{
    		$cat_name=explode(',',$blg->fk_category_id);
    		foreach ($cat_name as $key) {
    			$cat_name = $key;
    			$blg->cat_name[] = DB::table('categories')->where('id',$key)->value('category_name');
    		}
    		    	$blg->cat_name = implode(',',$blg->cat_name);
    	}
    	if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
            if ($_GET['start_date'] != '' && $_GET['end_date'] != '') {
                $startDate = date('Y-m-d', strtotime($_GET['start_date']));
                $endDate = date('Y-m-d', strtotime($_GET['end_date']));
			}
		}
		else
		{
			$startDate = date('Y-m-d');
            $endDate = date('Y-m-d');
		}
		$view = view('partial_dashboard', compact('startDate','endDate','blogs'));
        $view = $view->render();
        return response()->json(['html' => $view]);
    }
}
