<?php 

namespace App\Repository;

interface BookingRepository 
{
    public function index();

    public function delete($id);

    public function approveBook($id,$status);

}