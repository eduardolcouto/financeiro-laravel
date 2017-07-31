<?php

namespace Finlaravel\Http\Controllers\Admin;

use Finlaravel\Http\Controllers\Controller;
use Finlaravel\Http\Controllers\Response;
use Illuminate\Http\Request;

use Finlaravel\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Finlaravel\Http\Requests\BankCreateRequest;
use Finlaravel\Http\Requests\BankUpdateRequest;
use Finlaravel\Repositories\BankRepository;


class BanksController extends Controller
{

    /**
     * @var BankRepository
     */
    protected $repository;


    public function __construct(BankRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $banks = $this->repository->paginate(5);

 /*       if (request()->wantsJson()) {

            return response()->json([
                'data' => $banks,
            ]);
        }
*/
        return view('admin.banks.index', compact('banks'));
    }

    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BankCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BankCreateRequest $request)
    {

        $data = $request->all();
        $data['logo'] = 'http://lorempixel.com/100/70/nature/';
        $this->repository->create($data);


        /*if ($request->wantsJson()) {

            $response = [
                'message' => 'Bank created.',
                'data'    => $bank->toArray(),
            ];

            return response()->json($response);
        }
        */


        return redirect()->route('admin.banks.index');
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

        $bank = $this->repository->find($id);

        return view('admin.banks.edit', compact('bank'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BankUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BankUpdateRequest $request, $id)
    {

            $bank = $this->repository->update($request->all(), $id);

            return redirect()->route('admin.banks.index');

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

        return redirect()->route('admin.banks.index')->with('message', 'Bank deleted.');
    }

    public function delete($id)
    {
        $bank = $this->repository->find($id);

        return view('admin.banks.delete',compact('bank'));
    }
}
