<?php namespace App\Repositories\Contracts;

interface SaleRepositoryInterface
{
    public function all();

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function show($id);
}