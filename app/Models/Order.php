<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use function PHPUnit\Framework\matches;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'order_code',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'note',
        'payment_method',
        'payment_status',
        'transaction_id',
        'status',
        'total_amount',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getPaymentLabelAttribute()
    {
        if ($this->trashed()) {
            return ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Đã xóa'];
        }
        return match ($this->payment_status) {
            'pending' => ['class' => 'badge bg-soft-warning text-warning', 'text' => 'Chưa thanh toán'],
            'refunded' => ['class' => 'badge bg-soft-info text-info', 'text' => 'Đã hoàn tiền'],
            'paid' => ['class' => 'badge bg-soft-success text-success', 'text' => 'Đã thanh toán'],
            'failed' => ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Thanh toán thất bại'],
            default => ['class' => 'badge bg-soft-secondary text-secondary', 'text' => 'Không xác định'],
        };
    }
    public function getStatusLabelAttribute()
    {
        // Đơn hàng bị soft delete
        if ($this->trashed()) {
            return ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Đã xóa'];
        }
        return match ($this->status) {
            'pending' => ['class' => 'badge bg-soft-warning text-warning', 'text' => 'Chờ duyệt đơn'],
            'confirmed' => ['class' => 'badge bg-soft-info text-info', 'text' => 'Đã xác nhận đơn hàng'],
            'shipping' => ['class' => 'badge bg-soft-primary text-primary', 'text' => 'Đang giao hàng'],
            'delivered' => ['class' => 'badge bg-soft-success text-success', 'text' => 'Giao thành công'],
            'cancelled' => ['class' => 'badge bg-soft-danger text-danger', 'text' => 'Đã hủy đơn'],
            default => ['class' => 'badge bg-soft-secondary text-secondary', 'text' => 'Không xác định'],
        };
    }
}
