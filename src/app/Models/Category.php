<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'category_id', 'first_name', 'last_name', 'gender',
        'email', 'tel', 'address', 'building', 'detail'
    ];

    // カテゴリとのリレーション
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // フルネーム取得用アクセサ
    public function getFullNameAttribute(): string
    {
        return "{$this->last_name} {$this->first_name}";
    }

    // 性別のラベル表示用アクセサ（PHP 7.4対応）
    public function getGenderLabelAttribute(): string
    {
        switch ($this->gender) {
            case 1:
                return '男性';
            case 2:
                return '女性';
            case 3:
                return 'その他';
            default:
                return '';
        }
    }   
}