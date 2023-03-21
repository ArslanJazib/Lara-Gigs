<?php

namespace App\Models;

class Listing
{
    public static function all(){
        return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem Ipsum'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem Ipsum'
            ]
        ];
    }

    public static function find($id){
        $listings = self::all();

        foreach ($listings as $key => $listing) {
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }

}
