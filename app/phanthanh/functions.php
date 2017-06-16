<?php
use App\Category;
use App\Lesson;
use App\News;

	function SelectCateMenu ($data, $parent_id = 0, $str = '', $select = 0) {
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['name'];
			
			if ($val['parent_id'] == $parent_id){
				if ($select != 0 && $id == $select){
					echo '<option value="'.$val["id"].'" selected>'.$str.' '.$val["name"].'</option>';
				} else 
					echo '<option value="'.$val["id"].'">'.$str.' '.$val["name"].'</option>';
				SelectCateMenu($data, $id, $str." |---", $select);
			}
			
		}
	}

	function SelectLessonMenu ($data, $parent_id = 0, $str = '', $select = 0) {
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['name'];
			
			if ($val['parent_id'] == $parent_id){
				if ($select != 0 && $id == $select){
					echo '<option value="'.$val["id"].'" selected>'.$str.' '.$val["name"].'</option>';
				} else 
					echo '<option value="'.$val["id"].'">'.$str.' '.$val["name"].'</option>';
				SelectCateMenu($data, $id, $str." |---", $select);
			}
			
		}
	}

	function SelectCateMenuEdit ($data, $parent_id = 0, $str = '', $select = 0) {
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['name'];
			
			if ($val['parent_id'] == $parent_id){
				if ($select != 0 && $id == $select){
					echo '<option value="'.$val["id"].'" selected>'.$str.' '.$val["name"].'</option>';
				} else 
					echo '<option value="'.$val["id"].'">'.$str.' '.$val["name"].'</option>';
				SelectCateMenu($data, $id, $str." |---", $select);
			}
			
		}
	}

	function ListCate($data, $parent_id = 0, $str = '', $stt = 1) {
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['name'];
			$surl = $val['slug'].'.post:'.$val['id'];
			if($val['parent_id'] == $parent_id){
				echo'<tr class="list_data">
	                
	                <td class="list_td alignleft"><a href="'.url('pt32admin/category').'/'.$surl.'">'.$str.' '.$name.'</a></td>
	                <td class="list_td aligncenter">
	                    <a href="edit/'.$id.'"><img width="30" height="30" src="'.asset("public/pt32_template/images/edit.png").'" /></a>
	                    <a href="delete/'.$id.'" onclick="return accept_del(\'Việc xóa chuyên mục này sẽ làm mất tất cả chuyên mục con nếu có. Bạn có muốn xóa không\')"><img width="30" height="30" src="'.asset("public/pt32_template/images/delete.png").'" /></a>
	                </td>
	            </tr>';
	            ListCate($data, $id, $str." |---", $stt);
			}
		}
	}

	function ListLesson($data, $idls, $parent_id = 0, $str = '') {
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['name'];
			if($val['parent_id'] == $parent_id){
				echo'<tr class="list_data">
	                
	                <td class="list_td alignleft"><a href="'.route('getEditLesson',['id'=>$idls, 'idls'=> $val['id']]).'">'.$str.' '.$name.'</a></td>
	                <td class="list_td aligncenter">
	                    <a href="'.$idls.'/edit/'.$id.'"><img width="30" height="30" src="'.asset("public/pt32_template/images/edit.png").'" /></a>
	                    <a href="'.$idls.'/delete/'.$id.'" onclick="return accept_del(\'Việc xóa chuyên mục này sẽ làm mất tất cả chuyên mục con nếu có. Bạn có muốn xóa không\')"><img width="30" height="30" src="'.asset("public/pt32_template/images/delete.png").'" /></a>
	                </td>
	            </tr>';
	            ListLesson($data, $idls, $id, $str." |---");
			}
		}
	}

	function DeleteChild($id){
    	$parent = Category::where('parent_id', $id)->count();
    	if ($parent > 0){
    		$datachild = Category::where('parent_id', $id)->get()->toArray();
    		foreach ($datachild as $val) {
    			DeleteChild($val['id']);
    		}
    	}
    	$data = Category::find($id);
		$data->delete($id);
    }

    function DeleteChildLesson($id){
    	$parent = Lesson::where('parent_id', $id)->count();
    	if ($parent > 0){
    		$datachild = Lesson::where('parent_id', $id)->get()->toArray();
    		foreach ($datachild as $val) {
    			DeleteChildLesson($val['id']);
    		}
    	}
    	$data = Lesson::find($id);
		$data->delete($id);
    }

    function ListUser($data) {
    	$stt = 0;
		foreach ($data as $val) {
			$id = $val['id'];
			$name = $val['username'];
			$email = $val['email'];
			if($val['level'] == 1) { $level = "danger"; $chucvu = "Quản trị viên"; }
			if($val['level'] == 2) { $level = "info"; $chucvu = "Cộng tác viên"; }
			if($val['level'] == 3) { $level = "active"; $chucvu = "Thành viên"; }
				echo'<tr class="list_data '.$level.'">
	                <td class="list_td alignleft">'.++$stt.'</td>
	                <td class="list_td alignleft">'.$name.'</td>
	                <td class="list_td alignleft">'.$email.'</td>
	                <td class="list_td alignleft">'.$chucvu.'</td>
	                <td class="list_td aligncenter">
	                    <a href="edit/'.$id.'"><img width="30" height="30" src="'.asset("public/pt32_template/images/edit.png").'" /></a>
	                    <a href="delete/'.$id.'" onclick="return accept_del(\'Bạn có chắc muốn xóa thành viên này không?\')"><img width="30" height="30" src="'.asset("public/pt32_template/images/delete.png").'" /></a>
	                </td>
	            </tr>';
		}
	}

	function ListNews($data) {
    	$stt = 0;
		foreach ($data as $val) {
			$id = $val['id'];
			$title = $val['title'];
			$cate = Category::find($val['category_id']);
			$category = $cate->name;
			$publish = $val['created_at'];
				echo'
	                <td class="list_td alignleft">'.++$stt.'</td>
	                <td class="list_td alignleft">'.$title.'</td>
	                <td class="list_td alignleft">'.$category.'</td>
	                <td class="list_td alignleft">'.$publish.'</td>
	                <td class="list_td aligncenter">
	                    <a href="edit/'.$id.'"><img width="30" height="30" src="'.asset("public/pt32_template/images/edit.png").'" /></a>
	                    <a href="delete/'.$id.'" onclick="return accept_del(\'Bạn có chắc muốn xóa bài viết này không?\')"><img width="30" height="30" src="'.asset("public/pt32_template/images/delete.png").'" /></a>
	                </td>
	            </tr>';
		}
	}

	function getNameCate($id) {
		$cate = Category::find($id);
		return $cate;
	}
	function getNameNews($id) {
		$new = News::find($id);
		return $new;
	}

	function getListCate($id) {
		$postlist = News::where('category_id', $id)->get()->toArray();
		return $postlist;
	}

	function listLessonsl($listlesson, $id, $url, $idls, $parent_id = 0, $str = '') {
		foreach ($listlesson as $val) {
			$name = $val['name'];
			if ($parent_id == $val['parent_id']){
				if($str!='') echo '<ul class="'.$str.'">';
				$urls = route('getLesson', ['id'=>$id, 'url'=>$url, 'idls'=>$val['id']]);
				if ($val['id'] == $idls) $cl = 'class="actived"'; else $cl='';
				if ($val['parent_id'] <= 0)
					echo '<li>'.$name;
				else 
					echo '<li><a '.$cl.' href="'.$urls.'">'.$name.'</a>';
					listLessonsl($listlesson, $id, $url, $idls, $val['id'], "lesson-child");
				echo'</li>';
				if($str!='') echo '</ul>';
			}
		}
	}
?>