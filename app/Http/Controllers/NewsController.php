<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\AddNewRequest;
use App\Http\Requests\EditNewsRequest;
use App\News;
use DateTime,File;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
	public function getNewList() {
		$data = News::select('id', 'title', 'url', 'category_id', 'users_id', 'created_at', 'updated_at', 'status')->orderBy('id', 'DESC')->paginate(10);
		return view('admin.news.newlist', ['news' => $data]);
	}

    public function getNewAdd() {
		$data = Category::select('id', 'name', 'parent_id')->get()->toArray();
		return view('admin.news.addnew', ['dataCate' => $data]);
	}

    public function postNewAdd(AddNewRequest $request) {
		$new         = new News;
		$id          = Auth::User()->id;
		$file        = $request->file('newsImg');
		$new->title  = $request->txtTitle;
		$new->url    = str_slug($request->txtTitle);
		$new->author = Auth::User()->username;
		$new->intro  = $request->txtIntro;
    	if (strlen($file) > 0) {
			$filename = time().'.'.$file->getClientOriginalName();
			$destinationPath = 'uploads/news/';
			$file->move($destinationPath,$filename);
			$new->image = $filename;
		}
		$new->status      = $request->rdoPublic;
		$new->category_id = $request->sltCate;
		$new->users_id    = $id;
		$new->full        = $request->txtFull;
		$new->created_at  = new DateTime();
		$new->save();
    	return redirect()->route('news')->with('add-success', 'Đã đăng bài "'.$request->txtTitle.'" thành công');
    }

    public function getDeleteNews($id) {
    	$data = News::find($id);
        $data->delete($id);
        return redirect()->route('news')->with('add-success', 'Đã xóa bài đăng thành công');
    }

    public function getEditNews($id, $check) {
    	$data = News::findorFail($id);
    	$cate = Category::find($data->category_id)->toArray();
    	$datacate = Category::select('id', 'name', 'parent_id')->get()->toArray();
    	return view('admin.news.editnew', ['dataEdit' => $data, 'dataCate' => $datacate, 'check' => $check, 'url' => $cate['slug'], 'cateid' => $cate['id']]);
    }

    public function postEditNews(EditNewsRequest $request, $id) {
		$new         = News::findorFail($id);
		$id          = Auth::User()->id;
		$file        = $request->file('newsImg');
		$new->title  = $request->txtTitle;
		$new->url    = str_slug($request->txtTitle,"-");
		$new->author = Auth::User()->username;
		$new->intro  = $request->txtIntro;
    	if (strlen($file) > 0) {
			$fImageCurrent = $request->fImageCurrent;
			if (file_exists(public_path().'/uploads/news/'.$fImageCurrent)) {
	            File::delete(public_path().'/uploads/news/'.$fImageCurrent);
	        }

			$filename = time().'.'.$file->getClientOriginalName();
			$destinationPath = 'uploads/news/';
			$file->move($destinationPath,$filename);
			$new->image = $filename;
		}
		$new->status      = $request->rdoPublic;
		$new->category_id = $request->sltCate;
		$new->users_id    = $id;
		$new->full        = $request->txtFull;
		$new->updated_at  = new DateTime();
		$new->save();
    	return redirect()->route('news')->with('add-success', 'Đã sửa đăng bài thành công');
    }
}
