<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Repositories\ItemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ItemController extends AppBaseController
{
    /** @var  ItemRepository */
    private $itemRepository;

    public function __construct(ItemRepository $itemRepo)
    {
        $this->itemRepository = $itemRepo;
    }

    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request,$request_id)
    {
        $items =Item::where('request_id',$request_id)->get();

        return view('items.index')
            ->with(['items'=> $items,'request_id'=>$request_id]);
    }
    /**
     * Display a listing of the Item.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function print(Request $request,$request_id)
    {
        $items =Item::where('request_id',$request_id)->get();

        return view('items.print')
            ->with(['items'=> $items,'request_id'=>$request_id]);
    }
    /**
     * Show the form for creating a new Item.
     *
     * @return Response
     */
    public function create($request_id)
    {
        return view('items.create',compact('request_id'));
    }

    /**
     * Store a newly created Item in storage.
     *
     * @param CreateItemRequest $request
     *
     * @return Response
     */
    public function store(CreateItemRequest $request,$request_id)
    {
        $input = $request->all();
        $input['total']= $input['qty']* $input['price'];
        $item = $this->itemRepository->create($input);

        Flash::success('Item saved successfully.');

        return redirect(route('items.index',$request_id));
    }

    /**
     * Display the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($request_id,$id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.show')->with(['item'=> $item,'request_id'=>$request_id]);
    }

    /**
     * Show the form for editing the specified Item.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($request_id,$id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index'));
        }

        return view('items.edit')->with(['item'=> $item,'request_id'=>$request_id]);
    }

    /**
     * Update the specified Item in storage.
     *
     * @param int $id
     * @param UpdateItemRequest $request
     *
     * @return Response
     */
    public function update($request_id,$id, UpdateItemRequest $request)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index',$request_id));
        }
        $input = $request->all();
        $input['total']= $input['qty']* $input['price'];
        $item = $this->itemRepository->update($input, $id);

        Flash::success('Item updated successfully.');

        return redirect(route('items.index',$request_id));
    }

    /**
     * Remove the specified Item from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($request_id,$id)
    {
        $item = $this->itemRepository->find($id);

        if (empty($item)) {
            Flash::error('Item not found');

            return redirect(route('items.index',$request_id));
        }

        $this->itemRepository->delete($id);

        Flash::success('Item deleted successfully.');

        return redirect(route('items.index',$request_id));
    }
}
