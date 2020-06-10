<?php

namespace App\Http\Controllers;

use App\Models\AttachFile;
use App\Models\Lists;
use App\Models\MemberTask;
use App\Models\Member_prj;
use App\Models\Message;
use App\Models\Notification;
use App\Models\Project;
use App\Models\Task;
use App\Models\Work;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{

    public static function login(Request $request)
    {
        // if ($request->cookie('mail') !== null) {
        //     $mail = $request->cookie('mail');
        //     $password = $request->cookie('pass');
        // } else {
        $mail = $request->input('mail');
        $password = $request->input('pass');
        // }

        if (Auth::attempt(['mail' => $mail, 'password' => $password])) {

            // return view('info', ['info' => Auth::user()]);
            // $mail_cookie = cookie('mail', $mail, 0, "/");
            // $pass_cookie = cookie('pass', $password, 0, "/");
            $request->session()->put('id_user', Auth::user()->id);

            $project = User::find(Auth::user()->id)->prj()->get();

            return response()
                ->view('home1', ['info' => Auth::user(), 'id' => $request->session()->get('id_user'), 'project' => $project]);
            // ->withCookie($mail_cookie)
            // ->withCookie($pass_cookie);
        } else {
            return view('login');
        }
    }

    public static function logout(Request $request)
    {
        Auth::logout();
        $mail_forgot = Cookie::queue(Cookie::forget('mail'));
        $pass_forgot = Cookie::queue(Cookie::forget('pass'));
        $request->session()->forget('id_user');
        return redirect()->route('login');

    }

    public function register(Request $request)
    {
        // $mail = $request->query('mail');
        // if ($request->ajax()) {
        //     return view('register');
        // }
        // return view('login');

        $user = new User();
        $user->mail = $request->get('mail');
        $user->password = bcrypt($request->get('pass'));
        $user->name = $request->get('name');
        $user->image = 'image/ava1.png';

        $search = User::where('mail', '=', $user->mail)->get();
        if (count($search) === 0) {
            $user->save();
            return "đăng ký thành công";
        }
        return "mail đã tồn tại";

    }
    public function addUser()
    {
        $user = new User();
        $user->mail = "cuong@gmail.com";
        $user->password = bcrypt("123456");
        $user->name = "cuong";

        $user->save();
        echo "done";
    }

    public function addPrj(Request $req)
    {

        $prj = new Project();
        $member_prj = new Member_prj();

        $prj->name = $req->name;
        $prj->save();

        $member_prj->id_user = $req->id_user;
        $member_prj->id_prj = $prj->id;

        $member_prj->save();
        return true;
    }

    public function showPrj()
    {
        $id_user = $_GET['user'];
        $id = $_GET['prj'];
        // echo $id;
        $user = User::find($id_user);
        $prj = Project::find($id);
        $member = $prj->user()->get();
        $lists = $prj->lists()->get();

        $tasks = array();
        foreach ($lists as $val) {
            $task = Lists::find($val->id)->task()->get();

            \array_push($tasks, $task);
        }

        return view('project', ['lists' => $lists, 'tasks' => $tasks, 'prj' => $prj, 'member' => $member, 'user' => $user]);
    }

    public function addCard(Request $req)
    {
        $task = new Task();
        $task->name = $req->card_name;
        $task->id_list = $req->id_list;
        $task->deadline = $req->deadline;

        $task->save();

        return $task->id;
    }

    public function showModal(Request $req)
    {
        $task = Task::find($req->id_card);
        $work = $task->work()->get();
        $file = $task->file()->get();
        $member = $task->member()->get();

        return json_encode(['task' => $task, 'work' => $work, 'file' => $file, 'member' => $member]);
    }

    public function addList(Request $req)
    {
        $lists = new Lists();
        $lists->name = $req->list_name;
        $lists->id_prj = $req->id_list;

        $lists->save();

        return $lists->id;
    }

    public function uploadFile(Request $req)
    {
        $file = $req->file('file');
        $name = $file->getClientOriginalName();
        $time = time();

        $file->move(public_path() . '/files/', $time . $name);

        $attchFile = new AttachFile();

        $attchFile->name = $name;
        $attchFile->path = '../files/' . $time . $name;
        $attchFile->id_task = $req->id_card;

        $attchFile->save();

        // $exection = $file->getClientOriginalExtension(); lay duoi file

        return json_encode(['file' => $attchFile]);

    }

    public function description(Request $req)
    {

        $task = Task::find($req->id_card);

        $task->update([
            'description' => $req->des,
        ]);
        return;
    }

    public function checklist(Request $req)
    {
        if ($req->type === 'update') {
            $work = Work::find($req->id_work);

            $work->update([
                'status' => $req->status,
            ]);
        } else {
            $work = new Work();

            $work->name = $req->name_work;
            $work->id_task = $req->id_card;

            $work->save();

            return $work->id;
        }
        return;
    }

    public function searchUser(Request $req)
    {
        $mail = $req->mail;

        $users = User::where('mail', 'like', $mail . '%')->get();

        return json_encode(['users' => $users]);
    }

    public function showMess(Request $req)
    {
        $message = Project::find(1)->messages()->get();
        // $message = Message::where('id_prj', '=', 1)->get();
        $user = array();

        for ($i = 0; $i < count($message); $i++) {
            \array_push($user, $message[$i]->user()->first());
        }

        // return $content;
        return json_encode(['message' => $message, 'user' => $user]);
    }

    public function saveMess(Request $req)
    {
        $message = new Message();
        $message->id_user = $req->id_user;
        $message->id_prj = $req->id_prj;
        $message->content = $req->content;

        $message->save();

        return;
    }

    public function moveCard(Request $req)
    {
        $task = Task::find($req->id_drag);

        $task->update([
            'id_list' => $req->id_list,
        ]);

        return;
    }

    public function confirmAddMember(Request $req)
    {
        $id_prj = $req->id_prj;

        $arr_user = explode(',', $req->id_users);
        $user = array();

        for ($i = 0; $i < count($arr_user); $i++) {
            $member = new Member_prj();
            $member->id_prj = $id_prj;
            $member->id_user = $arr_user[$i];

            $member->save();

            $notifi = new Notification();
            $notifi->content = 'Bạn vừa được thêm vào dự án <u>' . $req->name_prj . '</u>';
            $notifi->id_user = $arr_user[$i];

            $notifi->save();
            \array_push($user, User::find($arr_user[$i]));
        }

        return json_encode(['user' => $user]);
    }

    public function getNotifi(Request $req)
    {
        $notifies = Notification::where([['id_user', $req->id_user], ['status', 0]])->get();

        for ($i = 0; $i < count($notifies); $i++) {
            // $notifies[$i]->status = 1;

            $notifies[$i]->update([
                'status' => 1,
            ]);
        }

        return json_encode(['notifies' => $notifies]);
    }

    public function getMemberCard(Request $req)
    {
        $user_prj = Project::find($req->id_prj)->user()->get();
        $user_card = Task::find($req->id_card)->member()->get();

        return \json_encode(['user_prj' => $user_prj, 'user_card' => $user_card]);
    }

    public function updateMemberCard(Request $req)
    {
        if ($req->status) {
            $mem = new MemberTask();
            $mem->id_user = $req->id_user;
            $mem->id_task = $req->id_card;

            $mem->save();
        } else {
            $mem = MemberTask::where([['id_user', $req->id_user], ['id_task', $req->id_card]])->delete();

            // return \json_encode(['mem' => $mem]);
        }
        return;
    }

    public function updateDeadLine(Request $req)
    {
        $task = Task::find($req->id_card);
        $task->deadline = $req->deadline;

        $task->save();
    }
}
