<?php 

namespace App\Repository;

interface AmenitiesRepository 
{
    public function index();

    public function create();

    public function edit($id);

    public function store($collection = []);

    public function update( $id = null, $collection = [] );

    public function delete($id);
}