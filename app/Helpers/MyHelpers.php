<?php
namespace App\Helpers;

use App\Models\Rating;

class MyHelpers
{
    public static function get_ratings($id)
    {
        $ratings = [];
        foreach (Rating::where('book_id', $id)->get() as $rating) {
            $ratings[] = $rating->rating;
        }

        return $ratings;
    }

    public static function get_total_voter($id)
    {
        $ratings = self::get_ratings($id);
        return count($ratings);
    }

    public static function get_average_rating($id)
    {
        $ratings = self::get_ratings($id);
        $ratings == [] ? $average = 0 : $average = array_sum($ratings) / count($ratings);
        return round($average, 1);
    }
}