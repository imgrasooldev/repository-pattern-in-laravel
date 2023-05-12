<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class OrdersFilter extends ApiFilter
{
    protected $safeParms = [
        'client' => ['eq'],
        'isFulFilled' => ['eq']
    ];

    protected $columnMap = [
        'isFulFilled' => 'is_fulfilled'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
