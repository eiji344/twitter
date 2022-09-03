<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//デフォルトだと7行目のSoftDeketesの最初のSが小文字になっていて、エラーになった。
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //詳細画面で使用。getTwwet()で取得した情報にn日もづいたコメント情報を取得。
    public function getComments(Int $tweet_id)
    {
        return $this->with('user')->where('tweet_id', $tweet_id)->get();
    }
    
    //コメントの保存
    public function commentStore(Int $user_id, Array $data)
    {
        $this->user_id = $user_id;
        $this->tweet_id = $data['tweet_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }
}