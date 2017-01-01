<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboard';

    protected $fillable = ['name', 'storeName', 'registrationNumber', 'description', 'bankName', 'bankAccountNo', 'bankHolderName', 'feature1', 'feature1Description', 'feature2', 'feature2Description', 'feature3', 'feature3Description', 'googleAnalyticCode'];

    public static function storeName()
    {
        return Dashboard::first()->storeName;
    }

    public static function googleCode()
    {
         return Dashboard::first()->googleAnalyticCode;
    }

    public static function bankDetails()
    {
        $dashboard = Dashboard::first();

        $detail = 
        [
            "bankName" => $dashboard->bankName, 
            "accountNo" => $dashboard->bankAccountNo, 
            "holderName" => $dashboard->bankHolderName
        ];

        return $detail;
    }
}
