<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use cebe\markdown\Markdown as Markdown;

class Post extends Model
{
    // テーブル名
    protected $post = 'posts';

    // 可変項目
    protected $fillable = 
    [
        'title',
        'body'
    ];

    // リレーションの設定。投稿は一つの投稿者に従属する
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    use Sortable;
    public $sortable = [
        'id',
        'created_at',
        'updated_at',
    ];

    // Markdown
    public function parse() {
        //newでインスタンスを作る
        $parser = new Markdown();
        //bodyをパースする
        return $parser->parse(htmlspecialchars($this->body));
    }

    public function getMarkBodyAttribute() {
        return $this->parse();
    }
}
