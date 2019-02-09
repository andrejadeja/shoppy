<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\DiscountCreateRequest;
use App\Http\Requests\DiscountUpdateRequest;
use App\Repositories\DiscountRepository;
use App\Validators\DiscountValidator;

/**
 * Class DiscountsController.
 *
 * @package namespace App\Http\Controllers;
 */
class DiscountsController extends Controller
{
    /**
     * @var DiscountRepository
     */
    protected $repository;

    /**
     * @var DiscountValidator
     */
    protected $validator;

    /**
     * DiscountsController constructor.
     *
     * @param DiscountRepository $repository
     * @param DiscountValidator $validator
     */
    public function __construct(DiscountRepository $repository, DiscountValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\Entities\Sale $sale)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $discounts = $this->repository->all();

        $products = \App\Entities\Product::where('shop_id', auth()->user()->shop->id)->get();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $discounts,
            ]);
        }

        return view('discounts.index', compact('discounts', 'sale', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DiscountCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DiscountCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $discount = $this->repository->create($request->all());

            $response = [
                'message' => 'Discount created.',
                'data'    => $discount->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discount = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $discount,
            ]);
        }

        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = $this->repository->find($id);

        return view('discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DiscountUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DiscountUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $discount = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Discount updated.',
                'data'    => $discount->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Discount deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Discount deleted.');
    }
}
