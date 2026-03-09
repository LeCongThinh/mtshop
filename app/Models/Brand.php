<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'status'
    ];

    public function getStatusLabelAttribute()
    {
        //Trạng thái danh mục bị soft delete
        if ($this->trashed()) {
            return ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Không hoạt động'];
        }
        return match ($this->status) {
            default => ['class' => 'badge bg-soft-success text-success', 'text' => 'Hoạt động'],
        };
    }
}
