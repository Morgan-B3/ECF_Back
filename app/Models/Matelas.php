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
            return number_format($discounted_price, 2, ".");
        }
        else{
            return $price;
        }
    }

    public function brand()
    {
        return $this->belongsToMany(Brand::class, 'matelas_brands');
    }

    public function longueur()
    {
        return $this->belongsToMany(Longueur::class, 'matelas_longueurs');
    }

    public function largeur()
    {
        return $this->belongsToMany(Largeur::class, 'matelas_largeurs');
    }
}
