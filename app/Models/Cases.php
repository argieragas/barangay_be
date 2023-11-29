<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;
    protected $table = 'case';
    protected $fillable = [
        'title',
        'type',
        'complainantfName',
        'complainantmName',
        'complainantlName',
        'complainantAddress',
        'complainantLatlng',
        'complaintfName',
        'complaintmName',
        'complaintlName',
        'complaintAddress',
        'complaintLatlng',
        'schedule',
        'status',
        'remark',
        'location',
        'details'
    ];
}
