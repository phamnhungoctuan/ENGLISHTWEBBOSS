<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CateAddRequest;
use App\Http\Requests\EditCateRequest;
use App\Category;
use App\Users;
use App\News;
use DateTime;


class CateController extends Controller
{
    //
    public function getAddCate()
    {
    	$data = Category::select('id', 'name', 'parent_id')->get()->toArray();
    	#print_r($data);
    	return view('admin.category.addcate', ['dataCate' => $data]);
    }

    public function postAddCate(CateAddRequest $request) {
    	$cate = new Category;
      $cate->name = $request->txtCateName;
  		$cate->slug = str_slug($request->txtCateName, "-");
  		$cate->parent_id = $request->sltCate;
  		$cate->created_at = new DateTime();
      $cate->save();
      return redirect()->route('category')->with('add-success', 'Đã thêm chuyên mục "'.$request->txtCateName.'" thành công');
    }

    public function getCateList(){
    	$data = Category::select('id', 'name', 'parent_id', 'slug')->get()->toArray();
    	#print_r($data);
    	return view('admin.category.listcate', ['dataCate' => $data]);
    }

    public function DeleteCate($id) {
      if ($id == 1){
        return redirect()->back()->with('del-error', 'Bạn không được phép xóa chuyên mục mặc định');
      } else {
        $parent = Category::where('parent_id', $id)->count();
        //print_r($parent);
        if ($parent > 0){
          $datachild = Category::where('parent_id', $id)->get()->toArray();
          foreach ($datachild as $val) {
            DeleteChild($val['id']);
          }
        }
        $data = Category::find($id);
        $data->delete($id);
        return redirect()->back()->with('add-success', 'Đã xóa chuyên mục thành công');
      }
    	
    }

    public function getEditCate($id) {
      if ($id == 1){
        return redirect()->back()->with('del-error', 'Bạn không được phép sửa chuyên mục mặc định');
      } else {
     		$data = Category::select('id', 'name', 'parent_id')->get()->toArray();
     		$dataid = Category::findOrFail($id)->toArray();
      	return view('admin.category.editcate', ['dataCate' => $data, 'parent' => $dataid]);
      }
    }

    public function postEditCate(EditCateRequest $request, $id) {
  		$cate = Category::find($id);
  		$old_name = $cate->name;
  		$cate->name = $request->txtCateName;
    	$cate->slug = str_slug($request->txtCateName, "-");
    	$cate->parent_id = $request->sltCate;
    	$cate->updated_at = new DateTime();
      $cate->save();
      return redirect()->route('category')->with('add-success', 'Đã sửa chuyên mục "'.$old_name.'" "'.$request->txtCateName.'" thành công');
    }

    public function postCateofNews($url, $id){
      $cate = Category::find($id);
      $namecate = $cate->name;
      $catepost = News::where('category_id', $id)->get()->toArray();
      return view('admin.category.catepost', ['namecate' => $namecate, 'news' => $catepost]);
    }
}
