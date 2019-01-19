<?php namespace App\Repositories\Contracts;

interface DiscountRepositoryInterface
{
    public function all($id);

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function show($id);
}