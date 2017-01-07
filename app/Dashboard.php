<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use Imageable;

    protected $table = 'dashboard';

    protected $fillable = ['name', 'storeName', 'registrationNumber', 'description', 'bankName', 'bankAccountNo', 'bankHolderName', 'feature1', 'feature1Description', 'feature1Image','feature2', 'feature2Description', 'feature2Image', 'feature3', 'feature3Description', 'feature3Image', 'slider1','slider2','slider3','googleAnalyticCode'];

    public static function storeName()
    {
        return Dashboard::first()->storeName;
    }

    public static function businessName()
    {
        return Dashboard::first()->name;
    }

    public static function registrationNumber()
    {
        return Dashboard::first()->registrationNumber;
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
