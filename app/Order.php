<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    private $status_list = [
        'Pendente',
        'Processando',
        'Em Espera',
        'Completo',
        'Fechado',
        'Cancelado'
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return array
     */
    public function getStatus()
    {
        return $this->status_list[$this->status];
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }
    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function getStatusList()
    {
        return $this->status_list;
    }
}
