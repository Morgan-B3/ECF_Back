<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matelas extends Model
{
    use HasFactory;

        /**
     * Calcul de remise
     */
    public static function discount($price, $discount){
        if ($discount){
            $discounted_price = $price * (1 - $discount / 100);
            return number_format($discounted_price, 2, ".", "");
        }
        else{
            return $price;
        }
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function longueur()
    {
        return $this->belongsTo(Longueur::class);
    }

    public function largeur()
    {
        return $this->belongsTo(Largeur::class);
    }
}
