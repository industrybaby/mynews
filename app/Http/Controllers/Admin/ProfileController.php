<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function add()
{
    return view('admin.profile.create');
}

public function create(Request $request)
{
    $this->validate($request, Profile::$rules);

    $profile = new Profile;
    $form = $request->all();

    unset($form['_token']);

    $profile->fill($form);
    $profile->save();

    return redirect('admin/profile/create');
}

public function index(Request $request)
  {
      $cond_name = $request->cond_name;
      if ($cond_name != '') {
          // 検索されたら検索結果を取得する
          $posts = Profile::where('name', $cond_name)->get();
      } else {
          // それ以外はすべてのプロフィールを取得する
          $posts = Profile::all();
      }
      return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
  }

public function edit(Request $request)
  {
      
      $profile = Profile::find($request->id);
      if (empty($profile)) {
          abort(404);
      }
      return view('admin/profile/edit', ['profile_form' => $profile]);
  }


public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);
      
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();

      return redirect('admin/profile');
  }

public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = Profile::find($request->id);
        // 削除する
        $profile->delete();
        return redirect('admin/profile/');
    }

}