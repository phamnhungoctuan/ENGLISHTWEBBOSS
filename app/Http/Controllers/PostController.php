<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddLessonRequest;
use App\Http\Requests;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\CheckTaskRequest;
use App\Category;
use App\Users;
use App\News;
use App\Lesson;
use App\Task;
use DateTime,File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function getPost($url , $id) {
        $new = News::find($id)->toArray();
        $lesson = Lesson::where([ 
                ['new_id','=', $id],
                ['parent_id', '>', 0 ],
            ])->get()->toArray();
    	return view('page.page.post', ['id'=> $id, 'datanews' => $new, 'lesson' => $lesson, 'url' => $url]);
    }
    public function getLesson($url, $id, $idls) {
        $task = Task::where('lesson_id', $idls)->get()->toArray();
        $lesson = Lesson::find($idls)->toArray();
        $list = Lesson::where('new_id', $id)->get()->toArray();
    	return view('page.page.lesson', ['id'=>$id, 'url' => $url, 'idls' => $idls, 'task' => $task, 'lesson' => $lesson, 'listlesson' => $list]);
    }

    public function getLessonAdmin($id) {
        $data = Lesson::where('new_id', $id)->get()->toArray();;
    	return view('admin.news.lesson.lesson', ['id' => $id, 'dataLesson' => $data]);
    }
    public function getAddLesson($id) {
        $data = Lesson::select()->get()->toArray();
    	return view('admin.news.lesson.addlesson', ['id' => $id, 'dataLesson' => $data]);
    }
    public function postAddLesson(AddLessonRequest $request, $id) {
        $lesson = new Lesson;
        $lesson->name = $request->txtLessonName;
        $lesson->intro_video = $request->txtUrlVideo;
        $lesson->url = str_slug($request->txtLessonName);
        $lesson->parent_id = $request->sltLesson;
        $lesson->new_id = $id;
        $lesson->created_at = new DateTime();
        $lesson->save();
        return redirect()->route('getEditLesson', ['id' => $id, 'idls' => $lesson->id])->with('add-success', 'Đã thêm bài học "'.$request->txtLessonName.'" thành công');
    }

    public function getEditLesson($id, $idls) {
        $dataList = Lesson::select()->get()->toArray();
        $lesson = Lesson::findOrFail($idls)->toArray();
        $datatask = Task::where('lesson_id', $idls)->get()->toArray();
        return view('admin.news.lesson.editlesson', ['id' => $id, 'idls' => $idls, 'dataLesson' => $dataList, 'lesson' =>$lesson, 'datatask' => $datatask]);
    }
    public function postEditLesson(AddLessonRequest $request, $id, $idls) {
        $lesson = Lesson::find($idls);
        $lesson->name = $request->txtLessonName;
        $lesson->intro_video = $request->txtUrlVideo;
        $lesson->url = str_slug($request->txtLessonName);
        $lesson->parent_id = $request->sltLesson;
        $lesson->new_id = $id;
        $lesson->updated_at = new DateTime();
        $lesson->save();
        return redirect()->route('getLessonAdmin', ['id' => $id])->with('add-success', 'Đã sửa bài học thành công');
    }
    public function deleteLesson($id, $idls) {
        $parent = Lesson::where('parent_id', $idls)->count();
        if ($parent > 0){
          $datachild = Lesson::where('parent_id', $idls)->get()->toArray();
          foreach ($datachild as $val) {
            DeleteChildLesson($val['id']);
          }
        }
        $data = Lesson::find($idls);
        $data->delete($idls);
        return redirect()->back()->with('add-success', 'Đã xóa bài học thành công');   
    }
    public function addtask(TaskRequest $request, $id, $idls) {
        $task           = new Task;
        $task->question = $request->txtQuestion;
        if ($request->slTypeTask == 0) {
            $task->type    = 0;
            $task->content = "";
        }
        if ($request->slTypeTask == 1) {
            $task->type    = 1;
            $task->content = $request->txtText;
        }
        if ($request->slTypeTask == 2) {
            $task->type = 2;
            $file       = $request->file('taskImg');
            if (strlen($file) > 0) {
                $filename = time().'.'.$file->getClientOriginalName();
                $destinationPath = 'uploads/news/';
                $file->move($destinationPath,$filename);
                $task->content = $filename;
            }
        }
        if ($request->slTypeTask == 3) {
            $task->type    = 3;
            $task->content = $request->txtUrl;
        }
        if ($request->slTypeTask == 4) {
            $task->type    = 4;
            $task->content = $request->txtAudio;
        }
        $task->A          = $request->txtA;
        $task->B          = $request->txtB;
        $task->C          = $request->txtC;
        $task->D          = $request->txtD;
        $task->answer     = $request->slAnswer;
        $task->lesson_id  = $idls;
        $task->created_at = new DateTime();
        $task->save();
        return redirect()->route('getEditLesson', ['id' => $id, 'idls' => $idls]);
    }
    public function deltask($id, $idls, $idtask){
        $datatask = Task::find($idtask);
        $datatask->delete();
        return redirect()->back()->with('del-success', 'Đã xóa câu hỏi thành công'); 
    }
    public function getedittask($id, $idls, $idtask) {
        $datatask = Task::find($idtask);
        return view('admin.news.lesson.edittask', ['id' => $id, 'idls' => $idls, 'idtask' => $idtask, 'datatask' => $datatask]);
    }
    public function postedittask(TaskRequest $request, $id, $idls, $idtask) {
        $task = Task::findOrFail($idtask);
        $task->question = $request->txtQuestion;
        if ($request->slTypeTask == 0) {
            $task->type    = 0;
            $task->content = "";
        }
        if ($request->slTypeTask == 1) {
            $task->type    = 1;
            $task->content = $request->txtText;
        }
        if ($request->slTypeTask == 2) {
            $task->type = 2;
            $file       = $request->file('taskImg');
            if (strlen($file) > 0) {
                $fImageCurrent = $request->fImageCurrent;
            if (file_exists(public_path().'/uploads/news/'.$fImageCurrent)) {
                File::delete(public_path().'/uploads/news/'.$fImageCurrent);
            }

            $filename = time().'.'.$file->getClientOriginalName();
            $destinationPath = 'uploads/news/';
            $file->move($destinationPath,$filename);
            $task->content = $filename;
            }
        }
        if ($request->slTypeTask == 3) {
            $task->type    = 3;
            $task->content = $request->txtUrl;
        }
        if ($request->slTypeTask == 4) {
            $task->type    = 4;
            $task->content = $request->txtAudio;
        }
        $task->A          = $request->txtA;
        $task->B          = $request->txtB;
        $task->C          = $request->txtC;
        $task->D          = $request->txtD;
        $task->answer     = $request->slAnswer;
        $task->lesson_id  = $idls;
        $task->updated_at = new DateTime();
        $task->save();
        return redirect()->route('getEditLesson', ['id' => $id, 'idls' => $idls])->with('add-success', 'Đã sửa câu hỏi thành công');
    }
    public function checkanswer(CheckTaskRequest $request, $url,$id, $idls) {
        $task = Task::where('lesson_id', $idls)->get()->toArray();
        $stt = 0;
        $kq = 0;
        $sl = 0;
        $dapan = array();
        foreach ($task as $val) {
            $str = 'test'.$val['id'];
            $answer = $request->get($str);
            if($answer == $val['answer']){
                $dapan[$val['id']] = $val['answer'];
                $kq++;
            } else
                $dapan[$val['id']] = $answer;
            $sl++;
        }
        //print_r($dapan);
        return redirect()->route('getLesson', ['id' => $id, 'url' => $url, 'idls' => $idls])->with(['add-success' => 'Bạn đã làm đúng '.$kq.' / '.$sl.' câu hỏi', 'dapan' => $dapan]);
    }
}
